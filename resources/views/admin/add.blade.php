@extends('admin.index')
@section('content')
<div id="add">
	
    <div class="row">
    	<div class="col-sm-6">
        	
            @if(isset($message))
                    <div class="alert alert-danger">{{$message}}</div>
            @endif

            @if(isset($error))
                @foreach($error as $val)
                    <div class="alert alert-danger">{{$val}}</div>
                @endforeach
            @endif
        	<form method="post">

                {{csrf_field()}}
            	<div class="form-group">
                	<label>Fullname</label>
                    <input type="text" name="full" class="form-control" placeholder="Fullname" required />
                </div>
                <div class="form-group">
                	<label>Username</label>
                    <input type="text" name="user" class="form-control" placeholder="Username" required />
                </div>
                <div class="form-group">
                	<label>Password</label>
                    <input type="password" name="pass" class="form-control" placeholder="Password" required />
                </div>
                <div class="form-group">
                	<label>Email</label>
                    <input type="text" name="mail" class="form-control" placeholder="Email" required />
                </div>
                <div class="form-group">
                	<label>Level</label>
                    <select name="level" class="form-control">
                    	<option value="1">Admin</option>
                        <option value="2">Mod</option>
                        <option value="3" selected="selected">User</option>
                    </select>
                </div>
                <input type="submit" name="submit" value="Thêm mới" class="btn btn-primary" />
            </form>
        </div>
 </div>
@endsection