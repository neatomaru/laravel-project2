@extends('layouts.app')


@section('content')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->




    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="card-title mb-4">
                            <div class="d-flex justify-content-start">
                                <div class="image-container">
                                    <img src="/{{$avatar}}" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />

                                </div>
                                <div class="userData ml-3">
                                    <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href="javascript:void(0);">{{$name}}</a></h2>
                                </div>
                                <div class="ml-auto">
                                    <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                                </div>

                                <div class="middle float-right btn-group">

                                        <div class="py-2 mx-3">
                                            <a href="/updateform">
                                                <button type="button" class="btn btn-secondary" id="btnChangePicture">
                                                    <span>ИЗМЕНИТЬ ПРОФИЛЬ</span>
                                                </button>
                                            </a>
                                        </div>

                                        <div class="py-2 mx-3">
                                            <a href="/messages">
                                                <button type="button" class="btn btn-secondary" id="btnChangePicture">
                                                    <span>МОИ СООБЩЕНИЯ</span>
                                                </button>
                                            </a>

                                        </div>

                                </div>


                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">About me</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="friendList-tab" data-toggle="tab" href="#friendList" role="tab" aria-controls="friendList" aria-selected="false">My Friends</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content ml-1" id="myTabContent">
                                        <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">


                                            <div class="row">
                                                <div class="col-sm-3 col-md-2 col-5">
                                                    <label style="font-weight:bold;">Full Name</label>
                                                </div>
                                                <div class="col-md-8 col-6">
                                                    {{$fullname}}
                                                </div>
                                            </div>
                                            <hr />

                                            <div class="row">
                                                <div class="col-sm-3 col-md-2 col-5">
                                                    <label style="font-weight:bold;">Age</label>
                                                </div>
                                                <div class="col-md-8 col-6">
                                                    {{$birthday}}
                                                </div>
                                            </div>
                                            <hr />


                                            <div class="row">
                                                <div class="col-sm-3 col-md-2 col-5">
                                                    <label style="font-weight:bold;">City</label>
                                                </div>
                                                <div class="col-md-8 col-6">
                                                    {{$city}}
                                                </div>
                                            </div>
                                            <hr />
                                            <div class="row">
                                                <div class="col-sm-3 col-md-2 col-5">
                                                    <label style="font-weight:bold;">Phone</label>
                                                </div>
                                                <div class="col-md-8 col-6">
                                                    {{$phone}}
                                                </div>
                                            </div>
                                            <hr />
                                            <div class="row">
                                                <div class="col-sm-3 col-md-2 col-5">
                                                    <label style="font-weight:bold;">Site</label>
                                                </div>
                                                <div class="col-md-8 col-6">
                                                    {{$social}}
                                                </div>
                                            </div>
                                            <hr />

                                        </div>
                                        <div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                            {{$about}}
                                        </div>

                                        <div class="tab-pane fade" id="friendList" role="tabpanel" aria-labelledby="friendList-tab">
                                            @foreach($friendslist as $friend => $link)

                                                <p> <a href="{{$link}}">{{$friend}}</a></p>
                                                @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection
