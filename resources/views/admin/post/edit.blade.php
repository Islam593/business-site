@extends('admin.layouts.app')
@section('page-name', 'Blog post Edit')
@section('main')
<div class="content container-fluid">
	
	@include('page-header')	
	@include('validate')
	<form action="{{ route('post.store')}}" method="POST" enctype="multipart/form-data">			
		@csrf
					<div class="row">
						<div class="col-xl-8 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<h4 class="card-title">Edit Post</h4>
								</div>
								<div class="card-body">
									
										
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Title</label>
											<div class="col-lg-9">
												<input name='title' value="{{ $post-> title}}" type="text" class="form-control">
											</div>
										</div>

										
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Post Type

											</label>

											<div class="col-lg-9">
												
												<select class="form-control" name="ptype" id="post-type">
                                                   
													<option value="">--Select--</option>
													<option style="width: 480px;" value="Standard">Standard</option>
													<option value="Gallery">Gallery</option>
													<option value="Video">Video</option>
													<option style="width: 500px; height:300px;" value="Audio">Audio</option>
													<option value="Quotation">Quotation</option>
												</select>
											
											</div>
											<div class="post-type-area">



											</div>
										</div>
										
									
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Content</label>
											<div class="col-lg-10">
												<textarea id="posteditor" class="form-control" name="content" id="">{{ $post-> content}}
												</textarea>
											</div>
										</div>
										
										
										
										
										
										<div class="text-right">
											<button type="submit" class="btn btn-primary">Submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="col-xl-4 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<h4 class="card-title">Category and tags</h4>
								</div>
								<div class="card-body cat-list">

									<style>

                                     .cat-list li{

										list-style-type: none;
									 }

									</style>
									
										<h6>Select Categories</h6>
										<hr>
										<ul style="padding: 0px;">

											@forelse($cats as $cat)
											<li><input name="pcat[]" @if(in_array($cat->id, $cat_arr))checked @endif type="checkbox" value="{{$cat -> id}}" id="{{$cat -> name}}"><label for="{{$cat -> name}}">{{$cat -> name}}</label></li>	
											@empty
											<li>No categories found</li>
												
											@endforelse
										</ul>

										<h6>Select tags</h6>
										<hr>
										<select class="form-control post-tags" name="ptag[]" id=""name="tag[]" multiple="multiple" >
                                          @foreach($tags as $tag)

											
                                      <option @if(in_array($tag->id, $tag_arr)) selected @endif value="{{ $tag-> id}}">{{ $tag-> name}}</option>
									  @endforeach
										</select>
								</div>
							</div>
						</div>
						
					</div>
				
					
					
				</div>



@endsection()