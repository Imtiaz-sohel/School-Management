@extends('Backend.master')
@section('title')
    {{ "View Exam Type" }}
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
					<h3 class="page-title">All Exam Type</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item">Dashboard</li>
								<li class="breadcrumb-item active" aria-current="page">View Exam Type</li>
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
                       <h3 class="box-title">All Exam Type ({{ $examCount }})</h3>
                       <a style="float: right" href="{{ route('examTypeAdd') }}" class="btn btn-rounded btn-success mb-5">Add Exam Type</a>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                         <table id="example1" class="table table-bordered table-striped">
                           <thead>
                               <tr>
                                   <th>Sl</th>
                                   <th>Exam Type</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach($examTypes as $key => $examType)   
                               <tr>
                                   <td>{{ ++$key }}</td>
                                   <td>{{ $examType->exam_type }}</td>
                                   <td>
                                       <a href="{{ route('examTypeEdit',$examType->id) }}" class="btn btn-outline-info"><i class="fa fa-edit"></i></a>
                                       <a id="delete" href="{{ route('examTypeDelete',$examType->id) }}" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
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