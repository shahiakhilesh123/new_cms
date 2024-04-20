@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Post</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ asset('/') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ asset('Posts') }}">Posts</a></li>
              <li class="breadcrumb-item active">Add Post</li>
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
                <h3 class="card-title">Add Posts</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{asset('posts/add')}}">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Post Title</label>
                    <input type="text" name="name" class="form-control" id="name">
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
                    <label for="name">Title URL</label>
                    <input type="text" name="eng_name" class="form-control" id="eng_name">
                    @error('eng_name')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('eng_name') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Author Name</label>
                    <input type="text" name="author" class="form-control" id="author">
                    @error('author')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('author') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Keyword</label>
                    <input type="text" name="keyword" class="form-control" id="keyword">
                    @error('keyword')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('keyword') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Brief</label>
                    <input type="text" name="sort_desc" class="form-control" id="sort_desc">
                    @error('sort_desc')
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <!-- <span class="fas fa-envelope"> -->
                          {{ $errors->first('sort_desc') }}
                          <!-- </span> -->
                        </div>
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Select Category</label>
                    <div class="select2-purple">
                        <select class="form-control" name="category">
                            <option value="0">Select Category</option>
                            @foreach($data['categories'] as $category)
                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
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
                    <label for="exampleInputPassword1">Select State</label>
                    <div class="select2-purple">
                        <select class="form-control" name="state">
                            <option value="0">Select State</option>
                            @foreach($data['states'] as $state)
                              <option value="{{ $state->id }}">{{ $state->name }}</option>
                            @endforeach
                        </select>
                    </div>
                      @error('state')
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <!-- <span class="fas fa-envelope"> -->
                            {{ $errors->first('state') }}
                            <!-- </span> -->
                          </div>
                        </div>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Select District</label>
                    <div class="select2-purple">
                        <select class="form-control"  name="district">
                            <option value="0">Select District</option>
                            @foreach($data['district'] as $district)
                              <option value="{{ $district->id }}">{{ $district->name }}</option>
                            @endforeach
                        </select>
                    </div>
                      @error('district')
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <!-- <span class="fas fa-envelope"> -->
                            {{ $errors->first('district') }}
                            <!-- </span> -->
                          </div>
                        </div>
                      @enderror
                  </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Post Description</label>
                    <textarea id="summernote" style="height: 360px;" name="description">
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Video Link</label>
                    <input type="text" name="link" class="form-control" id="sort_desc">
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
                    <label for="exampleInputPassword1">Display on Home page</label>
                    <div class="form-check">
                          <input class="form-check-input" name="home_page_status" type="checkbox">
                          <label class="form-check-label">Display on Home page</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Header Section Component(Home)</label>
                    <div class="form-check">
                          <input class="form-check-input" name="header_sec" type="checkbox">
                          <label class="form-check-label">Header Section Component(Home)</label>
                    </div>
                </div>
                  <div class="form-group">
                    <label>Select Thumb Images</label>
                    <div class="select2-purple">
                      <input type="hidden" name="thumb_images" id="id_thumb_images">
                      <input type="text" class="form-control" id="name_thumb_images" disabled>
                      <button type="button" class="form-control btn btn-default" data-toggle="modal" data-target="#modal-thumb">
                        Select Thumb Images
                      </button>
                      <button type="button" class="form-control btn btn-default upload_image_button" data-box="thumb" data-toggle="modal" data-target="#modal-upload">Upload Image</button>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Select Images</label>
                    <div class="select2-purple">
                      <input type="hidden" name="images" id="id_images">
                      <input type="text" class="form-control" id="name_images" disabled>
                      <button type="button" class="form-control btn btn-default" data-toggle="modal" data-target="#modal-default">
                        Select Images
                      </button>
                      <button type="button" class="form-control btn btn-default upload_image_button" data-box="image" data-toggle="modal" data-target="#modal-upload">Upload Image</button>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              
              <div class="modal fade" id="modal-default">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Select Image</h4>
                      
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <input type="hidden" id="image_name">
                    <input type="hidden" id="image_id">
                    <div class="modal-body" style="height: 400px; overflow: scroll;">
                    
                    <div class="row image_row">
                    @foreach($data['file'] as $file)
                        <div class="col-md-3 popup" >
                          <img style="width: 100%;" class="image_sec" data-name="{{$file->file_name}}" data-id="{{$file->id}}" src="{{ asset('file').'/'.$file->file_name }}"/>
                          {{ $file->file_name }}
                        </div>
                    @endforeach
                    </div>
                      <!-- <p>One fine body&hellip;</p> -->
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" data-dismiss="modal" id="save_image">Save changes</button>
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
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
</div>
<script>
  $('.upload_image_button').click(function () {
    $('#image_box').val($(this).data('box'));
  });
  $('.image_sec').click(function () {
    $('.popup').removeAttr('style');
    $(this).parent().attr('style','border: 5px solid blue;');
    $('#image_name').val($(this).data('name'));
    $('#image_id').val($(this).data('id'));
    $('#image_thumb_name').val($(this).data('name'));
    $('#image_thumb_id').val($(this).data('id'));
  })
  $('#save_image').click(function () {
    $('#id_images').val($('#image_id').val());
    $('#name_images').val($('#image_name').val());
    //$('#images').val($(this).data('id'));
  })
  $('#save_thumb_image').click(function () {
    $('#id_thumb_images').val($('#image_thumb_id').val());
    $('#name_thumb_images').val($('#image_thumb_name').val());
    //$('#images').val($(this).data('id'));
  })
  $('#image_upload_form').submit(function(event) {
    event.preventDefault();
    var file = $('#customFile').prop('files')[0];
    var form_data = new FormData($(this)[0]);
    form_data.append('file', file, file.name);
    $.ajax({
            url: '{{ asset("/files/upload") }}',
            type: 'POST',   
            contentType: false,
            processData: false,   
            cache: false,        
            data: form_data,
            success: function(data) {
              let html = '';
                if (data.success) {
                  if(data.box == 'thumb') {
                    $('#id_thumb_images').val(data.file_id);
                    $('#name_thumb_images').val(data.file_name);
                  } else {
                    $('#id_images').val(data.file_id);
                    $('#name_images').val(data.file_name);
                  }
                  $('#close').attr('data-dismiss',"modal");
                  $('#close').click();
                  $('#close').removeAttr('data-dismiss');
                } else {
                  alert('error');
                }
            },
            error: function(data) {
                console.log("this is error");
            }
    });
  });
</script>
@endsection