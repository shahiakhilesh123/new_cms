@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ asset('/') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ asset('categories') }}">Category</a></li>
              <li class="breadcrumb-item active">Edit Category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
        <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{asset('categories/edit')}}/{{ $data['singleCate']->id }}" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" name="name" value="{{ $data['singleCate']->name }}" class="form-control" id="name">
                    @error('name')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('name') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Select Category</label>
                    <select class="form-control" name="category">
                        <option value="0">Select Category</option>
                        @foreach($data['categories'] as $category)
                          <option value="{{ $category->id }}" <?php if( $data['singleCate']->category_id == $category->id) { echo "selected"; }  ?>>{{ $category->name }}</option>
                        @endforeach
                    </select>
                      @error('type')
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <!-- <span class="fas fa-envelope"> -->
                            {{ $errors->first('type') }}
                            <!-- </span> -->
                          </div>
                        </div>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Display on Home page</label>
                    <div class="form-check">
                          <input class="form-check-input" name="home_page_status" type="checkbox" <?php if($data['singleCate']->home_page_status == 1){ echo "checked"; } ?>>
                          <label class="form-check-label">Display on Home page</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Select File</label>
                    <div class="custom-file">
                    <select class="form-control select" name="file" style="width: 100%;">
                      <option value="0">Select File</option>
                      @foreach($data['files'] as $file)
                          <option value="{{ $file->id }}" <?php if($file->id == $data['singleCate']->image_name){ echo "selected"; } ?>>{{ $file->file_name }}</option>
                      @endforeach
                    </select>
                    </div>
                    @error('file')
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <!-- <span class="fas fa-envelope"> -->
                            {{ $errors->first('file') }}
                            <!-- </span> -->
                          </div>
                        </div>
                    @enderror
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
</div>
@endsection