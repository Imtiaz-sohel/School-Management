@extends('Backend.master')
@section('title')
    {{ "Edit Exam Type" }}
@endsection
@section('examtype')
    active
@endsection
@section('v_examtype')
    active
@endsection
@section('content')
<div class="content-wrapper" style="min-height: 978.8px;">
    <div class="container-full">
        <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Edit Exam Type</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('examTypeView') }}">View Exam Type</a></li>
								<li class="breadcrumb-item active" aria-current="page">Edit Exam Add</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
        <section class="content">
          <div class="box">
            <div class="box-header with-border">
              <h4 class="box-title">Edit Exam Type</h4>
            </div>
          <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col">
                  <form action="{{ route('ExamUpdatePost',$examEdit->id) }}" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <h5>Exam Type Name<span class="text-danger">*</span></h5>
                          <div class="controls">
                              <input type="text" name="exam_type" id="exam_type" value="{{ $examEdit->exam_type ?? old('exam_type') }}" required class="form-control @error('exam_type') is-inavlid @enderror" placeholder="exam type name">
                            @error('exam_type')
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