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

            <h5>Edit Lecture</h5>
        </div>

        <div class="card-body">

            <form role="form" method='post' action="{{route('update_course_lecture',['id'=>$lecture->id])}}"
                  enctype="multipart/form-data"
                  id="updateLectureForm">
                {{csrf_field()}}


                <div class="form-group">
                    <label for="updateLectureTitle" class="form-control-label">Lecture Title:</label>
                    <input type="text" class="form-control" id="updateLectureTitle" name="updateLectureTitle"
                           value="{{$lecture->title}}" required/>
                </div>

                <div class="form-group">
                    <label for="updateLectureDescription" class="form-control-label">Lecture Description:</label>
                    <textarea class="form-control" id="updateLectureDescription"
                              name="updateLectureDescription">@if(isset($lecture->description)){{$lecture->description}}@endif</textarea>
                </div>

                @if(Str::startsWith($lecture->lecture_attachments()->first()->path,'http'))

                    <div class="form-group">
                        <p>Old Video URL:<br/> {{$lecture->lecture_attachments()->first()->path}}</p>
                    </div>


                @else
                    <a href="{{asset('/uploads/'.$attachPath)}}">
                            {{$attachmentName}}
                    </a>

                @endif

                <h3>Lecture Type Selection:</h3>

                <div class="form-group">
                    <select class="form-control" id="updateLectureType" name="updateLectureType" required>

                        <option></option>

                        <option value="Video">Video</option>

                        <option value="Document">Document</option>

                    </select>
                </div>
                <br/>


                <div class="form-group" id="updateLectureSubmitGroup">
                    <input type="submit" class="btn btn-success" value="Submit">

                </div>

            </form>
        </div>
    </div>



@endsection


@section('chat-section')
    <global-chats :user="{{ auth()->user() }}"></global-chats>
@endsection