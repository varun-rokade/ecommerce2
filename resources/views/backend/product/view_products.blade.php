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
                <h3 class="box-title">Product List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Product Name En</th>
                              <th>Product Name Hin</th>
                              <th>Product Quantity</th>
                              <th>Image</th>
                              <th>Action</th>

                          </tr>
                      </thead>
                      <tbody>
                          @foreach($products as $item)
                          <tr>
                              <td>{{ $item->product_name_en }}</td>
                              <td>{{$item->product_name_hin}}</td>
                              <td>{{ $item->product_qty }}</td>
                              <td><img src="{{ asset($item->product_thumbnail) }}" style="width: 60px; height:50px;"></td>
                              <td>

                                <a href="{{ route('edit.category',$item->id) }}" class="btn btn-info"><i class="fa fa-pencil" title="Edit Data"></i></a>
                                <a href="{{ route('delete.category',$item->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash" title="Delete Data"></i></a>


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





          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>

<!-- /.content-wrapper -->

@endsection