@extends('admin.layouts.app')

@section('main')
<div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Welcome {{$all_data-> name}} </h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Dashboard</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<div class="container">
						<div class="row justify-content-center">
							<div class="col-md-8">
								<div class="card">
					
									<div class="card-body">
										
								<h1>Name</h1>
								<h2>{{$all_data-> name}} Profile</h2>
								   <table class="table">

									   
										   
									   
									<tr>
										<td>Name</td>
										<td>{{$all_data -> name}}</td>
									</tr>
									<tr>
										<td>Email</td>
										<td>{{$all_data -> email}}</td>
									</tr>
					
									<tr>
										<td>Cell</td>
										<td>{{$all_data -> cell}}</td>
									</tr>
									<tr>
										<td>Location</td>
										<td>{{$all_data -> location}}</td>
									</tr>
									
									<tr>
										<td>Gender</td>
										<td>{{$all_data -> gender}}</td>
									</tr>
									<tr>
										<td>Status</td>
										<td>Active</td>
									</tr>
									<tr>
										<td>Photo</td>
										<td><img src="{{ URL::to('public/media/users/'.$all_data-> photo)}}" alt=""></td>
									</tr>
								
					
					
								   </table>
									
					
									</div>
								</div>
							</div>
						</div>
					</div>

					
					
				</div>



@endsection()