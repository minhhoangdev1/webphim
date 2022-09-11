@extends('layouts.admin')
@section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">{{isset($genre) ? 'Cập nhật thể loại' : 'Thêm thể loại'}}</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('country.index')}}">Thể loại</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      {{isset($genre) ? 'Cập nhật thể loại' : 'Thêm thể loại'}}
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
              <div class="card">
                <form class="form-horizontal" action="{{isset($genre) ? route('genre.update',[$genre->id]) : route('genre.store')}}" method="POST">
                  @if(isset($genre))
                    @method('PUT')
                  @endif
                  @csrf
                  <div class="card-body">
                    <!-- <h4 class="card-title">Personal Info</h4> -->
                    <div class="form-group row">
                      <label
                        for="fname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Tiêu đề *</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control @error('title')is-invalid @enderror"
                          id="fname"
                          name="title"
                          placeholder="Nhập tiêu đề"
                          value="{{isset($genre) ? $genre->title : ''}}"
                        />
                        <div class="invalid-feedback">
                          @error('title'){{$message}}@enderror
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-sm-3 text-end control-label col-form-label">Trạng thái *</label>
                    <div class="col-md-9">
                      <select
                        class="select2 form-select shadow-none @error('status')is-invalid @enderror"
                        style="width: 100%; height: 36px"
                        name="status"
                      >
                        <option value="" disabled selected>---Chọn trạng thái---</option>
                        <option value="1" {{(isset($genre) &&  $genre->status == 1) ? 'selected' :'' }}>Hiện</option>
                        <option value="0" {{(isset($genre) &&  $genre->status == 0) ? 'selected' :'' }}>Ẩn</option>
                      </select>
                      <div class="invalid-feedback">
                        @error('status'){{$message}}@enderror
                      </div>
                    </div>
                  </div>
                  </div>
                  <div class="border-top">
                    <div class="card-body">
                      <input type="submit" class="btn btn-primary" value="Thực hiện"/>
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
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
          All Rights Reserved by Matrix-admin. Designed and Developed by
          <a href="https://www.wrappixel.com">WrapPixel</a>.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
@endsection