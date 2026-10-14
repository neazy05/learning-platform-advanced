@extends('layouts.app')

@section('styles')


@endsection
@section('scripts')




    @endsection
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

            <h5>Create New Lecture</h5>
        </div>

        <div class="card-body">

            <form role="form" method='post' action="{{route('store_lecture')}}" enctype="multipart/form-data"
                  id="createNewLectureForm">
                {{csrf_field()}}

                <div class="form-group">
                    <input type="hidden" class="form-control" id="newLectureCourseID" name="newLectureCourseID"
                           value="{{$course_id}}"/>
                </div>

                <div class="form-group">
                    <label for="newLectureTitle" class="form-control-label">Lecture Title:</label>
                    <input type="text" class="form-control" id="newLectureTitle" name="newLectureTitle" required/>
                </div>

                <div class="form-group">
                    <label for="newLectureDescription" class="form-control-label">Lecture Description:</label>
                    <textarea class="form-control" id="newLectureDescription" name="newLectureDescription"></textarea>
                </div>


                <h3>Lecture Type Selection:</h3>

                <div class="form-group">
                    <select class="form-control" id="newLectureType" name="newLectureType" required>

                        <option></option>

                        <option value="Video">Video</option>

                        <option value="Document">Document</option>

                    </select>
                </div>
                <br/>


                <div class="form-group" id="newLectureSubmitGroup">
                    <input type="submit" class="btn btn-success" value="Submit">

                </div>

            </form>
        </div>
    </div>



@endsection


@section('chat-section')
    <global-chats :user="{{ auth()->user() }}"></global-chats>
@endsection