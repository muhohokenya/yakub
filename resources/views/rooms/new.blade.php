@extends('centaur.layout')
@section('title', 'New Room')

@section('content')
<div class="page-header">
  <h1>Add New Room</h1>
</div>



	<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 "> 
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">room Panel</h3>
				</div>
				<div class="panel-body">
					{!! Form::open(['method' => 'POST', 'url' => 'rooms/save', 'class' => '']) !!}
					
					    <div class="form-group{{ $errors->has('room') ? ' has-error' : '' }}">
					        {!! Form::label('room', 'room number') !!}
					        {!! Form::text('room', null, ['class' => 'form-control']) !!}
					        <small class="text-danger">{{ $errors->first('room') }}</small>
					    </div>

					    <div class="form-group{{ $errors->has('charges') ? ' has-error' : '' }}">
					        {!! Form::label('charges', 'room charges') !!}
					        {!! Form::text('charges', null, ['class' => 'form-control']) !!}
					        <small class="text-danger">{{ $errors->first('charges') }}</small>
					    </div>

					    <div class="checkbox">
							@foreach($services as $service)
							 <label>
								<input name="services[]" type="checkbox" value="{{ $service->id }}">
								{{ $service->name }}
							</label>
							@endforeach
						</div>

					     
					
					    <div class="btn-group pull-left">
					        
					        {!! Form::submit("Save", ['class' => 'btn btn-success']) !!}
					    </div>
					

					
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div

@stop