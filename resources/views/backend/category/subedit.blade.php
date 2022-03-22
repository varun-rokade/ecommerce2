@extends('admin.admin_master')

@section('admin')


  <!-- Content Wrapper. Contains page content -->
  
    <div class="container-full">
      <!-- Content Header (Page header) -->
      

      <!-- Main content -->
      <section class="content">
        <div class="row">
            
          


{{-- ---------------------Add Brands------------------ --}}


<div class="col-12">

    <div class="box">
       <div class="box-header with-border">
         <h3 class="box-title">Edit Sub Categories</h3>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
           <div class="table-responsive">
                            
            <form method="POST" action="{{ route('subcategory.update',$subcategory->id) }}" >
                @csrf 

                
                <div class="row">
                    <div class="col-12">						
                       <input type="hidden" type="id" value="{{ $subcategory->id }}">
                       
                    <div class="form-group">
                        <h5>Category Select <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="category_id" id="category_id" required class="form-control">
                                <option value="" selected="" disabled="" >Select Your Category</option>
                                @foreach($category as $cat)
                                <option value="{{ $cat -> id }}"  {{ $cat -> id == $subcategory->category_id ? 'selected' : ''  }}   >{{ $cat ->category_name_en }} </option>
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
                                    <input type="text" name="subcategory_name_en"  class="form-control" value="{{ $subcategory->subcategory_name_en }}" > </div>
                            
                                    @error('subcategory_name_en')
                                    <span class="text-danger">{{ $message}}</span>
                                        
                                    @enderror
                                </div>


                            <div class="form-group">
                                <h5>Sub Category Hindi<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="subcategory_name_hin"  class="form-control" value="{{ $subcategory->subcategory_name_hin}}" > </div>
                                    @error('subcategory_name_hin')
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