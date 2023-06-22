
@extends('layouts.app')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Writer Manage</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Writer Update</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Writer Update</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Update Writer</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('writer.update',$edit->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                    
                                        <div class="card-body">
                    
                                            <div class="form-group">
                                                <label for="">Name<span class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control  " value="{{ $edit->name }}" >
                                               
                                            </div>
                                            <div class="form-group">
                                                <label for="">Email<span class="text-danger">*</span></label>
                                                <input type="email" name="email" class="form-control  " value="{{ $edit->email }}">
                                               
                                            </div>
                    
                                            <div class="row">
                                                <div class="form-group col-lg-3">
                                                    <label for="">Category</label>
                                                    <input type="checkbox" name="category" class="form-control " aria-describedatBy="emailHelp"  value="1" @if ($edit->category==1) checked=""
                                                    
                                                        
                                                    @endif> 
                                                    
                                                   
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label for="">District</label>
                                                    <input type="checkbox" name="district" class="form-control  " aria-describedatBy="emailHelp" value="1"  @if ($edit->district==1) checked=""
                                                        
                                                    @endif  >
                                                   
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label for="">Posts</label>
                                                    <input type="checkbox" name="post" class="form-control  " aria-describedatBy="emailHelp" value="1" @if ($edit->post==1) checked=""
                                                        
                                                    @endif  >
                                                   
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label for="">Setting</label>
                                                    <input type="checkbox" name="setting" class="form-control  " aria-describedatBy="emailHelp" value="1" @if ($edit->setting==1) checked=""
                                                        
                                                    @endif  >
                                                   
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-lg-3">
                                                    <label for="">Gallery</label>
                                                    <input type="checkbox" name="gallery" class="form-control  " aria-describedatBy="emailHelp" value="1" @if ($edit->gallery==1) checked=""
                                                        
                                                    @endif >
                                                   
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label for="">Ads</label>
                                                    <input type="checkbox" name="ads" class="form-control  " aria-describedatBy="emailHelp" value="1" @if ($edit->ads==1) checked=""
                                                        
                                                    @endif  >
                                                   
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label for="">Role</label>
                                                    <input type="checkbox" name="role" class="form-control  " aria-describedatBy="emailHelp" value="1" @if ($edit->role==1) checked=""
                                                        
                                                    @endif >
                                                   
                                                </div>
                                                {{-- <div class="form-group col-lg-3">
                                                    <label for="">Writter</label>
                                                    <input type="checkbox" name="type" checked value="0" class="form-control  " disabled  required>
                                                </div> --}}
                                            </div><br>
                    
                                            
                    
                    
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Update User</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                              </div>
                        </div>
                        <!-- /.card-body -->
                      </div>
                </div>
            </div>
        </div>
    </section>

@endsection