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

            <h5>{{$assignment->title}} Assignment</h5>
        </div>

        <div class="card-body text-center">


            <br/>


            <h2>
                Files of the Assignment:
            </h2>

            @foreach($attachNames as $name)
                <a href="{{asset($attachPath.$name)}}" target="_blank">{{$name}}</a>
            @endforeach


            <br/>

            @if(isset($assignment->description))
                <div class="">
                    <strong>Description:</strong>
                    <p>{{$assignment->description}}</p>
                </div>

            @endif


        </div>
    </div>



@endsection


@section('chat-section')
    <global-chats :user="{{ auth()->user() }}"></global-chats>
@endsection