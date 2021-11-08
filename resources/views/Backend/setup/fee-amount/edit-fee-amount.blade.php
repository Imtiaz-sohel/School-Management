@extends('Backend.master')
@section('title')
    {{ "Edit Fee Amount" }}
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
					<h3 class="page-title">Edit Fee Amount</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('feeAmountView') }}">All Fee Amount</a></li>
								<li class="breadcrumb-item active" aria-current="page">Edit Fee Amount</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
        <section class="content">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">Edit Fee Amount</h4>
            </div>
            <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col">
                    <form action="{{ route('updateAmountPost',$feeEdit->fee_categories_id) }}" method="POST">
                      @csrf
                      <div class="row">
                        <div class="col-12">
                          <div class="form-group">
                            <h5>Select Fee Category<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="fee_categories_id" id="fee_categories_id" class="form-control @error('fee_categories_id') is-inavlid @enderror">
                                    <option selected disabled value>Select Fee Category</option>
                                    @foreach($feeCategories as $key => $feeCategory)
                                        <option @if ($feeEdit[0]->fee_categories_id==$feeCategory->id) selected @endif value="{{ $feeCategory->id }}">{{ $feeCategory->fee_name }}</option>
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
                      @foreach($feeEdit as $key => $edit)                        
                      <div class="customer_records">
                        <div class="row">
                          <div class="col-md-5">
                            <div class="form-group">
                              <h5>Select Class<span class="text-danger">*</span></h5>
                             <select name="student_classses_id[] " id="student_classses_id" class="form-control @error('student_classses_id') is-inavlid @enderror">
                               <option selected disabled value>Select One</option>
                               @foreach($classes as $key => $class)
                                 <option @if($edit->student_classses_id==$class->id) selected @endif value="{{ $class->id }}">{{ $class->name }}</option>
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
                              <input type="text" name="amount[]" value="{{ $edit->amount }}" id="amount" class="form-control @error('amount') is-inavlid @enderror">
                              @error('amount')
                                <div class="text-danger">
                                  {{ $message }}
                                </div>
                              @enderror
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach
                      <div class="customer_records_dynamic"></div>
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



  

