<?php

namespace App\Http\Controllers;

use App\Model\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    protected $validateRules = [
        'title' => 'required|min:3|max:255',//funge
        'description' => 'required|min:10',//funge
        'thumb' => 'required|url',//funge
        'price' => 'required|numeric',//funge
        'series' => 'min:5|max:255',//funge
        'sale-date' => 'required|date|after:1800/01/01',//funge
        'type' => 'required|min:3|max:255'//funge
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comic = Comic::all();

        return view('home', compact('comic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $comic = new Comic();
        return view('comics.create', compact('comic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $sendData = $request->all();

        $validateData = $request->validate($this->validateRules);

        $newComic = new Comic();
        $newComic->title = $sendData['title'];
        $newComic->description = $sendData['description'];
        $newComic->thumb = $sendData['thumb'];
        $newComic->price = $sendData['price'];
        $newComic->series = $sendData['series'];
        $newComic->sale_date = $sendData['sale-date'];
        $newComic->type = $sendData['type'];
        $newComic->save();

        return redirect()->route('comics.show', $newComic->id)->with('created', $sendData['title']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $comic = Comic::findOrFail($id);
        return view('comics.comic', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $comic = Comic::findOrFail($id);
        return view('comics.edit', compact('comic'));
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
        //
        $validateData = $request->validate($this->validateRules);

        $sendData = $request->all();

        $comic = Comic::findOrFail($id);
        
        $comic->update($sendData);

        // $comics->fill($sendData);
        // $comics->save();
        
        return redirect()->route('comics.show', $comic->id)->with('edited', $comic->title);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $comic = Comic::findOrFail($id);
        $comic->delete();

        return redirect()->route('homepage')->with('deleted', $comic->title);
    }
}
