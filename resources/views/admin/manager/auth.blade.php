<!DOCTYPE html>
<html lang="en">

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>普通网站管理系统</title>
        {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
		<meta name="description" content="overview &amp; stats" />
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
									        管理员授权
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
                                                {{--内容更换区域--}}
                                                    {{--消息提示--}}
                                                    @include('admin.public.point')
                                                     {{--消息提示结束--}}


                                                    <div id="lists" class="tab-pane in active">
                                                        <div id="alert"></div>
                                                        <form class="form-horizontal" id="sample-form" action="{{ url('admin/manager/doauth')}}" method="post">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="id" value="ABC">
                                                                @foreach($Cont_type_one as $one)
                                                                <span style="font-size: 20px;">{{$one->name}}</span>
                                                                        @if(in_array($one->id,$up_id))
                                                                        @foreach($Cont_type_two as $v)

                                                                        @if($one->id == $v->up_id)
                                                                            @if(in_array($v->id,$authoritys))
                                                                                <div class="checkbox inline form-group">
                                                                                    <label>
                                                                                        <input type="checkbox" checked name="privileges[]" value="{{$v->id}}" title="真棒" class="ace">
                                                                                        <span class="lbl" style="margin-left: 0px;"> {{$v->name}} </span>&nbsp;&nbsp;&nbsp;
                                                                                    </label>
                                                                                </div>
                                                                            @else
                                                                                <div class="checkbox inline form-group">
                                                                                    <label>
                                                                                        <input type="checkbox" name="privileges[]" value="{{$v->id}}" title="真棒" class="ace">
                                                                                        <span class="lbl" style="margin-left: 0px;"> {{$v->name}} </span>&nbsp;&nbsp;&nbsp;
                                                                                    </label>
                                                                                </div>
                                                                            @endif
                                                                            @endif
                                                                        @endforeach
                                                                        @else
                                                                            @if(in_array($one->id,$authoritys))
                                                                                <div class="checkbox inline form-group">
                                                                                    <label>
                                                                                        <input type="checkbox" checked name="privileges[]" value="{{$one->id}}" title="真棒" class="ace">
                                                                                        <span class="lbl" style="margin-left: 0px;"> 本信息分类 </span>&nbsp;&nbsp;&nbsp;
                                                                                    </label>
                                                                                </div>
                                                                            @else
                                                                                <div class="checkbox inline form-group">
                                                                                    <label>
                                                                                        <input type="checkbox" name="privileges[]" value="{{$one->id}}" title="真棒" class="ace">
                                                                                        <span class="lbl" style="margin-left: 0px;"> 本信息分类 </span>&nbsp;&nbsp;&nbsp;
                                                                                    </label>
                                                                                </div>
                                                                            @endif
                                                                        @endif
                                                                                        <input type="hidden" name="manage_id" value="{{$manage->id}}">
                                                                    <hr>
                                                                    @endforeach
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
                                                                        <button class="btn btn-success">授权</button>&nbsp;&nbsp;&nbsp;
                                                                        <button class="btn btn-warning" type="reset">重置</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>



                                                {{--内容更换区域结束--}}
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
