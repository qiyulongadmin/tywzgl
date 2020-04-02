<!DOCTYPE html>
<html lang="en">

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>普通网站管理系统</title>
        {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
		<meta name="description" content="overview &amp; stats" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        @include('admin.public.style')
    </head>

	<body class="no-skin">
        @include('admin.public.navbar')
		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>
            {{--左侧菜单开始--}}
            @include('admin.public.left')
            {{--左侧菜单结束--}}
            {{--内容区域--}}
			<div class="main-content">
				<div class="main-content-inner">
                    {{--内容头部--}}
                    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                    	<ul class="breadcrumb">
                    		<li>
                    			<i class="ace-icon fa fa-home home-icon"></i>
                    			<a href="{{url('admin/index')}}">首页</a>
                    		</li>
                    		<li class="active">系统初始</li>
                    		<li class="active">管理员管理</li>
                    	</ul><!-- /.breadcrumb -->
                    </div>
                    {{--内容头部结束--}}

                    {{--内容中间--}}
                    <div class="page-content">
                        {{--选项卡开始--}}
                        <div class="col-sm-6" style="width: 100%;">
                            <div class="tabbable" >
                                {{--选项卡标题--}}
                                <ul class="nav nav-tabs" id="myTab">
                                    <li>
                                        <a href="{{url('admin/manager')}}">
                                            <i class="green ace-icon fa fa-home bigger-120"></i>
                                            管理员列表
                                        </a>
                                    </li>

                                    <li class="active">
                                        <a href="">
                                            管理员添加
                                        </a>
                                    </li>
                                </ul>
                                {{--选项卡标题结束--}}
                                {{--选项卡内容部分/管理员列表开始--}}
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <!-- PAGE CONTENT BEGINS -->
                                            <div class="tabbable">
                                                <div class="tab-content">
                                                    {{--消息提示--}}
                                                    @include('admin.public.point')
                                                     {{--消息提示结束--}}
                                                    <div id="edit" class="tab-pane active">
                                                        <div id="alert"></div>
                                                        <form class="form-horizontal" id="sample-form" method="post" action="{{url('admin/manager')}}">
                                                            {{ csrf_field() }}
                                                            <div class="form-group">
                                                                <label for="name" class="col-xs-12 col-sm-3 control-label no-padding-right">用户名</label>

                                                                <div class="col-xs-12 col-sm-5 inline help-block">
                                                                    <span class="block input-icon input-icon-right">
                                                                        <input type="text" name="Manage[name]" required="" id="name" class="width-100">
                                                                        <i class="icon-leaf"></i>
                                                                    </span>
                                                                </div>
                                                                <div id="xiaoxi" class="help-block col-xs-12 col-sm-reset inline red">
                                                                    *(必填)
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="real_name" class="col-xs-12 col-sm-3 control-label no-padding-right">真实姓名</label>

                                                                <div class="col-xs-12 col-sm-5 inline help-block">
                                                                    <span class="block input-icon input-icon-right">
                                                                        <input type="text" name="Manage[real_name]"  id="real_name" class="width-100">
                                                                        <i class="icon-leaf"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="help-block col-xs-12 col-sm-reset inline">
                                                                    (选填)
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="password" class="col-xs-12 col-sm-3 control-label no-padding-right">用户口令</label>

                                                                <div class="col-xs-12 col-sm-5 inline help-block">
                                                                    <span class="block input-icon input-icon-right">
                                                                        <input type="password" name="Manage[password]" required="" id="password" class="width-100">
                                                                        <i class="icon-leaf"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="help-block col-xs-12 col-sm-reset inline red">
                                                                    *(必填)
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="remark" class="col-xs-12 col-sm-3 control-label no-padding-right">备注信息</label>

                                                                <div class="col-xs-12 col-sm-5 inline help-block">
                                                                    <span class="block input-icon input-icon-right">
                                                                        <input type="text" name="Manage[remark]" id="remark" class="width-100">
                                                                        <i class="icon-leaf"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="help-block col-xs-12 col-sm-reset inline">
                                                                    (可选填)
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputWarning" class="col-xs-12 col-sm-3 control-label no-padding-right">添加人</label>

                                                                <div class="col-xs-12 col-sm-5 inline help-block">
                                                                    <span class="block input-icon input-icon-right">
                                                                        <label>
                                                                            admin
                                                                        </label>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputWarning" class="col-xs-12 col-sm-3 control-label no-padding-right">添加时间</label>

                                                                <div class="col-xs-12 col-sm-5 inline help-block">
                                                                    <span class="block input-icon input-icon-right">
                                                                        <label>
                                                                            系统自动获取
                                                                        </label>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-xs-12 col-sm-5 col-sm-offset-4 inline help-block">
                                                                    <button class="btn btn-success" onclick="">提交</button>&nbsp;&nbsp;&nbsp;
                                                                    <button class="btn btn-warning" type="reset">重置</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- PAGE CONTENT ENDS -->
                                        </div><!-- /.col -->
                                    </div><!-- /.row -->
                                {{--选项卡内容部分/管理员列表结束--}}

                        </div><!-- /.col -->
                        {{--选项卡结束--}}
                    </div><!-- /.page-content -->
                    {{--内容中间结束--}}
                </div>
			</div><!-- /.main-content -->
            {{--内容区域结束--}}
            @include('admin.public.footer')
		</div>
        @include('admin/public/script')
        <script>
            var oldxiaoxi;
            var oldclass;
            //姓名获取焦点时显示，内含失去焦点显示点击前样式及内容
            $("#name").focus(function() {
                oldxiaoxi = $("#xiaoxi").text();
                oldclass = $("#xiaoxi").attr("class");
                //修改css样式为黑色
                $("#xiaoxi").attr("class","help-block col-xs-12 col-sm-reset inline");
                //修改HTML内容
                $("#xiaoxi").html("（正在输入...）");
                //当点击完输入框不做操作离开时避免显示正在输入，因此显示点击前所显示的内容及样式
                // $("#name").blur(function() {
                //     //修改css内容
                //     $("#xiaoxi").attr("class",oldclass);
                //     //修改HTML内容
                //     $("#xiaoxi").html(oldxiaoxi);
                // });
            });

            var oldxiaoxi1;
            var oldclass1;
            //键盘离开时显示，内含失去焦点显示键盘离开后样式及内容
            $("#name").keyup(function() {
                var name = $(" #name ").val();
                //调用ajax
                $.ajax({
                    //请求方式
                   type:"post",

                   //服务器相应数据的解析方式
                   dataType:"json",
                   headers: {
                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       },
                   //请求资源url
                   url:"/admin/manager",
                   //此处需要同步处理，即ajax执行完后才能向下进行。（避免第一次点击输入框只有一次键盘触发时oldxiaoxi为（正在输入...））
                   // async: false,
                   //向服务器端发送的数据
                   data:{"name":name,"ajax":'cunzai'},
                   success:function(data){
                        $("#xiaoxi").attr("class",data.newclass);
                        $("#xiaoxi").html(data.cont);
                        oldxiaoxi1 = $("#xiaoxi").text();
                        oldclass1 = $("#xiaoxi").attr("class");
                    }
                });
            });

            //失去焦点时的两种情况，1.获取焦点->失去焦点，2.获取焦点->键盘离开->失去焦点（最后一个else之后便是）
            $("#name").blur(function() {

                if(oldxiaoxi1==="(用户名已存在)"){
                    $("#name").val("");
                    //修改css内容
                    $("#xiaoxi").attr("class","help-block col-xs-12 col-sm-reset inline red");
                    //修改HTML内容
                    $("#xiaoxi").html("*(必填)");
                }else if(oldxiaoxi1==="(用户名可用)"){
                    // 修改css内容
                    $("#xiaoxi").attr("class",oldclass1);
                    //修改HTML内容
                    $("#xiaoxi").html(oldxiaoxi1);
                }else{
                    //修改css内容
                    $("#xiaoxi").attr("class",oldclass);
                    //修改HTML内容
                    $("#xiaoxi").html(oldxiaoxi);
                }

            });


        </script>







        {{--<script>
            //监听提交
            from.on('subit(add)',function(date)){
                //发起异步，把数据提交给php
                    $.ajax({
                        type:'POST',
                        url:'/admin/manager',
                        dataType:'json',
                         headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                        date:data.field,
                        success:function(data){
                            //提示添加成功，刷新页面
                            console.log(data);
                        },
                        error:function(){
                            //错误提示信息
                        }
                    })
            }
        </script>--}}
	</body>
</html>
