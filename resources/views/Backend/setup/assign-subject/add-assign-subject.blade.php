@extends('Backend.master')
@section('title')
    {{ "Add Assign Subject" }}
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
					<h3 class="page-title">Add Assign Subject</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('assignsubjectView') }}">View Add Assign Subject</a></li>
								<li class="breadcrumb-item active" aria-current="page">Add Assign Subject</li>
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
                    <form action="{{ route('assignSubjectPost') }}" method="POST">
                      @csrf
                      <div class="row">
                        <div class="col-12">
                          <div class="form-group">
                            <h5>Select Class<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="class_id" id="class_id" class="form-control @error('class_id') is-inavlid @enderror">
                                    <option selected disabled value>Select Class</option>
                                    @foreach($classes as $key => $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
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
                      <div class="customer_records">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <h5>Select Subject<span class="text-danger">*</span></h5>
                              <select name="subject_id[] " id="subject_id" class="form-control @error('subject_id') is-inavlid @enderror">
                                <option selected disabled value>Select Subject</option>
                                @foreach($subjects as $key => $subject)
                                  <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
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
                              <input type="text" name="full_mark[]" id="full_mark" class="form-control" placeholder="100">
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
                              <input type="text" name="pass_mark[]" id="pass_mark" class="form-control" placeholder="33">
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
                              <input type="text" name="subjective_mark[]" id="subjective_mark" class="form-control" placeholder="80">
                            </div>
                            @error('subjective_mark[]')
                              <div class="text-danger">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                          <div class="col-md-2" style="padding-top: 25px">
                            <a class="extra-fields-customer btn btn-success" href="#"><i class="fa fa-plus-circle"></i></a>
                          </div>
                        </div>
                      </div>
                      <div class="customer_records_dynamic"></div>
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
@section("footer_js")
<script>
$('.extra-fields-customer').click(function() {
  $('.customer_records').clone().appendTo('.customer_records_dynamic');
  $('.customer_records_dynamic .customer_records').addClass('single remove');
  $('.single .extra-fields-customer').remove();
  $('.single').append('<a href="#" class="remove-field btn-remove-customer btn btn-danger"><i class="fa fa-minus-circle"></i></a>');
  $('.customer_records_dynamic > .single').attr("class", "remove");
  
  $('.customer_records_dynamic input').each(function() {
    var count = 0;
    var fieldname = $(this).attr("name");
    $(this).attr('name', fieldname + count );
    count++;
  });

});

$(document).on('click', '.remove-field', function(e) {
  $(this).parent('.remove').remove();
  e.preventDefault();
});
</script>
@endsection
