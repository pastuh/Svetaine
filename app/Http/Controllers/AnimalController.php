<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Map;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use LukeTowers\Purifier\Facades\Purifier;


class AnimalController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-animals', ['only' => ['create', 'store']]);
        $this->middleware('permission:read-animals', ['only' => ['index', 'show']]);
        $this->middleware('permission:update-animals', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-animals', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Isvedu pirmus trofejus pagal data
        $animals = Animal::orderBy('id', 'desc')->paginate(8);

        // Kiek puslapyje atvaizduos Trofeju
        if (!$animals){
            // Tikrinu ar useris prisijunges
            if(Auth::check() and Auth::user()->hasPermission('create-animals')){
                return view('animals.create');
            }
            // Jeigu neturi leidimo kurti Trofejus, tai eiti i profili
            return redirect()->route('profile');
        }

        $tags = Tag::all();
        $maps = Map::all();

        return view('animals.index', compact('animals', 'tags', 'maps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('animals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the data
        $this->validate($request, array(
            'title' => 'required|min:2|max:90',
            'lt_title' => 'required|min:2|max:90',
            'body' => 'required|min:10',
            'body_2' => 'required|min:10',
            'bg_position' => 'required|numeric|digits_between:0,100',
            'main_image' => 'required|image',
            'info_image' => 'required|image',
            'status_check' => 'sometimes'
        ));

        // Store in database
        $animal = new Animal;

        $animal->title = $request->title;
        $animal->lt_title = $request->lt_title;
        $animal->slug = str_slug($request->title, "-");
        $animal->body = Purifier::clean($request->body);
        $animal->body_2 = Purifier::clean($request->body_2);
        $animal->bg_position = $request->bg_position;

        //save main_image
        if ($request->hasFile('main_image')) {
            $image = $request->file('main_image');
            $filename = uniqid() . time() . '.' . $image->getClientOriginalExtension();

            // Trofejaus #1 IMG
            $location = public_path('img/animals/') . $filename;
            Image::make($image)->save($location);
            $animal->main_image = $filename;
        }

        //save info_image
        if ($request->hasFile('info_image')) {
            $image2 = $request->file('info_image');
            $filename2 = uniqid() . time() . '.' . $image2->getClientOriginalExtension();

            // Trofejaus #2 IMG
            $location2 = public_path('img/animals/') . $filename2;
            Image::make($image2)->save($location2);
            $animal->info_image = $filename2;
        }

        //save publish status (Jeigu pazymeta, tai grazinti kad true)
        if ($request->status_check == 'true') {
            $animal->status = 1;
        }

        $animal->save();

        // Informuoju apie issaugota trofeju
        Session::flash('success', 'Trofėjus sėkmingai išsaugotas!');

        // Redirect i sukurta puslapi
        return redirect()->route('animals.show', $animal->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $animal = Animal::find($id);

        // Tikrinu ar egzistuoja Trofejus su nurodytu ID
        if ($animal) {
                // Previous animal id
                $previous = Animal::where('id', '<', $animal->id)->max('id');
                $previous_animal = Animal::find($previous);

                // Next animal id
                $next = Animal::where('id', '>', $animal->id)->min('id');
                $next_animal = Animal::find($next);

                return view('animals.show', compact('animal', 'previous_animal', 'next_animal'));
        }

        return redirect()->route('error.403');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animal = Animal::find($id);

        if ($animal == NULL) {
            return redirect()->route('error.403');
        }

        return view('animals.edit', compact('animal'));
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
        $animal = Animal::find($id);

            // Validate the data
            $this->validate($request, array(
                'title' => 'required|min:2|max:90',
                'lt_title' => 'required|min:2|max:90',
                'body' => 'required|min:10',
                'body_2' => 'required|min:10',
                'bg_position' => 'sometimes|numeric|digits_between:0,100',
                'main_image' => 'sometimes|image',
                'info_image' => 'sometimes|image',
                'status_check' => 'sometimes',
                'published_check' => 'sometimes'
            ));

            $animal->title = $request->title;
            $animal->lt_title = $request->lt_title;
            $animal->slug = str_slug($request->title, "-");
            $animal->body = Purifier::clean($request->body);
            $animal->body_2 = Purifier::clean($request->body_2);
            $animal->bg_position = $request->bg_position;

            //save main_image
            if ($request->hasFile('main_image')) {
                $image = $request->file('main_image');
                $filename = uniqid() . time() . '.' . $image->getClientOriginalExtension();

                // Trofejaus #1 IMG
                $location = public_path('img/animals/') . $filename;
                Image::make($image)->save($location);

                $old_main_image = $animal->main_image;

                $animal->main_image = $filename;

                // Trinu sena foto jeigu ikelta nauja
                Storage::disk('images')->delete(['animals/' . $old_main_image]);
            }

        //save info_image
        if ($request->hasFile('info_image')) {
            $image2 = $request->file('info_image');
            $filename2 = uniqid() . time() . '.' . $image2->getClientOriginalExtension();

            // Trofejaus #1 IMG
            $location2 = public_path('img/animals/') . $filename2;
            Image::make($image2)->save($location2);

            $old_info_image = $animal->info_image;

            $animal->info_image = $filename2;

            // Trinu sena foto jeigu ikelta nauja
            Storage::disk('images')->delete(['animals/' . $old_info_image]);
        }

            if ($request->status_check == 'true') {
                $animal->status = 1;
            } else {
                $animal->status = 0;
            }

            if ($request->published_check == 'true') {
                $animal->published = 1;
            } else {
                $animal->published = 0;
            }

            $animal->save();

            // Informuoju apie issaugota trofeju
            Session::flash('success', 'Trofėjus sėkmingai išsaugotas!');

            // Redirect i sukurta puslapi
            return redirect()->route('animals.show', $animal->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animal = Animal::find($id);

        if ($animal->published == 0) {

            $filename_old = $animal->main_image;

            $filename_old2 = $animal->info_image;

            if($filename_old){
                Storage::disk('images')->delete(['animals/' . $filename_old]);
            }

            if($filename_old2) {
                Storage::disk('images')->delete(['animals/' . $filename_old2]);
            }

            $animal->delete();

            Session::flash('success', 'Gyvūno įrašas sėkmingai sunaikintas!');

            return redirect()->route('animals.index');
        }

        Session::flash('status', 'Neturite leidimo naikinti publikuotą gyvūno įrašą');
        return redirect()->route('animals.show', $animal->id);
    }
}
