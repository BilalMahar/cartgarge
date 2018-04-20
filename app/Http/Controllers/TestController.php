<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function blur(){
        return view('test');
    }
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            ]);

            $image = $request->file('file');

            $name = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public', $name);
            return back();

        }



    }
}
