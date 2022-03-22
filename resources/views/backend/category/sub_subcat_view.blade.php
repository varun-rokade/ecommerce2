@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- Content Wrapper. Contains page content -->
  
    <div class="container-full">
      <!-- Content Header (Page header) -->
      

      <!-- Main content -->
      <section class="content">
        <div class="row">
            
          <div class="col-8">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Sub->Sub Categories List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Category</th>
                              <th>SubCategory Name</th>
                              <th>SubSubCategory English</th>
                              {{-- <th>SubSubCategory Hindi</th> --}}
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($subsubcategory as $cat)
                          <tr>
                              <td>{{ $cat['category']['category_name_en']  }}</td>
                              <td>{{ $cat['subcategory']['subcategory_name_en']  }}</td>
                              <td>{{$cat->subsubcategory_name_en}}</td>
                              {{-- <td>{{$cat->subsubcategory_name_hin}}</td> --}}
                              <td width="25%">

                                <a href="{{ route('edit.subsubcategory',$cat->id) }}" class="btn btn-info"><i class="fa fa-pencil" title="Edit Data"></i></a>
                                <a href="{{ route('delete.subsubcategory',$cat->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash" title="Delete Data"></i></a>


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
         <h3 class="box-title">Add Sub-Sub Categories</h3>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
           <div class="table-responsive">
                
            
            <form method="POST" action="{{ route('subsubcategory.store') }}" >
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
                        <h5>Category Select <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="subcategory_id" id="select" required class="form-control">
                                <option value="" selected="" disabled="" >Select Your Sub Category</option>
                                
                            </select>
                        </div>
                        @error('subcategory_id')
                        <span class="text-danger">{{ $message}}</span>
                            
                        @enderror
                    </div>



                            <div class="form-group">
                                <h5>Sub-sub Category English <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="subsubcategory_name_en"  class="form-control"  > </div>
                            
                                    @error('category_name_en')
                                    <span class="text-danger">{{ $message}}</span>
                                        
                                    @enderror
                                </div>


                            <div class="form-group">
                                <h5>Sub-sub Category Hindi<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="subsubcategory_name_hin"  class="form-control"  > </div>
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

<script type="text/javascript">
    $(document).ready(function() {
            $('select[name="category_id"]').on('change', function(){
                var category_id = $(this).val();
                if(category_id) {
                    $.ajax({
                        url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                           var d =$('select[name="subcategory_id"]').empty();
                              $.each(data, function(key, value){
                                  $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                              });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>

@endsection