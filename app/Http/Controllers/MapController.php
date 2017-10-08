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
use Mews\Purifier\Facades\Purifier;

class MapController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-maps', ['only' => ['create', 'store']]);
        $this->middleware('permission:read-maps', ['only' => ['index', 'show']]);
        $this->middleware('permission:update-maps', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-maps', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Skaiciuoju kiek Mapu
        $count = Map::all()->count();

        // Kiek puslapyje atvaizduos Mapu
        if ($count < 1){
            // Tikrinu ar useris prisijunges
            if(Auth::check() and Auth::user()->hasPermission('create-maps')){
                return redirect()->route('maps.create');
            }
            // Jeigu neturi leidimo kurti Mapus, tai eiti i profili
            return redirect()->route('profile');
        } elseif($count <= 3) {
            $maps_number = $count;
        }else {
            $maps_number = 3;
        }

        // Isvedu pirmus mapus pagal data
        $maps = Map::orderBy('id', 'desc')->take($maps_number)->get();

        // Skipinu pirmus mapus pagal data ir imu likusius
        $skip = $maps_number;
        $limit = $count - $skip; // the limit
        $old_maps = Map::orderBy('id', 'desc')->skip($skip)->take($limit)->get();

        $tags = Tag::all();
        return view('maps.index', compact('maps', 'old_maps', 'count', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $animals = Animal::all();
        return view('maps.create', compact('animals'));
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
            'sub_title' => 'required|min:2|max:90',
            'body' => 'required|min:10',
            'body_2' => 'required|min:10',
            'animals' => 'required|array',
            'main_image' => 'required|image',
            'info_image' => 'required|image',
            'status_check' => 'sometimes'
        ));

        // Store in database
        $map = new Map;

        $map->title = $request->title;
        $map->sub_title = $request->sub_title;
        $map->slug = str_slug($request->title, "-");
        $map->body = Purifier::clean($request->body);
        $map->body_2 = Purifier::clean($request->body_2);

        //save main_image
        if ($request->hasFile('main_image')) {
            $image = $request->file('main_image');
            $filename = uniqid() . time() . '.' . $image->getClientOriginalExtension();

            // Trofejaus #1 IMG
            $location = public_path('img/maps/') . $filename;
            Image::make($image)->save($location);
            $map->main_image = $filename;
        }

        //save info_image
        if ($request->hasFile('info_image')) {
            $image2 = $request->file('info_image');
            $filename2 = uniqid() . time() . '.' . $image2->getClientOriginalExtension();

            // Trofejaus #2 IMG
            $location2 = public_path('img/maps/') . $filename2;
            Image::make($image2)->save($location2);
            $map->info_image = $filename2;
        }

        //save publish status (Jeigu pazymeta, tai grazinti kad true)
        if ($request->status_check == 'true') {
            $map->status = 1;
        }

        $map->save();

        $map->animals()->sync($request->animals, false);

        // Informuoju apie issaugota vietovę
        Session::flash('success', 'Vietovė sėkmingai išsaugota!');

        // Redirect i sukurta puslapi
        return redirect()->route('maps.show', $map->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $map = Map::find($id);

        // Tikrinu ar egzistuoja Mapus su nurodytu ID
        if ($map) {
            // Previous map id
            $previous = Map::where('id', '<', $map->id)->max('id');
            $previous_map = Map::find($previous);

            // Next map id
            $next = Map::where('id', '>', $map->id)->min('id');
            $next_map = Map::find($next);

            return view('maps.show', compact('map', 'previous_map', 'next_map'));
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
        $map = Map::find($id);

        if ($map == NULL) {
            return redirect()->route('error.403');
        }

        $animals = Animal::all();

        return view('maps.edit', compact('map', 'animals'));
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
        $map = Map::find($id);

        // Validate the data
        $this->validate($request, array(
            'title' => 'required|min:2|max:90',
            'sub_title' => 'required|min:2|max:90',
            'body' => 'required|min:10',
            'body_2' => 'required|min:10',
            'animals' => 'required|array',
            'main_image' => 'sometimes|image',
            'info_image' => 'sometimes|image',
            'status_check' => 'sometimes',
            'published_check' => 'sometimes'
        ));

        $map->title = $request->title;
        $map->sub_title = $request->sub_title;
        $map->slug = str_slug($request->title, "-");
        $map->body = Purifier::clean($request->body);
        $map->body_2 = Purifier::clean($request->body_2);

        //save main_image
        if ($request->hasFile('main_image')) {
            $image = $request->file('main_image');
            $filename = uniqid() . time() . '.' . $image->getClientOriginalExtension();

            // Trofejaus #1 IMG
            $location = public_path('img/maps/') . $filename;
            Image::make($image)->save($location);

            $old_main_image = $map->main_image;

            $map->main_image = $filename;

            // Trinu sena foto jeigu ikelta nauja
            Storage::disk('images')->delete(['maps/' . $old_main_image]);
        }

        //save info_image
        if ($request->hasFile('info_image')) {
            $image2 = $request->file('info_image');
            $filename2 = uniqid() . time() . '.' . $image2->getClientOriginalExtension();

            // Trofejaus #1 IMG
            $location2 = public_path('img/maps/') . $filename2;
            Image::make($image2)->save($location2);

            $old_info_image = $map->info_image;

            $map->info_image = $filename2;

            // Trinu sena foto jeigu ikelta nauja
            Storage::disk('images')->delete(['maps/' . $old_info_image]);
        }

        if ($request->status_check == 'true') {
            $map->status = 1;
        } else {
            $map->status = 0;
        }

        if ($request->published_check == 'true') {
            $map->published = 1;
        } else {
            $map->published = 0;
        }

        $map->save();

        $map->animals()->sync($request->animals);

        // Informuoju apie issaugota vietovę
        Session::flash('success', 'Vietovė sėkmingai išsaugota!');

        // Redirect i sukurta puslapi
        return redirect()->route('maps.show', $map->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $map = Map::find($id);

        if ($map->published == 0) {

            $map->animals()->detach();
            $filename_old = $map->main_image;
            $filename_old2 = $map->info_image;

            if($filename_old){
                Storage::disk('images')->delete(['maps/' . $filename_old]);
            }

            if($filename_old2) {
                Storage::disk('images')->delete(['maps/' . $filename_old2]);
            }

            $map->delete();

            Session::flash('success', 'Vietovės įrašas sėkmingai sunaikintas!');

            return redirect()->route('maps.index');
        }

        Session::flash('status', 'Neturite leidimo naikinti publikuotą vietovės įrašą');
        return redirect()->route('maps.show', $map->id);
    }
}
