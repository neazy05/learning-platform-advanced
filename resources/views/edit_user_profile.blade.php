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

            <h5> Edit User Profile</h5>
        </div>

        <div class="card-body">

            @if(!isset(Auth::user()->provider_id))
                <form role="form" method='post' action="{{route('update_user',['id'=>$user->id])}}"
                      enctype="multipart/form-data"
                      id="editUserForm">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="updateUserName" class="form-control-label">User Name:</label>
                        <input type="text" class="form-control" id="updateUserName" name="updateUserName"
                               value="{{$user->name}}" required/>
                    </div>

                    <div class="form-group">
                        <label for="updateUserEmail" class="form-control-label">User Email:</label>
                        <input type="email" class="form-control" id="updateUserEmail" name="updateUserEmail"
                               value="{{$user->email}}" required/>
                    </div>

                    <div class="form-group">
                        <label for="updateUserPassword" class="form-control-label">New User Password:</label>
                        <input type="password" class="form-control" id="updateUserPassword" name="updateUserPassword"
                               required/>
                    </div>

                    <div class="form-group">
                        <label for="updateUserMobile" class="form-control-label">User Mobile:</label>
                        <input type="number" class="form-control" id="updateUserMobile" name="updateUserMobile"
                               @if(isset($user->mobile)) value="{{$user->mobile}}" @endif/>
                    </div>

                    <div class="form-group">
                        <label for="updateUserAvatar" class="form-control-label">User Avatar:</label>
                        <input id="updateUserAvatar" name="updateUserAvatar" class="form-control-file"
                               type="file"/>
                    </div>

                    @if(Auth::user()->roles()->where('role_en_name','Admin')->count()>0)
                        @if(!isset($user->isTutor))
                            <h3>Role(s) Selection:</h3>


                            @foreach($roles as $role)



                                <span class="form-check">
                        @if($user->roles()->where('role_en_name',$role)->count()>0)
                                        <input type="checkbox" class="form-check-input" name='updateUserRoles[]'
                                               value="{{$role}}"
                                               checked>
                                    @else
                                        <input type="checkbox" class="form-check-input" name='updateUserRoles[]'
                                               value="{{$role}}">
                                    @endif
                                <label class="form-check-label"> {{$role}}</label>
                    </span>

                            @endforeach
                            <br/>
                        @endif

                    @endif


                    @if(isset($user->isTutor))


                        <div class="form-group">
                            <label for="updateTutorDiploma" class="form-control-label">Tutor Diploma:</label>
                            <input type="text" class="form-control" id="updateTutorDiploma" name="updateTutorDiploma"
                                   @if(isset($user->isTutor->tutor_diploma)) value="{{$user->isTutor->tutor_diploma}}" @endif/>
                        </div>

                        <div class="form-group">
                            @if(isset($user->isTutor->tutor_cv))
                                <p>Old CV:</p>
                                <a href="{{asset($user->isTutor->tutor_cv)}}">
                                    {{$cvName}}
                                </a>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="updateTutorCV" class="form-control-label">Tutor CV:</label>
                            <input type="file" class="form-control-file" id="updateTutorCV" name="updateTutorCV"/>
                        </div>


                    @endif
                    <div class="form-group" id="updateUserSubmitGroup">
                        <input type="submit" class="btn btn-success" value="Update">

                    </div>

                </form>

            @elseif(isset(Auth::user()->provider_id) && (Auth::user()->roles()->count()==0 && !isset(Auth::user()->isTutor)))
                <form role="form" method='post' action="{{route('update_user',['id'=>$user->id])}}"
                      enctype="multipart/form-data"
                      id="editUserForm">
                    {{csrf_field()}}



                    <div class="form-group">
                        <label for="updateUserMobile" class="form-control-label">User Mobile:</label>
                        <input type="number" class="form-control" id="updateUserMobile" name="updateUserMobile"
                               @if(isset($user->mobile)) value="{{$user->mobile}}" @endif/>
                    </div>



                    <div class="form-group">
                        <label for="updateTutorDiploma" class="form-control-label">Tutor Diploma (if tutor):</label>
                        <input type="text" class="form-control" id="updateTutorDiploma" name="updateTutorDiploma"
                               @if(isset($user->isTutor->tutor_diploma)) value="{{$user->isTutor->tutor_diploma}}" @endif/>
                    </div>


                    <div class="form-group">
                        <label for="updateTutorCV" class="form-control-label">Tutor CV (if tutor):</label>
                        <input type="file" class="form-control-file" id="updateTutorCV" name="updateTutorCV"/>
                    </div>

                    <div class="form-group row">
                        <label for="role"
                               class="col-md-4 col-form-label text-md-right">Role Selection:</label>

                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="role" value="Student">Student
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="role" value="Tutor">Tutor
                            </label>
                        </div>
                    </div>


                    <div class="form-group" id="updateUserSubmitGroup">
                        <input type="submit" class="btn btn-success" value="Update">

                    </div>

                </form>


            @elseif(isset(Auth::user()->provider_id) and isset(Auth::user()->isTutor))
                <form role="form" method='post' action="{{route('update_user',['id'=>$user->id])}}"
                      enctype="multipart/form-data"
                      id="editUserForm">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="updateUserMobile" class="form-control-label">User Mobile:</label>
                        <input type="number" class="form-control" id="updateUserMobile" name="updateUserMobile"
                               @if(isset($user->mobile)) value="{{$user->mobile}}" @endif/>
                    </div>

                    <div class="form-group">
                        <label for="updateTutorDiploma" class="form-control-label">Tutor Diploma:</label>
                        <input type="text" class="form-control" id="updateTutorDiploma" name="updateTutorDiploma"
                               @if(isset($user->isTutor->tutor_diploma)) value="{{$user->isTutor->tutor_diploma}}" @endif/>
                    </div>

                    <div class="form-group">
                        @if(isset($user->isTutor->tutor_cv))
                            <p>Old CV:</p>
                            <a href="{{asset($user->isTutor->tutor_cv)}}">
                                {{$cvName}}
                            </a>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="updateTutorCV" class="form-control-label">Tutor CV:</label>
                        <input type="file" class="form-control-file" id="updateTutorCV" name="updateTutorCV"/>
                    </div>




                    <div class="form-group" id="updateUserSubmitGroup">
                        <input type="submit" class="btn btn-success" value="Update">

                    </div>

                </form>
            @else


                <form role="form" method='post' action="{{route('update_user',['id'=>$user->id])}}"
                      enctype="multipart/form-data"
                      id="editUserForm">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="updateUserMobile" class="form-control-label">User Mobile:</label>
                        <input type="number" class="form-control" id="updateUserMobile" name="updateUserMobile"
                               @if(isset($user->mobile)) value="{{$user->mobile}}" @endif/>
                    </div>


                    <div class="form-group" id="updateUserSubmitGroup">
                        <input type="submit" class="btn btn-success" value="Update">

                    </div>

                </form>
            @endif
        </div>
    </div>






@endsection


@section('chat-section')
    <global-chats :user="{{ auth()->user() }}"></global-chats>
@endsection
