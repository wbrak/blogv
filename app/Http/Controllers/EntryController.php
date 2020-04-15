<?php

namespace App\Http\Controllers;

use App\Entry;
use Illuminate\Http\Request;

class EntryController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function create()
    {
    	return view('entries.create');
    }

    public function store(Request $request)
    {
    	//dd($request->all());
    	
    	$validatedData = $request->validate([
    		'title' => 'required|min:7|max:255|unique:entries',
    		'content' => 'required|min:25|max:3000'
    	]);

    	$entry = new Entry();
    	$entry->title = $validatedData['title'];
    	$entry->content = $validatedData['content'];
    	$entry->user_id = auth()->id();
    	$entry->save ();

    	$status = 'Tu entrada se ha publicado con éxito.';
    	return back()->with(compact('status'));
    }

    public function edit(Entry $entry)
    {
        return view('entries.edit', compact('entry'));
    }

    public function update(Request $request, Entry $entry)
    {   
        $validatedData = $request->validate([
            'title' => 'required|min:7|max:255|unique:entries,id,'.$entry->id,
            'content' => 'required|min:25|max:3000'
        ]);

        // auth()->id() === $entry->user_id
        $entry->title = $validatedData['title'];
        $entry->content = $validatedData['content'];
        $entry->user_id = auth()->id();
        $entry->save ();

        $status = 'Tu entrada se ha editado con éxito.';
        return back()->with(compact('status'));
    }
}
