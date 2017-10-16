@extends('layouts.app')

@section('content')
<div class="container-fluid">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <div class="row">
                        @include('layouts.sidemenu')
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="col-lg-4">
                                        <div class="avatar-border shadow-4x m-b" style="width:auto;">
                                            <img class="img-circle" width="128" height="128" src="images/school.jpg">
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <h4>{{$user->name}}</h4>
                                        <small>{{$user->email}}</small><hr>
                                        <b>Mobile:</b>{{$user->mobile}}<br>
                                        <b>Date enrolled: </b>{{$user->created_at->diffForHumans()}}<br>
                                        <b>Enrolled as a: </b>{{$user->role->name}}<br>
                                        <b>Current class: </b>{{$user->section->class}}<hr>
                                        <h4>Trivia timeline</h4>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <b>Subjects</b><hr>
                                    <b>Subscription total:</b><hr>
                                    <b>Subscription expiry date :</b><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
@endsection

<style>
.list-group .glyphicon {
    float: right;
}
.aside-xl {
    width: 132px;
}
.avatar-border {
    width: auto !important;
    height: auto !important;
    display: inline-block;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    -khtml-border-radius: 50%;
    padding: 4px;
    background: #fff;
}

.shadow-4x {
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.3);
    background: #fff;
}

.m-b {
    margin-bottom: 15px;
}
.wrapper {
    padding: 15px;
}

</style>






