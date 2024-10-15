<?php

namespace App\Http\Controllers;

use App\Models\SmRelease;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SmReleaseController extends Controller
{
    public function index(): View
    {
        $releases = SmRelease::all();
        $last = SmRelease::orderBy('id', 'DESC')->first();

        return view('smreleases.index', compact('releases', 'last'));
    }

    public function save(Request $request)
    {
        try {
            $release = new SmRelease();

            $release->version = $request->input('version');
            $release->build = $request->input('build');
            $release->tag = $request->input('tag');
            $release->branch = $request->input('branch');
            $release->tag_date = $request->input('tag_date');
            $release->status = $request->input('status');
            $release->save();
            return redirect('/smreleases')->with('message', 'Success');
        } catch (\Exception $e) {
            // do task when error
            $err = $e->getMessage();   // insert query
            return redirect('/smreleases')->with('message', 'Failed : ' . $err);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $release = SmRelease::find($id);
            $input = $request->all();
            $release->fill($input)->save();
            return redirect('/smreleases')->with('message', 'Success');
        } catch (\Exception $e) {
            // do task when error
            $err = $e->getMessage();   // insert query
            return redirect('/smreleases')->with('message', 'Failed : ' . $err);
        }
    }

    public function delete($id)
    {
        try {
            $release = SmRelease::find($id);
            $release->delete();
            return redirect('/smreleases')->with('message', 'Success');
        } catch (\Exception $e) {
            // do task when error
            $err = $e->getMessage();   // insert query
            return redirect('/smreleases')->with('message', 'Failed : ' . $err);
        }
    }
}
