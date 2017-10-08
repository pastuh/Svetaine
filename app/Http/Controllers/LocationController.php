<?php

namespace App\Http\Controllers;

use App\Map;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    public function getIndex () {
        
        // Skaiciuoju kiek PUBLISHED Trofeju
        $count = Map::where('published', '1')->count();

        // Kiek puslapyje atvaizduos Trofeju
        if ($count < 1){
            // Tikrinu ar useris prisijunges
            if(Auth::check() and Auth::user()->hasPermission('create-maps')){
                return redirect()->route('maps.create');
            }
            // Jeigu neturi jokiu irasu ir leidimo kurti Trofejus, tai eiti i profili
            return redirect()->route('profile');
        } elseif($count <= 3) {
            $maps_number = $count;
        }else {
            $maps_number = 3;
        }

        // Isvedu pirmus trofejus pagal data
        $maps = Map::orderBy('id', 'desc')->where('published', '1')->take($maps_number)->get();

        // Skipinu pirmus trofejus pagal data ir imu likusius
        $skip = $maps_number;
        $limit = $count - $skip; // the limit
        $old_maps = Map::orderBy('id', 'desc')->skip($skip)->take($limit)->where('published', '1')->get();

        $tags = Tag::all();
        return view('locations.index', compact('maps', 'old_maps', 'count', 'tags'));
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
