@extends('layouts.app')






@section('content')

<table id="allUsersTable" class="table table-bordered table-hover" style="background-color:white">

    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Roles</th>
        <th>Edit</th>
        <th>Delete</th>

    </tr>
    </thead>

    <tbody>

    @foreach($users as $u)

        <tr>
            <td>{{$u->id}}</td>
            <td>{{$u->name}}</td>
            <td>{{$u->email}}</td>
            <td>{{$u->mobile}}</td>
            <td>
                <div class="list-group">
                @foreach($u->roles as $role)

                    <div class="list-group-item text-center">
                        {{$role->role_en_name}}
                    </div>
                    @endforeach
                </div>
            </td>
            <td align="center">
                <a href="{{route('edit_user',['id'=>$u->id])}}"><i
                            class="fa fa-undo"></i></a>
            </td>

            <td align="center">
                <a href="{{route('delete_user',['id'=>$u->id])}}"><i class="fa fa-trash"
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