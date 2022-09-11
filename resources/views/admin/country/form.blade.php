@extends('layouts.admin')
@section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">{{isset($country) ? 'Cập nhật quốc gia' : 'Thêm quốc gia'}}</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('country.index')}}">Quốc gia</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      {{isset($country) ? 'Cập nhật quốc gia' : 'Thêm quốc gia'}}
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
          <!-- -->
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <form class="form-horizontal" action="{{isset($country) ? route('country.update',[$country->id]) : route('country.store')}}"  method="POST">
                  @if(isset($country))
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
                          id="country_title"
                          name="title"
                          placeholder="Nhập tiêu đề"
                          value="{{isset($country) ? $country->title : ''}}"
                        />
                        <div class="invalid-feedback" id="country_title_error">@error('title'){{$message}}@enderror</div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 text-end control-label col-form-label">Trạng thái *</label>
                      <div class="col-md-9">
                        <select
                          class="select2 form-select shadow-none @error('status')is-invalid @enderror"
                          style="width: 100%; height: 36px"
                          id="country_status"
                          name="status"
                        >
                          <option value="" disabled selected>---Chọn trạng thái---</option>
                          <option value="1" {{(isset($country) &&  $country->status == 1) ? 'selected' :'' }}>Hiện</option>
                          <option value="0" {{(isset($country) &&  $country->status == 0) ? 'selected' :'' }}>Ẩn</option>
                        </select>
                        <div class="invalid-feedback" id="country_status_error"> @error('status'){{$message}}@enderror</div>
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
    </div>
@endsection