@extends('Backend.master')
@section('title')
    {{ "View Employee Degisnation" }}
@endsection
@section('degination')
    active
@endsection
@section('v_degination')
    active
@endsection
@section('content')
<div class="content-wrapper" style="min-height: 978.8px;">
    <div class="container-full">
        <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">All Employee Designation</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item">Dashboard</li>
								<li class="breadcrumb-item active" aria-current="page">View Employee Designation</li>
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
                       <h3 class="box-title">All Employee Designation</h3>
                       <a style="float: right" href="{{ route('degisnationAdd') }}" class="btn btn-rounded btn-success mb-5">Add Designation</a>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                         <table id="example1" class="table table-bordered table-striped">
                           <thead>
                               <tr>
                                   <th>Sl</th>
                                   <th>Designation Name</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach($designations as $key => $designation)                                   
                               <tr>
                                 <td>{{ ++$key }}</td>    
                                 <td>{{ $designation->name }}</td>    
                                 <td>
                                    <a href="{{ route('editDesignation',$designation->id) }}" class="btn btn-outline-info"><i class=" fa fa-edit"></i></a>    
                                    <a id="delete" href="{{ route('deleteDesignation',$designation->id) }}" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>    
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