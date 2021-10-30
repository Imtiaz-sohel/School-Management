@extends('Backend.master')
@section('title')
    {{ "View Fee Amount" }}
@endsection
@section('feeAmount')
    active
@endsection
@section('v_amount')
    active
@endsection
@section('content')
<div class="content-wrapper" style="min-height: 978.8px;">
    <div class="container-full">
        <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">All Fee Amount</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item">Dashboard</li>
								<li class="breadcrumb-item active" aria-current="page">View Fee Amount</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
        <section class="content">
            <div class="col-12">
                <div class="box">
                   <div class="box-header with-border">
                       <h3 class="box-title">All Fee Amount ({{ $feeCount }})</h3>
                       <a style="float: right" href="{{ route('feeAmountAdd') }}" class="btn btn-rounded btn-success mb-5">Add Fee</a>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                         <table id="example1" class="table table-bordered table-striped">
                           <thead>
                               <tr>
                                   <th>Sl</th>
                                   <th>Fee Category</th>
                                   <th>Class</th>
                                   <th>Fee Amount</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach($fees as $key => $fee)                                   
                               <tr>
                                   <td>{{ ++$key }}</td>
                                   <td>{{ $fee->feeCategory->fee_name }}</td>
                                   <td>{{ $fee->studentClass->name }}</td>
                                   <td>{{ $fee->amount }}</td>
                                   <td>
                                       <a class="btn btn-outline-info" href="{{ route('feeAmountEdit',$fee->id) }}"><i class="fa fa-edit"></i></a>
                                       <a id="delete" class="btn btn-outline-danger" href="{{ route('feeDelete',$fee->id) }}"><i class="fa fa-trash"></i></a>
                                   </td>
                               </tr>
                               @endforeach
                           </tbody>
                         </table>
                       </div>
                   </div>
                </div>          
            </div>
        </section>
    </div>
</div>    
@endsection
