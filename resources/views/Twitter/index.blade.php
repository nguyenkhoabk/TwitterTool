@extends('layouts.master')
@section('content')
	<div class="container">
		<div class="row">
			<form action="{{route('store_hashtag')}}" method="POST" role="form" class="form-horizontal" data-parsley-validate>
			{{csrf_field()}}
				<h2 class="text-center"> Collecting Hashtag Form </h2>
				<div class="form-group">
					<label for="hashtag" class="col-sm-3 control-label">Hashtag :</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="hashtag" placeholder="Input field" data-parsley-required name="hashtag">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2 col-sm-offset-3">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection