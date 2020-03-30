<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Cont;
use App\Model\Cont_type;
class ContController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id,$id2,Request $request)
    {
        $type = Cont_type::find($id2)['type'];
        if($type==0||$type==1||$type==2){
            //获取关键字
            $title = $request ->get('title');
            //搜索条件
            $cont= Cont::where('type_id',$id)->orderBy('created_at','DESC')->get();

            return view('admin.cont.list',compact('cont','id','id2'));
        }else{
            $conts = Cont::get()->where('type_id',$id2)->first();
            if(!$conts){
                $conts='A';
                return view('admin.cont.create',compact('id','id2','type','conts'));
            }else{
                $type = Cont_type::find($id2)['type'];
                return view('admin.cont.edit',compact('conts','type','id','id2'));
            }

        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id,$id2)
    {
        $type = Cont_type::find($id2)['type'];
        // 若是B，则type=0 1 2时的值
        $conts='B';
        return view('admin.cont.create',compact('id','id2','conts','type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id,$id2,Request $request)
    {
        //1.接收前台表单提交的数据
        $input =$request->all();
        $info = $input['conts'];
        //获取编辑器内容,如果是链接地址则没有编辑器
        $type = Cont_type::find($id2)['type'];
        if($type==4){
            $html = '';
            $link_addr = $info['link_addr'];
        }else{
            $html = $input['cont'];
            $link_addr = '';
        }
        if($type==3){
            $show_order='0';
        }else{
            $show_order=$info['show_order'];
        }


        //2.根据是否为图文列表获取图片地址
        if($request->hasFile('pic')){
            //接收文件
            $file = $request->file('pic');
            //对图片进行缩放
            // $file1 = Image::make($file)->resize(100,100);
            //存储文件，返回路径
            $src = $file -> store('upload/image/tuwenpic');
            if(!$src){
                return \redirect()->back()->with('errors','错误，图片保存失败！');
            }
        }else{
            $src='';
        }


        //3.添加到数据库
        $show_order=$show_order;
        $title=$info['title'];
        $show_tag =$info['show_tag'];
        $time =$info['time'];
        if($time == ''){
            $time = date("Y-m-d H:i:s");
        }

        $res = Cont::create([
            'show_order'=>$show_order,
            'type_id'=>$id2,
            'title'=>$title,
            'cont'=>$html,
            'show_tag'=>$show_tag,
            'link_addr'=>$link_addr,
            'src'=>$src,
            'add_user'=>session('super')['name'],
            'created_at'=>$time,
            'updated_at'=>$time,
            ]);

            $ids = $res->id;
        // 判断是否跳转至edit页面
        if($input['edit']=="404"){
            $type = Cont_type::find($id2)['type'];
            $conts = Cont::find($ids);
            return view('admin.cont.edit',compact('conts','type','id','id2'));
        }else{
            //4.根据是否添加成功，给用户反馈
            if($res){
                return \redirect()->back()->with('success','恭喜，添加成功！');
            }else{
                return \redirect()->back()->with('errors','抱歉，添加失败！');
            }
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
    public function edit($id,$id2,$ids)
    {
        $type = Cont_type::find($id2)['type'];
        $conts = Cont::find($ids);
        return view('admin.cont.edit',compact('conts','type','id','id2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$id2,$ids)
    {
        $conts = Cont::find($ids);
        // 1.获取要修改成的管理员信息
        $input =$request->all();
        $info = $input['conts'];
        $type = Cont_type::find($id2)['type'];
        if($type==4){
            $html = '';
            $link_addr = $info['link_addr'];
        }else{
            $html = $input['cont'];
            $link_addr = '';
        }
        if($type==3){
            $show_order='';
        }else{
            $show_order=$info['show_order'];
        }
        if($type==2){
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
        }else{
            $src='';
        }


        $conts->show_order = $show_order;
        $conts->type_id = $id2;
        $conts->title = $info['title'];
        $conts->cont = $html;
        $conts->link_addr = $link_addr;
        $conts->src = $src;
        $conts->show_tag  = $info['show_tag'];
        $conts->type_id = $id;
        $conts->created_at = $info['time'];
        $conts->add_user = session('super')['name'];
        $conts->updated_at = date("Y-m-d H:i:s");

        $res = $conts->save();
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
    public function destroy($id,$id2,$ids)
    {
        $res = Cont::destroy($ids);
        if($res){
            return \redirect()->back()->with('success','恭喜，删除成功！');
        }else{
            return \redirect()->back()->with('errors','抱歉，删除失败！');
        }
    }
}
