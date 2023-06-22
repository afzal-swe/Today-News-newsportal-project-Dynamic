
@extends('layouts.app')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Website Setting</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Setting</li>
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
                          <h3 class="card-title">Website Setting</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Update Website</h4>
                                  
                              
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('websitesetting.update',$setting->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">

                                            <div class="row">
                                              <div class="form-group col-md-6">
                                                  <label for="exampleInputEmail1">Address</label>
                                                  <input type="text" name="address_en" class="form-control" value="{{ $setting->address_en }}" required> 
                                              </div>
                                              <div class="form-group col-md-6">
                                                  <label for="exampleInputPassword1"> ঠিকানা</label>
                                                  <input type="text" name="address_bn" class="form-control" value="{{ $setting->address_bn }}" required> 
                                              </div>
                                            </div>

                                            <div class="row">
                                              <div class="form-group col-md-6">
                                                  <label for="exampleInputEmail1">Phone</label>
                                                  <input type="text" name="phone_en" class="form-control" value="{{ $setting->phone_en }}" required> 
                                              </div>
                                              <div class="form-group col-md-6">
                                                  <label for="exampleInputPassword1">ফোন</label>
                                                  <input type="text" name="phone_bn" class="form-control" value="{{ $setting->phone_bn }}" required> 
                                              </div>
                                            </div>

                                            <div class="row">
                                              <div class="form-group col-md-12">
                                                  <label for="exampleInputEmail1">E-mail</label>
                                                  <input type="email" name="email" class="form-control" value="{{ $setting->email }}" required> 
                                              </div>
                                            </div>

                                            <div class="row">
                                              <div class="form-group col-md-6">
                                                  <label for="exampleInputEmail1">Logo</label>
                                                  <input type="file" name="logo" class="form-control" value="{{ $setting->logo }}"> 
                                              </div>
                                            </div>
                                          
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Update Setting</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                              </div>
                            </div>
                </div>
                        
            </div>
          </div>
        </div>
    </section>
  </div>
@endsection