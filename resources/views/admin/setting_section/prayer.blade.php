
@extends('layouts.app')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Namaz Time</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Namaz Time</li>
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
                          <h3 class="card-title">Namaz Time</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Update Namaz Time</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('prayer.update',$prayer->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                    
                                        <div class="card-body">

                                          <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1">Fajr</label>
                                                <input type="text" name="fajr_en" class="form-control" value="{{ $prayer->fajr_en }}" required> 
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputPassword1">ফজর</label>
                                                <input type="text" name="fajr_bn" class="form-control" value="{{ $prayer->fajr_bn }}" required> 
                                            </div>
                                          </div>

                                          <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1">Johor</label>
                                                <input type="text" name="dhuhr_en" class="form-control" value="{{ $prayer->dhuhr_en }}" required> 
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputPassword1">জোহুর</label>
                                                <input type="text" name="dhuhr_bn" class="form-control" value="{{ $prayer->dhuhr_bn }}" required> 
                                            </div>
                                          </div>

                                          <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1">Asor</label>
                                                <input type="text" name="asr_en" class="form-control" value="{{ $prayer->asr_en }}" required> 
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputPassword1">আসর</label>
                                                <input type="text" name="asr_bn" class="form-control" value="{{ $prayer->asr_en }}" required> 
                                            </div>
                                          </div>

                                          <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1">Maghrib</label>
                                                <input type="text" name="maghrib_en" class="form-control" value="{{ $prayer->maghrib_en }}" required> 
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputPassword1">মাগরিব</label>
                                                <input type="text" name="maghrib_bn" class="form-control" value="{{ $prayer->maghrib_bn }}" required> 
                                            </div>
                                          </div>

                                          <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1">Isha</label>
                                                <input type="text" name="isha_en" class="form-control" value="{{ $prayer->isha_en }}" required> 
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputPassword1">ইশা</label>
                                                <input type="text" name="isha_bn" class="form-control" value="{{ $prayer->isha_bn }}" required> 
                                            </div>
                                          </div>

                                          <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1">Jummah</label>
                                                <input type="text" name="jummah_en" class="form-control" value="{{ $prayer->jummah_en }}" required> 
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputPassword1">জুম্মাহ</label>
                                                <input type="text" name="jummah_bn" class="form-control" value="{{ $prayer->jummah_bn }}" required> 
                                            </div>
                                          </div>
                                        
                    
        
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Update</button>
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