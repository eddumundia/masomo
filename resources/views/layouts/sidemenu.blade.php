<div class="col-lg-2">
    <ul class="list-group">
        <?php if(\Auth::user()->role_id == 3  || \Auth::user()->role_id == 4 || \Auth::user()->role_id == 5 ){?>
          <li class="list-group-item"><a href="{!!url('home')!!}"><i class="fa fa-user" aria-hidden="true"></i> Dashboard <i class="glyphicon glyphicon-chevron-right"></i></a></li>
          <li class="list-group-item"><a href="{!!url('users/profile')!!}"><i class="fa fa-user" aria-hidden="true"></i> Profile<i class="glyphicon glyphicon-chevron-right"></i></a></li>
            
          <li class="list-group-item"><a href="{!!url('message')!!}"><i class="fa fa-money" aria-hidden="true"></i> SMS<i class="glyphicon glyphicon-chevron-right"></i></a></li>
            <li class="list-group-item"><a href="{!!url('question')!!}"><i class="fa fa-question" aria-hidden="true"></i> Questions <i class="glyphicon glyphicon-chevron-right"></i></a></li>
            <li class="list-group-item"><a href="{!!url('users/students')!!}"><i class="fa fa-users" aria-hidden="true"></i> Students <i class="glyphicon glyphicon-chevron-right"></i></a></li>
            <li class="list-group-item"><a href="{!!url('users/parents')!!}"><i class="fa fa-users" aria-hidden="true"></i> Parents <i class="glyphicon glyphicon-chevron-right"></i></a></li>
            <li class="list-group-item"><a href=""><i class="fa fa-percent" aria-hidden="true"></i> Results <i class="glyphicon glyphicon-chevron-right"></i></a></li>
            <li class="list-group-item"><a href="{!!url('users/clerks')!!}"><i class="fa fa-users" aria-hidden="true"></i> Data clerks <i class="glyphicon glyphicon-chevron-right"></i></a></li>
            <li class="list-group-item"><a href="{!!url('users/staff')!!}"><i class="fa fa-users" aria-hidden="true"></i> Teachers <i class="glyphicon glyphicon-chevron-right"></i></a></li>
            <li class="list-group-item"><a href="{!!url('users/settings')!!}"><i class="fa fa-cog" aria-hidden="true"></i> Settings <i class="glyphicon glyphicon-chevron-right"></i></a></li>
        <?php }else{?>
            <li class="list-group-item"><a href="{!!url('users/profile')!!}"><i class="fa fa-user" aria-hidden="true"></i> Profile<i class="glyphicon glyphicon-chevron-right"></i></a></li>
            <li class="list-group-item"><a href=""><i class="fa fa-percent" aria-hidden="true"></i> Results <i class="glyphicon glyphicon-chevron-right"></i></a></li>
            
        <?php }?> 
    </ul>
</div>

<!--<div class="col-lg-2">
    <ul class="list-group">
        <li class="list-group-item"><a href=""><i class="fa fa-user" aria-hidden="true"></i> User Profile <i class="glyphicon glyphicon-chevron-right"></i></a></li>
        <li class="list-group-item"><a href="{!!url('payment')!!}/{{\Auth::user()->id}}"><i class="fa fa-money" aria-hidden="true"></i> My balance <i class="glyphicon glyphicon-chevron-right"></i></a></li>
        <li class="list-group-item"><a href=""><i class="fa fa-sort-amount-desc" aria-hidden="true"></i> Withdrawals <i class="glyphicon glyphicon-chevron-right"></i></a></li>
        <li class="list-group-item"><a href="">My questions <i class="glyphicon glyphicon-chevron-right"></i></a></li>
        <li class="list-group-item"><a href="">Subscribers <i class="glyphicon glyphicon-chevron-right"></i></a></li>
    </ul>
</div>-->