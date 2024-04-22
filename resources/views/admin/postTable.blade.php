@extends('layouts.admin')
@section('content')


<h1 class="display-5">Post List</h1>
<table id="table" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th scope="col">Post_Id</th>
            <th scope="col">User Name</th>
            <th scope="col">Descriptions</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
             <td>{{ $post->user->name }}</td> 
            <td>{{ $post->description }}</td>
            <td>
            <a href=" {{ url("/admin/post-detail/$post->id") }}" class="btn btn-primary" style="height: 34px; margin:0 10px;">Detail</a>
            </td>
        </tr>

        @endforeach

    </tbody>
</table>

@endsection