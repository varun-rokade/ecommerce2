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
                              <th>Product Selling Price</th>
                              <th>Product Discount</th>
                              <th>Product Quantity</th>
                              <th>Image</th>
                              <th>Status</th>
                              <th>Action</th>

                          </tr>
                      </thead>
                      <tbody>
                          @foreach($products as $item)
                          <tr>
                              <td>{{ $item->product_name_en }}</td>
                              <td>{{$item->selling_price}} $</td>
                              <td>
                              @if($item->discount_price == NULL)
                                <span class="badge badge-pill badge-success">No Discount</span>
                              @else
                              @php
                               $amount = $item->selling_price - $item->discount_price;
                               $discount = ($amount/$item->selling_price)*100;   
                              @endphp
                                 <span class="badge badge-pill badge-danger">{{round($discount)}}%</span>

                              @endif
                              
                              
                              </td>
                              <td>{{ $item->product_qty }}</td>
                              <td><img src="{{ asset($item->product_thumbnail) }}" style="width: 60px; height:50px;"></td>
                              <td>

                                @if ($item->status == 1)
                                  <span class="badge badge-pill badge-success">Active</span>
                                 @else   
                                 <span class="badge badge-pill badge-danger">Inactive</span>
                                @endif

                              </td>
                              
                              <td width = 30%>
                                <a href="{{ route('product.edit',$item->id) }}" class="btn btn-primary"><i class="fa fa-eye" title="Products Detail data"></i></a>

                                <a href="{{ route('product.edit',$item->id) }}" class="btn btn-info"><i class="fa fa-pencil" title="Edit Data"></i></a>
                                <a href="{{ route('product.delete',$item->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash" title="Delete Data"></i></a>

                                @if ($item->status == 1)
                                <a href="{{ route('product.inactive',$item->id) }}" class="btn btn-danger"><i class="fa fa-arrow-down" title="Inactive Now"></i></a>
                                 @else   
                                 <a href="{{ route('product.active',$item->id) }}" class="btn btn-success"><i class="fa fa-arrow-up" title="Active Now"></i></a>
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





          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>

<!-- /.content-wrapper -->

@endsection