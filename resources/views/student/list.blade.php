@extends('student.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-11">
        <h2>Student List</h2>
    </div>
    <div class="col-lg-1">
        <a class="btn btn-success" href="{{ route('students.create') }}">Add</a>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Address</th>
        <th>phone</th>
        <th>city</th>
        <th>state</th>
        <th>country</th>
        <th>Status</th>
        <th>Change status</th>
        <th width="280px">Action</th>
    </tr>
    @php
    $i = 0;
    @endphp
    @foreach ($students as $student)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $student->name }}</td>
        <td>{{ $student->email }}</td>
        <td>{{ $student->address }}</td>
        <td>{{ $student->phone }}</td>
        <td>{{ $student->city }}</td>
        <td>{{ $student->state }}</td>
        <td>{{ $student->country }}</td>
        <td>
            {{ $student->status != 'enable' ? 'Enabled': 'Disabled'}}
        </td>
        <td><input type="checkbox" data-studentId="{{ $student->id }}" {{ $student->status == 'enable' ? 'checked': ''}} class="toggle-event" data-toggle="toggle" data-on="Enabled" data-off="Disabled">
        </td>
        <td>
            <form action="{{ route('students.destroy',$student->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('students.show',$student->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
<script>
    $(function() {
        $('#toggle-two').bootstrapToggle({
            on: 'Enabled',
            off: 'Disabled'
        });
    })

    $(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.toggle-event').change(function() {
            $.ajax({
                type: "POST",
                url: "{{ url('student-status') }}",
                data: {
                    student_id: $(this).attr('data-studentId'),
                    status: $(this).prop('checked') ? 'enable' : 'disable'
                },
                dataType: 'json',
                success: function(res) {
                    location.reload();
                }
            });
        })
    })
</script>
@endsection
