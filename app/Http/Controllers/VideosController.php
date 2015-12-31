<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Video;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Carbon\Carbon;

class VideosController extends Controller
{
    //
    public function index()
    {
    	$videos = Video::latest()->get();
    	return view('videos.index', compact('videos'));
    }

    public function show($id)
    {
    	$video = Video::findOrFail($id);
    	return view('videos.show', compact('video'));
    }

    public function create()
    {
    	return view('videos.create');
    }

    public function store()
    {
    	$input = Request::all();
    	$input['published_at'] = Carbon::now();
    	Video::create($input);
    	return redirect('videos');
    }
}
