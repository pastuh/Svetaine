<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{

  // Atvaizduoja Welcome puslapi
  public function getIndex() {
    return view('pages.welcome');
  }

}
