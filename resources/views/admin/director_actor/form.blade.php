@extends('layouts.admin')
@section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">{{isset($dir_act) ? 'Cập nhật đạo diễn - diễn viên' : 'Thêm đạo diễn - diễn viên'}}</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('director_actor.index')}}">đạo diễn - diễn viên</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      {{isset($dir_act) ? 'Cập nhật đạo diễn - diễn viên' : 'Thêm đạo diễn - diễn viên'}}
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
                <form class="form-horizontal" action="{{isset($dir_act) ? route('director_actor.update',[$dir_act->id]) : route('director_actor.store')}}"  method="POST">
                  @if(isset($dir_act))
                    @method('PUT')
                  @endif
                  @csrf
                  <div class="card-body">
                    <div class="form-group row">
                      <label
                        for="fname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Tên *</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control @error('name')is-invalid @enderror"
                          name="name"
                          placeholder="Nhập tên"
                          value="{{isset($dir_act) ? $dir_act->name : ''}}"
                        />
                        <div class="invalid-feedback">@error('name'){{$message}}@enderror</div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 text-end control-label col-form-label">Vai trò *</label>
                      <div class="col-md-9">
                        <select
                          class="select2 form-select shadow-none @error('type')is-invalid @enderror"
                          style="width: 100%; height: 36px"
                          name="type"
                        >
                          <option value="" disabled selected>---Chọn vai trò---</option>
                          <option value="DIR" {{(isset($dir_act) &&  $dir_act->type == 'DIR') ? 'selected' :'' }}>Đạo diễn</option>
                          <option value="ACT" {{(isset($dir_act) &&  $dir_act->type == 'ACT') ? 'selected' :'' }}>Diễn viên</option>
                        </select>
                        <div class="invalid-feedback" > @error('type'){{$message}}@enderror</div>
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