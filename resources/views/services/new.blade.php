@extends('centaur.layout')
@section('title', 'Services')

@section('content')
<div class="page-header">
  <h3>Add Mew Services </h3>
</div>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-lg-offset-3"> 
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Service Panel</h3>
				</div>
				<div class="panel-body">
					{!! Form::open(['method' => 'POST', 'url' => 'services/save', 'class' => '']) !!}
					
					    <div class="form-group{{ $errors->has('service') ? ' has-error' : '' }}">
					        {!! Form::label('food', 'service name') !!}
					        {!! Form::text('service', null, ['class' => 'form-control']) !!}
					        <small class="text-danger">{{ $errors->first('service') }}</small>
					    </div>

					     
					
					    <div class="btn-group pull-left">
					        
					        {!! Form::submit("Save", ['class' => 'btn btn-success']) !!}
					    </div>
					
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>

@stop