<!--users start-->
@extends('layouts.admin')
@section('content')
<div class="panel"><table class="table table-striped title1">
<tr>
<td><b>S.N.</b></td>
<td><b>Name</b></td>
<td><b>Gender</b></td>
<td><b>Email</b></td>
<td><b>Mobile</b>
</td><td></td>
</tr>
@php
$i=1;
@endphp
@foreach ($users as $user)
<tr>
<td>{{$i++}}</td>
<td>{{$user->name}}</td>
<td>{{$user->gender}}</td>
<td>{{$user->email}}</td>
<td>{{$user->mob}}</td>

<td><a title="Delete User" href="update.php?demail='.$email.'"><b><span class="glyphicon glyphicon-trash" style="color:red;" aria-hidden="true"></span></b></a></td>
</tr>
@endforeach

</table></div>

<!--user end-->

@endsection