@extends('layouts.app')


@section('scripts')

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>


@endsection


@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>


@endsection



@section('content')


    <table id="allTutorsTable" class="table table-bordered table-hover" style="background-color:white">

        <thead>
        <tr>
            <th>ID</th>

            <th>Name</th>
            <th>Email</th>

            <th>Edit</th>
            <th>Delete</th>

        </tr>
        </thead>

        <tbody>

        @foreach($tutors as $t)

            <tr>
                <td>{{$t->user->id}}</td>
                <td>{{$t->user->name}}</td>

                <td>{{$t->user->email}}</td>


                <td align="center">
                    <a href="{{route('edit_user',['id'=>$t->user->id])}}"><i
                                class="fa fa-undo"></i></a>
                </td>

                <td align="center">
                    <a href="{{route('delete_tutor',['id'=>$t->id])}}"><i class="fa fa-trash"
                                                                         aria-hidden="true"></i></a>
                </td>

            </tr>

        @endforeach

        </tbody>
    </table>

@endsection


@section('chat-section')
    <global-chats :user="{{ auth()->user() }}"></global-chats>
@endsection