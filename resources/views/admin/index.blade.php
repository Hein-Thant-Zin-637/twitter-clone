@extends('layouts.admin')
@section('content')

<div class="card" style="width: 7rem">
  <div class="card-body">
    <i class="fa-solid fa-user fa-2x p-4 bg-primary"></i>
    <div class="mt-2 lead">Users</div>
    <h2 class="card-title" style="font-size:1.8em;">@if ($user>0)
                                        
                                        {{ $user }}
                                    
                                    @else
                                      {{ "0" }}
                                      @endif
                                </h2>

    
  </div>
</div>
    
@endsection