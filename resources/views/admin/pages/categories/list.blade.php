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
		<h2>Category List</h2>
	  </div>
	  
	  <br>
	  <a href="{{route('category.create')}}" class="btn btn-primary" type="button">Create New Category</a>
	  <table id="customers">
		<tr>
		  <th>SL No</th>
		  <th>Name</th>
		  <th>Details</th>
		  <th>Parent Name </th>
		  <th>Image</th>
		  <th>Status</th>
		  <th>Action</th>
	  
		</tr>
		@foreach ($categories as $key=>$category)   
     
		<tr>
		  <th scope="row">{{$key+1}}</th>
			<td>{{$category->name}}</td>
			<td>{{$category->details}}</td>
			<td>{{$category->parent_id}}</td>
			<td>{{$category->image}}</td>
			<td>#</td>
			<td><a href="{{route('category.edit',$category->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
				<a href="{{route('category.delete',$category->id)}}"><i class="fa-solid fa-trash"></i></a>
			</td>
			
		  </tr>
		  @endforeach
	
	  </table>

{{ $categories->links() }}
    
@endsection