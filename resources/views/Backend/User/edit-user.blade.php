@extends('Backend.master')
@section('user')
    active
@endsection
@section('title')
    {{ "Update User" }}
@endsection
@section('content')
<div class="content-wrapper" style="min-height: 978.8px;">
    <div class="container-full">
        <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Edit User</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('allUser') }}">All User</a></li>
								<li class="breadcrumb-item active" aria-current="page">Edit User</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
        <section class="content">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">Edit User</h4>
              </div>
            <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col">
                    <form action="{{ route('userUpdate') }}" method="POST">
                      @csrf
                      <div class="row">
                          <input type="hidden" name="usr_id" id="usr_id" value="{{ $userEdit->id }}">
                        <div class="col-6">
                          <div class="form-group">
                            <h5>User Role <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <select name="user_type" id="user_type" required class="form-control">
                                <option value disabled="" selected="">Select Role</option>
                                @foreach($users as $key => $user)
                                  <option @if($userEdit->user_type==$user->user_type) selected @endif value="{{ $user->user_type }}">{{ $user->user_type }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>					
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <h5>Name <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="text" name="name" id="name" value="{{ $userEdit->name }}" class="form-control" placeholder="Enter Name"> 
                            </div>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <h5>Email <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="email" name="email" value="{{ $userEdit->email }}" class="form-control" placeholder="Enter Email"> 
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
