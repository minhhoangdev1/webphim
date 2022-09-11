<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Movie_Genre;
use App\Models\Directors_Actors;
use App\Models\Movie_Dir_Act;
use Illuminate\Support\Str;
use Carbon\Carbon;

class MovieController extends Controller
{
    public function index(){
        $movies=Movie::orderBy('id','DESC')->get();
        return view('admin.movie.index',compact('movies'));
    }
    public function create(){
        //pluck: chỉ lấy ra các thuộc tính cần 
        // $category=Category::pluck('title','id');
        // $country=Country::pluck('title','id');
        // $genre=Genre::pluck('title','id');
        
        $genres=Genre::all();
        $categories=Category::all();
        $countries=Country::all();
        $directors=Directors_Actors::where('type','DIR')->get();
        $actors=Directors_Actors::where('type','ACT')->get();
       

        return view('admin.movie.form',compact('categories','countries','genres','directors','actors'));
    }
    public function store(Request $request){
        $this->checkData($request);
        // Movie::create([
        //     'title'=>$request->title,
        //     'name_eng'=>$request->name_eng,
        //     'point_imdb'=>$request->point_imdb,
        //     'slug'=>$request->slug,
        //     'description'=>$request->description,
        //     'tags'=>$request->tags,
        //     'year'=>$request->year,
        //     'status'=>$request->status,
        //     'movie_duration'=>$request->movie_duration,
        //     'resolution'=>$request->resolution,
        //     'phude'=>$request->phude,
        //     'hide_or_show'=>$request->hide_or_show,
        //     'phim_hot'=>$request->phim_hot,
        //     'trailer'=>$request->trailer,
        //     'sotap'=>$request->sotap,
        //     'category_id'=>$request->category,
        //     'country_id'=>$request->country,
        //     'date_created'=>Carbon::now('Asia/Ho_Chi_Minh'),
        //     'date_updated'=>Carbon::now('Asia/Ho_Chi_Minh')
        // ]);
        $movie=new Movie();
        $title=ucwords($request->title);
        $name_eng=ucwords($request->name_eng);
        $movie->title = $title;
        $movie->name_eng = $name_eng;
        $movie->point_imdb = $request->point_imdb;
        $movie->slug = Str::slug($request->title);
        $movie->description = $request->description;
        $movie->tags = $request->tags;
        $movie->year = $request->year;
        $movie->status = $request->status;
        $movie->hide_or_show = $request->hide_or_show;
        $movie->phim_hot=$request->phim_hot;
        $movie->movie_duration = $request->movie_duration;
        $movie->resolution = $request->resolution;
        $movie->phude = $request->phude;
        $movie->trailer=$request->trailer;
        $movie->sotap=$request->sotap;
        $movie->category_id = $request->category;
        $movie->country_id = $request->country;
        $movie->date_created=Carbon::now('Asia/Ho_Chi_Minh');
        $movie->date_updated=Carbon::now('Asia/Ho_Chi_Minh');


        $get_img=$request->image;

        $path = 'uploads/movies/';

        if($get_img){
            $get_name_img=$get_img->getClientOriginalName();//lấy tên ảnh(abc.jpg)
            $name_img=current(explode('.',$get_name_img));//lấy tên ảnh
            $new_img=$name_img.rand(0,9999).'.'.$get_img->getClientOriginalExtension();
            $get_img->move($path,$new_img);
            $movie->image=$new_img;
        }
        $movie->save();
        //thêm nhiều thể loại cho phim
        $movie->movie_genre()->attach($request->genre);
        //thêm đạo diễn
        $movie->movie_dir_act()->attach($request->dir);
        //thêm diễn viên
        $movie->movie_dir_act()->attach($request->actor);

        $message=[
            'status'=>200,
            'type'=>'insert',
            'title'=>'Thêm phim '.$request->title.' thành công !'
        ];

        return redirect()->back()->with('message',$message);
    }
    public function show($id){
        //
    }
    public function edit($id){
        $genres=Genre::all();
        $categories=Category::all();
        $countries=Country::all();
        $directors=Directors_Actors::where('type','DIR')->get();
        $actors=Directors_Actors::where('type','ACT')->get();
        $movie=Movie::with('movie_genre','movie_dir_act')->find($id);

        return view('admin.movie.form',compact('genres','categories','countries','movie','directors','actors'));
    }
    public function update(Request $request, $id){
        $this->checkData($request);
        $movie=Movie::find($id);
        $title=ucwords($request->title);
        $name_eng=ucwords($request->name_eng);
        $movie->title = $title;
        $movie->name_eng = $name_eng;
        $movie->point_imdb = $request->point_imdb;
        $movie->slug = Str::slug($request->title);
        $movie->description = $request->description;
        $movie->tags = $request->tags;
        $movie->year = $request->year;
        $movie->status = $request->status;
        $movie->hide_or_show = $request->hide_or_show;
        $movie->phim_hot=$request->phim_hot;
        $movie->movie_duration = $request->movie_duration;
        $movie->resolution = $request->resolution;
        $movie->phude = $request->phude;
        $movie->trailer=$request->trailer;
        $movie->sotap=$request->sotap;
        $movie->category_id = $request->category;
        $movie->country_id = $request->country;
        $movie->date_updated=Carbon::now('Asia/Ho_Chi_Minh');

        if(!empty($request->image)){
            $get_img=$request->image;
            $path = 'uploads/movies/';
            if($get_img){
                if(file_exists('uploads/movies/'.$movie->image)){
                    unlink('uploads/movies/'.$movie->image);
                }
                $get_name_img=$get_img->getClientOriginalName();
                $name_img=current(explode('.',$get_name_img));
                $new_img=$name_img.rand(0,9999).'.'.$get_img->getClientOriginalExtension();
                $get_img->move($path,$new_img);
                $movie->image=$new_img;
            }
        }
        $movie->save();

        //cập nhật nhiều thể loại cho phim
        $movie->movie_genre()->sync($request->genre);
        
        //nối 2 array
        $arr=array_merge($request->dir,$request->actor);
        //cập nhật đạo diễn và diễn viên
        $movie->movie_dir_act()->sync($arr);

        $message=[
            'status'=>200,
            'type'=>'update',
            'title'=>'Cập nhật phim '.$request->title.' thành công !'
        ];

        return redirect()->back()->with('message',$message);
    }
    public function destroy($id){
        $movie=Movie::findOrFail($id);
        if(file_exists('uploads/movies/'.$movie->image)){
            unlink('uploads/movies/'.$movie->image);
        }
        $name=$movie->title;
        $movie->delete();
        $message=[
            'status'=>200,
            'type'=>'delete',
            'title'=>'Xóa phim '.$name.' thành công !'
        ];

        return redirect()->back()->with('message',$message);
    }
    public function deleteManyMovie(Request $request){
        Movie::whereIn('id',$request->id)->delete();
    }
    public function change_slug(Request $request){
        $slug=Str::slug($request->value);
        return $slug;
    }
    public function checkData(Request $request){
        $request->validate([
            'title'=>'required|max:100',
            'name_eng'=>'required|max:100',
            'description'=>'required',
            'point_imdb'=>'required|numeric|min:0|max:10',
            'trailer'=>'max:255',
            'status'=>'required',
            'sotap'=>'required|numeric',
            'movie_duration'=>'required|max:20',
            'hide_or_show'=>'required',
            'year'=>'required|max:20',
            'phim_hot'=>'required',
            'resolution'=>'required',
            'phude'=>'required',
            'category'=>'required',
            'country'=>'required',
            'genre'=>'required',
            'dir'=>'required',
            'actor'=>'required',
            'image'=>'mimes:jpg,png'
        ]);
    }
}
