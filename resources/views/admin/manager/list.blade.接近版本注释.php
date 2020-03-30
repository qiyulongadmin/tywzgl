<!DOCTYPE html>
<html lang="en">

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>普通网站管理系统</title>
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<!-- bootstrap & fontawesome -->

		<!-- 好用的js日期选择器 -->
		<link rel="stylesheet" href="http://zx.tu-do.cn/static/super/Datepicker/css/font-awesome.4.6.0.css">
		<link href="http://zx.tu-do.cn/static/super/Datepicker/css/foundation-datepicker.css" rel="stylesheet" type="text/css">
		<!-- 好用的js日期选择器 -->
		<link rel="stylesheet" href="http://zx.tu-do.cn/static/super/css/bootstrap.min.css">
		<link rel="stylesheet" href="http://zx.tu-do.cn/static/super/css/font-awesome.min.css">
		<!-- page specific plugin styles -->
		<!-- text fonts -->
		<link rel="stylesheet" href="http://zx.tu-do.cn/static/super/css/ace-fonts.min.css">
		<!-- ace styles -->
		<link rel="stylesheet" href="http://zx.tu-do.cn/static/super/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style">
		<link rel="stylesheet" href="http://zx.tu-do.cn/static/super/css/ace-skins.min.css">
		<!--[if lte IE 9]>
			<link rel="stylesheet" href="http://zx.tu-do.cn/static/super/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="http://zx.tu-do.cn/static/super/css/ace-ie.min.css" />
		<![endif]-->
		<!-- inline styles related to this page -->
		<link rel="stylesheet" href="http://zx.tu-do.cn/static/super/css/custom.css">

		<!-- 下拉选择框 -->
		<link href="http://zx.tu-do.cn/static/super/serachalbelSelect/searchableSelect.css" rel="stylesheet">
		<link rel="stylesheet" href="http://zx.tu-do.cn/static/super/layui-v2.5.5/css/layui.css" media="all">

	<!-- ace settings handler -->


		<!--[if lte IE 8]>
		<script src="http://zx.tu-do.cn/static/super/js/html5shiv.min.js"></script>
		<script src="http://zx.tu-do.cn/static/super/js/respond.min.js"></script>
		<![endif]-->
		<!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.css"> -->
		<link rel="stylesheet" href="http://zx.tu-do.cn/static/super/table/btl.css">

		<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
		<script src="http://zx.tu-do.cn/static/super/autocomplete/jquery-1.11.2.min.js" type="text/javascript"></script>
		<!-- // <script src="http://zx.tu-do.cn/static/super/table/jq.js"></script> -->
		<!-- Latest compiled and minified JavaScript -->
		<script src="http://zx.tu-do.cn/static/super/table/tbl.js"></script>
		<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.js"></script> -->
		<!-- Latest compiled and minified Locales -->
		<script src="http://zx.tu-do.cn/static/super/table/tbl_cn.js"></script>
		<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/locale/bootstrap-table-zh-CN.min.js"></script> -->
		<script src="http://zx.tu-do.cn/static/super/table/export.js"></script>
		<!-- <script type="text/javascript" src="http://issues.wenzhixin.net.cn/bootstrap-table/assets/bootstrap-table/src/extensions/export/bootstrap-table-export.js"></script> -->
		<script src="http://zx.tu-do.cn/static/super/table/tb_export.js"></script>
		<!-- <script type="text/javascript" src="http://rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js"></script> -->
		<script src="http://zx.tu-do.cn/static/super/js/jquery-ui.min.js" type="text/javascript"></script>

		<!-- 自动完成表单 -->
		<!-- <script src="http://zx.tu-do.cn/static/super/autocomplete/jquery.min.js"></script> -->
		<link rel="stylesheet" href="http://zx.tu-do.cn/static/super/autocomplete/jquery-ui.css" class="ace-main-stylesheet" id="main-ace-style">
		<script src="http://zx.tu-do.cn/static/super/autocomplete/jquery-ui.min.js" type="text/javascript"></script>

		<!-- Ueditor编辑器 -->
		<script type="text/javascript" src="http://zx.tu-do.cn/static/super/Ueditor/ueditor.config.js"></script>
		<script type="text/javascript" src="http://zx.tu-do.cn/static/super/Ueditor/ueditor.all.js"></script>

		<!-- 下拉选择框 -->
		<script type="text/javascript" src="http://zx.tu-do.cn/static/super/serachalbelSelect/jquery.searchableSelect.js"></script>
		<script src="http://zx.tu-do.cn/static/super/layui-v2.5.5/layui.js" charset="utf-8"></script>


		<style type="text/css">
			#btn_add a {
				color: #333;
			}

			.contMiddle {
				margin-top: 8px;
				word-wrap: break-word;
			}

			.ui-autocomplete-category {
				font-weight: bold;
				padding: .2em .4em;
				margin: .8em 0 .2em;
				line-height: 1.5;
			}

			.ui-autocomplete {
				max-height: 100px;
				overflow-y: auto;
				overflow-x: hidden;
			}

			* html .ui-autocomplete {
				height: 100px;
			}
		</style>



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
                                <li class="active">
                                    <a href="">
                                        <i class="green ace-icon fa fa-home bigger-120"></i>
                                        管理员列表
                                    </a>
                                </li>

                                <li>
                                    <a href="{{url('admin/manager/create')}}">
                                        管理员添加
                                    </a>
                                </li>
                            </ul>
                            {{--选项卡标题结束--}}
                            <div class="tab-content">

                                {{--选项卡内容部分/管理员列表开始--}}
                                <!-- <div class="page-content"> -->
                                    <!-- <div class="row">
                                        <div class="col-xs-12"> -->
                                            <!-- PAGE CONTENT BEGINS -->
                                            <!-- <div class="tabbable">
                                                <div class="tab-content"> -->
                                                    <script type="text/javascript">
                                                        (function(){
                                                            var wait = document.getElementById('wait'),
                                                                href = document.getElementById('href').href;
                                                            var interval = setInterval(function(){
                                                                var time = --wait.innerHTML;
                                                                if(time <= 0) {
                                                                    location.href = href;
                                                                    clearInterval(interval);
                                                                };
                                                            }, 1000);
                                                        })();
                                                    </script>
                                                    <!-- <div class="bootstrap-table"> -->


                      <!--                                  <div class="columns columns-right btn-group pull-right">
                                                            <button class="btn btn-default" type="button" name="refresh" title="刷新">
                                                                <i class="glyphicon glyphicon-refresh icon-refresh"></i>
                                                            </button>
                                                            <button class="btn btn-default" type="button" name="toggle" title="切换">
                                                                <i class="glyphicon glyphicon-list-alt icon-list-alt"></i>
                                                            </button>
                                                            <div class="keep-open btn-group" title="列">
                                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                    <i class="glyphicon glyphicon-th icon-th"></i>
                                                                    <span class="caret"></span>
                                                                </button>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    <li><label><input type="checkbox" data-field="ShowOrder" value="0" checked="checked"> 显示序号</label></li>
                                                                    <li><label><input type="checkbox" data-field="Name" value="1" checked="checked"> 企业名称</label></li>
                                                                    <li><label><input type="checkbox" data-field="Code" value="2" checked="checked"> 企业代码</label></li>
                                                                    <li><label><input type="checkbox" data-field="Captcha" value="3" checked="checked"> 验证码</label></li>
                                                                    <li><label><input type="checkbox" data-field="Tag" value="4" checked="checked"> 是否生效</label></li>
                                                                    <li><label><input type="checkbox" data-field="Bz" value="5" checked="checked"> 备注</label></li>
                                                                    <li><label><input type="checkbox" data-field="AddUser" value="6" checked="checked"> 添加人</label></li>
                                                                    <li><label><input type="checkbox" data-field="CreatedAt" value="7" checked="checked"> 添加时间</label></li>
                                                                    <li><label><input type="checkbox" data-field="id" value="8" checked="checked"> 操作</label></li>
                                                                </ul></div><div class="export btn-group">
                                                                <button class="btn btn-default dropdown-toggle" title="Export data" data-toggle="dropdown" type="button" aria-expanded="false">
                                                                    <i class="glyphicon glyphicon-export icon-share"></i>
                                                                    <span class="caret"></span>
                                                                </button>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    <li data-type="json"><a href="javascript:void(0)">JSON</a></li>
                                                                    <li data-type="xml"><a href="javascript:void(0)">XML</a></li>
                                                                    <li data-type="csv"><a href="javascript:void(0)">CSV</a></li>
                                                                    <li data-type="txt"><a href="javascript:void(0)">TXT</a></li>
                                                                    <li data-type="sql"><a href="javascript:void(0)">SQL</a></li>
                                                                    <li data-type="excel"><a href="javascript:void(0)">MS-Excel</a></li>
                                                                </ul>
                                                            </div>
                                                        </div> -->

                                                        <!-- <div class="fixed-table-container" style="padding-bottom: 0px;"> -->
                                                           <!-- <div class="fixed-table-header" style="display: none;">
                                                                <table></table>
                                                            </div> -->
                                                            <!-- <div class="fixed-table-body"> -->
                                                                <div class="bs-bars pull-left">
                                                                    <div id="toolbar" class="btn-group">
                                                                        <div id="btn_add" class="btn btn-default">
                                                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><a href="/super/codetype/add" style="color:#333">新增</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="fixed-table-loading" style="top: 41px; display: none;">正在努力地加载数据中，请稍候……</div>
                                                                <table id="tb_departments" class="table table-hover table-striped" style="margin-top: 0px;">

                                                                    <thead style="display: table-header-group;">
                                                                        <tr>
                                                                            <th style="" data-field="ShowOrder" tabindex="0">
                                                                                <div class="th-inner sortable both">显示序号</div>
                                                                                <div class="fht-cell"></div>
                                                                            </th>
                                                                            <th style="" data-field="Name" tabindex="0">
                                                                                <div class="th-inner ">企业名称</div>
                                                                                <div class="fht-cell"></div>
                                                                            </th>
                                                                            <th style="" data-field="Code" tabindex="0">
                                                                                <div class="th-inner ">企业代码</div>
                                                                                <div class="fht-cell"></div>
                                                                            </th>
                                                                            <th style="" data-field="Captcha" tabindex="0">
                                                                                <div class="th-inner ">验证码</div>
                                                                                <div class="fht-cell"></div>
                                                                            </th>
                                                                            <th style="" data-field="Tag" tabindex="0">
                                                                                <div class="th-inner sortable both">是否生效</div>
                                                                                <div class="fht-cell"></div>
                                                                            </th>
                                                                            <th style="" data-field="Bz" tabindex="0">
                                                                                <div class="th-inner ">备注</div>
                                                                                <div class="fht-cell"></div>
                                                                            </th>
                                                                            <th style="" data-field="AddUser" tabindex="0">
                                                                                <div class="th-inner ">添加人</div>
                                                                                <div class="fht-cell"></div>
                                                                            </th>
                                                                            <th style="" data-field="CreatedAt" tabindex="0">
                                                                                <div class="th-inner sortable both asc">添加时间</div>
                                                                                <div class="fht-cell"></div>
                                                                            </th>
                                                                            <th style="" data-field="id" tabindex="0">
                                                                                <div class="th-inner ">操作</div>
                                                                                <div class="fht-cell"></div>
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        {{-- 循环模型（数据库）中数据 --}}
                                                                        <?php $i = 0?>
                                                                        @foreach($manage as $v)
                                                                        <?php $i++?>
                                                                        <tr data-index="{{$i-1}}" data-uniqueid="{{$i}}">
                                                                            <td style="">{{$i}}</td>
                                                                            <td style="">{{$v->name}}</td>
                                                                            <td style="">91330100799655058B</td>
                                                                            <td style="">h8lt6019rijyxnna</td>
                                                                            <td style=""><span class="label label-success">生效</span></td>
                                                                            <td style=""></td>
                                                                            <td style="">admin</td>
                                                                            <td style="">2020-02-19 13:19:38</td>
                                                                            <td style="">
                                                                                <div class="hidden-sm hidden-xs btn-group">
                                                                                    <form style="float: left;" action="{{url('admin/manager/auth',['id'=>$v->id])}}" method= "get">
                                                                                        <input class="btn btn-xs btn-warning" type="submit" value="授权" />
                                                                                    </form>
                                                                                    <form style="float: left; margin-left: 2px;" action="{{url('admin/manager/edit',['id'=>$v->id])}}" method= "get">
                                                                                        <input class="btn btn-xs btn-info" type="submit" value="编辑" />
                                                                                    </form>
                                                                                    <form style="float: right;margin-left: 2px;" action="{{url('admin/manager',['id'=>$v->id])}}" method= "post">
                                                                                        <input class="btn btn-xs btn-danger" onclick="return del()" type="submit" value="删除" />
                                                                                        <input type="hidden" name="_method" value="DELETE">
                                                                                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                                                                    </form>
                                                                                </div>
                                                                            </td>
                                                                            {{-- <td style=""><a class="blue" href="edit?id=1">修改</a> <a class="red" onclick="return del()" href="index?id=1">删除</a></td> --}}
                                                                        </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                            <div class="fixed-table-footer" style="display: none;">
                                                                <table>
                                                                    <tbody>
                                                                        <tr>

                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <!-- <div class="fixed-table-pagination" style="display: block;">
                                                                <div class="pull-left pagination-detail">
                                                                    <span class="pagination-info">显示第 1 到第 2 条记录，总共 2 条记录</span>
                                                                    <span class="page-list" style="display: none;">每页显示
                                                                        <span class="btn-group dropup">
                                                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                                                <span class="page-size">10</span>
                                                                                <span class="caret"></span>
                                                                            </button>
                                                                            <ul class="dropdown-menu" role="menu">
                                                                                <li class="active"><a href="javascript:void(0)">10</a></li>
                                                                            </ul>
                                                                        </span>
                                                                        条记录
                                                                    </span>
                                                                </div>
                                                                <div class="pull-right pagination" style="display: none;">
                                                                    <ul class="pagination">
                                                                        <li class="page-pre"><a href="javascript:void(0)">‹</a></li>
                                                                        <li class="page-number active"><a href="javascript:void(0)">1</a></li>
                                                                        <li class="page-next"><a href="javascript:void(0)">›</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div> -->
                                                        </div>

                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <script type="text/javascript">
                                                            $(function () {
                                                                //1.初始化Table
                                                                var oTable = new TableInit();
                                                                oTable.Init();

                                                                //2.初始化Button的点击事件
                                                                var oButtonInit = new ButtonInit();
                                                                oButtonInit.Init();

                                                                //3.初始化select的change事件
                                                                $("#tb_departments").change(function () {
                                                                    $('#tb_departments').bootstrapTable('refreshOptions', {
                                                                        exportDataType: $(this).val()
                                                                    });
                                                                });
                                                            });

                                                            var TableInit = function () {
                                                                var oTableInit = new Object();
                                                                //初始化Table
                                                                oTableInit.Init = function () {
                                                                    $('#tb_departments').bootstrapTable({
                                                                        url: "/super/whitelist/indexdata",         //请求后台的URL（*）
                                                                        method: 'get',                      //请求方式（*）
                                                                        toolbar: '#toolbar',                //工具按钮用哪个容器
                                                                        striped: true,                      //是否显示行间隔色
                                                                        cache: false,                       //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
                                                                        pagination: true,                   //是否显示分页（*）
                                                                        sortable: true,                     //是否启用排序
                                                                        sortOrder: "asc",                   //排序方式
                                                                        queryParams: oTableInit.queryParams,//传递参数（*）
                                                                        sidePagination: "client",           //分页方式：client客户端分页，server服务端分页（*）
                                                                        pageNumber:1,                       //初始化加载第一页，默认第一页
                                                                        pageSize: 10,                       //每页的记录行数（*）
                                                                        pageList: [10, 25, 50, 100],        //可供选择的每页的行数（*）
                                                                        search: true,                       //是否显示表格搜索
                                                                        // strictSearch: false, //是否启用全匹配搜索
                                                                        showColumns: true,                  //是否显示所有的列
                                                                        showRefresh: true,              //是否显示刷新按钮
                                                                        // showPaginationSwitch: true,
                                                                        minimumCountColumns: 2,             //最少允许的列数
                                                                        // clickToSelect: true,                //是否启用点击选中行
                                                                        // height: 500,                        //行高，如果没有设置height属性，表格自动根据记录条数觉得表格高度
                                                                        uniqueId: "id",                     //每一行的唯一标识，一般为主键列
                                                                        showToggle:true,                    //是否显示详细视图和列表视图的切换按钮
                                                                        cardView: false,                    //是否显示详细视图
                                                                        // detailView: true,                   //是否显示父子表
                                                                        showExport:true,
                                                                        exportDataType: "basic",
                                                                        // 注册加载子表的事件。注意下这里的三个参数！
                                                                        onExpandRow: function (index, row, $detail) {
                                                                            show(index, row, $detail);
                                                                        },
                                                                        // onDblClickCell:function(field,value,row,$element){
                                                                        //     show(field,value,row,$element);
                                                                        // },
                                                                        columns: [
                                                                        {
                                                                            field: 'ShowOrder',
                                                                            title: '显示序号',
                                                                            sortable: true
                                                                        },{
                                                                            field: 'Name',
                                                                            title: '企业名称',
                                                                        },{
                                                                            field: 'Code',
                                                                            title: '企业代码',
                                                                        },{
                                                                            field: 'Captcha',
                                                                            title: '验证码',
                                                                        },{
                                                                            field: 'Tag',
                                                                            title: '是否生效',
                                                                            sortable:true
                                                                        },{
                                                                            field: 'Bz',
                                                                            title: '备注',
                                                                        },{
                                                                            field: 'AddUser',
                                                                            title: '添加人',
                                                                        },{
                                                                            field: 'CreatedAt',
                                                                            title: '添加时间',
                                                                            sortable:true
                                                                        },{
                                                                            field:'id',
                                                                            formatter:function(value,row,index){
                                                                                var a = "";
                                                                                a += '<a class="yellow" href="edit?id=' + value + '">授权</a> ';
                                                                                a += '<a class="blue" href="edit?id=' + value + '">修改</a> ';
                                                                                a += '<a class="red" onclick="return del()" href="index?id='+value+'">删除</a>';
                                                                                return a;
                                                                            },
                                                                            title: '操作',
                                                                        },
                                                                        ]
                                                                    });
                                                                };

                                                                //得到查询的参数
                                                                oTableInit.queryParams = function (params) {
                                                                    var temp = {   //这里的键的名字和控制器的变量名必须一直，这边改动，控制器也需要改成一样的
                                                                        limit: params.limit,   //页面大小
                                                                        offset: params.offset,  //页码
                                                                        departmentname: $("#txt_search_departmentname").val(),
                                                                        statu: $("#txt_search_statu").val()
                                                                    };
                                                                    return temp;
                                                                };
                                                                return oTableInit;
                                                            };


                                                            var ButtonInit = function () {
                                                                var oInit = new Object();
                                                                var postdata = {};

                                                                oInit.Init = function () {
                                                                    //初始化页面上面的按钮事件

                                                                };

                                                                return oInit;
                                                            };

                                                        </script>


                                                </div>
                                            </div>
                                            <!-- PAGE CONTENT ENDS -->
                                        </div>
                                            <!-- /.col -->
                                    </div>
                                        <!-- /.row -->
                                </div>
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







		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>


	<script type="text/javascript">
		window.jQuery || document.write("<script src='http://zx.tu-do.cn/static/super/js/jquery.min.js'>" + "<" + "/script>");
	</script>

	<!-- <![endif]-->

	<!--[if IE]>
