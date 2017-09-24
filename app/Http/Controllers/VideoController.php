<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\TwitchVideo;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $TwitchVideos = new TwitchVideo();
        $TwitchVideos = $TwitchVideos->getTwitchVideos();
        $EmptyVideo = true;

        if(!empty($TwitchVideos)) {
            $VisibleVideos = array_slice($TwitchVideos['streams'],0, 4);
            $HiddenVideos = array_slice($TwitchVideos['streams'],4);
            $EmptyVideo = false;
        }
//        dd($HiddenVideos);
        /* Perskiriu per puse */
        //$halved = array_chunk($TwitchVideos['streams'], ceil(count($TwitchVideos['streams'])/2));
        //$VisibleVideos = $halved[0];
        //$HiddenVideos = $halved[1];

        return view('video.index', compact('VisibleVideos', 'HiddenVideos', 'EmptyVideo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
