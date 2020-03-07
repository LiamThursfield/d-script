<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSite;
use App\Models\Site;
use Illuminate\Auth\Access\AuthorizationException;
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
     * @return View
     */
    public function store(StoreSite $request)
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
        $values['user_id'] = Auth::user()->id;

        $site = Site::create($values);

        return view('admin.sites.show', ['site' => $site]);
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
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        //
    }

    /**
     * Update the specified site in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Site $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site)
    {
        //
    }

    /**
     * Remove the specified site from storage.
     *
     * @param Site $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site)
    {
        //
    }
}
