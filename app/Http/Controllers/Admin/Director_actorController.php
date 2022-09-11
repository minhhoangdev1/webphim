<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Directors_Actors;

class Director_actorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_director_actor=Directors_Actors::orderby('id','DESC')->get();
        return view('admin.director_actor.index',compact('list_director_actor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.director_actor.form');
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
            'name'=>'required|unique:Directors_Actors',
            'type'=>'required|max:3'
        ]);
        Directors_Actors::create([
            'name'=>$request->name,
            'type'=>$request->type
        ]);
        if(isset($request->ajax) && $request->ajax==1){
            $last=Directors_Actors::orderBy('id','DESC')->first();
            return $last->id;
        }else{
            if($request->type=='DIR'){
                $type='đạo diễn';
            }else{
                $type='diễn viên';
            }
            $message=[
                'status'=>200,
                'type'=>'update',
                'title'=>'Cập nhật '.$type.' '.$request->name.' thành công !'
            ];
            
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dir_act=Directors_Actors::find($id);
        return view('admin.director_actor.form',compact('dir_act'));
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
        $request->validate([
            'name'=>'required',
            'type'=>'required|max:3'
        ]);
        $dir_act = Directors_Actors::find($id);
        $dir_act->name = $request->name;
        $dir_act->type = $request->type;
        $dir_act->save();
        if($request->type=='DIR'){
            $type='đạo diễn';
        }else{
            $type='diễn viên';
        }
        $message=[
            'status'=>200,
            'type'=>'update',
            'title'=>'Cập nhật '.$type.' '.$request->name.' thành công !'
        ];
        
        return redirect()->back()->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dir_act=Directors_Actors::findOrFail($id);
        $name=$dir_act->name;
        if($dir_act->type=='DIR'){
            $type='đạo diễn';
        }else{
            $type='diễn viên';
        }
        $dir_act->delete();
        $message=[
            'status'=>200,
            'type'=>'delete',
            'title'=>'Xóa '.$type.' '.$name.' thành công !'
        ];

        return redirect()->back()->with('message',$message);
    }
    public function deleteManyDirACt(Request $request){
        Directors_Actors::whereIn('id',$request->id)->delete();
    }
}
