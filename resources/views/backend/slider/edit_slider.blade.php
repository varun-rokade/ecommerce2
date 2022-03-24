@extends('admin.admin_master')

@section('admin')


  <!-- Content Wrapper. Contains page content -->
  
    <div class="container-full">
      <!-- Content Header (Page header) -->
      

      <!-- Main content -->
      <section class="content">
        <div class="row">

<div class="col-12">

    <div class="box">
       <div class="box-header with-border">
         <h3 class="box-title">Add Slider</h3>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
           <div class="table-responsive">
                
            
            <form method="POST" action="{{ route('slider.update',$slider->id) }}" enctype="multipart/form-data">
                @csrf 
                <input type="hidden" name="id" value="{{ $slider->id }}" >
                <div class="row">
                   <div class="col-12">						
                       
                            <div class="form-group">
                                <h5>Slider Title <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="slider_title" value="{{ $slider->title }}" class="form-control"  > </div>
                                    
                            
                                </div>


                            <div class="form-group">
                                <h5>Slider Description <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="slider_desc" value="{{ $slider->desc }}"  class="form-control"  > </div>
                            
                                    
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