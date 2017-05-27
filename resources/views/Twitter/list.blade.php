@extends('layouts.master')
@section('content')
	<div class="container">
		<div class="row">
			<h2 class="text-center"> List Twitter Account</h2>
			<table class="table">
			  <thead>
			    <tr>
			      <th>ID</th>
			      <th>Hashtag Name</th>
			      <th>Status</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach ($hashtag as $ht)
			    <tr>
			      <td>{{$ht->id}}</td>
			      <td>{{$ht->hashtag_name}}</td>
			      <td>
			      	@if ($ht->release_flag === 0)
					    Unpublish
					@else
					   Release
					@endif
			      </td>
			    </tr>
			   @endforeach
			  </tbody>
			</table>
		</div>
		<div class="row">
			{{ $hashtag->links() }}
		</div>
		<div class="row">
			<a href="{{route('add_hashtag')}}" "">Add Hashtag</a>

		</div>
	</div>
@endsection