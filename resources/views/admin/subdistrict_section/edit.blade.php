
@extends('layouts.app')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sub-District Update</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
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
                          <h3 class="card-title">Sub-District Modify</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Update Sub-District</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('subdistrict.update',$subdistrict->id) }}" method="post">
                                        @csrf
                    
                                        <div class="card-body">
                                            

                                            <div class="form-group">
                                                <label for="">Sub-District Name English</label>
                                                <input type="text" name="subdistrict_en" class="form-control"  value="{{ $subdistrict->subdistrict_en }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Sub-District Name Bangla</label>
                                                <input type="text" name="subdistrict_bn" class="form-control" value="{{ $subdistrict->subdistrict_bn }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Choose District</label>
                                                <select name="district_id" id="" class="form-control">
                                                    <option value="" disabled selected>==chose one==</option>
                                                    @foreach ($destrict as $row)
                                                        <option value="{{ $row->id }}">{{ $row->district_en}} | {{ $row->district_bn}}</option>
                                                    @endforeach
                                                </select>
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