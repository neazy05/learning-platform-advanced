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

            <h5>{{$lecture->title}} Lecture</h5>
        </div>

        <div class="card-body text-center">


            <br/>

            @if(Str::startsWith($lecture->Lecture_attachments->first()->path,'http'))


                <iframe width="640" height="480"
                        src="{{$lecture->Lecture_attachments->first()->path}}"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>

                </iframe>
            @else

                @if(Str::endsWith($attachName,'pdf'))
                    <object data="{{asset('/uploads'.$attachPath)}}" width="100%" height="500px" type="application/pdf">
                        <embed  src="{{asset('/uploads'.$attachPath)}}" type="application/pdf" width="100%" height="300px" />
                    </object>


                @elseif(Str::endsWith($attachName,'docx'))
                    <a href="{{asset('/uploads'.$attachPath)}}" target="_blank">{{$attachName}}</a>

                    @endif
            @endif


            <br/>

            @if(isset($lecture->description))
                <div class="">
                    <strong>Description:</strong>
                    <p>{{$lecture->description}}</p>
                </div>

            @endif


        </div>
    </div>



@endsection


@section('chat-section')
    <global-chats :user="{{ auth()->user() }}"></global-chats>
@endsection