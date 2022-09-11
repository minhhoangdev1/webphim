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
              <h4 class="page-title">{{isset($movie) ? 'Cập nhật phim' : 'Thêm phim mới'}}</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('movie.index')}}">Phim</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      {{isset($movie) ? 'Cập nhật phim' : 'Thêm phim mới'}}
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
                <form  class="form-horizontal" action="{{isset($movie) ? route('movie.update',[$movie->id]) : route('movie.store')}}" method="POST" enctype="multipart/form-data">
                  @if(isset($movie))
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
                          id="movie_title"
                          name="title"
                          placeholder="Nhập tiêu đề"
                          value="{{isset($movie) ? $movie->title : ''}}"
                        />
                        <div class="invalid-feedback">
                          @error('title'){{$message}}@enderror
                        </div>
                      </div>
                    </div>
                    <!-- <div class="form-group row">
                      <label
                        for="fname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Slug *</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control @error('slug')is-invalid @enderror"
                          id="movie_slug"
                          name="slug"
                          placeholder="Nhập slug"
                          value="{{isset($movie) ? $movie->slug : ''}}"
                        />
                        <div class="invalid-feedback">
                          @error('slug'){{$message}}@enderror
                        </div>
                         
                      </div>
                    </div> -->
                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Tên tiếng anh *</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control @error('name_eng')is-invalid @enderror"
                          id="name_eng"
                          name="name_eng"
                          placeholder="Nhập tên tiếng anh"
                          value="{{isset($movie) ? $movie->name_eng : ''}}"
                        />
                        <div class="invalid-feedback">
                          @error('name_eng'){{$message}}@enderror
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="cono1"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Mô tả *</label
                      >
                      <div class="col-sm-9">
                        <textarea class="form-control @error('description')is-invalid @enderror" id="summary-ckeditor" name="description">{{isset($movie) ? $movie->description : ''}}</textarea>
                        <div class="invalid-feedback">
                          @error('description'){{$message}}@enderror
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="cono1"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Tags</label
                      >
                      <div class="col-sm-9">
                        <textarea class="form-control @error('tags')is-invalid @enderror" name="tags">{{isset($movie) ? $movie->tags : ''}}</textarea>
                        <div class="invalid-feedback">
                          @error('tags'){{$message}}@enderror
                        </div>
                      </div>
                    </div>
                    <style type="text/css">
                      .iconAdd{
                        height:40px;
                        position: absolute;
                        align-items: center;
                        padding: 0.375rem 0.75rem;
                        font-size: 18px;
                        font-weight: 400;
                        line-height: 1.5;
                        color: #3e5569;
                        text-align: center;
                        white-space: nowrap;
                        background-color: #9dc7f1;
                        border: 1px solid #e9ecef;
                        border-radius: 2px;
                      }
                      .iconAdd:hover{
                        cursor: pointer;
                        background-color: #babae9;
                      }
                      .iconExitActor,.iconExitDir{
                        color: #de1159;
                      }
                      .iconExitDir:hover ,.iconExitActor:hover{
                        cursor: pointer;
                        background-color:#e3e6e9; 
                      }
                    </style>
                    <div class="form-group row">
                      <label class="col-sm-3 text-end control-label col-form-label">Đạo diễn *</label>
                      <div class="col-md-9">
                        <div style="width:95%;">
                          <select
                            class="select2 form-select shadow-none mt-3 @error('dir')is-invalid @enderror"
                            multiple="multiple"
                            style="height: 36px; width: 100%"
                            name="dir[]"
                            id="select_dir"
                            >
                            @foreach($directors as $director)
                              <option value="{{$director->id}}" {{(isset($movie) && $movie->movie_dir_act->contains($director->id))  ? 'selected' : ''}}>{{$director->name}}</option>
                            @endforeach
                          </select>
                          <span class="iconAdd" id="iconAddDir"
                              ><i class="mdi mdi-plus"></i
                          ></span>
                          <div class="invalid-feedback">
                            @error('dir'){{$message}}@enderror
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="addDir" style="display:none;">
                      <div class="form-group row">
                        <label
                          for="lname"
                          class="col-sm-3 text-end control-label col-form-label"
                          style="margin-left: 180px;"
                          >Thêm đạo diễn *</label
                        >
                        <div class="col-sm-9" style="width: 40%;">
                          <div class="input-group">
                              <input
                                type="text"
                                class="form-control"
                                id="name_dir"
                                name="name_dir"
                                placeholder="Nhập tên đạo diễn"
                              />
                              <div class="input-group-append">
                                <span class="input-group-text h-100 iconExitDir"
                                  ><i class="mdi mdi-close-circle"></i
                                ></span>
                              </div>
                              <div class="invalid-feedback" id="error_name_dir"></div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label
                            for="lname"
                            class="col-sm-3 text-end control-label col-form-label"
                            style="margin-left: 180px;"
                            ></label
                        >
                        <div class="col-sm-9" style="width: 40%;">
                          <span class="btn btn-warning" id="ajax_AddDir">Submit</span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 text-end control-label col-form-label">Diễn viên *</label>
                      <div class="col-md-9">
                        <div style="width:95%;">
                          <select
                            class="select2 form-select shadow-none mt-3 @error('dir')is-invalid @enderror"
                            multiple="multiple"
                            style="height: 36px; width: 100%"
                            name="actor[]"
                            id="select_actor"
                            >
                              @foreach($actors as $actor)
                                <option value="{{$actor->id}}" {{(isset($movie) && $movie->movie_dir_act->contains($actor->id))  ? 'selected' : ''}}>{{$actor->name}}</option>
                              @endforeach
                          </select>
                          <span class="iconAdd" id="iconAddActor"
                              ><i class="mdi mdi-plus"></i
                          ></span>
                          <div class="invalid-feedback">
                            @error('actor'){{$message}}@enderror
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="addActor" style="display:none;">
                      <div class="form-group row">
                        <label
                          for="lname"
                          class="col-sm-3 text-end control-label col-form-label"
                          style="margin-left: 180px;"
                          >Thêm diễn viên *</label
                        >
                        <div class="col-sm-9" style="width: 40%;">
                          <div class="input-group">
                              <input
                                type="text"
                                class="form-control"
                                id="name_actor"
                                placeholder="Nhập tên diễn viên"
                              />
                              <div class="input-group-append">
                                <span class="input-group-text h-100 iconExitActor"
                                  ><i class="mdi mdi-close-circle"></i
                                ></span>
                              </div>
                              <div class="invalid-feedback" id="error_name_actor"></div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label
                            for="lname"
                            class="col-sm-3 text-end control-label col-form-label"
                            style="margin-left: 180px;"
                            ></label
                        >
                        <div class="col-sm-9" style="width: 40%;">
                          <span class="btn btn-warning" id="ajax_AddActor">Submit</span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Trailer</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control @error('trailer')is-invalid @enderror"
                          id="trailer"
                          name="trailer"
                          placeholder="Nhập key trailer"
                          value="{{isset($movie) ? $movie->trailer : ''}}"
                        />
                        <div class="invalid-feedback">
                          @error('trailer'){{$message}}@enderror
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Điểm IMDB *</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control @error('point_imdb')is-invalid @enderror"
                          id="point_imdb"
                          name="point_imdb"
                          placeholder="Nhập điểm IMDB"
                          value="{{isset($movie) ? $movie->point_imdb : ''}}"
                        />
                        <div class="invalid-feedback">
                          @error('point_imdb'){{$message}}@enderror
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Trạng thái *</label
                      >
                      <div class="col-sm-9">
                        <select
                          class="select2 form-select shadow-none @error('status')is-invalid @enderror"
                          style="width: 100%; height: 36px"
                          name="status"
                        >
                          <option value="" disabled selected>---Chọn trạng thái---</option>
                          <option value="0" {{(isset($movie) &&  $movie->status == 0) ? 'selected' :'' }}>Phim sắp chiếu</option>
                          <option value="1" {{(isset($movie) &&  $movie->status == 1) ? 'selected' :'' }}>Phim đang / đã chiếu</option>  
                        </select>
                        <div class="invalid-feedback">
                          @error('status'){{$message}}@enderror
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Số tập *</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control @error('sotap')is-invalid @enderror"
                          id="sotap"
                          name="sotap"
                          placeholder="Nhập số tập"
                          value="{{isset($movie) ? $movie->sotap : ''}}"
                        />
                        <div class="invalid-feedback">
                          @error('sotap'){{$message}}@enderror
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Thời lượng phim *</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control @error('movie_duration')is-invalid @enderror"
                          id="movie_duration"
                          name="movie_duration"
                          placeholder="Nhập thời lượng phim"
                          value="{{isset($movie) ? $movie->movie_duration : ''}}"
                        />
                        <div class="invalid-feedback">
                          @error('movie_duration'){{$message}}@enderror
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Ẩn / Hiển thị phim *</label
                      >
                      <div class="col-sm-9">
                        <select
                          class="select2 form-select shadow-none @error('hide_or_show')is-invalid @enderror"
                          style="width: 100%; height: 36px"
                          name="hide_or_show"
                        >
                          <option value="" disabled selected>---Chọn trạng thái---</option>
                          <option value="0" {{(isset($movie) &&  $movie->hide_or_show == 0) ? 'selected' :'' }}>Ẩn</option>
                          <option value="1" {{(isset($movie) &&  $movie->hide_or_show == 1) ? 'selected' :'' }}>Hiện</option>   
                        </select>
                        <div class="invalid-feedback">
                          @error('hide_or_show'){{$message}}@enderror
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Năm phim *</label
                      >
                      <div class="col-sm-9">
                        <div class="input-group">
                          <input
                            type="text"
                            class="form-control @error('year')is-invalid @enderror"
                            id="datepicker-autoclose"
                            name="year"
                            placeholder="yyyy"
                            value="{{isset($movie) ? $movie->year : ''}}"
                          />
                          <div class="input-group-append">
                            <span class="input-group-text h-100"
                              ><i class="mdi mdi-calendar"></i
                            ></span>
                          </div>
                          <div class="invalid-feedback">
                            @error('year'){{$message}}@enderror
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Phim hot *</label
                      >
                      <div class="col-sm-9">
                        <select
                          class="select2 form-select shadow-none @error('phim_hot')is-invalid @enderror"
                          style="width: 100%; height: 36px"
                          name="phim_hot"
                        >
                          <option value="" disabled selected>---Chọn trạng thái---</option>
                          <option value="0" {{(isset($movie) &&  $movie->phim_hot == 0) ? 'selected' :'' }}>Không</option>
                          <option value="1" {{(isset($movie) &&  $movie->phim_hot == 1) ? 'selected' :'' }}>Hot</option>
                        </select>
                        <div class="invalid-feedback">
                          @error('phim_hot'){{$message}}@enderror
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Độ phân giải *</label
                      >
                      <div class="col-sm-9">
                        <select
                          class="select2 form-select shadow-none @error('resolution')is-invalid @enderror"
                          style="width: 100%; height: 36px"
                          name="resolution"
                        >
                          <option value="" disabled selected>---Chọn độ phân giải---</option>
                          <option value="0" {{(isset($movie) &&  $movie->resolution == 0) ? 'selected' :'' }}>HD</option>
                          <option value="1" {{(isset($movie) &&  $movie->resolution == 1) ? 'selected' :'' }}>SD</option>
                          <option value="2" {{(isset($movie) &&  $movie->resolution == 2) ? 'selected' :'' }}>HDCam</option>
                          <option value="3" {{(isset($movie) &&  $movie->resolution == 3) ? 'selected' :'' }}>Cam</option>
                          <option value="4" {{(isset($movie) &&  $movie->resolution == 4) ? 'selected' :'' }}>FullHD</option>
                        </select>
                        <div class="invalid-feedback">
                          @error('resolution'){{$message}}@enderror
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Phụ đề *</label
                      >
                      <div class="col-sm-9">
                        <select
                          class="select2 form-select shadow-none @error('phude')is-invalid @enderror"
                          style="width: 100%; height: 36px"
                          name="phude"
                        >
                          <option value="" disabled selected>---Chọn phụ đề---</option>
                          <option value="0" {{(isset($movie) &&  $movie->phude == 0) ? 'selected' :'' }}>Vietsub</option>
                          <option value="1" {{(isset($movie) &&  $movie->phude == 1) ? 'selected' :'' }}>Thuyết minh</option>
                        </select>
                        <div class="invalid-feedback">
                          @error('phude'){{$message}}@enderror
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Danh mục *</label
                      >
                      <div class="col-sm-9">
                        <select
                          class="select2 form-select shadow-none @error('category')is-invalid @enderror"
                          style="width: 100%; height: 36px"
                          name="category"
                        >
                          <option value="" disabled selected>---Chọn danh mục---</option>
                          @foreach($categories as $category)
                            <option value="{{$category->id}}" {{(isset($movie) &&  $movie->category_id == $category->id) ? 'selected' :'' }}>{{$category->title}}</option>
                          @endforeach
                        </select>
                        <div class="invalid-feedback">
                          @error('category'){{$message}}@enderror
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Thể loại *</label
                      >
                      <div class="col-sm-9">
                        @foreach($genres as $genre)
                        <div class="form-check mr-sm-2">
                          <input
                            type="checkbox"
                            class="form-check-input  @error('genre')is-invalid @enderror"
                            id="customControlAutosizing1"
                            name="genre[]"
                            value="{{$genre->id}}"
                            {{(isset($movie) &&  $movie->movie_genre->contains($genre->id)) ? 'checked' :'' }}
                          />
                          <label
                            class="form-check-label mb-0"
                            for="customControlAutosizing1"
                            >{{$genre->title}}</label
                          >
                        </div>
                        @endforeach
                        <div class="invalid-feedback">
                          @error('genre'){{$message}}@enderror
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Quốc gia *</label
                      >
                      <div class="col-sm-9">
                        <select
                          class="select2 form-select shadow-none @error('country')is-invalid @enderror"
                          style="width: 100%; height: 36px"
                          name="country"
                        >
                          <option value="" disabled selected>---Chọn quốc gia---</option>
                          @foreach($countries as $country)
                            <option value="{{$country->id}}" {{(isset($movie) &&  $movie->country_id == $country->id) ? 'selected' :'' }}>{{$country->title}}</option>
                          @endforeach
                        </select>
                        <div class="invalid-feedback">
                          @error('country'){{$message}}@enderror
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Hình ảnh *</label
                      >
                      <div class="col-sm-9">
                        <div class="custom-file">
                          <input
                            type="file"
                            class="custom-file-input @error('image')is-invalid @enderror"
                            id="validatedCustomFile"
                            name="image"
                            onchange="preview()"
                          />
                          <label
                            class="custom-file-label"
                            for="validatedCustomFile"
                            >Choose file...</label
                          >
                          <div class="invalid-feedback">
                            @error('image'){{$message}}@enderror
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                      ></label>
                      <div class="col-sm-9">
                        <img id='img_pre' src="{{isset($movie) ? asset('uploads/movies').'/'.$movie->image : ''}}" alt="" width="80">
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