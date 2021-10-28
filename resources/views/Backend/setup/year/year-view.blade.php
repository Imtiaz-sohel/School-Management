@extends('Backend.master')
@section('title')
    {{ "View Class" }}
@endsection
@section('year')
    active
@endsection
@section('v_year')
    active
@endsection
@section('content')
<div class="content-wrapper" style="min-height: 978.8px;">
    <div class="container-full">
        <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">All Year</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item">Dashboard</li>
								<li class="breadcrumb-item active" aria-current="page">View Year</li>
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
                       <h3 class="box-title">Years({{ $yearCount }})</h3>
                       <a style="float: right" href="{{ route('addYear') }}" class="btn btn-rounded btn-success mb-5">Add Year</a>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                         <table id="example1" class="table table-bordered table-striped">
                           <thead>
                               <tr>
                                   <th>Sl</th>
                                   <th>Name</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach($years as $key => $year)                                   
                               <tr>
                                   <td>{{ ++$key }}</td>
                                   <td>{{ $year->student_year }}</td>
                                   <td>
                                       <a class="btn btn-outline-info" href="{{ route('yearEdit',$year->id) }}"><i class="fa fa-edit"></i></a>
                                       <a id="delete" class="btn btn-outline-danger" href="{{ route('yearDelete',$year->id) }}"><i class="fa fa-trash"></i></a>
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
