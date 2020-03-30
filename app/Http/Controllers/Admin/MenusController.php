<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Menus;
use App\Model\Cont_type;
use App\Model\Cont;

class MenusController extends Controller
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
             $menus = Menus::where('up_id',$id)
			 ->orderBy('show_order','ASC')
			 ->orderBy('updated_at','DESC')
			 ->get();
             //上级id
             $menus_type = Menus::find($id)['up_id'];
             return view('admin.menus.list',compact('menus','menus_type','id'));
         }
         //获取关键字
         $title = $request ->get('title');
         //搜索条件
         $menus = Menus::when($title,function($query) use ($title){
             $query -> where('name','like',"%{$title}%")
                    -> orWhere('show_order','like',"%{$title}%")
                    -> orWhere('updated_at','like',"%{$title}%")
                    -> orWhere('add_user','like',"%{$title}%")
                    ;
         })->where('up_id',0)->orderBy('show_order','ASC')->orderBy('updated_at','DESC')->paginate(6);
         $menus_type = Menus::find($id)['up_id'];
         return view('admin.menus.list',compact('menus','menus_type','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $menus = Menus::all();
        $cont_type = Cont_type::all();
        $cont = Cont::where([])->orderBy('updated_at','DESC')->get();
        return view('admin.menus.create',compact('id','menus','cont_type','cont'));
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
        $info = $input['menus'];

        //2.进行表单验证

        //3.添加到数据库的manager表
        $show_order=$info['show_order'];
        $up_id=$info['up_id'];
        $name=$info['name'];
        $show_tag=$info['show_tag'];
        $type_id=$info['type_id'];
        $cont_id=$info['cont_id'];
        $link_addr=$info['link_addr'];
        $created_at = date("Y-m-d H:i:s");
        $res = Menus::create([
            'show_order'=>$show_order,
            'up_id'=>$up_id,
            'name'=>$name,
            'show_tag'=>$show_tag,
            'type_id'=>$type_id,
            'cont_id'=>$cont_id,
            'link_addr'=>$link_addr,
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
        $menus = Menus::find($ids);
        $menuss = Menus::all();
        $cont_type = Cont_type::all();
        $cont = Cont::where([])->orderBy('updated_at','DESC')->get();
        return view('admin.menus.edit',compact('menus','id','menuss','cont_type','cont'));
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

        $menus = Menus::find($ids);
        // 1.获取要修改成的管理员信息
        $input =$request->all();

        $info = $input['menus'];
        $menus->show_order = $info['show_order'];
        $menus->up_id = $info['up_id'];
        $menus->name = $info['name'];
        $menus->type_id = $info['type_id'];
        $menus->cont_id = $info['cont_id'];
        $menus->link_addr = $info['link_addr'];
        $menus->show_tag = $info['show_tag'];
        $menus->updated_at = date("Y-m-d H:i:s");


        $res = $menus->save();
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
        $res = Menus::destroy($ids);
        if($res){
            return \redirect()->back()->with('success','恭喜，删除成功！');
        }else{
            return \redirect()->back()->with('errors','抱歉，删除失败！');
        }
    }
}
