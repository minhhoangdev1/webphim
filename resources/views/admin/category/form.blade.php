@extends('layouts.admin')
@section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">{{isset($category) ? 'Cập nhật danh mục' : 'Thêm danh mục'}}</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('country.index')}}">Danh mục</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      {{isset($category) ? 'Cập nhật danh mục' : 'Thêm danh mục'}}
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
                <form class="form-horizontal" action="{{isset($category) ? route('category.update',[$category->id]) : route('category.store')}}" method="POST">
                  @if(isset($category))
                    @method('PUT')
                  @endif
                  @csrf
                  <div class="card-body">
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
                          value="{{isset($category) ? $category->title : ''}}"
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
                          <option value="1" {{(isset($category) &&  $category->status == 1) ? 'selected' :'' }}>Hiện</option>
                          <option value="0" {{(isset($category) &&  $category->status == 0) ? 'selected' :'' }}>Ẩn</option>
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
    </div>
@endsection