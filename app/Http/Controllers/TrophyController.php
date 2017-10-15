<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrophyController extends Controller
{
    public function getIndex () {

        // Isvedu pirmus trofejus pagal data
        $animals = Animal::orderBy('id', 'desc')->where('published', '1')->paginate(8);

        // Kiek puslapyje atvaizduos Trofeju
        if (!$animals){
            // Tikrinu ar useris prisijunges
            if(Auth::check() and Auth::user()->hasPermission('create-animals')){
                return view('animals.create');
            }
            // Jeigu neturi jokiu irasu ir leidimo kurti Trofejus, tai eiti i profili
            return redirect()->route('profile');
        }

        $tags = Tag::all();
        return view('trophies.index', compact('animals', 'tags'));
    }

    /* Trofejaus puslapis pagal slug */
    public function getSingle ($slug) {
        // Ieskomas trofejus pagal SLUG
        $animal = Animal::where('slug', '=', $slug)->first();

        if($animal === null || $animal->published == 0) {
            return redirect()->to('animals');
        }

        // Previous
        $previous = Animal::where('id', '<', $animal->id)->where('published', '1')->max('id');
        $previous_animal = Animal::find($previous);

        // Next
        $next = Animal::where('id', '>', $animal->id)->where('published', '1')->min('id');
        $next_animal = Animal::find($next);

        return view('trophies.show', compact('animal', 'previous_animal', 'next_animal'));
    }
}
