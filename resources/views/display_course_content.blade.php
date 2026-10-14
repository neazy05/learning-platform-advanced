@extends('layouts.app')


@section('scripts')
    <script src="{{asset('js/rating.js')}}"></script>
@endsection

@section('styles')

    <link rel="stylesheet" href="{{asset('css/rating.css')}}"/>

@endsection
@section('content')


    @if(count($errors)>0)

        <div class="list-group">
            @foreach($errors->all() as $err )

                <div class="list-group-item text-danger">{{$err}}</div>
            @endforeach
        </div>
    @endif

    <div class="card text-center">
        <h2 class="card-header">
            {{$course->course_en_name}}
        </h2>
        <div class="card-body">
            <h4 class="card-title">Course Information</h4>
            <p class="card-text">
            @if(isset($course->course_nickname))
                <div><strong>Nickname:</strong> {{$course->course_nickname}}</div>
            @endif
            <div><strong>Code:</strong> {{$course->course_code}}</div>
            <div><strong>Category:</strong> {{$course->category->title}}</div>
            <br/>
            <div>
                <img src="{{asset($course->course_image)}}" alt="Course Image" width="200px" height="150px">
            </div>
            <br/>
            <div>
                <strong>Course Rating:</strong>
            <br/>
                <table style="margin:0 auto">
                    <tbody>
                    <tr class='rating'>
                        <td>
                            <span class="number-rating"></span>
                            <div><strong>Rating:</strong>
                                <span class='ratingValue'>
                                {{$course->course_rating}}
                            </span>
                                <span class="stars-outer">
                                            <div class="stars-inner"></div>
                                        </span>
                            </div>


                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <br/>
            <br/>

            <h4 class="card-title">Course Content</h4>
            <div><strong>Number of Lectures:</strong> {{count($course->lectures()->get())}}</div>
            <div><strong>Number of Assignments:</strong> {{count($course->assignments()->get())}}</div>

            </p>

            <h4 class="card-title">Available Lectures:</h4>

            @foreach($course->lectures()->get() as $l)
                <p class="card-text">
                    <strong>></strong> {{$l->title}}
                </p>

            @endforeach

        </div>
        <div class="card-footer text-muted">
            <a href="{{route('enroll_course',['id'=>$course->id])}}" class="btn btn-success">Enroll</a>
        </div>
    </div>

    <script>
        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */

        var disqus_config = function () {
            this.page.url = "{{route('display_course_content',['id'=>$course->id])}}";  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = "course-{{$course->id}}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };

        (function () { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://spu-learning-platform.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by
            Disqus.</a></noscript>


    <div id="disqus_thread"></div>




@endsection


@section('chat-section')
    <global-chats :user="{{ auth()->user() }}"></global-chats>
@endsection
