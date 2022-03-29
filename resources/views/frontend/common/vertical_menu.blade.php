@php
 
 $category = App\Models\Category::orderBy('category_name_en','ASC')->get();

@endphp





<div class="side-menu animate-dropdown outer-bottom-xs">



    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> 
      @if(session()->get('language') == 'hindi')श्रेणियाँ @else Categories @endif 
    </div>
    <nav class="yamm megamenu-horizontal">
      <ul class="nav">
        @foreach($category as $item)
        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon {{ $item->category_icon }}" 
          aria-hidden="true"></i>
          @if(session()->get('language') == 'hindi'){{ $item ->category_name_hin }} @else {{ $item ->category_name_en }} @endif
          </a>
          <ul class="dropdown-menu mega-menu">
            <li class="yamm-content">
              <div class="row">

                @php
                    $subcategory = App\Models\SubCategory::where('category_id',$item->id)->orderBy('subcategory_name_en','ASC')->get();
                @endphp

                  @foreach($subcategory as $subcat)

                <div class="col-sm-12 col-md-3">

<a href="{{ url('subcategory/product/'.$subcat->id.'/'.$subcat->subcategory_slug_en) }}">
<h2 class="title">
@if(session()->get('language') == 'hindi'){{$subcat->subcategory_name_hin}} @else {{ $subcat->subcategory_name_en }} @endif
</h2></a>


@php
$subsubcategory = App\Models\SubSubCategory::where('subcategory_id',$subcat->id)->orderBy('subsubcategory_name_en','ASC')->get();
@endphp

@foreach($subsubcategory as $sscat)
                    <ul class="links list-unstyled">


                    <li><a href="{{ url('subsubcategory/product/'.$sscat->id.'/'.$sscat->subsubcategory_slug_en) }}">
                      @if(session()->get('language') == 'hindi'){{$sscat->subsubcategory_name_hin}} @else {{ $sscat->subsubcategory_name_en }} @endif
                      </a></li>
                    


                  </ul>
@endforeach
                </div>
                <!-- /.col -->
                @endforeach
                <!-- /.col --> 
              </div>
              <!-- /.row --> 
            </li>
            <!-- /.yamm-content -->
          </ul>
          <!-- /.dropdown-menu --> 
        </li>
        @endforeach
        <!-- /.menu-item -->
        
    
        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-futbol-o"></i>Sports</a> 
          <!-- ================================== MEGAMENU VERTICAL ================================== --> 
          <!-- /.dropdown-menu --> 
          <!-- ================================== MEGAMENU VERTICAL ================================== --> </li>
        <!-- /.menu-item -->
        
        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-envira"></i>Home and Garden</a> 
          <!-- /.dropdown-menu --> </li>
        <!-- /.menu-item -->
        
      </ul>
      <!-- /.nav --> 
    </nav>
    <!-- /.megamenu-horizontal --> 
  </div>
  <!-- /.side-menu --> 
