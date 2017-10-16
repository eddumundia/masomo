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
                            <th>email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody> 
                         @foreach($records as $student)
                         <tr>
                             <td>{{$student->name}}</td>
                             <td>{{$student->mobile}}</td>
                             <td>{{$student->email}}</td>
                             <td>{{$student->email}}</td>
                             <td></td>
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