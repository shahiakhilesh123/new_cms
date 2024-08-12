@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Page Sequence</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Page Sequence</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Page Sequence</h3>

                <div class="card-tool s">
                  <div class="input-group input-group-sm float-right" style="width: 150px;">
                    <!-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search"> -->
                    <?php $pages = App\Models\Pages::get()->all(); ?>
                    <!-- <select class="form-control float-right" id="page_id">
                          @foreach($pages as $page)
                          <option value="{{ $page->id }}">{{ $page->name }}</option>
                          @endforeach
                    </select> -->
                    
                    <div class="input-group-append">
                      <!-- <a onclick="getVal()" class="btn btn-primary ">
                        Save
                      </a> -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <form>
                @csrf
                <table class="table table-hover text-nowrap" id="mytable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Blogs Name</th>
                      <th>Select Stroy For Breaking News</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($blogs) > 0)
                        @foreach($blogs as $blog)
                            <?php //preg_match('#^([^.!?\s]*[\.!?\s]+){0,18}#',$blogs->sort_description,$matches); ?>
                            <tr draggable="true" ondragstart="start()"  ondragover="dragover()">
                                <td class="td_val">{{ $blog->id }}</td>
                                <td>{{ $blog->name }}</td>
                                <td><input type="radio" name="check[]" onclick="changeBlog({{$blog->id}}, {{$blog->breaking_status}})" <?php if($blog->breaking_status == 1){ echo 'checked';} ?>></td>
                            </tr>
                        @endforeach
                    @else
                    <tr draggable="true" ondragstart="start()"  ondragover="dragover()">
                        <td colspan="5">No Data Found</td>
                    </tr>
                    @endif
                  </tbody>
                </table>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script>
    var row;

    function start(){  
      row = event.target; 
    }
    function dragover(){
      var e = event;
      e.preventDefault(); 
      
      let children= Array.from(e.target.parentNode.parentNode.children);
      
      if(children.indexOf(e.target.parentNode)>children.indexOf(row))
        e.target.parentNode.after(row);
      else
        e.target.parentNode.before(row);
    }

    function changeBlog(id, status){
        var arr = [];
        let csrf = $("input[name=_token]").val();
        let myKeyVals = { _token: csrf, id : id, status: status};
          $.ajax({
              type: 'POST',
              url: "{{asset('posts/breaking') }}",
              data: myKeyVals,
              dataType: "text",
              success: function(resultData) 
              { 
                alert("Posts status changed");
                window.location.reload();
              }
              });
    }
  </script>
  @endsection