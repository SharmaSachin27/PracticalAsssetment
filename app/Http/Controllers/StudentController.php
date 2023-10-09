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
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'mimes:png,jpg,jpeg',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            return back()->withFlashDanger($error);
        }

        if ($request->hasFile('image')) {
            $imageName = Str::uuid()->toString() . '.' . $request->file('image')->extension();
            $imagePath = $request->file('image')->storeAs('images', $imageName, 'public');
        }

        $student = [
            'name' => $request->name,
            'image' => !empty($request->image) ? $imagePath : null
        ];

        Student::create($student);
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
        $student = Student::where([['id',$id],['status',1]])->first();
        return view('student.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'mimes:png,jpg,jpeg',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            return back()->withFlashDanger($error);
        }

        if ($request->hasFile('image')) {
            $imageName = Str::uuid()->toString() . '.' . $request->file('image')->extension();
            $imagePath = $request->file('image')->storeAs('images', $imageName, 'public');
        }

        $student = [
                        'name' => $request->name,
                        'image' => !empty($request->image) ? $imagePath : null
                    ];

        Student::where('id',$id)->update($student);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Student::where('id', $id)->delete();

    }
    public function softDestroy(string $id)
    {
        //
        Student::where('id', $id)->update(['status' => 0]);

    }
}