<script type="text/javascript">
window.jQuery || document.write("<script src='{{ asset('resources/admin/js/jquery1x.min.js') }}'>"+"<"+"/script>");
</script>
<![endif]-->
	<script type="text/javascript">
		if ('ontouchstart' in document.documentElement) document.write("<script src='http://zx.tu-do.cn/static/super/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
	</script>
	<script src="http://zx.tu-do.cn/static/super/js/bootstrap.min.js"></script>

	<!-- page specific plugin scripts -->

	<!--@yield('plugins')-->




	<!-- ace scripts -->
	<script src="http://zx.tu-do.cn/static/super/js/ace-elements.min.js"></script>
	<script src="http://zx.tu-do.cn/static/super/js/ace.min.js"></script>

	<!-- inline scripts related to this page -->
	<script src="http://zx.tu-do.cn/static/super/js/custom.js"></script>

	<script src="http://zx.tu-do.cn/static/super/js/jquery.cookie.js"></script>

	<!-- 好用的js日期选择器 -->
	<script src="http://zx.tu-do.cn/static/super/Datepicker/js/foundation-datepicker.js"></script>
	<script src="http://zx.tu-do.cn/static/super/Datepicker/js/locales/foundation-datepicker.zh-CN.js"></script>

	<script>
		$('.dateformat').fdatepicker({
			format: 'yyyy.m.d',
		});
		$('.dateformat_').fdatepicker({
			format: 'yyyy-mm-dd',
		});
		/*
			$('.dateformat').fdatepicker({
				format: 'yyyy-mm-dd hh:ii',
				pickTime: true
			}); */

		$('.dateTimeFormat').fdatepicker({
			format: 'yyyy-mm-dd hh:ii:ss',
			pickTime: true
		});

        function del() {
            var msg = "您真的确定要删除吗？\n\n请确认！";
            if (confirm(msg)==true){
                return true;
            }else{
                return false;
            }
        }

		var nowTemp = new Date();
		var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
		var checkin = $('#dpd1').fdatepicker({
			onRender: function (date) {
				return date.valueOf() < now.valueOf() ? 'disabled' : '';
			}
		}).on('changeDate', function (ev) {
			if (ev.date.valueOf() > checkout.date.valueOf()) {
				var newDate = new Date(ev.date)
				newDate.setDate(newDate.getDate() + 1);
				checkout.update(newDate);
			}
			checkin.hide();
			$('#dpd2')[0].focus();
		}).data('datepicker');
		var checkout = $('#dpd2').fdatepicker({
			onRender: function (date) {
				return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
			}
		}).on('changeDate', function (ev) {
			checkout.hide();
		}).data('datepicker');

		// 定位
		$('.dropdown-modal_').on('click', function () {
			var href = $(this).find('.top_bar').attr('href');
			$.cookie('link2', href, { expires: 7, path: '/' });
			$.cookie('link', href, { expires: 7, path: '/' });

		})

		$('#sidebar ul li a').on('click', function () {
			var href1 = $(this).attr('href');
			$.cookie('link2', href1, { expires: 7, path: '/' });
		})
		function del() {
			var msg = "您真的确定要删除吗？\n\n请确认！";
			if (confirm(msg)) {
				return true;
			} else {
				return false;
			}
		}

		//checkbox 全选/取消全选
		var isCheckAll = false;
		function swapCheck() {
			if (isCheckAll) {
				$("input[type='checkbox']").each(function () {
					this.checked = false;
				});
				isCheckAll = false;
			} else {
				$("input[type='checkbox']").each(function () {
					this.checked = true;
				});
				isCheckAll = true;
			}
		}
	</script>

	<!-- 好用的js日期选择器 -->
	<!--@yield('scripts')-->

    <script>
		function pingbi() {
			var msg = "您真的确定要屏蔽此账号吗？\n\n屏蔽后不可登录，请确认！";
			if (confirm(msg)) {
				return true;
			} else {
				return false;
			}
		}

    </script>

	<script>

	</script>


</body></html>
