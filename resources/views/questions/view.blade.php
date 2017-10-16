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
    <div class="panel panel-default">
        <div class="panel-heading"><b>{{$question->subject->subject_name}}</b> question for class <b>{{$question->section->class}}</b></div>
        <div class="panel-body">
    <p>{{$question->question}}</p>
    <ul>
        <ul>
            <?php foreach ($question->answers as $value) {?>
                <?php if(\Auth::user()->role_id == 4 || \Auth::user()->role_id == 5){?>
                <a href="{{$question->id}}/correct/{{$value->id}}"> <li class="<?= ($value->correct == 1)?'correct bg-success':''?>"><?= $value->answer;?> <?= ($value->correct == 1)?"<i class='fa fa-check' aria-hidden='true'></i>":"";?></li></a>
                <?php }else{?>
                  <li class="<?= ($value->correct == 1)?'correct bg-success':''?>"><?= $value->answer;?> <?= ($value->correct == 1)?"<i class='fa fa-check' aria-hidden='true'></i>":"";?></li>
                <?php }?>
            <?php }?>
        </ul>
    </ul>
   <hr>
   <?php if(!empty($question->explanation)){ ?>
     <p class="lead">
         <b>Explanation::</b>{{$question->explanation}}
    </p>
    <hr>
   <?php }else if(\Auth::user()->role_id == 4){?>
    <div class="card">
        <div class="card-block">
            <form method="post" action="{{url('saveexplanation', [$question->id])}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                      <label for="explanation">Explanation</label>
                      <textarea id="explanation" class="form-control" name="explanation" placeholder="Provide some explanation to the question" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add explanation</button>
                </div>
            </form>
        </div>
    </div>

   <?php };?>
</div>
        </div>
    </div>
<div class="col-lg-4">
    <div class="panel panel-default">
        <div class="panel-heading">Question information</div>
        <div class="panel-body">
            <p>
                <h5><b>Category:</b> {{$question->subject->category->cat_name}}</h5>
                <h5><b>Subject:</b> {{$question->subject->subject_name}}</h5>
                <h5><b>Class:</b> {{$question->section->class}}</h5>
                <h5><b>Date created:</b> {{$question->created_at->toFormattedDateString()}}</h5>
                <h5><b>Created by:</b> {{$question->created_by}}</h5>
                <?php if($question->verified == 1){?>
                   <button class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i>Verified</button>
                <?php }else{?>
                   <a href="{{$question->id}}/verify" class="btn btn-default">Verify</a> 
                <?php }?>

               <a href="{{$question->id}}/edit" class="btn btn-primary">Edit</a>
                <button class="btn btn-danger">Delete</button>
            </p>
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

<style>
.list-group .glyphicon {
    float: right;
}
</style>


