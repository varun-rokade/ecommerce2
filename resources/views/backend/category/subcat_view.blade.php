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
                <h3 class="box-title">Sub Categories List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Category</th>
                              <th>Sub Category En</th>
                              <th>Sub Category Hin</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($subcategory as $cat)
                          <tr>
                              <td>{{ $cat['category']['category_name_en']  }}</td>
                              <td>{{ $cat->subcategory_name_en }}</td>
                              <td>{{$cat->subcategory_name_hin}}</td>
                              <td width="25%">

                                <a href="{{ route('edit.subcategory',$cat->id) }}" class="btn btn-info"><i class="fa fa-pencil" title="Edit Data"></i></a>
                                <a href="{{ route('delete.subcategory',$cat->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash" title="Delete Data"></i></a>


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
         <h3 class="box-title">Add Sub Categories</h3>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
           <div class="table-responsive">
                
            
            <form method="POST" action="{{ route('subcategory.store') }}" >
                @csrf 
                <div class="row">
                   <div class="col-12">						
                       
                    <div class="form-group">
                        <h5>Category Select <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="category_id" id="select" required class="form-control">
                                <option value="" selected="" disabled="" >Select Your Category</option>
                                @foreach($category as $cat)
                                <option value="{{ $cat -> id }}">{{ $cat ->category_name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('category_id')
                        <span class="text-danger">{{ $message}}</span>
                            
                        @enderror
                    </div>



                            <div class="form-group">
                                <h5>Sub Category English <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="subcategory_name_en"  class="form-control"  > </div>
                            
                                    @error('category_name_en')
                                    <span class="text-danger">{{ $message}}</span>
                                        
                                    @enderror
                                </div>


                            <div class="form-group">
                                <h5>Sub Category Hindi<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="subcategory_name_hin"  class="form-control"  > </div>
                                    @error('subcategory_name_hin')
                                    <span class="text-danger">{{ $message}}</span>
                                        
                                    @enderror
                            
                            
                                </div>

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
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