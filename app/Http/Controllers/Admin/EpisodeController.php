<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Episode;
use Carbon\Carbon;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies=Movie::all();

        $episodes=Episode::with('movie')->orderby('movie_id','DESC')->get();
        return view('admin.episode.index',compact('movies','episodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'movie_id'=>'required',
            'linkphim'=>'required',
            'episode'=>'required'
        ]);

        $episode=Episode::updateOrCreate(
            //nếu isset movie_id, episode ? update : create
            [
                'movie_id'=>$request->movie_id,
                'episode'=>$request->episode,
            ],
            [
                'movie_id'=>$request->movie_id,
                'linkphim'=>$request->linkphim,
                'episode'=>$request->episode,
                'updated_at'=>Carbon::now('Asia/Ho_Chi_Minh'),
                'created_at'=>Carbon::now('Asia/Ho_Chi_Minh'),
            ]
        );
        if(!$episode->wasRecentlyCreated && $episode->wasChanged()){
            $message=[
                'status'=>200,
                'type'=>'update',
                'title'=>'Cập nhật tập phim thành công !'
            ];
            // updateOrCreate performed an update
            return redirect()->back()->with('message',$message);
        }
        
        if($episode->wasRecentlyCreated){
            $message=[
                'status'=>200,
                'type'=>'insert',
                'title'=>'Thêm tập phim thành công !'
            ];
           // updateOrCreate performed create
           return redirect()->back()->with('message',$message);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $list_movie=Movie::all();

        $list_episode=Episode::with('movie')->orderby('movie_id','DESC')->get();
        // return response()->json($list_episode); //kiểm tra dữ liệu trả về 
        return view('admin.episode.form',compact('list_movie','list_episode'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function select_episode(Request $request){
        $arr_episode[]='<option value="" disabled selected>---Chọn tập phim---</option>';
        if($request->movie_id!=0){
            $movie=Movie::find($request->movie_id);
            $episode=Episode::where('movie_id',$request->movie_id)->get();
            $list_sotap=[];
            if(!empty($episode)){
                foreach($episode as $key => $ep){
                    $list_sotap[]=$ep['episode'];
                }
            }
            if($movie->sotap!=null){
                for($i=1;$i<=$movie->sotap;$i++){
                    if(in_array($i,$list_sotap)){
                        $arr_episode[]=' <option value="'.$i.'">'.$i.' (đã có link)</option>';
                    }else{
                        $arr_episode[]=' <option value="'.$i.'">'.$i.'</option>';
                    }
                }
            }
        }
        return  $arr_episode;
    }

    public function getDataEpisode(Request $request){
        $episode=Episode::where('movie_id',$request->movie_id)->where('episode',$request->episode)->first();
        if($episode){
            $data=$episode->linkphim;
        }else{
            $data='';
        }
        return $data;  
    }
}
