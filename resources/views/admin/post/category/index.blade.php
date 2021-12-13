@extends('admin.layouts.app')
@section('page-name', 'Blog Category')

@section('main')
<div class="content container-fluid">
					
					<!-- Page Header -->
					@include('page-header')

					<!-- /Page Header -->

					<div class="row">
						<a class="btn btn-primary" data-toggle="modal" href="#cat_modal">Add new Category</a>
						<div class="col-lg-12"><br>
							@include('validate')
							
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Category Data</h4>
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
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												
                                              @forelse($all_data as $data)
												  
											 
												
													
												
												<tr>
													<td>{{ $loop->index +1}}</td>
													<td>{{ $data-> name }}</td>
													<td>{{ $data-> slug }}</td>
													
                                                     
													
													<td>
														@if($data -> status == true)
															
														<span class="badge badge-success">Published</span>
														@else
														<span class="badge badge-danger">Unpublished</span>
														@endif
													</td>

													
													<td>
														
														
														@if($data -> status == true)
															
														<a class="btn btn-success" href="{{ route('cat.status', $data-> id)}}"><i class="fe fe-eye">
														</i></a>
														@else
														<a class="btn btn-success" href="{{ route('cat.status', $data-> id)}}"><i class="fe fe-eye-off">
														</i></a>
														@endif

													<a class="btn btn-info" href="#"><i class="fe fe-pencil">
													</i></a>
													
													<a class="btn btn-danger" href="#">
														<i class="fe fe-trash">
															</i></a>
													</td>

												</tr>
												@empty
												<tr>
													<td class="text-center text-danger" colspan="5">No category found</td>
												</tr>	
												
												@endforelse
												
												
												

												
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						
					</div>

					
					
				</div>

				

  
  <!-- Modal -->
  <div id="cat_modal" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
	  <div class="modal-content">
		<form action="{{ route('category.store')}}" method="POST">
			@csrf
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Add new Category</h5>
		  


		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">

		

          <div class="form-group">
			<label for="">Category Name</label>
          <input name="name" class="form-control" type="text" placeholder="Category Name">
		  

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
