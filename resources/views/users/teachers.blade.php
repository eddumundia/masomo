@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>
        <div class="panel-body">
            <div class="row">
                 @include('layouts.sidemenu')
                 <div class="col-lg-10">
                    <table id="example" class="display table table-condensed table-responsive" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Class</th>
                            <th>subject</th>
                            <th>email</th>
                        </tr>
                    </thead>
                    <tbody> 
                         @foreach($records as $teacher)
                        <tr>
                            <td><a href="teacherprofile/{{$teacher->id}}">{{$teacher->name}}</a></td>
                             <td>{{$teacher->mobile}}</td>
                             <td>{{$teacher->section->class}}</td>
                             <td>{{$teacher->subject->subject_name}}</td>
                             <td>{{$teacher->email}}</td>
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