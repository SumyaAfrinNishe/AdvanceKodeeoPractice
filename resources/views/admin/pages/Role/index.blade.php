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
		<h2>Role List</h2>
	  </div>
	  
	  <br>
	  <a href="{{route('role.add')}}" class="btn btn-primary" type="button">Create New Role</a>
	  <table id="customers">
		<tr>
		<th scope="row">SL No</th>
		<th>Name</th>
		<th>Status</th>
		<th>Permissions</th>
		<th>Action</th>
		</tr>
		

@foreach($roles as $key=>$role)  
     
		<tr>
		  <th scope="row">{{$key+1}}</th>
		  
			<td>{{$role->role_name}}</td>
            <td>{{$role->status}}</td>
			<td>
            @foreach($role->permissions as $data)
                <p class="badge badge-success">{{$data->permission->name}}</p>
                @endforeach
            </td>
			<td>
			<a class="btn btn-primary" href="{{route('permission.assign.form',$role->id)}}"><i class="fas fa-eye"></i>
                Assign Permission</a>
            <a href="{{route('role.delete',$role->id)}}"><i class="fa-solid fa-trash"></i></a>
			</td>
			
		  </tr>
		  @endforeach
	
	  </table>

    
@endsection

