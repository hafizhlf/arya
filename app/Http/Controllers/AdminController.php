<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Degree;
use App\Book;
use App\Lesson;
use App\Question;
use App\Section;
use Auth;

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

    public function lesson()
    {
        $lessons = DB::table('lessons')->orderBy('name', 'asc')->simplePaginate(5);
        return view('admin.lesson.index')->with('lessons', $lessons);
    }

    public function createlesson()
    {
        return view('admin.lesson.create');
    }

    public function storelesson(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:lessons|min:2|max:255',
        ]);

        $lesson = New Lesson;
        $lesson->name = $request->input('name');
        $lesson->save();
        return redirect()->route('lesson');
    }

    public function editlesson($id)
    {
        $lesson = Lesson::find($id);
        return view('admin.lesson.edit')->with('lesson', $lesson);
    }

    public function updatelesson(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:lessons|min:2|max:255',
        ]);

        $lesson = Lesson::find($id);
        $lesson->name = $request->input('name');
        $lesson->save();
        return redirect()->route('lesson');
    }

    public function destroylesson($id)
    {
        $lesson = Lesson::find($id);
        $lesson->delete();
        return redirect()->route('lesson');
    }

    public function book()
    {
        $books = Book::with('Degree', 'Lesson')->orderBy('name', 'asc')->simplePaginate(5);
        return view('admin.book.index')->with('books', $books);
    }

    public function createbook()
    {
        $lessons = Lesson::get();
        $degrees = Degree::get();
        $data = [
            'lessons' => $lessons,
            'degrees' => $degrees,
        ];
        return view('admin.book.create', $data);
    }

    public function storebook(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:5|max:255',
            'class' => 'required|numeric|max:12',
            'semester' => 'required|numeric|max:2',
            'publisher' => 'required|min:3|max:255',
        ]);

        $book = New Book;
        $book->name = $request->input('name');
        $book->class = $request->input('class');
        $book->semester = $request->input('semester');
        $book->publisher = $request->input('publisher');
        $book->lesson_id = $request->input('lesson');
        $book->degree_id = $request->input('degree');
        $book->user_id = Auth::user()->id;
        $book->save();

        return redirect()->route('book');
    }

    public function editbook($id)
    {
        $book = Book::find($id);
        $lessons = Lesson::get();
        $degrees = Degree::get();
        $data = [
            'book' => $book,
            'lessons' => $lessons,
            'degrees' => $degrees,
        ];
        return view('admin.book.edit', $data);
    }

    public function updatebook(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:5|max:255',
            'class' => 'required|numeric|max:12',
            'semester' => 'required|numeric|max:2',
            'publisher' => 'required|min:3|max:255',
        ]);

        $book = Book::find($id);
        $book->name = $request->input('name');
        $book->class = $request->input('class');
        $book->semester = $request->input('semester');
        $book->publisher = $request->input('publisher');
        $book->lesson_id = $request->input('lesson');
        $book->degree_id = $request->input('degree');
        $book->user_id = Auth::user()->id;
        $book->save();

        return redirect()->route('book');
    }

    public function destroybook($id)
    {
        $book = Book::find($id);
        $book->delete();

        return redirect()->route('book');
    }

    public function section($id)
    {
        $sections = Book::find($id)->section()->paginate(5);
        $book = Book::find($id);
        $data = [
            'sections' => $sections,
            'book' => $book,
        ];

        return view('admin.section.index', $data);
    }

    public function question($id)
    {
        $questions = Question::get();
        $book = Section::find($id);
        $data = [
            'book' => $book,
            'questions' => $questions,
        ];

        return view('admin.question.index', $data);
    }

    public function amountquestion($id)
    {
        $section = Section::find($id);

        return view('admin.question.amount')->with('section', $section);
    }

    public function createquestion(Request $request, $id)
    {
        $section = Section::find($id);
        echo $request->input('count');
        if(!empty($request->input('essay'))){
            echo "abc";
        }

       //return view('admin.question.create')->with('section', $section);
    }
}
