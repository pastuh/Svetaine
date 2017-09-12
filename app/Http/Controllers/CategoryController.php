<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{

    public function __construct(){
        $this->middleware('role:superadministrator', ['only' => ['store', 'edit', 'update']]);
    }

    public function getSingle($slug) {

        // Atvaizduoja konkrecia kategorija su Postais
        $category = Category::where('slug', '=', $slug )->first();
        if($category === null) {
            return redirect()->route('error.403');
        }
        $postai = $category->posts()->where('published', '1')->orderByDesc('id')->get();

        return view('manage.categories.show', compact('category', 'postai'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Visos kategorijos
        $categories = Category::all();

        return view('manage.categories.index', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'category' => 'required|min:3|max:90|unique:categories,name',
            'slug'       => 'required|alpha_dash|min:3|max:90|unique:categories,slug'
        ));
        //Save a new category and redirect back to index
        $category = new Category();
        $category->name = $request->category;
        $category->slug = $request->slug;
        $category->save();

        Session::flash('success', 'Kategorija sėkmingai sukurta');

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Imu visa info pagal kategorija
        $category = Category::find($id);
        // Rusiuoju kategorijos postus pagal data
        $postai = $category->posts()->where('published', '1')->orderByDesc('id')->get();

        return view('manage.categories.show', compact('category', 'postai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::where('slug', '=', $id)->first();

        return view('manage.categories.edit', compact('category'));
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
        $this->validate($request, array(
            'category' => 'required|min:3|max:90|unique:categories,id,' . $id,
            'slug'     => 'required|alpha_dash|min:3|max:90|unique:categories,slug,' . $id
        ));

        $category = Category::find($id);
        $category->name = $request->category;
        $category->slug = $request->slug;
        $category->save();

        Session::flash('success', 'Kategorija sėkmingai išsaugota!');

        return redirect()->route('categories.slug', $category->slug);
    }
//    Panaikintas DESTROY
}
