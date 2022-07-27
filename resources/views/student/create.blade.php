@extends('student.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-11">
        <h2>Add New Student</h2>
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
<form action="{{ route('students.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
    </div>
    <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
    </div>
    <div class="form-group">
        <label for="phone">Phone Number:</label>
        <input type="tel" class="form-control" id="phone" placeholder="Enter Phone Number" name="phone">
    </div>

    <div class="form-group">
        <label for="address">Address:</label>
        <textarea class="form-control" id="address" name="address" rows="10" placeholder="Enter Address"></textarea>
    </div>


    <div class="form-group">
        <label for="city">City:</label>
        <input type="text" class="form-control" id="city" placeholder="Enter City" name="city">
    </div>
    <div class="form-group">
        <label for="state">Last Name:</label>
        <input type="text" class="form-control" id="state" placeholder="Enter State" name="state">
    </div>

    <div class="form-group">
        <label for="state">Country:</label>
        <input type="text" class="form-control" id="country" placeholder="Enter Country" name="country">
    </div>


    <br>
    <br>

    <p>Subject Details</p>


    <div class="row">
        <div class="col-sm">

            <div class="form-group">
                <label for="subjectName">Subject Name 1:</label>
                <input type="text" class="form-control" readonly id="subjectName" value="english" placeholder="Englis" name="english">
            </div>
        </div>
        <div class="col-sm">
            <div class="form-group">
                <label for="marks_scored">Marks Scored:</label>
                <input type="text" class="form-control" id="marks_scored" placeholder="Enter Marks Scored" name="english_marks_scored">
            </div>
        </div>
        <div class="col-sm">
            <div class="form-group">
                <label for="grade">Grade:</label>
                <input type="text" class="form-control" id="grade" placeholder="Enter Grade" name="english_grade">
            </div>

        </div>
    </div>


    <div class="row">
        <div class="col-sm">

            <div class="form-group">
                <label for="subjectName">Subject Name 2:</label>
                <input type="text" class="form-control" readonly id="subjectName" placeholder="Maths" value="maths" name="maths">
            </div>
        </div>
        <div class="col-sm">
            <div class="form-group">
                <label for="marks_scored">Marks Scored:</label>
                <input type="text" class="form-control" id="marks_scored" placeholder="Enter Marks Scored" name="maths_marks_scored">
            </div>
        </div>
        <div class="col-sm">
            <div class="form-group">
                <label for="grade">Grade:</label>
                <input type="text" class="form-control" id="grade" placeholder="Enter Grade" name="maths_grade">
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-sm">

            <div class="form-group">
                <label for="subjectName">Subject Name 3:</label>
                <input type="text" readonly class="form-control" id="subjectName" value="history" placeholder="History" name="history">
            </div>
        </div>
        <div class="col-sm">
            <div class="form-group">
                <label for="marks_scored">Marks Scored:</label>
                <input type="text" class="form-control" id="marks_scored" placeholder="Enter Marks Scored" name="history_marks_scored">
            </div>
        </div>
        <div class="col-sm">
            <div class="form-group">
                <label for="grade">Grade:</label>
                <input type="text" class="form-control" id="grade" placeholder="Enter Grade" name="history_grade">
            </div>

        </div>
    </div>





    <br>
    <br>
    <button type="submit" class="btn btn-default">Submit</button>
    <br>
    <br>
    <br>

</form>


@endsection
