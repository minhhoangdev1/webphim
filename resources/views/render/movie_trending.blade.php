@php
    $path=Request::path();
@endphp
@if($path=='admin/filterMovieTrending')
    @foreach($data as $dt)
        <div class="d-flex flex-row comment-row mt-0 border-bottom">
          <div class="p-2">
             <img
                src="{{asset('uploads/movies')}}/{{$dt['movies']['image']}}"
                alt="{{$dt['movies']['title']}}"
                width="50"
                class="rounded-circle"
                />
          </div>
          <div class="comment-text w-100">
             <h6 class="font-medium">{{$dt['movies']['title']}}</h6>
             <span class="mb-3 d-block"
                >{{$dt['movies']['name_eng']}} - {{$dt['movies']['year']}}
             </span>
             <div class="comment-footer">
                <span class="text-muted float-end"><i class="mdi mdi-eye"></i> {{$dt['totalView']}}</span>
             </div>
          </div>
        </div>
    @endforeach
@else
    @foreach ($data as $dt)
        <div class="item post-37176">
            <a href="{{route('movie',$dt['movies']['slug'])}}" title="{{$dt['movies']['title']}}">
                <div class="item-link">
                    <img src="{{asset('uploads/movies')}}/{{$dt['movies']['image']}}" class="lazy post-thumb" alt="{{$dt['movies']['title']}}" title="{{$dt['movies']['title']}}" />
                    <span class="is_trailer">{{$dt['resolution']}}</span>
                </div>
                <p class="title">{{$dt['movies']['title']}}</p>
            </a>
            <div class="viewsCount" style="color: #9d9d9d;">{{$dt['totalView']}} lượt xem</div>
            <div style="float: left;">
                <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                <span style="width: 0%"></span>
                </span>
            </div>
        </div>
    @endforeach
@endif
