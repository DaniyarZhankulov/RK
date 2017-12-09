<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
	public function index() {
		$doors = \App\Door::all();
	    return view('catalog', compact('doors'));
	}
}
