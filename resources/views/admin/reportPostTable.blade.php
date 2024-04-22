@extends('layouts.admin')
@section('content')


<h1 class="display-5">Post Report List</h1>
<table id="table" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th scope="col">Report_Id</th>
            <th scope="col">Message</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reports as $report)
        <tr>
            <td>{{ $report->id }}</td>
             <td>{{ $report->message }}</td> 
            
            <td>
            <a href=" {{ url("/admin/post-detail/$report->post_id") }}" class="btn btn-primary" style="height: 34px; margin:0 10px;">Detail</a>
            </td>
        </tr>

        @endforeach

    </tbody>
</table>

@endsection