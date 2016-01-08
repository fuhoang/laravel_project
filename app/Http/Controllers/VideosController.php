<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Video;
use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\VideoRequest;
use Auth;

class VideosController extends Controller
{

    /**
     * Create a new videos controller instance.
     */
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
     * Show the page to create a new video
     *
     * @return Response
     */
    public function create()
    {
        $tags = Tag::lists('name', 'id');
        //dd($tags);
    	return view('videos.create', compact('tags'));
    }


    /**
     * Save a new video
     *
     * @param VideoRequest $request
     * @return Response
     */
    public function store(VideoRequest $request)
    {

        $this->createVideo($request);
        flash()->overlay('Your video has been created', 'Success');
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
        $tags = Tag::lists('name', 'id');
    	return view('videos.edit', compact('video', 'tags'));
    }


    /**
     * update the edited video.
     *
     * @param VideoRequest $request
     * @param Video        $video
     * @return Response
     */
    public function update(Video $video, VideoRequest $request){
    	$video->update($request->all());
        print_r($request->input('tag_list'));
        dd($request->input('tag_list'));
        $this->syncTags($video, $request->input('tag_list'));
    	return redirect('videos');
    }


    /**
     * Sync up the list of tags in the database.
     *
     * @param VideoRequest $request
     * @param Video        $video
     */
    private function syncTags(Video $video, array $tags)
    {
        $video->tags()->sync($tags);
    }

    /**
     * check if tags exist, if not create them
     *
     *
     */
    private function intergrityCheckTags($tags)
    {
        //dd($tags);
        $currentTags = array_filter($tags, 'is_numeric');
        $newTags = array_filter($tags, 'is_string');

        foreach ($newTags as $newTag)
        {
            if ($tag = Tag::create(['name' => $newTag]))
                $currentTags[] = $tag->id;
        }

        return $currentTags;
    }


    /**
     * save a new video.
     *
     * @param VideoRequest $request
     * @return mixed
     */
    private function createVideo(VideoRequest $request)
    {
        $video = Auth::user()->videos()->create($request->all());

        $tagSync = $this->intergrityCheckTags($request->input('tag_list'));

        $this->syncTags($video, $tagSync);

        return $video;
    }
}
