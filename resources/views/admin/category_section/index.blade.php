
@extends('layouts.app')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category Table</h1>
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
                          <h3 class="card-title">All Categories</h3>
                          <button class="btn btn-info btn-sm" style="float: right" data-toggle="modal" data-target="#modal-default">Add Category</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Category Bangla</th>
                                    <th>Category English</th>
                                    <th>Soft Delete</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($categoryData as $key=>$row)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{ $row->category_bn }}</td>
                                        <td>{{ $row->category_en }}</td>
                                        <td>{{ $row->soft_delete }}</td>
                                        <td>
                                            <a href="#" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('category.destroy',$ow->id) }}" id="delete" class="btn btn-danger sm" title="Delete Data"><i class="fas fa-trash-alt"></i></a>
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
              <h4 class="modal-title">Insert New Category</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">

                        <div class="form-group">
                            <label for="">Category Name Bangla <span class="text-danger">*</span></label>
                            <input type="text" name="category_bn" class="form-control @error('category_bn') is-invalid @enderror " placeholder="Category Name Bangla" value="{{old('category_bn')}}" required>
                            @error('category_bn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Category Name English <span class="text-danger">*</span></label>
                            <input type="text" name="category_en" class="form-control @error('category_en') is-invalid @enderror " placeholder="Category Name English" value="{{old('category_en')}}" required>
                            @error('category_en')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


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