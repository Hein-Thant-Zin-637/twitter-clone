@extends('layouts.admin')
@section('content')


<h1 class="display-5">Post Report List</h1>
<table id="table" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th scope="col">Report_Id</th>
            <th scope="col">Message</th>
            <th scope="col">Reported Message</th>
            <th scope="col">Reported Image</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($messagereports as $messagereport)
        <tr>
            @php
            $user_id = $messagereport->user_id;
            $hasban = DB::table('bans')->where('user_id',$user_id)->get();
            $chat_id = $messagereport->message->chat_id;

            @endphp
            <td>{{ $messagereport->id }}</td>
            <td>{{ $messagereport->reportmessage }}</td>


            <td>{{ $messagereport->message->message ? $messagereport->message->message : "Empty" }}</td>
            <td>image</td>
            <td>

                <div class="d-flex align-items-center justify-content-center">
                    @if ($hasban->isEmpty())
                    <a href=" {{ url("/admin/ban-span-message-user/$user_id") }}" class="btn btn-danger px-4 border border-right" style="height: 34px; margin:0 10px;">Ban</a>
                    @else
                    <a class="btn btn-danger px-4 border border-right disabled" style="height: 34px; margin:0 10px;">Banned</a>
                    @endif



                    <div class="d-flex justify-content-between p-3">
                        <div>
                            <form method="POST" action="{{ url("/admin/delete-chat/$chat_id")}}" class="m-0 d-flex">
                                @csrf
                                @method('DELETE')

                                <input type="hidden" name="message" value="{{ $messagereport->reportmessage }}">
                                <input type="hidden" name="user_id" value="{{ $user_id }}">


                                <button class="btn btn-warning" style="height: 34px; margin:0 10px;">Delete</button>
                            </form>
                        </div>
                    </div>


                    <div>
            </td>
        </tr>

        @endforeach

    </tbody>
</table>

@endsection