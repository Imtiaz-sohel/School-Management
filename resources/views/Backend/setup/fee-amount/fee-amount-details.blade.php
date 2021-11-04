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
                       <h3 class="box-title">{{ $feeDetails[0]->feeCategory->fee_name }}</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                         <table id="example1" class="table table-bordered table-striped">
                           <thead>
                               <tr>
                                   <th>Sl</th>
                                   <th>Class Name</th>
                                   <th>Amount</th>
                               </tr>
                           </thead>
                           <tbody> 
                               @foreach($feeDetails as $key => $detail)                                   
                               <tr>
                                   <td>{{ ++$key }}</td>
                                   <td>{{ $detail->studentClass->name }}</td>
                                   <td>{{ $detail->amount }}</td>
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
