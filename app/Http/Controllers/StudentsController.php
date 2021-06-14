<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Student::all();
        return response()->json(Student::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
           'student_id' => 'required',
           'firstname' => 'required',
           'lastname' => 'required',
           'barangay' => 'required',
           'municipality' => 'required',
           'province' => 'required',
           'age' => 'required|numeric'
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors(),400);
        }

        Student::create([
            'student_id' => $request->student_id,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'address' => $request->barangay . ', ' . $request->municipality . ', ' . $request->province,
            'age' => $request->age
        ]);

        return response()->json(["status" => "Student successfully added to the database"], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Student::findOrFail($id);
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
}
