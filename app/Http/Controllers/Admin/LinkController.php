<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

use App\Model\link;
use App\Model\link_type;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id,Request $request)
    {

        //获取关键字
        $title = $request ->get('title');
        //搜索条件
        $link= Link::where([])->orderBy('created_at','DESC')->where('type_id',$id)->get();
        $link_type = Link_type::find($id);
        return view('admin.link.list',compact('link','link_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('admin.link.create',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id,Request $request)
    {
        //1.接收前台表单提交的数据
        $input =$request->all();
        $info = $input['links'];

        //2.图片整理-判断有无上传文件
        if(!$request->hasFile('pic')){
            return \redirect()->back()->with('errors','错误，请选择图片！');
        }
        //接收文件
        $file = $request->file('pic');
        //对图片进行缩放
        // $file1 = Image::make($file)->resize(100,100);
        //存储文件，返回路径
        $src = $file -> store('admin/logo_pics');
        if(!$src){
            return \redirect()->back()->with('errors','错误，图片保存失败！');
        }

        //3.添加到数据库的manager表
        $show_order=$info['show_order'];
        $title=$info['title'];
        $pic=$src;
        $src1=$info['src'];
        $show_tag =$info['show_tag'];
        $created_at = date("Y-m-d H:i:s");
        $res = Link::create([
            'show_order'=>$show_order,
            'type_id'=>$id,
            'title'=>$title,
            'pic'=>$pic,
            'src'=>$src1,
            'show_tag'=>$show_tag,
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
        $links = Link::find($ids);
        return view('admin.link.edit',compact('links','id'));
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
        $links = Link::find($ids);
        // 1.获取要修改成的管理员信息
        $input =$request->all();
        $info = $input['links'];

        //2.图片整理-判断有无上传文件
        if(!$request->hasFile('pic')){
            return \redirect()->back()->with('errors','错误，请选择图片！');
        }
        //接收文件
        $file = $request->file('pic');
        //对图片进行缩放
        // $file1 = Image::make($file)->resize(100,100);
        //存储文件，返回路径
        $src = $file -> store('admin/pics');
        if(!$src){
            return \redirect()->back()->with('errors','错误，图片修改失败！');
        }

        $links->show_order = $info['show_order'];
        $links->title = $info['title'];
        $links->pic = $src;
        $links->src = $info['src'];
        $links->show_tag  = $info['show_tag'];
        $links->type_id = $id;
        $links->updated_at = date("Y-m-d H:i:s");


        $res = $links->save();
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
        $res = Link::destroy($ids);
        if($res){
            return \redirect()->back()->with('success','恭喜，删除成功！');
        }else{
            return \redirect()->back()->with('errors','抱歉，删除失败！');
        }
    }
}
