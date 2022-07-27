<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Http\Requests\StoreStudentsRequest;
use App\Http\Requests\UpdateStudentsRequest;
use App\Models\Subjects;
use Illuminate\Http\Request;
// use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Log;
use phpDocumentor\Reflection\Types\Boolean;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //
        $students = Students::all();
        return view('student.list', compact('students', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentsRequest $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',

            'maths' => 'required',
            'maths_marks_scored' => 'required',
            'maths_grade' => 'required',

            'english' => 'required',
            'english_marks_scored' => 'required',
            'english_grade' => 'required',

            'history' => 'required',
            'history_marks_scored' => 'required',
            'history_grade' => 'required',
        ]);

        $student = new Students([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'city' => $request->get('city'),
            'state' => $request->get('state'),
            'country' => $request->get('country'),
            'status' => 'enable',
        ]);

        $student->save();


        $insertSubject = [
            [
                'name' => $request->get('english'),
                'marks_scored' => $request->get('english_marks_scored'),
                'grade' => $request->get('english_grade'),
                'student_id' => $student->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => $request->get('maths'),
                'marks_scored' => $request->get('maths_marks_scored'),
                'grade' => $request->get('maths_grade'),
                'student_id' => $student->id,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'name' => $request->get('history'),
                'marks_scored' => $request->get('history_marks_scored'),
                'grade' => $request->get('history_grade'),
                'student_id' => $student->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        Subjects::insert($insertSubject);

        return redirect('/students')->with('success', 'Student has been added');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function show(Students $student)
    {

        $student =  Students::with('subjects')->find($student->id);

        return view('student.view', compact('student'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit(Students $student)
    {
        return view('student.edit', compact('student'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentsRequest  $request
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentsRequest $request, Students $student)
    {

        //

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
        ]);

        $student = Students::find($student->id);
        $student->name = $request->get('name');
        $student->email = $request->get('email');
        $student->phone = $request->get('phone');
        $student->address = $request->get('address');
        $student->city = $request->get('city');
        $student->state = $request->get('state');
        $student->country = $request->get('country');

        $student->update();


        return redirect('/students')->with('success', 'Student updated successfully');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy(Students $student)
    {

        $student->delete();

        return redirect('/students')->with('success', 'Student deleted successfully');
    }



    public function StudtentStatusChange(Request $request)
    {

        $student =  Students::where('id', $request->student_id)
            ->update(['status' =>  $request->status]);

        return Response()->json($student);
    }
}
