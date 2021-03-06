<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Link_type;

class Link_typeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取关键字
        $title = $request ->get('title');
        //搜索条件
        $link_type = Link_type::where([])->orderBy('created_at','DESC')->get();
        return view('admin.link_type.list',compact('link_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.link_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1.接收前台表单提交的数据
        $input =$request->all();
        $info = $input['link_type'];

        //2.进行表单验证

        //3.添加到数据库的manager表
        $show_order=$info['show_order'];
        $type=$info['type'];
        $name=$info['name'];
        $created_at = date("Y-m-d H:i:s");
        $res = Link_type::create([
            'show_order'=>$show_order,
            'type'=>$type,
            'name'=>$name,
            'add_user'=>session('super')['name'],
            'created_at'=>$created_at,
            'updated_at'=>$created_at,
            ]);

        //4.根据是否添加成功，给用户反馈
        if($res){
            return \redirect()->back()->with('success','恭喜，添加成功！');
        }else{
            return \redirect()->back()->with('errors','抱歉，添加失败！');
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
        $link_type = Link_type::find($id);
        return view('admin.link_type.edit',compact('link_type'));
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
        $link_type = Link_type::find($id);
        // 1.获取要修改成的管理员信息
        $input =$request->all();
        $info = $input['link_type'];

        $link_type->show_order = $info['show_order'];
        $link_type->type = $info['type'];
        $link_type->name = $info['name'];
        $link_type->updated_at = date("Y-m-d H:i:s");


        $res = $link_type->save();
        if($res){
            return \redirect()->back()->with('success','恭喜，修改成功！');
        }else{
            return \redirect()->back()->with('errors','抱歉，修改失败！');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Link_type::destroy($id);
        if($res){
            return \redirect()->back()->with('success','恭喜，删除成功！');
        }else{
            return \redirect()->back()->with('errors','抱歉，删除失败！');
        }
    }
}
