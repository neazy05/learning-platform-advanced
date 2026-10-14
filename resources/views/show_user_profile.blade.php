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

            <h5>User Profile:</h5>
        </div>

        <div class="card-body">

            <div class="list-group">

                <div class="list-group-item">
                    <strong>User Name: </strong>
                    <span>{{$user->name}}</span>
                </div>

                <div class="list-group-item">

                    <strong>User Email: </strong>
                    <span>{{$user->email}}</span>
                </div>

                @if(isset($user->mobile))
                    <div class="list-group-item">
                        <strong>User Mobile: </strong>
                        <span>{{$user->mobile}}</span>
                    </div>
                @endif


                @if(isset($user->avatar))
                    <div class="list-group-item">
                        <strong>User Avatar: </strong>
                        <span><img width="60px" height="60px" src="{{asset($user->avatar)}}" alt="Can't render avatar"></span>
                    </div>
                @endif

            </div>
            <br/>

            @if($user->roles()->count()>0)
                <h3 style="margin-top:20px">Role(s):</h3>
                <br/>
                <div class="list-group">
                    @php

                        foreach ($user->roles as $role) {


                            echo "<div class='list-group-item text-center' >
                                    <strong >" . $role->role_en_name . "</strong>
                    </div>";

                        }


                    @endphp

                </div>

                <br/>
            @endif

            @if(isset($user->isTutor))



                @if(isset($user->isTutor->tutor_diploma))
                    <div class="list-group-item">
                        <strong>Tutor Diploma: </strong>
                        <span>{{$user->isTutor->tutor_diploma}}</span>
                    </div>
                @endif

                    <div class="list-group-item">
                        <strong>Tutor CV: </strong>
                        @if(isset($user->isTutor->tutor_cv))
                            <a href="{{asset($user->isTutor->tutor_cv)}}">
                                {{$cvName}}
                            </a>

                            @else
                            No CV.
                        @endif
                    </div>

                <h3>Role(s):</h3>
                <br/>
                <div class="list-group">

                    <div class='list-group-item text-center'>
                        <strong>Tutor</strong>
                    </div>
                </div>

            @endif

        </div>
    </div>

    <br/>



@endsection


@section('chat-section')
    <global-chats :user="{{ auth()->user() }}"></global-chats>
@endsection
