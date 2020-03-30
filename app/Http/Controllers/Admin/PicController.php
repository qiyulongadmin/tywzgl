<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\pic;
use App\Model\pic_type;
class PicController extends Controller
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
        $pic= Pic::where('type_id',$id)->orderBy('created_at','DESC')->get();
        $pic_type = Pic_type::find($id);
        return view('admin.pic.list',compact('pic','pic_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('admin.pic.create',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id,Request $request)
    {
        $pic_type = Pic_type::find($id)['type'];

        //1.图片整理-判断有无上传文件
        if(!$request->hasFile('pic')){
            return \redirect()->back()->with('errors','错误，请选择图片！');
        }
        //接收文件
        $file = $request->file('pic');
        //存储文件，返回路径
        $src = $file -> store('admin/pics');
        if(!$src){
            return \redirect()->back()->with('errors','错误，图片保存失败！');
        }
        $show_tag = $request->input('show_tag');
        $created_at = date("Y-m-d H:i:s");
        if($pic_type==1){
            //2.隐藏其他图片
            if($show_tag == 0){
                Pic::where('show_tag', 0)
                ->where('type_id',$id)
                ->update(['show_tag' => 1]);
            }
        }

        //3.添加到数据库
        $res = Pic::create([
            'src'=>$src,
            'type_id'=>$id,
            'show_tag'  => $show_tag,
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
        $pics = Pic::find($ids);
        return view('admin.pic.edit',compact('pics','id'));
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
        $pics = Pic::find($ids);

        //2.图片整理-判断有无上传文件
        if(!$request->hasFile('pic')){
            return \redirect()->back()->with('errors','错误，请选择图片！');
        }
        //接收文件
        $file = $request->file('pic');
        //存储文件，返回路径
        $src = $file -> store('admin/pics');
        if(!$src){
            return \redirect()->back()->with('errors','错误，图片修改失败！');
        }
        $pics->src = $src;
        $pics->type_id = $id;
        $pics->show_tag  = $request->input('show_tag');
        $pics->updated_at = date("Y-m-d H:i:s");


        $res = $pics->save();
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
        $res = Pic::destroy($ids);
        //判断单双图片
        $pic_type = Pic_type::find($id)['type'];
        if($pic_type==1){
            //判断是否含有显示图片
            $pics = Pic::where('type_id',$id)->first();
            if(!$pics==''){
                $show_tag = Pic::where('show_tag','0')
                    ->where('type_id',$id)->get();
                //修改第一个隐藏为显示
                if(!$show_tag==''){
                    Pic::where('show_tag',1)
                    ->where('type_id',$id)
                    ->first()
                    ->update(['show_tag' => 0]);
                }
            }
        }


        if($res){
            return \redirect()->back()->with('success','恭喜，删除成功！');
        }else{
            return \redirect()->back()->with('errors','抱歉，删除失败！');
        }
    }

}
