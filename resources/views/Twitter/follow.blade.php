@extends('layouts.master')
@section('content')
	<div class="container">
		<div class="row">
			<h2 class="text-center"> List Twitter Account</h2>
			<table class="table">
			  <thead>
			    <tr>
			      
			      <th>Account Name</th>
			      <th>Account Image</th>
			     
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach ($accounts as $account)
			    <tr>
			    
			      <td>{{$account->account_id}}</td>
			      <td><img src = '{{$account->account_info}}'/></td>
			    
			    </tr>
			   @endforeach
			  </tbody>
			</table>
		</div>
		<div class="row">
			{{ $accounts->links() }}
		</div>
	</div>
@endsection