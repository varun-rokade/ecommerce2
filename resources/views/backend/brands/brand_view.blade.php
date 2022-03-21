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
                <h3 class="box-title">Brands List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Brand En</th>
                              <th>Brand Hindi</th>
                              <th>Images</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($brands as $item)
                          <tr>
                              <td>{{ $item->brand_name_en }}</td>
                              <td>{{$item->brand_name_hin}}</td>
                              <td><img src="{{asset($item->brand_image)}}" alt=""></td>
                              <td>

                                <a href="{{ route('edit.brand',$item->id) }}" class="btn btn-info"><i class="fa fa-pencil" title="Edit Data"></i></a>
                                <a href="{{ route('delete.brand',$item->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash" title="Delete Data"></i></a>


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
         <h3 class="box-title">Add Brands</h3>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
           <div class="table-responsive">
                
            
            <form method="POST" action="{{ route('brand.store') }}" enctype="multipart/form-data">
                @csrf 
                <div class="row">
                   <div class="col-12">						
                       
                            <div class="form-group">
                                <h5>Brand Name English <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="brand_name_en"  class="form-control"  > </div>
                                    @error('brand_name_en')
                                    <span class="text-danger">{{ $message}}</span>
                                        
                                    @enderror
                            
                                </div>


                            <div class="form-group">
                                <h5>Brand Name Hindi <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="brand_name_hin"  class="form-control"  > </div>
                            
                                    @error('brand_name_hin')
                                    <span class="text-danger">{{ $message}}</span>
                                        
                                    @enderror
                                </div>


                            <div class="form-group">
                                <h5>Brand Image <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="file" name="brand_image"  class="form-control"  > </div>
                                    @error('brand_image')
                                    <span class="text-danger">{{ $message}}</span>
                                        
                                    @enderror
                            
                            
                                </div>

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
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