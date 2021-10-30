@extends('Backend.master')
@section('title')
    {{ "Edit Group" }}
@endsection
@section('group')
    active
@endsection
@section('v_group')
    active
@endsection
@section('content')
<div class="content-wrapper" style="min-height: 978.8px;">
    <div class="container-full">
        <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Edit Group</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('studentGroupView') }}">All Group</a></li>
								<li class="breadcrumb-item active" aria-current="page">Edit Group</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
        <section class="content">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">Edit Group</h4>
            </div>
            <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col">
                    <form action="{{ route('updateGroup',$editGroup->id) }}" method="POST">
                      @csrf
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <h5>Group Name<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="group_name" id="group_name" value="{{ $editGroup->group_name??old('group_name') }}" required class="form-control @error('group_name') is-inavlid @enderror" placeholder="group name">
                              @error('group_name')
                                  <div class="text-danger">
                                      {{ $message }}
                                  </div>
                              @enderror
                            </div>
                          </div>					
                        </div>
                      </div>
                      <div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-info" value="update">
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
