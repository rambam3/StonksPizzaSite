<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('klant.contact');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'naam' => 'required|string|max:255',
            'email' => 'required|email',
            'bericht' => 'required|string',
        ]);

        return redirect()->route('home')->with('success', 'Bedankt voor je bericht!');
    }
    

    
}
