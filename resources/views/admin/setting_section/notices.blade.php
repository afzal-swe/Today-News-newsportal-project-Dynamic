
@extends('layouts.app')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Notice Settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Notice Settings</li>
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
                          <h3 class="card-title">Notice Settings</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Notice Setting</h4>
                                  @if ($notices->status == 1)
                                  <a href="{{ route('deactive.notices',$notices->id) }}" style="float: right" class="btn btn-danger">Deactive</a>
                                  @else
                                  <a href="{{ route('active.notices',$notices->id) }}" style="float: right" class="btn btn-success">Active</a>
                                  @endif
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('notice.update',$notices->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                    
                                        <div class="card-body">
                    
                                            <div class="form-group">
                                                <label for="">Notice</label>
                                                <textarea type="text" name="notice" class="form-control" required> 
                                                    {{ $notices->notice }}
                                                </textarea>
                                                @if ($notices->status == 1)
                                                <small class="text-success" >Now Notice are Active</small>
                                                @else
                                                <small class="text-danger" >Now Notice are Deactive</small>
                                                @endif
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