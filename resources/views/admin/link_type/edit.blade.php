<!DOCTYPE html>
<html lang="en">

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>普通网站管理系统</title>
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
                    		<li class="active">图片管理</li>
                    		<li class="active">图片类型管理</li>
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
                                    <li class="">
                                        <a href="{{url('admin/link_type')}}">
                                            <i class="green ace-icon fa fa-home bigger-120"></i>
                                            链接类型列表
                                        </a>
                                    </li>

                                    <li class="active">
                                        <a href="">
                                            链接类型列表
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
                                                            <div id="edit" class="tab-pane active">
                                                                <div id="alert"></div>
                                                                <form class="form-horizontal" id="sample-form" method="post" action="{{url('admin/link_type',['id'=>$link_type->id])}}">
                                                                    {{ csrf_field() }}
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="form-group">
                                                                        <label for="show_order" class="col-xs-12 col-sm-3 control-label no-padding-right">显示序号</label>

                                                                        <div class="col-xs-12 col-sm-5 inline help-block">
                                                                            <span class="block input-icon input-icon-right">
                                                                                <input type="number" name="link_type[show_order]" value="{{$link_type->show_order}}" id="show_order" class="width-100" >
                                                                                <i class="icon-leaf"></i>
                                                                            </span>
                                                                        </div>
                                                                        <div class="help-block col-xs-12 col-sm-reset inline">
                                                                            (选填)
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="show_tag" class="col-xs-12 col-sm-3 control-label no-padding-right">新闻分类类型</label>

                                                                        <div class="col-xs-12 col-sm-5 inline help-block">
                                                                            <span class="block input-icon input-icon-right">

                                                                                <div class="radio inline">
                                                                                    <label>
                                                                                        <input type="radio" name="link_type[type]" value="1" title="1" class="ace" {{$link_type->type==1?"checked":''}}>
                                                                                        <span class="lbl"> 单图片 </span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="radio inline">
                                                                                    <label>
                                                                                        <input type="radio" name="link_type[type]" value="2" title="2" class="ace" {{$link_type->type==2?"checked":''}}>
                                                                                        <span class="lbl"> 多图片 </span>
                                                                                    </label>
                                                                                </div>
                                                                            </span>
                                                                        </div>
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label for="name" class="col-xs-12 col-sm-3 control-label no-padding-right">名称</label>

                                                                        <div class="col-xs-12 col-sm-5 inline help-block">
                                                                            <span class="block input-icon input-icon-right">
                                                                                <input type="text" name="link_type[name]" value="{{$link_type->name}}" required="" id="name" class="width-100">
                                                                                <i class="icon-leaf"></i>
                                                                            </span>
                                                                        </div>
                                                                        <div class="help-block col-xs-12 col-sm-reset inline red">
                                                                            *(必填)
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="inputWarning" class="col-xs-12 col-sm-3 control-label no-padding-right">修改人</label>

                                                                        <div class="col-xs-12 col-sm-5 inline help-block">
                                                                            <span class="block input-icon input-icon-right">
                                                                                <label>
                                                                                    admin
                                                                                </label>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="inputWarning" class="col-xs-12 col-sm-3 control-label no-padding-right">修改时间</label>

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
                                                                            <button class="btn btn-success" onclick="">修改</button>&nbsp;&nbsp;&nbsp;
                                                                            <button class="btn btn-warning" type="reset">重置</button>
                                                                        </div>
                                                                    </div>
                                                                </form>

                                                        </div>
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
	</body>

</html>
