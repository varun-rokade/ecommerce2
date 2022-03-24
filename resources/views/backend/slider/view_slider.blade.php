@extends('admin.admin_master')

@section('admin')


  <!-- Content Wrapper. Contains page content -->
  
    <div class="container-full">
      <!-- Content Header (Page header) -->
      

      <!-- Main content -->
      <section class="content">
        <div class="row">
            
          <div class="col-8">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Slider List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Title</th>
                              <th>Description</th>
                              <th>Status</th>
                              <th>Image</th>
                              <td>Action</td>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($slider as $item)
                          <tr>
                              <td>
                                
                                @if($item->title == NULL)
                               <span class="badge badge-pill badge-danger">No Title</span>
                                @else
                                
                                {{ $item->title }}</td>
                              
                                @endif

                                <td>{{$item->desc}}</td>
                              <td>
                                @if ($item->status == 1)
                                <span class="badge badge-pill badge-success">Active</span>
                               @else   
                               <span class="badge badge-pill badge-danger">Inactive</span>
                              @endif
                              </td>


                              <td><img src="{{asset($item->image)}}" alt=""></td>
                              
                              <td width="30%">

                                <a href="{{ route('edit.slider',$item->id) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil" title="Edit Data"></i></a>
                                <a href="{{ route('delete.slider',$item->id) }}" id="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash" title="Delete Data"></i></a>
                                @if ($item->status == 1)
                                <a href="{{ route('slider.inactive',$item->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-arrow-down" title="Inactive Now"></i></a>
                                 @else   
                                 <a href="{{ route('slider.active',$item->id) }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-up" title="Active Now"></i></a>
                                @endif

                              </td>
                          </tr>
                          @endforeach
                          
                      
                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

            
            <!-- /.box -->          
          </div>


{{-- ---------------------Add Brands------------------ --}}


<div class="col-4">

    <div class="box">
       <div class="box-header with-border">
         <h3 class="box-title">Add Slider</h3>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
           <div class="table-responsive">
                
            
            <form method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">
                @csrf 
                <div class="row">
                   <div class="col-12">						
                       
                            <div class="form-group">
                                <h5>Slider Title <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="slider_title"  class="form-control"  > </div>
                                    
                            
                                </div>


                            <div class="form-group">
                                <h5>Slider Description <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="slider_desc"  class="form-control"  > </div>
                            
                                    
                                </div>


                            <div class="form-group">
                                <h5>Slider Image <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="file" name="image"  class="form-control"  > </div>
                                    @error('image')
                                    <span class="text-danger">{{ $message}}</span>
                                        
                                    @enderror
                            
                            
                                </div>

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Slider">
                            </div>
           
       <!-- /.box-body -->
     </div>
     <!-- /.box -->

     
     <!-- /.box -->          
   </div>


          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>

<!-- /.content-wrapper -->

@endsection