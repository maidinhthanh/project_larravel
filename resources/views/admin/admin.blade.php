@extends('admin.index')
@section('content')
<div id="admin">
    <div class="row">
    	<div class="col-sm-12">

            @if(Session::has('alert'))
        	   <div class="alert alert-success">{{Session('alert')}}</div>
            @endif

            @if(Session::has('alertok'))
                <div class="alert alert-success">{{Session('alertok')}}</div>
            @endif

            @if(Session::has('alertdel'))
                <div class="alert alert-success">{{Session('alertdel')}}</div>
            @endif
        	<table class="table table-striped">
            	<tr id="tbl-first-row">
                	<td width="5%">Id</td>
                    <td width="30%">Fullname</td>
                    <td width="25%">Username</td>
                    <td width="25%">Email</td>
                    <td width="5%">Level</td>
                    <td width="5%">Edit</td>
                    <td width="5%">Delete</td>
                </tr>
                @if(isset($users))
                @foreach($users as $user)
                  <tr>
                    <td>{{$user->user_id}}</td>
                    <td>{{$user->user_full}}</td>
                    <td>{{$user->user_name}}</td>
                    <td>{{$user->user_mail}}</td>
                    <td>{{$user->user_level}}</td>
                    <td><a href="{{asset('/edit/'.$user->user_id)}}">Edit</a></td>
                    <td><a href="{{asset('/del/'.$user->user_id)}}">Delete</a></td>
                </tr>
                @endforeach
                @endif
            </table>
            
             <div aria-label="Page navigation">
                {{ $users->links() }}
            </div>
        </div>
</div>
@endsection