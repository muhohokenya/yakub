@extends('centaur.layout')
@section('title', 'Services')

@section('content')
<div class="page-header">
  <h2>Services <a class="btn btn-link" href="{{ url('services/new') }}">Add new Service</a></h2>
</div>

<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Services</h3>
	</div>
	<div class="panel-body">
		<table class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Service Name</th>
				</tr>
			</thead>
			<tbody>
			@foreach($services as $service)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $service->name }}</td>
				</tr>
			@endforeach
				
			</tbody>
		</table>
	</div>
</div>
@stop