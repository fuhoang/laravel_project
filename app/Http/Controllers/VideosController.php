<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Video;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\VideoRequest;
use Auth;

class VideosController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show all videos.
     *
     * @return Response
     */
    public function index()
    {
    	$videos = Video::latest('published_at')->published()->get();
    	return view('videos.index', compact('videos'));
    }


    /**
     * Show a single video
     *
     * @param Video $video
     * @return Response
     **/
    public function show(Video $video)
    {
    	return view('videos.show', compact('video'));
    }


    /**
     * Show form
     *
     */
    public function create()
    {
    	return view('videos.create');
    }


    /**
     * Save a new video
     *
     * @param CreateVideoRequest $request
     * @return Response
     */
    public function store(VideoRequest $request)
    {
    	// Validation
    	$video = new Video($request->all());
    	Auth::user()->videos()->save($video);
    	return redirect('videos');
    }


    /**
     * Find the video by the given id.
     *
     * @param Video $video
     * @return Response
     */
    public function edit(Video $video)
    {
    	return view('videos.edit', compact('video'));
    }

    /**
     * update the edited video.
     *
     * @param integer $id
     * @return Response
     */
    public function update(Video $video, VideoRequest $request){
    	$video->update($request->all());
    	return redirect('videos');
    }
}
