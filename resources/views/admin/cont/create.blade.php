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
                                @if($conts=='A')
                                    <li class="active">
                                        <a>
                                            <i class="green ace-icon fa fa-home bigger-120"></i>
                                            内容设置
                                        </a>
                                    </li>
                                @else
                                <li>
                                    <a href="{{url('admin/conts/'.$id.'/conts/'.$id2.'/conts')}}">
                                        <i class="green ace-icon fa fa-home bigger-120"></i>
                                        内容列表
                                    </a>
                                </li>

                                <li class="active">
                                    <a href="">
                                        内容添加
                                    </a>
                                </li>
                                @endif
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
                                                    <form class="form-horizontal" enctype="multipart/form-data" id="sample-form" method="post" action="{{url('admin/conts/'.$id.'/conts/'.$id2.'/conts')}}">
                                                        {{ csrf_field() }}
                                                        @if($type!=3)
                                                        <div class="form-group">
                                                            <label for="show_order" class="col-xs-12 col-sm-2 control-label no-padding-right">显示序号</label>

                                                            <div class="col-xs-12 col-sm-8 inline help-block">
                                                                <span class="block input-icon input-icon-right">
                                                                    <input type="number" name="conts[show_order]"  id="show_order" class="width-100">
                                                                    <i class="icon-leaf"></i>
                                                                </span>
                                                            </div>
                                                            <div class="help-block col-xs-12 col-sm-reset inline">
                                                                (选填)
                                                            </div>
                                                        </div>
                                                        @endif

                                                        <div class="form-group">
                                                            <label for="title" class="col-xs-12 col-sm-2 control-label no-padding-right">信息标题</label>

                                                            <div class="col-xs-12 col-sm-8 inline help-block">
                                                                <span class="block input-icon input-icon-right">
                                                                    <input type="text" name="conts[title]" required="" id="title" class="width-100">
                                                                    <i class="icon-leaf"></i>
                                                                </span>
                                                            </div>
                                                            <div class="help-block col-xs-12 col-sm-reset inline red">
                                                                *(必填)
                                                            </div>
                                                        </div>
                                                        @if($type==2)
                                                        <div class="form-group">
                                                            <label for="pic" class="col-xs-12 col-sm-2 control-label no-padding-right">图片</label>
                                                            <div class="col-xs-12 col-sm-8 inline help-block">
                                                                <span class="block input-icon input-icon-right">
                                                                    <input type="file" title="请选择图片" enctype="multipart/form-data" id="pic" name="pic" required multiple accept="image/png,image/jpg,image/gif,image/JPEG"/>
                                                                    <i class="icon-leaf"></i>
                                                                </span>
                                                            </div>
                                                            <div class="help-block col-xs-12 col-sm-reset inline red">
                                                                *(必填)
                                                            </div>
                                                        </div>
                                                        @endif

                                                        @if($type!=4)
                                                        <div class="form-group">
                                                            <label for="name" class="col-xs-12 col-sm-2 control-label no-padding-right">信息标题</label>

                                                            <div class="col-xs-12 col-sm-8 inline help-block">
                                                                <span class="block input-icon input-icon-right">
                                                                    <!-- 加载编辑器的容器 -->
                                                                        <script id="cont" style="width: 100%;" name="cont" type="text/plain">

                                                                        </script>
                                                                        <!-- 配置文件 -->
                                                                        <script type="text/javascript" src="{{asset('ueditor/ueditor.config.js')}}"></script>
                                                                        <!-- 编辑器源码文件 -->
                                                                        <script type="text/javascript" src="{{asset('ueditor/ueditor.all.js')}}"></script>
                                                                        <!-- 实例化编辑器 -->
                                                                        <script type="text/javascript">
                                                                            var ue = UE.getEditor('cont');
                                                                        </script>
                                                                    </span>
                                                            </div>
                                                            <div class="help-block col-xs-12 col-sm-reset inline red">
                                                                *(必填)
                                                            </div>
                                                        </div>
                                                        @endif

                                                        @if($type==4)
														<div class="form-group">
															<label for="link_addr" class="col-xs-12 col-sm-2 control-label no-padding-right">链接地址</label>

															<div class="col-xs-12 col-sm-8 inline help-block">
																<span class="block input-icon input-icon-right">
																	<input type="text" name="conts[link_addr]" id="link_addr" class="width-100" value="">
																	<i class="icon-leaf"></i>
																</span>
															</div>
															<div class="help-block col-xs-12 col-sm-reset inline red">
																*(必填)
															</div>
														</div>
                                                        @endif

                                                        <div class="form-group">
                                                            <label for="show_tag" class="col-xs-12 col-sm-2 control-label no-padding-right">显示状态</label>

                                                            <div class="col-xs-12 col-sm-8 inline help-block">
                                                                <span class="block input-icon input-icon-right">
                                                                    <div class="radio inline">
                                                                        <label>
                                                                            <input type="radio" name="conts[show_tag]" value="0" title="0" class="ace" checked="true" id="show_tag">
                                                                            <span class="lbl"> 显示 </span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="radio inline">
                                                                        <label>
                                                                            <input type="radio" name="conts[show_tag]" value="1" title="1" class="ace">
                                                                            <span class="lbl"> 隐藏 </span>
                                                                        </label>
                                                                    </div>
                                                                </span>
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label for="inputWarning" class="col-xs-12 col-sm-2 control-label no-padding-right">添加人</label>

                                                            <div class="col-xs-12 col-sm-8 inline help-block">
                                                                <span class="block input-icon input-icon-right">
                                                                    <label>
                                                                        admin
                                                                    </label>
                                                                </span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="time" class="col-xs-12 col-sm-2 control-label no-padding-right">添加时间</label>

                                                            <div class="col-xs-12 col-sm-8 inline help-block">
                                                                <span class="block input-icon input-icon-right">
                                                                    @if($conts=='A')
                                                                    <input type="hidden" name="edit" value="404">
                                                                    @endif
																	<input type="hidden" name="edit" value="200">
                                                                    <input type="datetime-local" name="conts[time]" class="width-100">
                                                                    <i class="icon-leaf"></i>
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
