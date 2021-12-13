@extends('admin.layouts.app')
@section('page-name', 'Role management')

@section('main')
<div class="content container-fluid">
					
					<!-- Page Header -->
					@include('page-header')

					<!-- /Page Header -->

					<div class="row">
						<a class="btn btn-primary" data-toggle="modal" href="#add_user">Add new Role</a>
						<div class="col-lg-12"><br>
							@include('validate')
							
							@if(Session::has('success'))
							<p class="alert alert-success">{{ Session::get('success')}}
								<button class="close" data-dismiss="alert">&times;</button>
							</p>
							
								
							@endif
							<br>
							<br>
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Role Data</h4>
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
													<th>Slug</th>
													<th>Permissions</th>
													<th>User List</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
                                              @foreach($all_data as $data)
												  
											 
												
													
												
												<tr>
													<td>{{ $loop->index +1}}</td>
													<td>{{ $data-> name }}</td>
													<td>{{ $data-> slug }}</td>
													<td>
                                                     @if($data-> permission != NULL)
													 <ul style="list-style: none;">
														@foreach(json_decode($data -> permission) as $per)
															<li><i class="fe fe-plus">{{ $per }}</i></li>
														@endforeach
													</ul>

													 @endif
													 <td>

														<ul>
															@foreach($data-> users as $user)
															@if(isset($user -> name))
																
															
															<li>

                                                             {{ $user -> name}}
															</li>
															@endif
															@endforeach
														</ul>
													 </td>



													</td>
													
													
													<td>
														<div class="status-toggle">
															<input type="checkbox" id="status_1" class="check" checked="">
															<label for="status_1" class="checktoggle">checkbox</label>
														</div>
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
		<form action="{{ route('role.store')}}" method="POST">
			@csrf
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Add new Role</h5>
		  


		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">

		

          <div class="form-group">
			<label for="">Role Name</label>
          <input name="name" class="form-control" type="text" placeholder="Role Name">
		  

		  </div>
		  
		  <div class="form-group">
			<label for="">Add Permissions</label>
          <hr>
		  <input name="permission[]" type="checkbox" value="Admin" id="Admin"><label for="Admin">Admin</label>
          <br>
		  <input name="permission[]" type="checkbox" value="Editor" id="Editor"><label for="Editor">Editor</label>
		  <br>
		  <input name="permission[]" type="checkbox" value="Author" id="Author"><label for="Author">Author</label>
		  <br>
		  <input name="permission[]" type="checkbox" value="Staff" id="Staff"><label for="Staff">Staff</label>
		  <br>
		  <input name="permission[]" type="checkbox" value="Student" id="Student"><label for="Staff">Student</label>
		  

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
