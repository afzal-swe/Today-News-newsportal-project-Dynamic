@extends('layouts.app')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Post Insert Panel </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Post Insert Panel</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Post Insert Panel</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">

                    {{-- Title Section Start --}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Title Bangla</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="title_bn" placeholder="Title Bangla">
                        </div>
      
                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword1">Title English</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="title_en" placeholder="Title English">
                        </div>
                    </div>
                    {{-- Title Section End --}}

                     {{-- Category / Sub-Category Section Start --}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Category</label>
                            <select name="cat_id" id="cat_id" class="form-control">
                                <option selected disabled>Choose Category</option>
                                @foreach ( $category as $row)
                                    <option value="{{ $row->id }}">{{ $row->category_bn }}</option>
                                @endforeach
                            </select> 
                        </div>
      
                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword1">Sub-Category</label>
                            <select name="subcat_id" class="form-control" id="subcat_id">
                                <option selected="" disabled="">Sub-Category</option>
                                
                            </select>
                        </div>
                    </div>
                     {{-- Category Section End --}}


                     {{-- District / Sub-District Section Start --}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">District</label>
                            <select name="dist_id" id="dist_id" class="form-control">
                                <option selected disabled>Choose District</option>
                                @foreach ( $district as $row)
                                    <option value="{{ $row->id }}">{{ $row->district_bn }}</option>
                                @endforeach
                            </select> 
                        </div>
      
                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword1">Sub-District</label>
                            <select name="subdist_id" id="subdist_id" class="form-control">
                                <option selected disabled>Sub-District</option>
                            
                            </select>
                        </div>
                    </div>
                     {{-- Category Section End --}}
                    

                    {{-- Tags Section Start --}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Tags Bangla</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="tags_bn" placeholder="Tags Bangla">
                        </div>
      
                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword1">Tags English</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="tags_en" placeholder="Tags English">
                        </div>
                    </div>
                    {{-- Tags Section End --}}


                    {{-- Discription Section Start --}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Detailos Bangla</label>
                            <textarea class="form-control" name="details_bn" id="summernote" cols="30" rows="4"></textarea>
                        </div>
      
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Detailos English</label>
                            <textarea class="form-control textarea" name="details_en" cols="30" rows="4"></textarea>
                        </div>
                    </div>
                    {{-- Discription Section End --}}

                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="image" required>
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                          </div>
                        </div>
                      </div>

                    <hr>
                    <h4 class="text-center">Extra Option</h4>
                    

                    <div class="row">
                        <div class="form-check col-md-3">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="headline" value="1">
                            <label class="form-check-label" for="exampleCheck1">Headline</label>
                          </div>
      
                          <div class="form-check col-md-3">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="first_section" value="1">
                            <label class="form-check-label" for="exampleCheck1">FirstSection</label>
                          </div>
      
                          <div class="form-check col-md-3">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="first_section_thumbnail" value="1">
                            <label class="form-check-label" for="exampleCheck1">FirstSection Big Thumbnail</label>
                          </div>
      
                          <div class="form-check col-md-3">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="bigthumbnail" value="1">
                            <label class="form-check-label" for="exampleCheck1">General Big Thumbnail</label>
                          </div>
                    </div><br>
                    
                    
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>


<script type="text/javascript" >

$(document).ready(function(){
    $("select[name='cat_id']").on('change',function(){
        var cat_id = $(this).val();
        if(cat_id){
            $.ajax({
                url:"{{ url('/get/subcat/') }}/"+cat_id,
                type:"GET",
                dataType:"json",
                success:function(data){
                    $("#subcat_id").empty();
                    $.each(data, function(key,value) {
                        $("#subcat_id").append('<option value="'+value.id+'">'+value.subcategory_bn+'</option>');
                    });
                },
            });
        }else{
            alert('danger');
        }
    });
});

</script>

<script type="text/javascript" >

$(document).ready(function(){
    $("select[name='dist_id']").on('change',function(){
        var dist_id = $(this).val();
        if(dist_id){
            $.ajax({
                url:"{{ url('/get/subdist/') }}/"+dist_id,
                type:"GET",
                dataType:"json",
                success:function(data){
                    $("#subdist_id").empty();
                    $.each(data, function(key,value) {
                        $("#subdist_id").append('<option value="'+value.id+'">'+value.subdistrict_bn+'</option>');
                    });
                },
            });
        }else{
            alert('danger');
        }
    });
});

</script>




@endsection