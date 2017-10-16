@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>
        <div class="panel-body">
            <div class="row">
                 @include('layouts.sidemenu')
                 <div class="col-lg-10">
                    <a href="{{url('/question/create')}}" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Create</a>
                    <a href="{{url('/question/upload')}}" class="btn btn-primary"><i class="fa fa-upload" aria-hidden="true"></i> Upload</a>
                    <table id="example" class="display table table-condensed table-responsive" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Class</th>
                                <th>Question</th>
                                <th>Created by</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody> 
                            @foreach($questions as $question)
                            <tr>
                                <td>{{$question->subject->subj_code}}</td>
                                <td>{{$question->section->class}}</td>
                                <td><a href="question/{{$question->id}}">{{substr($question->question, 0, 50)}}......</a></td>
                                <td>{{$question->created_by}}</td>
                                <td><a href="question/{{$question->id}}/edit" class="btn btn-xs btn-primary">Edit</a> | <a class="btn btn-xs btn-danger">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
</style>