@extends('Backend.master')
@section('title')
    {{ "Add Shift" }}
@endsection
@section('shift')
    active
@endsection
@section('a_shift')
    active
@endsection
@section('content')
<div class="content-wrapper" style="min-height: 978.8px;">
    <div class="container-full">
        <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Add Shift</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('shiftView') }}">All Shift</a></li>
								<li class="breadcrumb-item active" aria-current="page">Add Shift</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
        <section class="content">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">Add Shift</h4>
            </div>
            <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col">
                    <form action="{{ route('addShiftPost') }}" method="POST">
                      @csrf
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <h5>Shift Name<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="shift_name" id="shift_name" value="{{ old('shift_name') }}" required class="form-control @error('shift_name') is-inavlid @enderror" placeholder="shift name">
                              @error('shift_name')
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
