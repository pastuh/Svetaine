<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrophyController extends Controller
{
    public function getIndex () {

        // Skaiciuoju kiek PUBLISHED Trofeju
        $count = Animal::where('published', '1')->count();

        // Kiek puslapyje atvaizduos Trofeju
        if ($count < 1){
            // Tikrinu ar useris prisijunges
            if(Auth::check() and Auth::user()->hasRole('editor|administrator|superadministrator')){
                return redirect()->route('animals.create');
            }
            // Jeigu neturi jokiu irasu ir leidimo kurti Trofejus, tai eiti i profili
            return redirect()->route('profile');
        } elseif($count <= 1) {
            $animals_number = $count;
        }else {
            $animals_number = 1;
        }

        // Isvedu pirmus trofejus pagal data
        $animals = Animal::orderBy('id', 'desc')->where('published', '1')->take($animals_number)->get();

        // Skipinu pirmus trofejus pagal data ir imu likusius
        $skip = $animals_number;
        $limit = $count - $skip; // the limit
        $old_animals = Animal::orderBy('id', 'desc')->skip($skip)->take($limit)->where('published', '1')->get();

        $tags = Tag::all();
        return view('trophies.index', compact('animals', 'old_animals', 'count', 'tags'));
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
