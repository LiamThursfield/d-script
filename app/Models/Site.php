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
    public function generateScript(string $release_name = null)
    {
        if (!$release_name) {
            $release_name = Carbon::now()->format('Ymdhis');
        }

        return $release_name;
    }
}
