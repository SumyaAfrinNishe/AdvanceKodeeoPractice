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
	  <a href="{{route('add.cloth')}}" class="btn btn-primary" type="button">Create New Cloth</a>
	  <table id="customers">
		<tr>
		<th scope="row">SL No</th>
		<th>Image</th>
		<th>Name</th>
		<th>Type</th>
		<th>Color</th>
		<th>Size</th>
		<th>Action</th>
	  
		</tr>
		

@foreach($clothlists as $key=>$cloth)  
     
		<tr>
		  <th scope="row">{{$key+1}}</th>
		  <td> 
            <img src="{{url('/uploads/'.$cloth->cloth_image)}}" width="100px" alt="Cloth Image">
            </td>
			<td>{{$cloth->cloth_name}}</td>
            <td>{{$cloth->cloth_type}}</td>
			<td>{{$cloth->cloth_color}}</td>
			<td>{{$cloth->cloth_size}}</td>
			<td>
			<a href="{{route('cloth.view',$cloth->id)}}"><i class="fa-solid fa-eye"></i></a>
            <a href="{{route('cloth.edit',$cloth->id)}}"><i class="fa-solid fa-pen-to-square"></i></a>
            <a href="{{route('cloth.delete',$cloth->id)}}"><i class="fa-solid fa-trash"></i></a>
			</td>
			
		  </tr>
		  @endforeach
	
	  </table>

{{ $clothlists->links() }}
    
@endsection

