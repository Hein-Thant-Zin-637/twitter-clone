@extends('layouts.admin')
@section('content')

@if(session('message'))
<div class="alert alert-default-info">
    {{ session('message') }}
</div>
@endif


<h1 class="display-5">User List</h1>

<table id="table" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th scope="col">User Id</th>
            <th scope="col">Name</th>
            <th scope="col">User Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Has Ban</th>
            <th scope="col">Action</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id}}</td>
            <td>{{ $user->name}}</td>
            <td>{{ $user->user_name}}</td>
            <td>{{ $user->email}}</td>
            <td>{{ $user->phone}}</td>

            @php
            $hasban = DB::table('bans')->where('user_id',$user->id)->get();

            $user_id = $hasban[0]->id?? false;
            @endphp

            <td>
                @if ($hasban->isEmpty())
                {{ 'No'}}
                @else

                @php
                 $today = date("Y-m-d H:i:s");
                 $timer = $hasban[0]->timer?? false;
                 $date1 = new DateTime($timer);
                $date2 = new DateTime($today);


               $interval = $date1->diff($date2);
             
              $days = $interval->format('%a');
             $hours = $interval->format('%h');
             @endphp

          {{ $days ." Days and " .$hours . " Hours Left" }}

                @endif

            </td>
            <td>
                <div class="d-flex align-items-center justify-content-center">

                    @if($hasban->isEmpty())
                    <a href=" {{ url("/admin/ban-user/$user->id") }}" class="btn btn-danger px-4" style="height: 34px; margin:0 10px;">Ban</a>

                    @else
                    
                    <form method="POST" action="{{ url("/admin/unban/$user_id") }}" class="m-0">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-warning" style="height: 34px; margin:0 10px;">Unban</button>
                    </form>
                    @endif

                    <a href="" class="btn btn-primary" style="height: 34px; margin:0 10px;">Detail</a>

                    <div>
            </td>
        </tr>
        
        @endforeach

    </tbody>
</table>

@endsection