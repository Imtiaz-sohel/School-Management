@extends('Backend.master')
@section('title')
    {{ "Add Class" }}
@endsection
@section('setup')
    active
@endsection
@section('a_class')
    active
@endsection
@section('content')
<div class="content-wrapper" style="min-height: 978.8px;">
    <div class="container-full">
        <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Add Class</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('studentClass') }}">All Classes</a></li>
								<li class="breadcrumb-item active" aria-current="page">Add Class</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
        <section class="content">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">Add Class</h4>
            </div>
            <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col">
                    <form action="{{ route('addClassPost') }}" method="POST">
                      @csrf
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <h5>Class Name<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="name" id="name" value="{{ old('name') }}" required class="form-control @error('name') is-inavlid @enderror" placeholder="class name">
                              @error('name')
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
