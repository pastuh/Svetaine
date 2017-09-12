<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadministrator', ['only' => ['store', 'edit', 'update', 'destroy']]);
    }

    public function getSingle($slug)
    {
        $tag = Tag::where('slug', '=', $slug)->first();
        if ($tag === null) {
            return redirect()->route('error.403');
        }
        $postai = $tag->posts()->where('published', '1')->orderByDesc('id')->get();

        return view('manage.tags.show', compact('tag', 'postai'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('manage.tags.index', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'tag' => 'required|min:3|max:90|unique:tags,name',
            'slug' => 'required|alpha_dash|min:3|max:90|unique:tags,slug'
        ));

        $tag = new Tag;
        $tag->name = $request->tag;
        $tag->slug = $request->slug;
        $tag->save();

        Session::flash('success', 'Žyma sėkmingai sukurta');
        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);

        // Rusiuoju tago postus pagal data
        $postai = $tag->posts()->where('published', '1')->orderByDesc('id')->get();

        return view('manage.tags.show', compact('tag', 'postai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $tag = Tag::where('slug', '=', $id)->first();

        return view('manage.tags.edit', compact('tag'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, array(
            'tag' => 'required|min:3|max:90|unique:tags,name,' . $id,
            'slug' => 'required|alpha_dash|min:3|max:90|unique:tags,slug,' . $id,
        ));

        $tag = Tag::find($id);
        $tag->name = $request->input('tag');
        $tag->slug = $request->slug;
        $tag->save();

        Session::flash('success', 'Žyma sėkmingai išsaugota!');
        return redirect()->route('tags.slug', $tag->slug);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $tag = Tag::find($id);
        // Jeigu Tagas naudojamas Postuose , tai neleisti istrinti (Gali buti, kad nepublikuoti naudoja)
        if ($tag->posts()->count() > 0) {
            Session::flash('status', 'Ištrinti negalima, nes žyma naudojama');
            return redirect()->route('tags.slug', $tag->slug);
        }

        $tag->posts()->detach();
        $tag->delete();

        Session::flash('success', 'Žyma sėkmingai sunaikinta!');
        return redirect()->route('tags.index');

    }
}
