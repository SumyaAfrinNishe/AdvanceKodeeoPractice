@extends('admin.master')
@section('content')


<style>
	body{
	 
	   background: linear-gradient(to left, #ccccff 45%, #ccffff 95%);
   
	}
	 #customers {
	   font-family: Arial, Helvetica, sans-serif;
	   border-collapse: collapse;
	   width: 100%;
	 }
	 .heading h2{
	   text-align: center;
	 }
	 #customers td, #customers th {
	   border: 1px solid #ddd;
	   padding: 8px;
	 }
	 
	 #customers tr:nth-child(even){background-color: #ccccff;}
	 
	 #customers tr:hover {background-color: #ddd;}
	 
	
	 #customers th {
		padding-top: 12px;
		padding-bottom: 12px;
		text-align: left;
		background-color: #001313;
		color: white;
	  }
	 </style>


     <div class="heading">
		<h2>User List</h2>
	  </div>
	  
	  <br>
	  <a href="{{route('user.add')}}" class="btn btn-primary" type="button">Create New User</a>
	  <table id="customers">
		<tr>
		<th scope="row">SL No</th>
		<th>Name</th>
		<th>Role</th>
		<th>Action</th>
		</tr>
		

@foreach($users as $key=>$user)  
     
		<tr>
		  <th scope="row">{{$key+1}}</th>
			<td>{{$user->user_name}}</td>
            <td>{{$user->role->role_name}}</td>
			<td>
            <a href="{{route('user.delete',$user->id)}}"><i class="fa-solid fa-trash"></i></a>
			</td>
			
		  </tr>
		  @endforeach
	
	  </table>

    
@endsection

