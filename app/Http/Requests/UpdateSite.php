<?php

namespace App\Http\Requests;

class UpdateSite extends StoreSite
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update', $this->site);
    }
}
