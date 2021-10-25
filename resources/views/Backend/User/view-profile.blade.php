@extends('Backend.master')
@section('profile')
    active
@endsection
@section('y_profile')
    active
@endsection
@section('title')
    {{ "View Profile" }}
@endsection
@section('content')
<div class="content-wrapper" style="min-height: 978.8px;">
    <div class="container-full">
        <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">User Table</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item" aria-current="page">Dashboard</li>
								<li class="breadcrumb-item active" aria-current="page">View Profile</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
        <section class="content">
            <div class="row">
                <div class="col-xl-8 m-auto">
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-black">
                          <h3 class="widget-user-username">User Name : {{ $profile->name }}</h3>
                          <a href="{{ route('profileEdit') }}" style="float: right" class="btn btn-rounded btn-success mb-5">Edit Profile</a>
                          <h6 class="widget-user-desc">User Email : {{ $profile->email }}</h6>
                          <h6 class="widget-user-desc">Role : {{ $profile->user_type }}</h6>
                        </div>
                        <div class="widget-user-image">
                          <img class="rounded-circle" src="{{ (!empty($profile->image))?asset('upload/user_img/'.$profile->image):asset('upload/no_image.jpg') }}" alt="User Avatar">
                        </div>
                        <div class="box-footer">
                          <div class="row">
                            <div class="col-sm-4">
                              <div class="description-block">
                                <h5 class="description-header">Mobile</h5>
                                <span class="description-text">{{ $profile->mobile }}</span>
                              </div>
                              <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 br-1 bl-1">
                              <div class="description-block">
                                <h5 class="description-header">Address</h5>
                                <span class="description-text">{{ $profile->address }}</span>
                              </div>
                              <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                              <div class="description-block">
                                <h5 class="description-header">Gender</h5>
                                <span class="description-text">{{ $profile->gender }}</span>
                              </div>
                              <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                      </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection