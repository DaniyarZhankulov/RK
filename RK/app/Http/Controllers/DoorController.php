<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Door;

class DoorController extends Controller
{
	public function index() {
		$doors = \App\Door::all();
	    return view('door', compact('doors'));
	}
	public function show($id) {
		$doors = \App\Door::find($id);
	    return view('door', compact('doors'));
	}
	public function create() {
		$doors = new \App\Door;
	    $input = Input::get();
		$doors->name = $input['name'];
		$doors->price = $input['price'];
		$doors->material = $input['material'];
		$doors->height = $input['height'];
		$doors->width = $input['width'];
		$doors->description = $input['description'];
		$doors->image_link1 = $input['image_link1'];
		$doors->image_link2 = $input['image_link2'];
		$doors->image_link3 = $input['image_link3'];
		$doors->image_link4 = $input['image_link4'];
		$doors->image_link5 = $input['image_link5'];
		$doors->save();
	    return view('/');
	}
	public function update($record) {
		$doors = \App\Door::find($record->id);
	    $input = Input::get();
		$doors->name = $input['name'];
		$doors->price = $input['price'];
		$doors->material = $input['material'];
		$doors->height = $input['height'];
		$doors->width = $input['width'];
		$doors->description = $input['description'];
		$doors->image_link1 = $input['image_link1'];
		$doors->image_link2 = $input['image_link2'];
		$doors->image_link3 = $input['image_link3'];
		$doors->image_link4 = $input['image_link4'];
		$doors->image_link5 = $input['image_link5'];
		$doors->save();
	    return view('/');
	}
	public function delete($id) {
		$doors = \App\Door::find($id);
		$doors->delete();
	    return view('/');
	}
}
