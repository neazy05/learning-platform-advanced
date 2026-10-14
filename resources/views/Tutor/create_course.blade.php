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

            <h5>Create New Course</h5>
        </div>

        <div class="card-body">

            <form role="form" method='post' action="{{route('store_course')}}" enctype="multipart/form-data"
                  id="createNewCourseForm">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="newCourseENName" class="form-control-label">Course Name:</label>
                    <input type="text" class="form-control" id="newCourseENName" name="newCourseENName" required/>
                </div>

                <div class="form-group">
                    <label for="newCourseNickName" class="form-control-label">Course Nickname:</label>
                    <input type="text" class="form-control" id="newCourseNickName" name="newCourseNickName"/>
                </div>

                <div class="form-group">
                    <label for="newCourseCode" class="form-control-label">Course Code:</label>
                    <input type="text" class="form-control" id="newCourseCode" name="newCourseCode" required/>
                </div>


                <div class="form-group">
                    <label for="newCourseImage" class="form-control-label">Course Image:</label>
                    <input type="file" class="form-control-file" id="newCourseImage" name="newCourseImage"/>
                </div>

                <h3>Category Selection:</h3>

                <div class="form-group">
                    <select class="form-control" id="newCourseCategory" name="newCourseCategory" required>

                        <option></option>
                        @foreach($categories as $c)

                            <option value="{{$c->id}}">{{$c->title}}</option>

                        @endforeach
                    </select>
                </div>
                <br/>

                <div class="form-group" id="newCourseSubmitGroup">
                    <input type="submit" class="btn btn-success" value="Submit">

                </div>

            </form>
        </div>
    </div>



@endsection


@section('chat-section')
    <global-chats :user="{{ auth()->user() }}"></global-chats>
@endsection