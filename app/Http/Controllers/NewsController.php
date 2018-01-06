<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;
use Steam;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Zaidimo ID Steame */
        $appID = 518790;
        $news = Steam::news()->GetNewsForApp($appID, 39)->newsitems;

        // Pasalinu naujienas kurios nera konkrecios
        foreach($news as $key=>$new){
            if($new->feed_type == 0){
                unset($news[$key]);
            }
        }

        $news_total = count($news);
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $col = new Collection($news);
        $perPage = 4;
        $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();

        $entries = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage, '', ['path'=>url('news/')]);

        return view('news.index', compact('entries', 'news_total'));

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
