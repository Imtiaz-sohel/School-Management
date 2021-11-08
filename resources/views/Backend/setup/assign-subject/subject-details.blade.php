@extends('Backend.master')
@section('title')
    {{ "View Assign Subject" }}
@endsection
@section('assignSubject')
    active
@endsection
@section('v_assignsubject')
    active
@endsection
@section('content')
<div class="content-wrapper" style="min-height: 978.8px;">
    <div class="container-full">
        <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Assign Subject Details</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('assignsubjectView') }}"></a>Assign Subject View</li>
								<li class="breadcrumb-item active" aria-current="page">Assign Subject Details</li>
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
                       <h3 class="box-title">{{ $subjectDetails[0]->class->name }}</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                         <table id="example1" class="table table-bordered table-striped">
                           <thead>
                               <tr>
                                   <th>Sl</th>
                                   <th>Subject</th>
                                   <th>Full Mark</th>
                                   <th>PassMark</th>
                                   <th>Subjective Mark</th>
                               </tr>
                           </thead>
                           <tbody> 
                               @foreach($subjectDetails as $key => $detail)                                   
                               <tr>
                                   <td>{{ ++$key }}</td>
                                   <td>{{ $detail->subject->subject_name }}</td>
                                   <td>{{ $detail->full_mark }}</td>
                                   <td>{{ $detail->pass_mark }}</td>
                                   <td>{{ $detail->subjective_mark }}</td>
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
