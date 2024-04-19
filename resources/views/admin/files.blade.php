@extends('layouts.admin')

@section('content')
<style>
 /* Pagination styles */
.card-footer {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 1rem;
}

.card-footer nav[role="navigation"] {
    display: flex;
    justify-content: center;
    align-items: center;
}

.card-footer nav[role="navigation"] > div {
    display: flex;
    align-items: center;
}

.card-footer nav[role="navigation"] > div > div:first-child {
    margin-right: auto;
}

.card-footer nav[role="navigation"] > div > div:last-child {
    margin-left: auto;
}

.card-footer nav[role="navigation"] > div > div > a,
.card-footer nav[role="navigation"] > div > div > span {
    padding: 0.375rem 0.75rem;
    margin: 0 0.25rem;
    display: inline-block;
    color: #007bff;
    border: 1px solid #dee2e6;
    border-radius: 0.25rem;
}

.card-footer nav[role="navigation"] > div > div > a:hover,
.card-footer nav[role="navigation"] > div > div > span:hover {
    color: #0056b3;
    background-color: #e9ecef;
    border-color: #dee2e6;
}

.card-footer nav[role="navigation"] > div > div > a:focus,
.card-footer nav[role="navigation"] > div > div > span:focus {
    color: #0056b3;
    background-color: #e9ecef;
    border-color: #dee2e6;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.card-footer nav[role="navigation"] > div > div > span.disabled,
.card-footer nav[role="navigation"] > div > div > a.disabled {
    color: #6c757d;
    pointer-events: none;
    background-color: #fff;
    border-color: #dee2e6;
}

.card-footer nav[role="navigation"] > div > div > svg {
    width: 1.25rem; /* Adjust the size of the arrows */
    height: 1.25rem;
    vertical-align: middle; /* Align the arrows vertically */
    margin: 0 0.25rem; /* Add spacing between the arrows and the text */
}
/* .card-footer nav[role="navigation"] > div > div:first-child {
    display: none;
} */
/* .card-footer nav[role="navigation"] .sm:flex-1 .text-center {
    margin-top: 10px; /* Adjust as needed */
/* }  */
/* .card-footer nav[role="navigation"] > div > div:last-child {
    display: block;
} */
/* .card-footer nav[role="navigation"] .inline-flex {
    display: inline-flex;
} */

.card-footer nav[role="navigation"] .inline-flex a,
.card-footer nav[role="navigation"] .inline-flex span {
    font-family: inherit;
}
/* Styles for Pagination Navigation */

/* Hide the 'Showing x to y of z results' text */
.card-footer p {
    display: none;
}

/* Align the 'Showing x to y of z results' text in the center */
.card-footer .flex-1 {
    text-align: center;
}

/* Styles for pagination links */
.card-footer a {
    display: inline-block;
    padding: 0.375rem 0.75rem;
    margin-left: 0.5rem;
    font-size: 0.875rem;
    font-weight: 500;
    line-height: 1.25rem;
    color: #4a5568;
    border: 1px solid #e2e8f0;
    border-radius: 0.375rem;
    transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out, color 0.2s ease-in-out;
}

.card-footer a:hover {
    color: #2b6cb0;
    border-color: #2b6cb0;
}

.card-footer a.active {
    color: #ffffff;
    background-color: #2b6cb0;
    border-color: #2b6cb0;
}

.card-footer a.disabled {
    opacity: 0.5;
    pointer-events: none;
}

/* Styles for pagination arrows */
.card-footer svg {
    width: 1rem;
    height: 1rem;
    vertical-align: middle;
}

/* Styles for pagination container */
.card-footer nav {
    display: flex;
    justify-content: center;
    margin-top: 1rem;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>File List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">File List</li>
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
                <h3 class="card-title">Files</h3>

                <div class="card-tool s">
                  <div class="input-group input-group-sm float-right" style="width: 150px;">
                    <!-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search"> -->

                    <!-- <div class="input-group-append"> -->
                      <a href="{{ asset('files') }}/add" class="btn btn-primary ">
                        Add File
                      </a>
                    <!-- </div> -->
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
              @include('layouts.messages')
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>File Name</th>
                      <th>File Size</th>
                      <th>File Type</th>
                      <th>Image</th>
                      <!-- <th></th> -->
                    </tr> 
                  </thead>
                  <tbody>
                  @if(count($files) > 0)
                    @foreach($files as $file)
                    <tr>
                      <td>{{ $file->id }}</td>
                      <td>{{ $file->file_name }}</td>
                      <td>{{ $file->file_size }}</td>
                      <td>{{ $file->file_type }}</td>
                      <td><img src="{{ asset('file').'/'.$file->file_name }}" style="width:22%; height: 50px;"/></td>
                      <!-- <td>
                        <a href="{{ asset('editmenu') }}/{{$file->id}}"><i class="fas fa-edit"></i></a>
                      </td> -->
                    </tr>
                    @endforeach
                  @else
                    <tr colspan="5"><td>No Data Found</td></tr>
                  @endif
                  </tbody>
                </table>
              </div>
              <div class="card-footer clearfix">
                <!-- {{ $files->url(asset('/')) }} -->
              {{ $files->links() }}
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
  @endsection