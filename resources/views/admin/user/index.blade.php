@extends('admin.layouts.app')
@section('page-name', 'user management')

@section('main')
<div class="content container-fluid">
					
					<!-- Page Header -->
					@include('page-header')

					<!-- /Page Header -->

					<div class="row">
						<a class="btn btn-primary" data-toggle="modal" href="#add_user">Add new User</a>
						<div class="col-lg-12"><br>

							@if(Session::has('success'))
							<p class="alert alert-success">{{ Session::get('success')}}
								<button class="close" data-dismiss="alert">&times;</button>
							</p>
							
								
							@endif
							<br>
							<br>
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Users Data</h4>
									<a class="badge badge-info" href="{{ route('user.index')}}">Published</a>
									<a class="badge badge-danger" href="{{ route('user.trash.all')}}">Trash</a>
								</div>

								<div class="card-body">
									<div class="table-responsive">
										<table class="table mb-0">
											<thead>
												<tr>
													<th>#</th>
													<th>Name</th>
													<th>Email</th>
													<th>Cell</th>
													<th>Role</th>
													<th>Gender</th>
													<th>Status</th>
													<th>Photo</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
                                              @foreach($all_data as $data)
												  
											 
												
													
												
												<tr>
													<td>{{ $loop->index +1}}</td>
													<td>{{ $data-> name }}</td>
													<td>{{ $data-> email }}</td>
													<td>{{ $data-> cell }}</td>
													<td>{{ $data-> role -> name }}</td>
													<td>{{ $data-> gender }}</td>
													
													<td>
														<div class="status-toggle">
															<input type="checkbox" id="status_1" class="check" checked="">
															<label for="status_1" class="checktoggle">checkbox</label>
														</div>
													</td>

													<td>
														@if($data-> photo!== NULL)
														<img style="width:50px; height=50px; display=block;" src="{{ URL::to('media/users/')}}/{{$data-> photo}}" 
														alt="">
														@else
														<img style="width:50px; height=50px; display=block;" src="admin/img/avatar-male.jpg" 
														alt="">
														@endif

													</td>
													<td>
														<a class="btn btn-success" href="{{route('user.show', $data -> id)}}"><i class="fe fe-eye">
														</i></a>

													<a class="btn btn-info" href="{{ route('user.edit', $data -> id)}}"><i class="fe fe-pencil">
													</i></a>
													
													<a class="btn btn-danger" href="{{ route('user.trash', $data -> id)}}">
														<i class="fe fe-trash">
															</i></a>
													</td>

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

				

  
  <!-- Modal -->
  <div id="add_user" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
	  <div class="modal-content">
		<form action="{{ route('user.store')}}" method="POST">
			@csrf
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Add new user</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">

		

          <div class="form-group">
			<label for="">Name</label>
          <input name="name" class="form-control" type="text" placeholder="User Name">
		  

		  </div>
		  <div class="form-group">
          <label for="">Email</label>
			<input name="email" class="form-control" type="text" placeholder="Email">
			
  
			</div>

			
			<div class="form-group">
				<label for="">Password</label>
				<input name="password" class="form-control" type="text" value="{{ $randpass}}" placeholder="Password">
				
	  
				</div>
				<div class="form-group">
					<label for="">Photo</label>
					<input name="photo" type="file">
					
		  
					</div>
				<div class="form-group">
					<label class="" for="">Role</label>
			<select class="form-control" name="role" id="">
				<option value="">-Select-</option>

                 @foreach($roles as $role)
					 
				 
				<option value="{{$role ->id }}">{{ $role ->name}}</option>
				@endforeach
				

			</select>
					</div>
		
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  <button type="submit" class="btn btn-primary">Save Changes</button>
		</div>
	</form>
	  </div>
	</div>
  </div>

@endsection()
