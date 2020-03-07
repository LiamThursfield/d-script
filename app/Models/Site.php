<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Site
 * @package App
 *
 * @property integer id
 * @property integer user_id
 * @property string name
 * @property string git_url
 * @property null|string ssh_key_path
 * @property string site_directory
 * @property string current_release_directory
 * @property string releases_directory
 * @property null|string persistent_directory
 * @property array persistent_files
 * @property array pre_activation_script
 * @property array post_activation_script
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property Carbon deleted_at
 *
 * @property string $site_path
 * @property string $current_release_path
 * @property string $releases_path
 * @property string $persistent_path
 */
class Site extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'persistent_files' => 'array',
        'pre_activation_script' => 'array',
        'post_activation_script' => 'array',
    ];

    public function getCurrentReleasePathAttribute()
    {
        return format_directory_path($this->site_directory . '/' . $this->current_release_directory);
    }

    public function getPersistentPathAttribute()
    {
        return format_directory_path($this->site_directory . '/' . $this->persistent_directory);
    }

    public function getReleasesPathAttribute()
    {
        return format_directory_path($this->site_directory . '/' . $this->releases_directory);
    }

    public function getSitePathAttribute()
    {
        return format_directory_path($this->site_directory);
    }

    /**
     * Get the site's user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Generate the d-script for the current site.
     *
     * @param string|null $release_name
     * @return string
     */
    public function generateScript(string $release_name = null): string
    {

        // Generate the new release path
        if (!$release_name) {
            $release_name = Carbon::now()->format('Ymdhis') . 'Z';
        }
        $new_release_path = format_directory_path($this->releases_path . '/' . $release_name);

        // Build the d-script
        $d_script = [];


        // Navigate to the site directory
        $d_script[] = 'cd ' . $this->site_path;

        // Add ssh key if necessary
        if ($this->ssh_key_path && strlen($this->ssh_key_path) > 0) {
            $d_script[] = 'eval `ssh-agent`';
            $d_script[] = 'ssh-add ' . $this->ssh_key_path;
        }

        // Clone the repo into the new release directory
        $d_script[] = 'git clone ' . $this->git_url . ' ' . $new_release_path;

        // Link any persistent files
        foreach ($this->persistent_files as $persistent_file) {
            $d_script[] =
                'ln -s ' .
                format_directory_path($this->persistent_path . '/' . $persistent_file) . ' ' .
                format_directory_path($new_release_path . '/' . $persistent_file);
        }

        // Run any Pre-Activation Scripts
        foreach ($this->pre_activation_script as $script) {
            if ($script['active']) {
                $d_script[] = $script['command'];
            }
        }

        // Activate the release
        $d_script[] = 'rm ' . $this->current_release_path;
        $d_script[] = 'ln -s ' . $new_release_path . ' ' . $this->current_release_path;

        // Run any Post-Activation Scripts
        foreach ($this->post_activation_script as $script) {
            if ($script['active']) {
                $d_script[] = $script['command'];
            }
        }

        return implode(' && ', $d_script);
    }
}
