@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="flash-message">
			@foreach(['danger', 'warning', 'success', 'info'] as $message)
				@if(Session::has('alert-'. $message))
					<p class="alert alert-{{ $message }}">{{ Session::get('alert-'. $message) }} <a href="#" class="close" data-dismiss="alert" arial-lebel="close">&times;</a> </p>
				@endif
			@endforeach
		</div>
		{{-- @if(Session::has('message'))
			<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
		@endif --}}

		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-info">
				<div class="panel-heading text-center"><h3>User List</h3></div>

				<div class="panel-body">
					<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr class="success">
								<th>SL</th>
								<th>Name</th>
								<th>Email</th>
								<th>Role</th>
								<th>Phone Number</th>
								<th>Address</th>
								{{-- <th>Status</th> --}}
								@if(Auth::user()->role != 'user')
								<th>Actions</th>
								@endif
								{{-- @can('ticket_admin-access')
								<th>Edit</th>
                    			@endcan
							</tr> --}}
						</thead>
						<tbody>
						@foreach($users as $user)
							<?php
								if ($user->role == 'super_admin') {
									$role = "Super Admin";
								} else if ($user->role == 'ticket_admin') {
									$role = "Ticket Admin";
								} else {
									$role = "User";
								}
							?>	
							<tr>
								<td>{{ $user->id }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $role }}</td>
								<td>{{ $user->phone_number }}</td>
								<td>{{ $user->address }}</td>
								{{-- @if($user->status){
									<td>Active</td>
								}
								@else{
									<td>Inctive</td>
								}
								@endif --}}

								@if(Auth::user()->role != 'user')
                                <td class="text-center">
                                        <a class="btn btn-raised btn-primary btn-sm" href='{{"user/$user->id/edit"}}'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        &nbsp;
                                        &nbsp;
											{{-- {!! Form::open(['route' => ['/user.destroy', $user->id], 'method' => 'DELETE', 'style'=>'width:10%; margin:0; padding:0', 'onclick'=>"return confirm('Are you sure you want to delete this item?');" ]) !!}
											<button type="submit" class="btn btn-raised btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
											{!! Form::close() !!} --}}

										<form method="POST" id="delete-form-{{ $user->id }}" action='{{"user/$user->id"}}' style="display:none;">
												{{ csrf_field() }}
												{{ method_field('delete') }}

											</form>
											<button onclick="if(confirm('Are You sure, you want to delete?')){
													event.preventDefault();
													document.getElementById('delete-form-{{ $user->id }}').submit();
											}else {
												event.preventDefault
											}" class="btn btn-raised btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
								</td>
								@endif
							</tr>
						@endforeach	
						</tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection