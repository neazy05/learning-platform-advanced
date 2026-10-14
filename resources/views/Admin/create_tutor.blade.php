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

            <h5>Create New Tutor</h5>
        </div>

        <div class="card-body">


            <form role="form" method="post" action="{{route('store_tutor')}}" enctype="multipart/form-data"
                  id="createNewTutorForm">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="newTutorName" class="form-control-label">Tutor Name:</label>
                    <input class="form-control" type="text" id="newTutorName" name="newTutorName"/>
                </div>


                <div class="form-group">

                    <label for="newTutorEmail" class="form-control-label">Tutor Email:</label>
                    <input class="form-control" type="email" id="newTutorEmail" name="newTutorEmail"/>
                </div>

                <div class="form-group">
                    <label for="newTutorPassword" class="form-control-label">Tutor Password:</label>
                    <input class="form-control" type="password" id="newTutorPassword" name="newTutorPassword"/>

                </div>

                <div class="form-group">
                    <label for="newTutorMobile" class="form-control-label">Tutor Mobile:</label>
                    <input class="form-control" type="number" id="newTutorMobile" name="newTutorMobile"/>
                </div>


                <div class="form-group">
                    <label for="newTutorDiploma" class="form-control-label">Tutor Diploma:</label>
                    <input class="form-control" type="text" id="newTutorDiploma" name="newTutorDiploma"/>
                </div>


                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Submit">
                </div>

            </form>


        </div>
    </div>

    <meta name="_token" content="{!! csrf_token() !!}"/>


@endsection


@section('chat-section')
    <global-chats :user="{{ auth()->user() }}"></global-chats>
@endsection