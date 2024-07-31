@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Menu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ asset('/home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ asset('/menu') }}">Menus</a></li>
              <li class="breadcrumb-item active">Add Menu</li>
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
                <h3 class="card-title">Edit Menu</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php $menu_data = $data['menu']; ?>
              <form method="post" action="{{asset('menuedit')}}/{{ $menu_data->id }}" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ $menu_data->menu_name }}" class="form-control" id="name">
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
                    <label>Select Thumb Images</label>
                    <div class="select2-purple">
                      <input type="hidden" name="thumb_images" id="id_thumb_images" value="{{ isset($menu_data->image) ? $menu_data->image : 0 }}" id="id_thumb_images">
                      <input type="text" class="form-control" id="name_thumb_images" value="{{ isset($menu_data->image) ? $menu_data->image : ''  }}" id="name_thumb_images" disabled>
                      <button type="button" class="form-control btn btn-default" data-toggle="modal" data-target="#modal-thumb">
                        Select Thumb Images
                      </button>
                      <button type="button" class="form-control btn btn-default upload_image_button" data-toggle="modal" data-box="thumb" data-target="#modal-upload">Upload Image</button>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Select Menus</label>
                      <select class="form-control" name="menu">
                        <option value="0">Select Menu</option>
                        @foreach($data['menus'] as $menu)
                          <option value="{{ $menu->id }}" <?php if($menu_data->menu_id == $menu->id) { echo "selected"; }?>>{{ $menu->menu_name }}</option>
                        @endforeach
                      </select>
                      @error('menu')
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <!-- <span class="fas fa-envelope"> -->
                            {{ $errors->first('menu') }}
                            <!-- </span> -->
                          </div>
                        </div>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Select Menu Types</label>
                    <select class="form-control" name="type">
                        <option value="">Select Menu Type</option>
                        @foreach($data['types'] as $type)
                          <option value="{{ $type->id }}" <?php if($menu_data->type_id == $type->id) { echo "selected"; }?>>{{ $type->type }}</option>
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
                    <label for="exampleInputPassword1">Select Menu Category</label>
                    <select class="form-control" name="category">
                        <option value="">Select Menu Category</option>
                        @foreach($data['categories'] as $category)
                          <option value="{{ $category->id }}" <?php if($menu_data->category_id == $category->id) { echo "selected"; }?>>{{ $category->category }}</option>
                        @endforeach
                    </select>
                      @error('category')
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <!-- <span class="fas fa-envelope"> -->
                            {{ $errors->first('category') }}
                            <!-- </span> -->
                          </div>
                        </div>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Menu Link</label>
                    <input type="type" class="form-control" id="link" value="{{ $menu_data->menu_link }}" name="link">
                    @error('link')
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <!-- <span class="fas fa-envelope"> -->
                            {{ $errors->first('link') }}
                            <!-- </span> -->
                          </div>
                        </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Menu Class</label>
                    <input type="type" class="form-control" id="class" value="{{ $menu_data->menu_class }}" name="class">
                    @error('class')
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <!-- <span class="fas fa-envelope"> -->
                            {{ $errors->first('class') }}
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
            <div class="modal fade" id="modal-upload">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Upload Image</h4>
                      
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body" style="height:50%;">
                    <form method="post" id="image_upload_form">
                      @csrf
                      <input type="hidden" name="box" id="image_box">
                        <div class="card-body">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Upload File</label>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" name="file" id="customFile">
                              <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            @error('customFile')
                                <div class="input-group-append">
                                  <div class="input-group-text">
                                    <!-- <span class="fas fa-envelope"> -->
                                    {{ $errors->first('customFile') }}
                                    <!-- </span> -->
                                  </div>
                                </div>
                            @enderror
                          </div>
                        </div>
                        <!-- /.card-body -->
                       
                      
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" id="close" >Save Image</button>
                      </form>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <div class="modal fade" id="modal-thumb">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Select Thumb Image</h4>
                      
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <input type="hidden" id="image_thumb_name">
                    <input type="hidden" id="image_thumb_id">
                    <div class="modal-body" style="height: 400px; overflow: scroll;">
                    <div class="row image_row">
                    @foreach($data['file'] as $file)
                        <div class="col-md-3 popup" >
                          <img style="width: 100%;" class="image_sec" data-name="{{$file->file_name}}" data-id="{{$file->id}}" src="{{ asset('file').'/'.$file->file_name }}"/>
                          {{ $file->file_name }}
                        </div>
                    @endforeach
                    </div>
                    <div class="card-footer clearfix">
                    {{ $data['file']->links() }}
                    </div>
                      <!-- <p>One fine body&hellip;</p> -->
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" data-dismiss="modal" id="save_thumb_image">Save changes</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
</div>
@endsection