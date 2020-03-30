<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Manage;
use App\Model\Cont_type;

class SuperController extends Controller
{
    //获取授权页面
    public function auth($id)
    {
        //获取管理员列表
        $manage = Manage::find($id);
        //获取所有的权限列表(一级菜单)
        $Cont_type_one = Cont_type::get()->where('up_id','==','0');
        //获取所有的权限列表(二级菜单)
        $Cont_type_two = Cont_type::get()->where('up_id','!=','0');
        //获取所有二级的up_id，与模板中判断一级有无下级分类
        $up_id=[];
        foreach ($Cont_type_two as $v1)
        {
            $up_id[] = $v1 -> up_id;
        }
        //获取当前普管拥有的权限
        $authority = $manage->authority;
        // dd($authority);
        //管理员拥有的权限id
        $authoritys=[];
        foreach ($authority as $v)
        {
            $authoritys[] = $v -> privileges;
        }
        return \view('admin.manager.auth',compact('manage','Cont_type_one','Cont_type_two','authoritys','up_id'));
    }


    //处理授权的方法
    public function doAuth(Request $request)
    {
        $input = $request->except("_token");
        // dd($input);
        //删除当前角色已有的权限
        $res = \DB::table('authority')->where('manage_id',$input['manage_id'])->delete();
        //添加当前角色新授予的权限(这个地方可以修改是否授权)
        if(!empty($input['privileges'])){
            foreach ($input['privileges'] as $v){
                $res1 = \DB::table('authority')->insert(['manage_id'=>$input['manage_id'],'privileges'=>$v]);
            }
        }
        if($res||$res1){
            return \redirect()->back()->with('success','恭喜，授权成功！');
        }else{
            return \redirect()->back()->with('errors','抱歉，授权失败！');
        }
    }

    /**
     * 获取用户列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //查询所有数据
        $manage = Manage::where([])->orderBy('created_at','DESC')->get();
        return view('admin.manager.list',compact('manage'));
    }

    /**
     * 返回用户添加页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manager.create');
    }

    /**
     * 执行添加操作
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1.接收前台表单提交的数据
        $input =$request->all();
        $info = $input['Manage'];

        //2.进行表单验证

        //3.添加到数据库的manager表
        $name=$info['name'];
        $real_name=$info['real_name'];
        $password=$info['password'];
        $remark=$info['remark'];
        $created_at = date("Y-m-d H:i:s");
        $res = Manage::create([
            'name'=>$name,
            'real_name'=>$real_name,
            'password'=>$password,
            'remark'=>$remark,
            'add_user'=>session('super')['name'],
            'created_at'=>$created_at,
            ]);

        //4.根据是否添加成功，给用户反馈
        if($res){
            return \redirect()->back()->with('success','恭喜，添加成功！');
        }else{
            return \redirect()->back()->with('errors','抱歉，添加失败！');
        }
    }

    /**
     * 显示一条用户记录
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * 返回一个修改页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manage = Manage::find($id);
        return view('admin.manager.edit',compact('manage'));
    }

    /**
     * 执行修改操作
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $manage = Manage::find($id);
        // 1.获取要修改成的管理员信息
        $input =$request->all();
        $info = $input['Manage'];

        $manage->name = $info['name'];
        $manage->real_name = $info['real_name'];
        $manage->password = $info['password'];
        $manage->remark = $info['remark'];

        $res = $manage->save();
        if($res){
            return \redirect()->back()->with('success','恭喜，修改成功！');
        }else{
            return \redirect()->back()->with('errors','抱歉，修改失败！');
        }
    }

    /**
     * 执行删除操作
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Manage::destroy($id);
        if($res){
            return \redirect()->back()->with('success','恭喜，删除成功！');
        }else{
            return \redirect()->back()->with('errors','抱歉，删除失败！');
        }
    }

}
