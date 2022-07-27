@extends('student.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-11">
        <h2>Update Student</h2>
    </div>
    <div class="col-lg-1">
        <a class="btn btn-primary" href="{{ url('students') }}"> Back</a>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="post" action="{{ route('students.update',$student->id) }}">
    @method('PATCH')
    @csrf

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter Name" value="{{ $student->name }}" name="name">
    </div>
    <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" class="form-control" id="email" placeholder="Enter Email" value="{{ $student->email }}" name="email">
    </div>
    <div class="form-group">
        <label for="phone">Phone Number:</label>
        <input type="tel" class="form-control" id="phone" placeholder="Enter Phone Number" value="{{ $student->phone }}" name="phone">
    </div>

    <div class="form-group">
        <label for="address">Address:</label>
        <textarea class="form-control" id="address" name="address" rows="10" placeholder="Enter Address"> {{ $student->address }}</textarea>
    </div>



    <div class="form-group">
        <label for="city">City:</label>
        <input type="text" class="form-control" id="city" value="{{ $student->city }}" placeholder="Enter City" name="city">
    </div>
    <div class="form-group">
        <label for="state">Last Name:</label>
        <input type="text" class="form-control" id="state" value="{{ $student->state }}" placeholder="Enter State" name="state">
    </div>

    <div class="form-group">
        <label for="state">Country:</label>
        <input type="text" class="form-control" id="country" value="{{ $student->country }}" placeholder="Enter Country" name="country">
    </div>


    <br>
    <br>

    <p>Subject Details</p>

    @foreach ($student->subjects as $subject)
    <div class="row">
        <div class="col-sm">

            <div class="form-group">
                <label for="subjectName">Subject Name 2:</label>
                <input type="text" class="form-control" readonly id="subjectName" placeholder="Maths" value="{{$subject->name}}" name="maths">
            </div>
        </div>
        <div class="col-sm">
            <div class="form-group">
                <label for="marks_scored">Marks Scored:</label>
                <input type="text" class="form-control" readonly id="marks_scored" value="{{$subject->marks_scored}}" name="{{$subject->name}}_marks_scored">
            </div>
        </div>
        <div class="col-sm">
            <div class="form-group">
                <label for="grade">Grade:</label>
                <input type="text" class="form-control" readonly id="grade" value="{{$subject->grade}}" name="{{$subject->name}}_grade">
            </div>

        </div>
    </div>
    @endforeach





    <br>
    <br>
    <button type="submit" class="btn btn-default">Submit</button>
    <br><br>
</form>
@endsection
