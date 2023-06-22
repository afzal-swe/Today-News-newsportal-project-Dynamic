
@extends('layouts.app')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Table</h1>
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
                          <h3 class="card-title">User Manage</h3>
                          <button class="btn btn-info btn-sm" style="float: right" data-toggle="modal" data-target="#modal-default">Add User</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                    <th>Category</th>
                                    <th>District</th>
                                    <th>Post</th>
                                    <th>Setting</th>
                                    <th>Gallery</th>
                                    <th>Ads</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($user as $key=>$row)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>
                                            @if ($row->type==1)
                                            <button class="text-success">Active</button>
                                            @else
                                            <button class="text-danger">Deactive</button>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($row->category==1)
                                            <button class="text-success">Active</button>
                                            @else
                                            <button class="text-danger">Deactive</button>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($row->district==1)
                                            <button class="text-success">Active</button>
                                            @else
                                            <button class="text-danger">Deactive</button>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($row->post==1)
                                            <button class="text-success">Active</button>
                                            @else
                                            <button class="text-danger">Deactive</button>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($row->setting==1)
                                            <button class="text-success">Active</button>
                                            @else
                                            <button class="text-danger">Deactive</button>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($row->gallery==1)
                                            <button class="text-success">Active</button>
                                            @else
                                            <button class="text-danger">Deactive</button>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($row->ads==1)
                                            <button class="text-success">Active</button>
                                            @else
                                            <button class="text-danger">Deactive</button>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($row->role==1)
                                            <button class="text-success">Active</button>
                                            @else
                                            <button class="text-danger">Deactive</button>
                                            @endif
                                        </td>

                                        <td>
                                            <a href="#" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('user.destroy',$row->id) }}" id="delete" class="btn btn-danger sm delete" title="Delete Data"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                </div>
            </div>
        </div>
    </section>

{{-- Category Added Modal --}}
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Insert User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('writer.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">

                        <div class="form-group">
                            <label for="">Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control  "  required>
                           
                        </div>
                        <div class="form-group">
                            <label for="">Email<span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control  "  required>
                           
                        </div>
                        <div class="form-group">
                            <label for="">Password<span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control  "  required>
                           
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-3">
                                <label for="">Category</label>
                                <input type="checkbox" name="category" class="form-control  " value="1"  required>
                               
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="">District</label>
                                <input type="checkbox" name="district" class="form-control  " value="1"  required>
                               
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="">Posts</label>
                                <input type="checkbox" name="post" class="form-control  " value="1"  required>
                               
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="">Setting</label>
                                <input type="checkbox" name="setting" class="form-control  " value="1"  required>
                               
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-3">
                                <label for="">Gallery</label>
                                <input type="checkbox" name="gallery" class="form-control  " value="1"  required>
                               
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="">Ads</label>
                                <input type="checkbox" name="ads" class="form-control  " value="1"  required>
                               
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="">Role</label>
                                <input type="checkbox" name="role" class="form-control  " value="1"  required>
                               
                            </div>
                            {{-- <div class="form-group col-lg-3">
                                <label for="">Writter</label>
                                <input type="checkbox" name="type" checked value="0" class="form-control  " disabled  required>
                            </div> --}}
                        </div><br>

                        


                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

@endsection