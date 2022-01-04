<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Auth;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $sites = [];

      if(Auth::user()) {
        $user = Auth::user();
        $sites = Site::where('user_id', $user->id)->get();
      }

      return view('admin.sites.index')->with('sites', $sites);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.sites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd("test");
        $validated = $request->validate([
          'title' => 'required|min:2|max:255',
          'slug' => 'required|alpha_dash|min:2|max:255|unique:\App\Models\Site,slug',
        ]);
        
        Site::create([
          'title' => $request->input('title'),
          'slug' => $request->input('slug'),
          'description' => $request->input('description'),
          'user_id' => Auth::user()->id,
        ]);

        return redirect("/admin/site");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site)
    {
        //
    }

    public function mySites() {
      $sites = [];

      if(Auth::user()) {
        $user = Auth::user();
        $sites = Site::where('user_id', $user->id)->get();
      }

      return view('admin.mysites')->with('sites', $sites);
    }

    public function publicHome($site) {
      $site = Site::where('slug', $site)->first();

      if(!empty($site)) {
        return view('sites.index')->with('site', $site);
      }

      abort(404);
    }
}
