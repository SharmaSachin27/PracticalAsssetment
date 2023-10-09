<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students = Student::where('status',1)->get();
        return view('student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:1000'
        ]);
        $imagename = time() . "." . $request->file('image')->extension();
        $request->file('image')->move(public_path('students'), $imagename);
        $student = new Student;
        $student->image = $imagename;
        $student->name = $request->name;
        $student->save();
        return back()->withSuccess('student created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $students = Student::where([['id',$id],['status',1]])->first();
        return view('student.edit',compact('students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:1000'
        ]);

        $student = Student::where('id', $id)->first();
        if(isset($request->image)) {
            $imagename = time() . "." . $request->file('image')->extension();
            $request->file('image')->move(public_path('students'), $imagename);
            $student->image = $imagename;
        }
        $student->name = $request->name;
        $student->save();
        return back()->withSuccess('student Updated !....');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $student = Student::where('id', $id)->first();
        $student->delete();
        return back()->withSuccess('Student Deleted !....');

    }
    public function softDestroy(string $id)
    {
        //
        Student::where('id', $id)->update(['status' => 0]);

    }
}
