@extends('Backend.master')
@section('user')
    active
@endsection
@section('title')
    {{ "View User" }}
@endsection
@section('content')
<div class="content-wrapper" style="min-height: 978.8px;">
    <div class="container-full">
        <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Add New User</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('allUser') }}">All User</a></li>
								<li class="breadcrumb-item active" aria-current="page">Add User</li>
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
                    <form action="{{ route('addUserPost') }}" method="POST">
                      @csrf
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <h5>User Role <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <select name="user_type" id="user_type" required class="form-control @error('user_type') is-inavlid @enderror">
                                <option value disabled="" selected="">Select Role</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                              </select>
                              @error('user_type')
                                  <div class="text-danger">
                                      {{ $message }}
                                  </div>
                              @enderror
                            </div>
                          </div>					
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <h5>Name <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="text" name="name" id="name" class="form-control @error('name') is-inavlid @enderror" placeholder="Enter Name"> 
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
                            <h5>Email <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="email" name="email" class="form-control @error('email') is-inavlid @enderror" placeholder="Enter Email"> 
                              @error('email')
                              <div class="text-danger">
                                  {{ $message }}
                              </div>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <h5>Password <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="password" name="password" class="form-control @error('password') is-inavlid @enderror">
                              @error('password')
                                  <div class="text-danger">
                                      {{ $message }}
                                  </div>
                              @enderror 
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-info" value="submit">
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
