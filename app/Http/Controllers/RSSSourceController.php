<?php

namespace App\Http\Controllers;

use App\RSSSource;
use App\RSSSources;
use Illuminate\Http\Request;

class RSSSourceController extends Controller
{
    public function index()
    {
        $rssSources = new RSSSources;
        $allSources = $rssSources->getAllSources();
        return json_encode($allSources);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try 
        {
            RSSSource::create($request->all());
            return response('New source saved successfully', 201);
        } 
        catch (\Throwable $th) 
        {
            throw $th;
        }
    }

    public function show(RSSSource $rSSSource)
    {
        //
    }

    public function edit(RSSSource $rSSSource)
    {
        //
    }

    public function update(Request $request, RSSSource $rSSSource)
    {
        //
    }

    public function destroy(RSSSource $rSSSource, $rssSourceId)
    {
        try 
        {
            $rSSSource = RSSSource::find($rssSourceId);
            $rSSSource->delete();
            return response('Your RSS source has been deleted succesfully', 200);
        } 
        catch (\Throwable $th) 
        {
            throw $th;
        }
        
    }
}
