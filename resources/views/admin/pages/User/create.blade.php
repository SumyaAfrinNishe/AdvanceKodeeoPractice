@extends('admin.master')

@section('content')

    <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name <span style="color:red">*</span> : </label>
            <input name="user_name" required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter User Name">
        </div>
        <div class="form-group">
            <label for="user_role">Select Role <span style="color:red">*</span></label>
            <select name="user_role" id="user_role" class="form-control" required>
                @foreach($roles as $user)
                <option value="{{$user->id}}">{{$user->role_name}}</option>
                    @endforeach
            </select>
             </div>


        <div class="form-group">
            <div class="form-group">
                <label for="user_email">Email <span style="color:red">*</span>:</label>
                <input  name="user_email" required type="email" class="form-control" id="user_email" placeholder="Enter User Email">
            </div>
        </div>

        <div class="form-group">
            <div class="form-group">
                <label for="user_password">Password <span style="color:red">*</span>:</label>
                <input name="user_password" required type="password" class="form-control" id="user_password" placeholder="Enter User password">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
