@extends('Backend.master')
@section('title')
    {{ "Add Fee Amount" }}
@endsection
@section('feeAmount')
    active
@endsection
@section('a_amount')
    active
@endsection
@section('content')
<div class="content-wrapper" style="min-height: 978.8px;">
    <div class="container-full">
        <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Add Fee Amount</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('feeAmountView') }}">All Fee Amount</a></li>
								<li class="breadcrumb-item active" aria-current="page">Add Fee Amount</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
      <section class="content">
          <div class="box">
            <div class="box-header with-border">
              <h4 class="box-title">Add Fee Amount</h4>
          </div>
          <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col">
                  <form action="{{ route('feeAmountPost') }}" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <h5>Select Fee Category<span class="text-danger">*</span></h5>
                          <div class="controls">
                              <select name="fee_categories_id" id="fee_categories_id" class="form-control @error('fee_categories_id') is-inavlid @enderror">
                                  <option selected disabled value>Select Fee Category</option>
                                  @foreach($feeCategories as $key => $feeCategory)
                                      <option value="{{ $feeCategory->id }}">{{ $feeCategory->fee_name }}</option>
                                  @endforeach
                              </select>
                            @error('fee_categories_id')
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
                        <div class="col-md-5">
                          <div class="form-group">
                            <h5>Select Class<span class="text-danger">*</span></h5>
                            <select name="student_classses_id[] " id="student_classses_id" class="form-control @error('student_classses_id') is-inavlid @enderror">
                              <option selected disabled value>Select One</option>
                              @foreach($classes as $key => $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                              @endforeach
                            </select>
                            @error('student_classses_id')
                              <div class="text-danger">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                            <h5>Enter Amount<span class="text-danger">*</span></h5>
                            <input type="text" name="amount[]" id="amount" class="form-control @error('amount') is-inavlid @enderror">
                          </div>
                          @error('amount')
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



  

