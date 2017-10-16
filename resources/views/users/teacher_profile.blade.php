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
                                        <h4 class="teachername">{{$user->name}}</h4>
                                        <small>{{$user->email}}</small><hr>
                                        <b>Mobile:</b>{{$user->mobile}}<br>
                                        <b>Date enrolled: </b>{{$user->created_at->diffForHumans()}}<br>
                                        <b>Enrolled as a: </b>{{$user->role->name}}<br>
                                        <b>Current subject of entry:</b><button class="btn btn-link" onclick="changeSubject({{$user->id}})">{{$user->subject->subject_name}}</button><br>
                                        <b>Current class of entry:</b><button class="btn btn-link">{{$user->section->class}}</button>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <h4>Classes</h4>
                                    <h4>Subjects</h4>
                                    <h4>Questions entered</h4>
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
<script>
    function changeSubject(id){
        var name = $(".teachername").text();
        $(".teachernamemodal").text("");
        $(".teachernamemodal").text("Change "+name+"'s subject");
        $("#changeSubject").modal("show");
    }
    
    function approveSubject(val){
        $("#changescript").attr("onClick", "updateVal("+val+")");
    }
    
    function updateVal(val){
        alert(val);
    }
</script>

<!-- Modal -->
<div class="modal fade" id="changeSubject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title teachernamemodal" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
                <label>Subject</label>
                <select id="subjectchange" class="form-control" onchange="approveSubject($(this).val())">
                    <option value="">--Please select--</option>
                    <?php
                      $subjects = \App\Subject::all();
                      foreach ($subjects as $subject) {
                          echo "<option value='$subject->id'>$subject->subject_name</option>";
                      }
                    ?>
                </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="changescript">Change Subject</button>
      </div>
    </div>
  </div>
</div>






