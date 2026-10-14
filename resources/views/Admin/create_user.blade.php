@extends('layouts.app')

@section('content')


    @if(count($errors)>0)

        <div class="list-group">
            @foreach($errors->all() as $err )

                <div class="list-group-item text-danger">{{$err}}</div>
            @endforeach
        </div>
    @endif

    <div class="card">
        <div class="card-header">

            <h5>Create New User</h5>
        </div>

        <div class="card-body">

            <form role="form" method='post' action="{{route('store_user')}}" enctype="multipart/form-data"
                  id="createNewUserForm">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="newUserName" class="form-control-label">User Name:</label>
                    <input type="text" class="form-control" id="newUserName" name="newUserName" required/>
                </div>

                <div class="form-group">
                    <label for="newUserEmail" class="form-control-label">User Email:</label>
                    <input type="email" class="form-control" id="newUserEmail" name="newUserEmail" required/>
                </div>

                <div class="form-group">
                    <label for="newUserPassword" class="form-control-label">User Password:</label>
                    <input type="password" class="form-control" id="newUserPassword" name="newUserPassword" required/>
                </div>

                <div class="form-group">
                    <label for="newUserMobile" class="form-control-label">User Mobile:</label>
                    <input type="number" class="form-control" id="newUserMobile" name="newUserMobile"/>
                </div>


                <h3>Role(s) Selection:</h3>


                @foreach($roles as $role)



                    <span class="form-check">
                        <input type="checkbox" class="form-check-input" name='newUserRoles[]' value="{{$role}}">
                        <label class="form-check-label"> {{$role}}</label>
                    </span>

                @endforeach
                <br/>

                <div class="form-group" id="newUserSubmitGroup">
                    <input type="submit" class="btn btn-success" value="Submit">

                </div>

            </form>
        </div>
    </div>



@endsection


@section('chat-section')
    <global-chats :user="{{ auth()->user() }}"></global-chats>
@endsection