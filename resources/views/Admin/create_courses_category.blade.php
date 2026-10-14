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

            <h5>Create New Courses Category</h5>
        </div>

        <div class="card-body">


            <form role="form" method="post" action="{{route('store_courses_category')}}" enctype="multipart/form-data"
                  id="createNewCategoryForm">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="newTitle" class="form-control-label">Title:</label>
                    <input class="form-control" type="text" id="newTitle" name="newTitle"/>
                </div>

                <div class="form-group">
                    <label for="newParentID" class="form-control-label">Parent Category (if Sub-Category):</label>

                    <select class="form-control" id="newParentID" name="newParentID">
                        <option value="" ></option>

                        @foreach($categories as $c)
                            <option value="{{$c->id}}">{{$c->title}}</option>
                        @endforeach

                    </select>
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
