@extends('Backend.master')
@section('profile')
    active
@endsection
@section('c_profile')
    active
@endsection
@section('title')
    {{ "Update Profile" }}
@endsection
@section('content')
<div class="content-wrapper" style="min-height: 978.8px;">
    <div class="container-full">
        <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Change Password</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('allUser') }}">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Change Password</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
        <section class="content">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">Create Users</h4>
              </div>
            <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col">
                    <form action="{{ route('passwordUpdate') }}" method="POST">
                      @csrf
                      <div class="row">
                        <div class="col-xl-8">
                          <div class="form-group">
                            <h5>Current Password <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Enter Current Password">
							  @error('current_password')
							    <div class="text-danger">
								   {{ $message }}
								</div>
							  @enderror							  
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-8">
                          <div class="form-group">
                            <h5>New Password <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="password" name="password" id="password" class="form-control" placeholder="Enter New Password">
							  @error('password')
							    <div class="text-danger">
								   {{ $message }}
								</div>
							  @enderror								  
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-8">
                          <div class="form-group">
                            <h5>Re-Type New Password<span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Re-Type New Password">
							  @error('password_confirmation')
							    <div class="text-danger">
								   {{ $message }}
								</div>
							  @enderror								  
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="text-xs-right">
                         <input type="submit" class="btn btn-rounded btn-info" value="Reset Password">
                      </div>
                    </form>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
    </div>
</div>
@endsection