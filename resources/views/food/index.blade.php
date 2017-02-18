@extends('centaur.layout')
@section('title', 'Food')
@section('content')
	<div class="page-header">
	  <h3>Foods <small><a class="btn btn-link" href="{{ url('/foods/new') }}">Add New</a></small></h3>
	</div>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">foods</h3>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-hover table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th>Food Name</th>
						<th>Food Cost</th>
					</tr>
				</thead>
				<tbody>
				  @foreach($foods as $food)
                     <tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $food->food }}</td>
						<td>{{ $food->cost }}</td>
					</tr>
				  @endforeach
					
				</tbody>
			</table>
		</div>
	</div>
@stop
