<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSite;
use App\Http\Requests\UpdateSite;
use App\Models\Site;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SiteController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Site::class, 'site');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $sites = Auth::user()->sites()->paginate();

        return view('admin.sites.index', ['sites' => $sites]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('admin.sites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSite  $request
     * @return RedirectResponse
     */
    public function store(StoreSite $request)
    {
        $site = Site::create($this->getRequestValues($request, true));
        return redirect()->route('admin.sites.show', ['site' => $site]);
    }

    /**
     * Display the specified site.
     *
     * @param Site $site
     * @return View
     */
    public function show(Site $site)
    {
        return view('admin.sites.show', ['site' => $site]);
    }

    /**
     * Generate and display the d-script for the specified site.
     *
     * @param Site $site
     * @return View
     * @throws AuthorizationException
     */
    protected function showScript(Site $site)
    {
        $this->authorize('view-script', $site);
        return view('admin.sites.show-script', [
            'site' => $site,
            'site_script' => $site->generateScript()
        ]);
    }

    /**
     * Show the form for editing the specified site.
     *
     * @param Site $site
     * @return View
     */
    public function edit(Site $site)
    {
        return view('admin.sites.edit', ['site' => $site]);
    }

    /**
     * Update the specified site in storage.
     *
     * @param  UpdateSite  $request
     * @param Site $site
     * @return RedirectResponse
     */
    public function update(UpdateSite $request, Site $site)
    {
        $site->update($this->getRequestValues($request));
        return redirect()->route('admin.sites.show', ['site' => $site]);
    }

    /**
     * Remove the specified site from storage.
     *
     * @param Site $site
     * @return RedirectResponse
     */
    public function destroy(Site $site)
    {
        // Currently no destroy
        return redirect()->route('admin.sites.show', ['site' => $site]);
    }


    /**
     * Get only the allowed/fillable values for creating/updating a site
     *
     * @param Request $request
     * @param bool $with_user - required for create
     * @return array
     */
    public function getRequestValues(Request $request, bool $with_user = false)
    {
        $values = $request->only([
            'current_release_directory',
            'git_url',
            'name',
            'persistent_directory',
            'persistent_files',
            'post_activation_script',
            'pre_activation_script',
            'releases_directory',
            'ssh_key_path',
            'site_directory',
        ]);

        if ($with_user) {
            $values['user_id'] = Auth::user()->id;
        }

        return $values;
    }
}
