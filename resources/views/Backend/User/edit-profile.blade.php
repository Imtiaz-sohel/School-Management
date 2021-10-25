@extends('Backend.master')
@section('profile')
    active
@endsection
@section('y_profile')
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
					<h3 class="page-title">Edit Profile</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('allUser') }}">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
        <section class="content">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">Edit Profile</h4>
              </div>
               <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                      <div class="col">
                        <form action="{{ route('profileUpdate') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <h5>User Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="text" name="name" value="{{ $profileEdit->name }}" class="form-control @error('name') is-inavlid @enderror" placeholder="User Name">
                                    @error('name')
                                        <div class="text-danger">
                                        {{ $message }}
                                        </div>
                                    @enderror							  
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <h5>User Email <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="email" name="email" value="{{ $profileEdit->email }}" class="form-control @error('email') is-inavlid @enderror" placeholder="User Email">
                                    @error('email')
                                        <div class="text-danger">
                                        {{ $message }}
                                        </div>
                                    @enderror							  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <h5>User Phone<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="text" name="mobile" value="{{ $profileEdit->mobile }}" class="form-control @error('mobile') is-inavlid @enderror" placeholder="Enter Phone">
                                    @error('mobile')
                                        <div class="text-danger">
                                        {{ $message }}
                                        </div>
                                    @enderror							  
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <h5>User Address <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="text" name="address" value="{{ $profileEdit->address }}" class="form-control @error('address') is-inavlid @enderror" placeholder="Enter Address">
                                    @error('address')
                                        <div class="text-danger">
                                        {{ $message }}
                                        </div>
                                    @enderror							  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <h5>Gender<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <select name="gender" id="gender" class="form-control @error('phone') is-inavlid @enderror" >
                                        <option {{ $profileEdit->gender=='male'? 'selected' : '' }} value="male">Male</option>
                                        <option {{ $profileEdit->gender=='female'? 'selected' : '' }} value="female">Female</option>
                                    </select>
                                    @error('phone')
                                        <div class="text-danger">
                                        {{ $message }}
                                        </div>
                                    @enderror							  
                                    </div>
                                </div>
                             </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <h5>Profile Image<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="file" name="image" class="form-control @error('image') is-inavlid @enderror" onchange="document.getElementById('profile_pic').src = window.URL.createObjectURL(this.files[0])">
                                    <img src="{{ !empty($profileEdit->image) ? asset('upload/user_img/'.$profileEdit->image):asset('upload/no_image.jpg') }}" width="100px" id="profile_pic" />
                                    @error('image')
                                        <div class="text-danger">
                                        {{ $message }}
                                        </div>
                                    @enderror							  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-info" value="Update">
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
