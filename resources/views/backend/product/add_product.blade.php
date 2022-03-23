@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="container-full">
      <!-- Content Header (Page header) -->
      

      <!-- Main content -->
      <section class="content">

       <!-- Basic Forms -->
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">Add Products</h4>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">

                <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                      <div class="col-12">						

                        <div class="row"><!--Start 1st Row-->  
                            <div class="col-md-4">

                                <div class="form-group">
                                    <h5>Brand Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="brand_id" id="brand_id" required class="form-control">
                                            <option value="" selected="" disabled="" >Select Your Brand</option>
                                            @foreach($brands as $brand)
                                            <option value="{{ $brand -> id }}">{{ $brand ->brand_name_en }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('brand_id')
                                    <span class="text-danger">{{ $message}}</span>
                                        
                                    @enderror
                                </div>


                            </div><!--end col md-4-->

                            <div class="col-md-4">

                                <div class="form-group">
                                    <h5>Category Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" id="category_id" required class="form-control">
                                            <option value="" selected="" disabled="" >Select Your Category</option>
                                            @foreach($category as $cat)
                                            <option value="{{ $cat -> id }}">{{ $cat ->category_name_en }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('category_id')
                                    <span class="text-danger">{{ $message}}</span>
                                        
                                    @enderror
                                </div>


                            </div><!--end col md-4-->

                            <div class="col-md-4">

                                <div class="form-group">
                                    <h5>Sub Category Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="subcategory_id" id="subcategory_id" required class="form-control">
                                            <option value="" selected="" disabled="" >Select Your Category</option>
                                            
                                        </select>
                                    </div>
                                    @error('subcategory_id')
                                    <span class="text-danger">{{ $message}}</span>
                                        
                                    @enderror
                                </div>


                            </div><!--end col md-4-->


                        </div><!-- 1st Row End--> 



                        <div class="row"><!--Start 2nd Row-->  
                            <div class="col-md-4">

                                <div class="form-group">
                                    <h5>Sub SubCategory <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="subsubcategory_id" required class="form-control">
                                            <option value="" selected="" disabled="" >Select Your SubSubCategory</option>
                                            
                                        </select>
                                    </div>
                                    @error('subsubcategory_id')
                                    <span class="text-danger">{{ $message}}</span>
                                        
                                    @enderror
                                </div>


                            </div><!--end col md-4-->

                            <div class="col-md-4">

                                <div class="form-group">
                                    <h5>Product Name English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_name_en" class="form-control"> </div>
                                        
                                    @error('product_name_en')
                                    <span class="text-danger">{{ $message}}</span>
                                        
                                    @enderror
                                
                                    </div>


                            </div><!--end col md-4-->

                            <div class="col-md-4">

                                <div class="form-group">
                                    <h5>Product Name Hindi <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_name_hin" class="form-control"> </div>
                                
                                    @error('product_name_hin')
                                    <span class="text-danger">{{ $message}}</span>
                                        
                                    @enderror

                                    </div>


                            </div><!--end col md-4-->


                        </div><!-- 2nd Row End-->



                        <div class="row"><!--Start 3rd Row-->  
                            <div class="col-md-4">

                                <div class="form-group">
                                    <h5>Product Code <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_code" class="form-control"> </div>
                                        
                                    @error('product_code')
                                    <span class="text-danger">{{ $message}}</span>
                                        
                                    @enderror
                                
                                    </div>


                            </div><!--end col md-4-->

                            <div class="col-md-4">

                                <div class="form-group">
                                    <h5>Product Quantity <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_qty" class="form-control"> </div>
                                        
                                    @error('product_qty')
                                    <span class="text-danger">{{ $message}}</span>
                                        
                                    @enderror
                                
                                    </div>


                            </div><!--end col md-4-->

                            <div class="col-md-4">

                                <div class="form-group">
                                    <h5>Product Tags English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_tags_en" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput"> </div>
                                
                                    @error('product_tags_en')
                                    <span class="text-danger">{{ $message}}</span>
                                        
                                    @enderror

                                    </div>


                            </div><!--end col md-4-->


                        </div><!-- 3rd Row End-->



                        <div class="row"><!--Start 4th Row-->  
                            <div class="col-md-4">

                                <div class="form-group">
                                    <h5>Product Tags Hindi <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_tags_hin" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput"> </div>
                                
                                    @error('product_tags_hin')
                                    <span class="text-danger">{{ $message}}</span>
                                        
                                    @enderror

                                    </div>


                            </div><!--end col md-4-->

                            <div class="col-md-4">

                                <div class="form-group">
                                    <h5>Product Size En <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_size_en" class="form-control" value="Small,Medium,Large" data-role="tagsinput"> </div>
                                
                                    @error('product_size_en')
                                    <span class="text-danger">{{ $message}}</span>
                                        
                                    @enderror

                                    </div>


                            </div><!--end col md-4-->

                            <div class="col-md-4">

                                <div class="form-group">
                                    <h5>Product Size Hin <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_size_hin" class="form-control" value="छोटा, मध्यम ,बड़ा" data-role="tagsinput"> </div>
                                
                                    @error('product_size_hin')
                                    <span class="text-danger">{{ $message}}</span>
                                        
                                    @enderror

                                    </div>


                            </div><!--end col md-4-->


                        </div><!-- 4th Row End-->



                        <div class="row"><!--Start 5th Row-->  
                            <div class="col-md-4">

                                <div class="form-group">
                                    <h5>Product Colour English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_color_en" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput"> </div>
                                
                                    @error('product_color_en')
                                    <span class="text-danger">{{ $message}}</span>
                                        
                                    @enderror

                                    </div>


                            </div><!--end col md-4-->

                            <div class="col-md-4">

                                <div class="form-group">
                                    <h5>Product Colours Hindi <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_color_hin" class="form-control" value="Small,Medium,Large" data-role="tagsinput"> </div>
                                
                                    @error('product_color_hin')
                                    <span class="text-danger">{{ $message}}</span>
                                        
                                    @enderror

                                    </div>


                            </div><!--end col md-4-->

                            <div class="col-md-4">

                                <div class="form-group">
                                    <h5>Selling Price <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="selling_price" class="form-control" > </div>
                                </div>


                            </div><!--end col md-4-->


                        </div><!-- 5th Row End-->




                        <div class="row"><!--Start 6th Row-->  
                            <div class="col-md-4">

                                <div class="form-group">
                                    <h5>Discount Price <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="discount_price" class="form-control"> </div>
                                
                                        @error('product_color_hin')
                                        <span class="text-danger">{{ $message}}</span>
                                            
                                        @enderror    
                                        

                                    </div>


                            </div><!--end col md-4-->

                            <div class="col-md-4">

                                <div class="form-group">
                                    <h5>Product Thumbnail  <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="product_thumbnail" class="form-control" onChange="mainthumbUrl(this)"> </div>
                                
                                        @error('product_thumbnail')
                                        <span class="text-danger">{{ $message}}</span>
                                            
                                        @enderror    
                                    <img src="" id="mainThumb" alt="">    

                                    </div>


                            </div><!--end col md-4-->

                            <div class="col-md-4">

                                <div class="form-group">
                                    <h5>Multiple Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="multi_img" class="form-control" multiple="" id="multiple"> </div>
                                
                                        @error('multi_img')
                                        <span class="text-danger">{{ $message}}</span>
                                        @enderror    
                                        <div class="row" id="preview_img"></div>

                                    </div>


                            </div><!--end col md-4-->


                        </div><!-- 6th Row End-->


                        <div class="row"><!--Start 7th Row-->  
                            <div class="col-md-6">

                                <div class="form-group">
                                    <h5>Short Description English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="short_desc_en" id="textarea" class="form-control"  placeholder="Textarea text"></textarea>
                                    </div>
                                </div>


                            </div><!--end col md-4-->

                            <div class="col-md-6">

                                <div class="form-group">
                                    <h5>Short Descripton Hindi <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="short_desc_hin" id="textarea" class="form-control"  placeholder="Textarea text"></textarea>
                                    </div>
                                </div>


                            </div><!--end col md-4-->

                            


                        </div><!-- 7th Row End-->


                        <div class="row"><!--Start 8th Row-->  
                            <div class="col-md-6">

                                <div class="form-group">
                                    <h5>Long Description English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea id="editor1" name="long_desc_en" rows="10" cols="80">
                                            Long Description English
                                        </textarea>
                                    </div>
                                </div>


                            </div><!--end col md-4-->

                            <div class="col-md-6">

                                <div class="form-group">
                                    <h5>Long Descripton Hindi <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea id="editor2" name="long_desc_hin" rows="10" cols="80">
                                            Long Description Hindi
                                        </textarea>
                                    </div>
                                </div>


                            </div><!--end col md-4-->

                            


                        </div><!-- 8th Row End-->


                        <hr>    
                       
                          
                          
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                
                                <div class="controls">
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_2" name="hot_deals" value="1">
                                        <label for="checkbox_2">Hot Deals</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_3" name="featured" value="1">
                                        <label for="checkbox_3">Featured</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>


                          <div class="col-md-6">
                              <div class="form-group">
                                  
                                  <div class="controls">
                                      <fieldset>
                                          <input type="checkbox" id="checkbox_4" name="special_offer" value="1">
                                          <label for="checkbox_4">Special Offers</label>
                                      </fieldset>
                                      <fieldset>
                                          <input type="checkbox" id="checkbox_5" name="special_deals" value="1">
                                          <label for="checkbox_5">Special Deals</label>
                                      </fieldset>
                                  </div>
                              </div>
                          </div>
                      </div>
                      
                      
                      <div class="text-xs-right">
                          <button type="submit" class="btn btn-rounded btn-primary mb-5">Add Product</button>
                      </div>
                  </form>

              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </section>
      <!-- /.content -->
    </div>

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
                                $('select[name="subsubcategory_id"]').html('');
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

                $('select[name="subcategory_id"]').on('change', function(){
                    var subcategory_id = $(this).val();
                    if(subcategory_id) {
                        $.ajax({
                            url: "{{  url('/category/sub-subcategory/ajax') }}/"+subcategory_id,
                            type:"GET",
                            dataType:"json",
                            success:function(data) {
                               var d =$('select[name="subsubcategory_id"]').empty();
                                  $.each(data, function(key, value){
                                      $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
                                  });
                            },
                        });
                    } else {
                        alert('danger');
                    }
                });


            });
        </script>

<script type="text/javascript">
    function mainthumbUrl(input)
    {
        if(input.files && input.files[0])
        {
            var reader = new FileReader();
            reader.onload = function(e)
            {
                $('#mainThumb').attr('src',e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script>

$(document).ready(function(){
   $('#multiple').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });


</script>



@endsection