<?php

namespace App\Http\Requests;

use App\Models\Site;
use Illuminate\Foundation\Http\FormRequest;

class StoreSite extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', Site::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'current_release_directory'         => 'required',
            'git_path'                          => 'required',
            'name'                              => 'required',
            'persistent_directory'              => 'required',
            'persistent_files'                  => 'sometimes|array',
            'pre_activation_script'             => 'sometimes|array',
            'pre_activation_script.*.command'   => 'sometimes|string|filled',
            'pre_activation_script.*.active'    => 'sometimes|boolean|filled',
            'post_activation_script'            => 'sometimes|array',
            'post_activation_script.*.command'  => 'sometimes|string|filled',
            'post_activation_script.*.active'   => 'sometimes|boolean|filled',
            'releases_directory'                => 'required',
            'site_directory'                    => 'required',
        ];
    }
}
