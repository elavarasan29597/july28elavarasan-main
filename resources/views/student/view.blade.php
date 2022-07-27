@extends('student.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-11">
        <h2>Student View </h2>
    </div>
    <div class="col-lg-1">
        <a class="btn btn-primary" href="{{ url('students') }}"> Back</a>
    </div>
</div>
<table class="table table-bordered">
    <tr>
        <th>Name:</th>
        <td>{{ $student->name }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $student->email }}</td>
    </tr>
    <tr>
        <th>Address:</th>
        <td>{{ $student->address }}</td>
    </tr>

    <tr>
        <th>City:</th>
        <td>{{ $student->city }}</td>
    </tr>
    <tr>
        <th>State:</th>
        <td>{{ $student->state }}</td>
    </tr>

    <tr>
        <th>Country:</th>
        <td>{{ $student->country }}</td>
    </tr>




</table>


<br>
<br>
<br>

<h4>Subject Details</h4>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>English</th>
            <th>Maths</th>
            <th>History</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($student->subjects as $subject)
    <tr>
        <td>{{ $subject->name }}</td>
        <td>{{ $subject->marks_scored }}</td>
        <td>{{ $subject->grade }}</td>
    </tr>
    @endforeach
    </tbody>
</table>

@endsection
