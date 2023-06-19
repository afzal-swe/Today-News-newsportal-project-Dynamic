
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
                    
                                            <div class="form-group">
                                                <label for="">Fajr</label>
                                                <input type="text" name="fajr" class="form-control" value="{{ $prayer->fajr }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Johr</label>
                                                <input type="text" name="dhuhr" class="form-control" value="{{ $prayer->dhuhr }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Asor</label>
                                                <input type="text" name="asr" class="form-control" value="{{ $prayer->asr }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Maghrib</label>
                                                <input type="text" name="maghrib" class="form-control" value="{{ $prayer->maghrib }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Isha</label>
                                                <input type="text" name="isha" class="form-control" value="{{ $prayer->isha }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Jummah</label>
                                                <input type="text" name="jummah" class="form-control" value="{{ $prayer->jummah }}" required>
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