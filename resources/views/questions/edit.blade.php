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
        <h4>Edit {{\Auth::user()->subject->subject_name}} question for {{\Auth::user()->section->class}} </h4><hr>
        <form method="POST" action="{{url('/question')}}/{{$question->id}}">
             {{ method_field('PUT') }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
             <div class="col-md-10">
                    <div class="form-group">
                      <label for="subject_id">Subject</label>
                      <input class="form-control" id="question" name="subject_id" value="{{ old('subject_id', $question->subject_id) }}" >
                    </div>
            </div>
             <div class="col-md-10">
                    <div class="form-group">
                      <label for="section_id">Section</label>
                      <input type="text" class="form-control" id="question" name="section_id" value="{{ old('section_id', $question->section_id) }}" >
                    </div>
            </div>
            <div class="col-md-10">
                    <div class="form-group">
                      <label for="question">Edit the question</label>
                      <textarea class="form-control" id="question" name="question" >{{ old('question', $question->question) }}</textarea >
                    </div>
            </div>
             <div class="col-md-10">
                    <div class="form-group">
                      <label for="explanation">Edit the explanation</label>
                      <textarea class="form-control" id="question" name="explanation" >{{ old('question', $question->explanation) }}</textarea >
                    </div>
            </div>
            <div class="col-lg-10">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>  
        </form>
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
</style>
