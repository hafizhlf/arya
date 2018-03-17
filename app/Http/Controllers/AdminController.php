<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Degree;
use App\Book;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    public function degree()
    {
        $degrees = DB::table('degrees')->orderBy('name', 'asc')->simplePaginate(5);
        return view('admin.degree.index')->with('degrees', $degrees);
    }

    public function createdegree()
    {
        return view('admin.degree.create');
    }

    public function storedegree(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:degrees|min:2|max:255',
        ]);

        $degree = New Degree;
        $degree->name = $request->input('name');
        $degree->save();
        return redirect()->route('degree');
    }

    public function editdegree($id)
    {
        $degree = Degree::find($id);
        return view('admin.degree.edit')->with('degree', $degree);
    }

    public function updatedegree(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:degrees|min:2|max:255',
        ]);

        $degree = Degree::find($id);
        $degree->name = $request->input('name');
        $degree->save();
        return redirect()->route('degree');
    }

    public function destroydegree($id)
    {
        $degree = Degree::find($id);
        $degree->delete();
        return redirect()->route('degree');
    }

    public function book()
    {
        $books = DB::table('books')->orderBy('name', 'asc')->simplePaginate(5);
        return view('admin.book.index')->with('books', $books);
    }
}
