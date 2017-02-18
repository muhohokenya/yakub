@extends('centaur.layout')
@section('title', 'New Food')
@section('content')
<div class="page-header">
  <h3>Add new</h3>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-lg-offset-3"> 
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Food Panel</h3>
				</div>
				<div class="panel-body">
					{!! Form::open(['method' => 'POST', 'url' => 'foods/save', 'class' => '']) !!}
					
					    <div class="form-group{{ $errors->has('food') ? ' has-error' : '' }}">
					        {!! Form::label('food', 'Food name') !!}
					        {!! Form::text('food', null, ['class' => 'form-control']) !!}
					        <small class="text-danger">{{ $errors->first('food') }}</small>
					    </div>

					     <div class="form-group{{ $errors->has('cost') ? ' has-error' : '' }}">
					        {!! Form::label('cost', 'Cost') !!}
					        {!! Form::text('cost', null, ['class' => 'form-control']) !!}
					        <small class="text-danger">{{ $errors->first('cost') }}</small>
					    </div>
					
					    <div class="btn-group pull-left">
					        
					        {!! Form::submit("Add", ['class' => 'btn btn-success']) !!}
					    </div>
					
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@stop

