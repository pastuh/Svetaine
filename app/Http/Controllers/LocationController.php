<?php

namespace App\Http\Controllers;

use App\Map;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    public function getIndex () {

        // Isvedu pirmus trofejus pagal data
        $maps = Map::orderBy('id', 'desc')->where('published', '1')->paginate(8);

        // Kiek puslapyje atvaizduos Trofeju
        if (!$maps){
            // Tikrinu ar useris prisijunges
            if(Auth::check() and Auth::user()->hasPermission('create-maps')){
                return redirect()->route('maps.create');
            }
            // Jeigu neturi jokiu irasu ir leidimo kurti Trofejus, tai eiti i profili
            return redirect()->route('profile');
        }

        $tags = Tag::all();
        return view('locations.index', compact('maps', 'tags'));
    }

    /* Trofejaus puslapis pagal slug */
    public function getSingle ($slug) {
        // Ieskomas trofejus pagal SLUG
        $map = Map::where('slug', '=', $slug)->first();

        if($map === null || $map->published == 0) {
            return redirect()->to('maps');
        }

        // Previous
        $previous = Map::where('id', '<', $map->id)->where('published', '1')->max('id');
        $previous_map = Map::find($previous);

        // Next
        $next = Map::where('id', '>', $map->id)->where('published', '1')->min('id');
        $next_map = Map::find($next);

        return view('locations.show', compact('map', 'previous_map', 'next_map'));
    }
}
