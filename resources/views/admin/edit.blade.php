@extends('admin.index')
@section('content')
<div id="edit">

    <div class="row">
    	<div class="col-sm-6">
        	

            @if(isset($message))
                @foreach($message as $val)
                    <div class="alert alert-danger">{{$val}}</div>
                @endforeach
            @endif

             @if(isset($error))
                    <div class="alert alert-danger">{{$error}}</div>
            @endif
        	<form method="post">

                {{csrf_field()}}
            	<div class="form-group">
                	<label>Fullname</label>
                    <input type="text" name="full" class="form-control" placeholder="Fullname" value="{{$user->user_full}}" required />
                </div>
                <div class="form-group">
                	<label>Username</label>
                    <input type="text" name="user" class="form-control" placeholder="Username" value="{{$user->user_name}}" required />
                </div>
                <div class="form-group">
                	<label>Password</label>
                    <input type="password" name="pass" class="form-control" placeholder="Password" value="{{$user->user_pass}}" required />
                </div>
                <div class="form-group">
                	<label>Email</label>
                    <input type="text" name="mail" class="form-control" placeholder="Email"  value="{{$user->user_mail}}" required />
                </div>
                <div class="form-group">
                	<label>Level</label>
                    <select name="level" class="form-control">
                    	<option value=1 @if($user->user_level==1) selected @endif >Admin</option>
                        <option value=2 @if($user->user_level==2) selected @endif>Mod</option>
                        <option value=3 @if($user->user_level==3) selected @endif>User</option>
                    </select>
                </div>
                <input type="submit" name="submit" value="Sửa" class="btn btn-primary" />
            </form>
        </div>
</div>
@endsection