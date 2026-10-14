@extends('layouts.app')

@section('content')


    @if(count($errors)>0)

        <div class="list-group">
            @foreach($errors->all() as $err )

                <div class="list-group-item text-danger">{{$err}}</div>
            @endforeach
        </div>
    @endif

    <div class="container-fluid">
        <div class="row">
            <div>
                <h4>Search Courses:</h4>
            </div>
            <br/></div>
        <div class="row">


            <form role="form" class="form-inline mb-3" method='get' action="{{route('search_courses')}}"
                  enctype="multipart/form-data"
                  id="searchCoursesForm">


                <div class="form-group ml-3">
                    <select class="form-control mr-2" id="searchCourseType" name="searchCourseType" required>

                        <option value="title" selected>Title</option>
                        <option value="category">Category</option>

                    </select>

                    <input type="text" class="form-control mr-2" id="searchCourseValue" name="searchCourseValue"
                           required/>


                </div>
                <br/>

                <div class="form-group" id="searchCoursesSubmitGroup">
                    <input type="submit" class="btn btn-secondary" value="Search">

                </div>

            </form>
        </div>

        @if(isset($recommendations))
            <h4>Recommended Courses For You:</h4>

            <div class="row">
                @if($recommendations=="No Recommendations")
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-2">

                        <div class="card">
                            <div class="card-body">
                                No Recommendations!
                            </div>
                        </div>
                    </div>
                    <br/>
                @else
                    @foreach($recommendations as $course_id=>$rank)
                        @foreach($courses as $c)
                            @if($c->id==$course_id)
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-2">
                                    <div class="card">
                                        <div class="card-header">
                                            {{$c->course_code}}
                                        </div>

                                        <div class="card-body">
                                            {{$c->course_en_name}}
                                        </div>

                                        <div class="card-body">
                                            Predicted Rate: {{$rank}}
                                        </div>

                                        <div class="card-footer text-muted text-center">
                                            <a href="{{route('display_course_content',['id'=>$c->id])}}"
                                               class="btn btn-success">Open
                                                Course</a>

                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                @endif
            </div>
        @endif
        {{-- @if($recommendations!="No Recommendations")

              <div class="row pb120">

                  <div class="col-12 col-sm-12 col-md-12 col-lg-12 " style="margin:5% 40%">

                      @if(isset($query))
                          {{ $recommendations->appends($query)->links() }}
                      @else
                          {{ $recommendations->links() }}
                      @endif

                  </div>

              </div>
          @endif
  --}}


        <h4>Available Courses:</h4>

        <div class="row">
            @foreach($courses as $c)

                <div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-2">
                    <div class="card">
                        <div class="card-header">
                            {{$c->course_code}}
                        </div>

                        <div class="card-body">
                            {{$c->course_en_name}}
                        </div>

                        <div class="card-footer text-muted text-center">
                            <a href="{{route('display_course_content',['id'=>$c->id])}}" class="btn btn-success">Open
                                Course</a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row pb120">

            <div class="col-12 col-sm-12 col-md-12 col-lg-12 " style="margin:5% 40%">

                @if(isset($query))
                    {{ $courses->appends($query)->links() }}
                @else
                    {{ $courses->links() }}
                @endif

            </div>


        </div>
    </div>




@endsection


@section('chat-section')
    <global-chats :user="{{ auth()->user() }}"></global-chats>
@endsection
