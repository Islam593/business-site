@extends('admin.layouts.app')
@section('page-name', 'Blog Post Make')

@section('main')
<div class="content container-fluid">
					
					<!-- Page Header -->
					@include('page-header')

					<!-- /Page Header -->

					<div class="row">
						<a class="btn btn-primary" href="{{ route('post.create')}}">Add new Post</a>
						<div class="col-lg-12"><br>
							@include('validate')
							
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Post Information</h4>
									<a class="badge badge-info" href="{{ route('user.index')}}">Published</a>
									<a class="badge badge-danger" href="{{ route('user.trash.all')}}">Trash</a>
								</div>

								<div class="card-body">
									<div class="table-responsive">
										<table id="post" class="table mb-0">
											<thead>
												<tr>
													<th>#</th>
													<th>Title</th>
													
													<th>Type</th>
													<th>Date</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												
                                              @forelse($all_data as $data)
												  
											 
												
													
												
												<tr>
													<td>{{ $loop->index +1}}</td>
													<td>{{ Str::of($data-> title)->limit(25) }}</td>
													<td>
														@php
															$featured = json_decode($data-> featured);
															echo $featured-> post_type; 
														@endphp 
													</td>
													<td>{{ $data-> created_at-> diffForHumans()}}</td>
													{{--date('M d,Y', strtotime($data-> created_at))--}}
													
                                                     
													
													<td>
														@if($data -> status == true)
															
														<span class="badge badge-success">Published</span>
														@else
														<span class="badge badge-danger">Unpublished</span>
														@endif
													</td>

													
													<td>
														
														
														@if($data -> status == true)
															
														<a class="btn btn-success" href="{{ route('post.status', $data-> id)}}"><i class="fe fe-eye">
														</i></a>
														@else
														<a class="btn btn-success" href="{{ route('post.status', $data-> id)}}"><i class="fe fe-eye-off">
														</i></a>
														@endif

													<a class="btn btn-info" href="{{ route('post.edit', $data-> id)}}"><i class="fe fe-pencil">
													</i></a>
													<form class="d-inline" action="{{ route('post.destroy', $data-> id)}}" method="POST">
														@csrf
														@method('DELETE')

                                                  <button class="btn btn-danger"><i class="fe fe-trash">
												</i></button>

													</form>
													
			
													</td>

												</tr>
												@empty
												<tr>
													<td class="text-center text-danger" colspan="5">No post found</td>
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

				

  
  

@endsection()
