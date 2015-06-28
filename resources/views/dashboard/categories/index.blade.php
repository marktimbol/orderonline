@extends('layouts.admin')

@section('content')
	
	<h1>Categories</h1>
		
	<table class="table table-bordered" border="0">
		<thead>
			<tr>
				<th>Name</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Category Name</td>
				<td><a href="#">Edit</a> | <a href="#">Delete</a></td> 
			</tr>
		</tbody>
	</table>
@endsection