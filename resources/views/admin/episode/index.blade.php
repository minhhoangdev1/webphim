@extends('layouts.admin')
@section('content')
<!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Quản lý tập phim</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('movie.index')}}">Phim</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Quản lý tập phim
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="row">
            <div class="col-md-12">
            <span style="display:none" id="episode_http_status">{{Session::has('status') ? Session::get('status').','.Session::get('type') :''}}</span>
              <div class="card">
                <form  class="form-horizontal" action="{{route('episode.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Chọn phim *</label
                      >
                      <div class="col-sm-9">
                        <select
                          class="select2 form-select shadow-none @error('movie_id')is-invalid @enderror"
                          style="width: 100%; height: 36px"
                          name="movie_id"
                          id="movie_id"
                        >
                            @if(!isset($episode))
                                <option value="" disabled selected>---Chọn phim---</option>
                                @foreach($movies as $key => $movie)
                                    <option value="{{$movie->id}}">{{$movie->title}}</option>
                                @endforeach
                            @else
                                <option value="{{$episode->movie->id}}">{{$episode->movie->title}}</option>
                            @endif
                        </select>
                        <div class="invalid-feedback">
                          @error('movie_id'){{$message}}@enderror
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Link phim *</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control @error('linkphim')is-invalid @enderror"
                          id="linkphim"
                          name="linkphim"
                          placeholder="Nhập link phim"
                        />
                        <div class="invalid-feedback">
                          @error('linkphim'){{$message}}@enderror
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Chọn tập phim *</label
                      >
                      <div class="col-sm-9">
                        <select
                          class="select2 form-select shadow-none @error('episode')is-invalid @enderror"
                          style="width: 100%; height: 36px"
                          name="episode" 
                          id="episode"
                        >
                            @if(isset($episode))
                                <option value="{{$episode->episode}}" selected>{{$episode->episode}}</option>
                            @endif   
                        </select>
                        <div class="invalid-feedback">
                          @error('episode'){{$message}}@enderror
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="border-top">
                    <div class="card-body">
                      <button type="submit" class="btn btn-primary">
                        Submit
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- End PAge Content -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Right sidebar -->
          <!-- ============================================================== -->
          <!-- .right-sidebar -->
          <!-- ============================================================== -->
          <!-- End Right sidebar -->
          <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
@endsection