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
 * @property array linked_files
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


}
