@extends('Backend.master')
@section('title')
    {{ "Edit Fee Category" }}
@endsection
@section('fee')
    active
@endsection
@section('v_fee')
    active
@endsection
@section('content')
<div class="content-wrapper" style="min-height: 978.8px;">
    <div class="container-full">
        <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Edit Fee Category</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('feeView') }}">All Fee Category</a></li>
								<li class="breadcrumb-item active" aria-current="page">Edit Fee Category</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
        <section class="content">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">Edit Fee Category</h4>
            </div>
            <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col">
                    <form action="{{ route('updateFee',$fee_edit->id) }}" method="POST">
                      @csrf
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <h5>Fee Name<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="fee_name" id="fee_name" value="{{ $fee_edit->fee_name??old('fee_name') }}" class="form-control @error('fee_name') is-inavlid @enderror">
                              @error('fee_name')
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
