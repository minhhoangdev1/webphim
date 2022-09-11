<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::orderby('id','DESC')->paginate(5);
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.form');
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

        $category = new Category();
        $category->title = $request->title;
        $category->slug=Str::slug($request->title);
        $category->status = $request->status;
        $count_pos=Category::count('position');
        $category->position = $count_pos;
        $category->save();

        $message=[
            'status'=>200,
            'type'=>'insert',
            'title'=>'Thêm danh mục '.$request->title.' thành công !'
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
        $category=Category::find($id);
        return view('admin.category.form',compact('category'));
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
        
        $category = Category::find($id);
        $category->title = $request->title;
        $category->slug=Str::slug($request->title);
        $category->status = $request->status;
        $category->save();

        $message=[
            'status'=>200,
            'type'=>'update',
            'title'=>'Cập nhật danh mục '.$request->title.' thành công !'
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
        $category=Category::findOrFail($id);
        $name=$category->title;
        $category->delete();
        $message=[
            'status'=>200,
            'type'=>'delete',
            'title'=>'Xóa danh mục '.$name.' thành công !'
        ];

        return redirect()->back()->with('message',$message);
    }

    public function deleteManyCategory(Request $request){
        Category::whereIn('id',$request->id)->delete();
    }

    public function resorting(Request  $request){
        $data = $request->all();
        foreach ($data['array_id'] as $key => $value){
            $category=Category::find($value);
            $category->position=$key;
            $category->save();
        }
    }
    public function checkData(Request $request){
        $request->validate([
            'title'=>'required',
            'status'=>'required'
        ]);
    }
}
