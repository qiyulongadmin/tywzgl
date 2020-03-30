<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Cont_type;

class Cont_typeController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id,Request $request)
    {
        if($id!=0){
            //获取关键字
            $title = $request ->get('title');
            //搜索条件
            $cont_type = Cont_type::where('up_id',$id)->orderBy('show_order','ASC')->orderBy('updated_at','DESC')->get();
            //上级id
            $cont_type_type = Cont_type::find($id)['up_id'];
            return view('admin.cont_type.list',compact('cont_type','cont_type_type','id'));
        }
        //获取关键字
        $title = $request ->get('title');
        //搜索条件
        $cont_type = Cont_type::where('up_id',0)->orderBy('show_order','ASC')->orderBy('updated_at','DESC')->get();
        $cont_type_type = Cont_type::find($id)['up_id'];
        return view('admin.cont_type.list',compact('cont_type','cont_type_type','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $cont_type = Cont_type::all();
        return view('admin.cont_type.create',compact('id','cont_type'));
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
        $info = $input['cont_type'];

        //2.进行表单验证

        //3.添加到数据库的manager表
        $show_order=$info['show_order'];
        $up_id=$info['up_id'];
        $name=$info['name'];
        $show_tag=$info['show_tag'];
        $type=$info['type'];
        $created_at = date("Y-m-d H:i:s");
        $res = Cont_type::create([
            'show_order'=>$show_order,
            'up_id'=>$up_id,
            'name'=>$name,
            'show_tag'=>$show_tag,
            'type'=>$type,
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
    public function edit($id,$ids)
    {
        $cont_type = Cont_type::find($ids);
        $cont_types = Cont_type::all();
        return view('admin.cont_type.edit',compact('cont_type','id','cont_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$ids)
    {

        $cont_type = Cont_type::find($ids);
        // 1.获取要修改成的管理员信息
        $input =$request->all();

        $info = $input['cont_type'];

        $cont_type->show_order = $info['show_order'];
        $cont_type->up_id = $info['up_id'];
        $cont_type->name = $info['name'];
        $cont_type->type = $info['type'];
        $cont_type->show_tag = $info['show_tag'];
        $cont_type->updated_at = date("Y-m-d H:i:s");


        $res = $cont_type->save();
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
    public function destroy($id,$ids)
    {
        $res = Cont_type::destroy($ids);
        if($res){
            return \redirect()->back()->with('success','恭喜，删除成功！');
        }else{
            return \redirect()->back()->with('errors','抱歉，删除失败！');
        }
    }
}
