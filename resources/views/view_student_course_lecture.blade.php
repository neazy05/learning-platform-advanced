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

            <br/>
                <a href="{{$lecture->Lecture_attachments->first()->path}}" target="_blank">Download Video</a>

            @else

                <a href="{{asset('/uploads'.$attachPath)}}" target="_blank">{{$attachName}}</a>


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



    <script>
        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */

        var disqus_config = function () {
            this.page.url = "{{route('view_student_course_lecture',['id'=>$lecture->id])}}";  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = "lecture-{{$lecture->id}}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };

        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://spu-learning-platform.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>


    <div id="disqus_thread"></div>


@endsection


@section('chat-section')
    <global-chats :user="{{ auth()->user() }}"></global-chats>
@endsection