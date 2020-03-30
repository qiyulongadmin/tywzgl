<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>普通网站管理系统</title>
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        @include('admin.public.style_list')
        @include('admin.public.script_list_top')
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
                                    <li class="active">
                                        <a href="{{url('admin/cont_type/'.$id.'/cont_type')}}">
                                            <i class="green ace-icon fa fa-home bigger-120"></i>
                                            内容分类列表
                                        </a>
                                    </li>
                                </ul>
                                {{--选项卡标题结束--}}
                                <div class="tab-content">

                                {{--选项卡内容部分/管理员列表开始--}}
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

                                <div class="bs-bars pull-left">
                                    <div id="toolbar" class="btn-group">

                                        <a href="{{url('admin/cont_type/'.$id.'/cont_type/create')}}" style="color:#333">
                                        <div id="btn_add" class="btn btn-default">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                            新增
                                        </div>
                                        </a>

                                        @if($id!=0)
                                        <a href="{{url('admin/cont_type/'.$cont_type_type.'/cont_type')}}" style="color:#333;">
                                        <div id="btn_add" class="btn btn-default" style="margin-left: 5px;">
                                            <i class="ace-icon fa fa-reply icon-only"></i>返回
                                        </div>
                                        </a>
                                        @endif
                                    </div>

                                </div>
                                {{--消息提示--}}
                                @include('admin.public.point')
                                {{--消息提示结束--}}
                                <div class="fixed-table-loading" style="top: 41px; display: none;">正在努力地加载数据中，请稍候……</div>
                                <table id="tb_departments" class="table table-hover table-striped" style="margin-top: 0px;">
                                    <tbody>
                                        {{-- 循环模型（数据库）中数据 --}}
                                        <?php $i = 0?>
                                        @foreach($cont_type as $v)
                                        <?php $i++?>
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td class="hidden-480">{{$v->show_order}}</td>
                                            <td class="hidden-480">
                                            @if($v->type==0)
                                                有下级分类
                                                @elseif($v->type==1)
                                                新闻列表
                                                @elseif($v->type==2)
                                                图文列表
                                                @elseif($v->type==3)
                                                直接内容
                                                @elseif($v->type==4)
                                                链接地址
                                            @endif
                                            </td>
                                            <td>{{$v->name}}</td>
                                            <td>{{$v->updated_at}}</td>
                                            <td>
                                            @if($v->show_tag==0)
                                                <span class="label label-sm btn-success">显示</span>
                                                @else
                                                <span class="label label-sm btn-primary">隐藏</span>
                                            @endif
                                            </td>

                                            <td class="hidden-480">
                                                <span class="label label-sm label-warning">{{$v->add_user}}</span>
                                            </td>

                                            <td>
                                                <div class="hidden-sm hidden-xs btn-group">
                                                    <form style="float: left; margin-left: 2px;" action="{{url('admin/cont_type/'.$id.'/cont_type/edit',['ids'=>$v->id])}}" method= "get">
                                                        <input class="btn btn-xs btn-info" type="submit" value="编辑" />
                                                    </form>
                                                    @if($v->type==0)
                                                    <form style="float: right; margin-left: 2px;" action="{{url('admin/cont_type/'.$v->id.'/cont_type')}}" method= "get">
                                                        <input class="btn btn-xs btn-info" type="submit" value="下级分类" />
                                                    </form>
                                                    @endif
                                                    <form style="float: right;margin-left: 2px;" action="{{url('admin/cont_type/'.$id.'/cont_type',['ids'=>$v->id])}}" method= "post">
                                                        <input class="btn btn-xs btn-danger" onclick="return del()" type="submit" value="删除" />
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                                    </form>
                                                </div>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

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
                                            $("#zl_export").change(function () {
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
                                                        field: 'Order',
                                                        title: '序号',
                                                        sortable: true
                                                    },{
                                                        field: 'ShowOrder',
                                                        title: '显示序号',
                                                        sortable: true
                                                    },{
                                                        field: 'Type',
                                                        title: '分类类型',
                                                    },{
                                                        field: 'Name',
                                                        title: '名称',
                                                    },{
                                                        field: 'Updated_at',
                                                        title: '最后修改时间',
                                                        sortable:true
                                                    },{
                                                        field: 'Show_tag',
                                                        title: '显示状态',
                                                    },{
                                                        field: 'AddUser',
                                                        title: '添加人',
                                                    },{
                                                        field: 'id',
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
    @include('admin.public.script_list_footer')
</body>
</html>
