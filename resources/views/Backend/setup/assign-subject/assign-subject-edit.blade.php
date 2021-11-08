@extends('Backend.master')
@section('title')
    {{ "Edit Assign Subject" }}
@endsection
@section('assignSubject')
    active
@endsection
@section('a_assignsubject')
    active
@endsection
@section('content')
<div class="content-wrapper" style="min-height: 978.8px;">
    <div class="container-full">
        <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Edit Assign Subject</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('assignsubjectView') }}">View Add Assign Subject</a></li>
								<li class="breadcrumb-item active" aria-current="page">Edit Assign Subject</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
        <section class="content">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">Add Assign Subject</h4>
            </div>
            <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col">
                    <form action="{{ route('assignSubjectUpdate',$assignEdit[0]->class_id) }}" method="POST">
                      @csrf
                      <div class="row">
                        <div class="col-12">
                          <div class="form-group">
                            <h5>Select Class<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="class_id" id="class_id" class="form-control @error('class_id') is-inavlid @enderror">
                                    <option selected disabled value>Select Class</option>
                                    @foreach($classes as $key => $class)
                                        <option @if($assignEdit[0]->class_id==$class->id) selected @endif value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                              @error('class_id')
                                  <div class="text-danger">
                                      {{ $message }}
                                  </div>
                              @enderror
                            </div>
                          </div>					
                        </div>
                      </div>
                      @foreach($assignEdit as $key => $edit)                          
                      <div class="customer_records">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <h5>Select Subject<span class="text-danger">*</span></h5>
                              <select name="subject_id[] " id="subject_id" class="form-control @error('subject_id') is-inavlid @enderror">
                                <option selected disabled value>Select Subject</option>
                                @foreach($subjects as $key => $subject)
                                  <option @if($edit->subject_id==$subject->id) selected @endif value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                                @endforeach
                              </select>
                              @error('subject_id')
                                <div class="text-danger">
                                  {{ $message }}
                                </div>
                              @enderror
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <h5>Full Mark<span class="text-danger">*</span></h5>
                              <input type="text" name="full_mark[]" id="full_mark" value="{{ $edit->full_mark }}" class="form-control @error('full_mark') is-inavlid @enderror" placeholder="100">
                            </div>
                            @error('full_mark')
                              <div class="text-danger">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <h5>Pass Mark<span class="text-danger">*</span></h5>
                              <input type="text" name="pass_mark[]" id="pass_mark" value="{{ $edit->pass_mark }}" class="form-control @error('pass_mark') is-inavlid @enderror" placeholder="33">
                            </div>
                            @error('pass_mark')
                              <div class="text-danger">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <h5>Subjective Mark<span class="text-danger">*</span></h5>
                              <input type="text" name="subjective_mark[]" value="{{ $edit->subjective_mark }}" id="subjective_mark" class="form-control @error('subjective_mark') is-inavlid @enderror" placeholder="80">
                            </div>
                            @error('subjective_mark')
                              <div class="text-danger">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                        </div>
                      </div>
                      @endforeach
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
