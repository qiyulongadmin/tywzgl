<!DOCTYPE html>
<html lang="en">

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>普通网站管理系统</title>
		<meta name="description" content="overview &amp; stats" />
        <meta name="_token" content="{{ csrf_token() }}"/>
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
                    		<li class="active">站点管理</li>
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
                                        <a href="{{url('admin/setting')}}">
                                            <i class="green ace-icon fa fa-home bigger-120"></i>
                                            站点信息查看
                                        </a>
                                    </li>

                                    <li class="active">
                                        <a href="{{url('admin/setting/edit/1')}}" methods="get">
                                            站点信息编辑
                                        </a>
                                    </li>
                                </ul>
                                {{--选项卡标题结束--}}
                                <div class="tab-content">

                                    {{--选项卡内容部分/管理员列表开始--}}
                                        <div class="row">
                                        	<div class="col-xs-12">
                                        		<!-- PAGE CONTENT BEGINS -->
                                        		<div class="row">
                                        			<div class="col-xs-12">
                                                        {{--消息提示--}}
                                                       @include('admin.public.point')
                                                        {{--消息提示结束--}}

                                                        <form class="form-horizontal" id="sample-form" method="post" action="{{url('admin/setting',['id'=>$setting->id])}}">
                                                            {{ csrf_field() }}
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label for="inputWarning" class="col-xs-12 col-sm-3 control-label no-padding-right">学院名称</label>

                                                                <div class="col-xs-12 col-sm-5 inline help-block">
                                                                    <span class="block input-icon input-icon-right">
                                                                        <input type="hidden" name="id" value="{{$setting->id}}">
                                                                        <input type="text" name="webname" id="webname" class="width-100" value="{{$setting->name}}">
                                                                        <i class="icon-leaf"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="help-block col-xs-12 col-sm-reset inline red">
                                                                    *(必填)
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputWarning" class="col-xs-12 col-sm-3 control-label no-padding-right">网站副标题</label>

                                                                <div class="col-xs-12 col-sm-5 inline help-block">
                                                                    <span class="block input-icon input-icon-right">
                                                                        <input type="text" name="subhead" class="width-100" value="{{$setting->subhead}}">
                                                                        <i class="icon-leaf"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="help-block col-xs-12 col-sm-reset inline red">
                                                                    *(必填)
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputWarning" class="col-xs-12 col-sm-3 control-label no-padding-right">网站说明信息</label>

                                                                <div class="col-xs-12 col-sm-5 inline help-block">
                                                                    <span class="block input-icon input-icon-right">
                                                                        <input type="text" name="description" class="width-100" value="{{$setting->description}}">
                                                                        <i class="icon-leaf"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="help-block col-xs-12 col-sm-reset inline red">
                                                                    *(必填)
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputWarning" class="col-xs-12 col-sm-3 control-label no-padding-right">版权信息</label>

                                                                <div class="col-xs-12 col-sm-5 inline help-block">
                                                                    <span class="block input-icon input-icon-right">
                                                                        <input type="text" name="organizer" class="width-100" value="{{$setting->organizer}}">
                                                                        <i class="icon-leaf"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="help-block col-xs-12 col-sm-reset inline red">
                                                                    *(必填)
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputWarning" class="col-xs-12 col-sm-3 control-label no-padding-right">网站运行状态</label>

                                                                <div class="col-xs-12 col-sm-5 inline help-block">
                                                                    <span class="block input-icon input-icon-right">
                                                                        <div class="radio inline">
                                                                            <label>
                                                                                <input type="radio" name="switchs" value="1" title="1" class="ace" {{$setting->switchs==1?"checked":''}}>
                                                                                <span class="lbl"> 正常运行 </span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="radio inline">
                                                                            <label>
                                                                                <input type="radio" name="switchs" value="0" title="0" class="ace" {{$setting->switchs==0?"checked":''}}>
                                                                                <span class="lbl"> 维护中 </span>
                                                                            </label>
                                                                        </div>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-xs-12 col-sm-5 col-sm-offset-4 inline help-block">
                                                                    <button class="btn btn-success" id="btn-action" data-loading-text="正在加载">提交修改</button>&nbsp;&nbsp;&nbsp;
                                                                    <input type="reset" class="btn btn-warning" value="重置">

                                                                </div>
                                                            </div>
                                                        </form>


                                        			</div><!-- /.span -->
                                        		</div><!-- /.row -->
                                        	</div><!-- /.col -->
                                        </div><!-- /.row -->
                                    {{--选项卡内容部分/管理员列表结束--}}
                                </div>
                            </div>
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
                    $("#btn").click(function(){
                       $.ajax({
                           type:"POST",
                           url:"",
                           dataType:"json",
                           data:{
                               webname:$('#webname').val(),
                               sex:$('#sex').val(),
                               possword:$('#possword').val(),
                           },
                           success:function(){

                           },
                           error:function(){

                           }
                       });
                    });
                </script>
	</body>

</html>
