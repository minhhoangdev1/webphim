<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;
use Illuminate\Support\Str;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres=Genre::orderby('id','DESC')->get();
        return view('admin.genre.index',compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.genre.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->checkData($request);
        $genre = new Genre();
        $genre->title = $request->title;
        $genre->slug=Str::slug($request->title);
        $genre->status = $request->status;
        $genre->save();
        $message=[
            'status'=>200,
            'type'=>'insert',
            'title'=>'Thêm thể loại '.$request->title.' thành công !'
        ];
        return redirect()->back()->with('message',$message);

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
        $genre=Genre::find($id);
        return view('admin.genre.form',compact('genre'));
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
        $this->checkData($request);
        $genre = Genre::find($id);
        $genre->title = $request->title;
        $genre->slug=Str::slug($request->title);
        $genre->status = $request->status;
        $genre->save();
        $message=[
            'status'=>200,
            'type'=>'update',
            'title'=>'Cập nhật thể loại '.$request->title.' thành công !'
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
        $genre=Genre::findOrFail($id);
        $name=$genre->title;
        $genre->delete();
        $message=[
            'status'=>200,
            'type'=>'delete',
            'title'=>'Xóa thể loại '.$name.' thành công !'
        ];

        return redirect()->back()->with('message',$message);
    }
    public function deleteManyGenre(Request $request){
        Genre::whereIn('id',$request->id)->delete();
    }
    public function checkData(Request $request){
        $request->validate([
            'title'=>'required',
            'status'=>'required'
        ]);
    }
}
