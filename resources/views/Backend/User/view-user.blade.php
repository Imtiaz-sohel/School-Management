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
					<h3 class="page-title">User Table</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Home</li>
								<li class="breadcrumb-item active" aria-current="page">View User</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                          <h3 class="box-title">All Users ({{ $userCount }})</h3>
                          <a href="{{ route('addUser') }}" style="float: right" type="button" class="btn btn-rounded btn-success mb-5">Add User</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                              <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Role</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $key => $user)                                        
                                    <tr>
                                        <td width="5px">{{ ++$key }}</td>
                                        <td>{{ $user->user_type }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a href="{{ route('userEdit',$user->id) }}" class="btn btn-outline-info"><i class="fa fa-edit"></i></a>
                                            <a id="delete" href="{{ route('userDelete',$user->id) }}" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                              </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                      </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection