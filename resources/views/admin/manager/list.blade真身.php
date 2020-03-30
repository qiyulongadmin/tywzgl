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
                                        <div class="row">
                                        	<div class="col-xs-12">
                                        		<!-- PAGE CONTENT BEGINS -->
                                        		<div class="row">
                                        			<div class="col-xs-12">
                                                        {{--消息提示--}}
                                                        @include('admin.public.point')
                                                        {{--消息提示结束--}}
                                                        {{--搜索框开始--}}
                                                        <div class="nav-search" id="nav-search">
                                                            <form class="form-search" action="" method="get">
                                                                <span class="input-icon">
                                                                    <input type="text" value="{{ request()->get('title') }}" name="title" placeholder="搜索 ..." class="nav-search-input" id="nav-search-input" autocomplete="off">
                                                                    <i class="ace-icon fa fa-search nav-search-icon"></i>
                                                                </span>
                                                            </form>
                                                        </div>
                                                        {{--搜索框结束--}}
                                        				<table id="simple-table" class="table  table-bordered table-hover" style="margin-top: 3%;">
                                        					<thead>
                                        						<tr>
                                        							<th class="detail-col">序号</th>
                                        							<th class="hidden-480">用户名</th>
                                        							<th class="hidden-480">真实姓名</th>
                                        							<th>
                                        								<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                                        								最后修改时间
                                        							</th>
                                        							<th class="hidden-480">添加人</th>
                                        							<th>操作</th>
                                        						</tr>
                                        					</thead>

                                        					<tbody>
                                                                {{-- 循环模型（数据库）中数据 --}}
                                                                <?php $i = 0?>
                                                                @foreach($manage as $v)
                                                                <?php $i++?>
                                        						<tr>
                                        							<td>{{$i}}</td>
                                        							<td class="hidden-480">{{$v->name}}</td>
                                        							<td class="hidden-480">
                                                                    @if($v->real_name)
                                                                    {{$v->real_name}}
                                                                        @else（未填写）
                                                                    @endif
                                                                    </td>
                                        							<td>{{$v->created_at}}</td>

                                        							<td class="hidden-480">
                                        								<span class="label label-sm label-warning">{{$v->add_user}}</span>
                                        							</td>

                                        							<td>
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

                                        								<div class="hidden-md hidden-lg">
                                        									<div class="inline pos-rel">
                                        										<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                        											<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                                        										</button>

                                        										<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                        											<li>
                                        												<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                        													<span class="blue">
                                        														<i class="ace-icon fa fa-search-plus bigger-120"></i>
                                        													</span>
                                        												</a>
                                        											</li>

                                        											<li>
                                        												<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                        													<span class="green">
                                        														<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                        													</span>
                                        												</a>
                                        											</li>

                                        											<li>
                                        												<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                        													<span class="red">
                                        														<i class="ace-icon fa fa-trash-o bigger-120"></i>
                                        													</span>
                                        												</a>
                                        											</li>
                                        										</ul>
                                        									</div>
                                        								</div>
                                        							</td>

                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                        				</table>
                                                        {{--分页开始，加搜索-黑名单--}}
                                                        <div class="col-xs-6" style="margin-left: 40%;">
                                                            <div class="dataTables_paginate paging_simple_numbers" id="dynamic-table_paginate">
                                                                {!! $manage->appends(request()->except(['page'])) -> render() !!}
                                                            </div>
                                                        </div>
                                                        {{--分页结束--}}
                                        			</div><!-- /.span -->
                         85402217, 0, 1, 0, '在计算机网络中,所有的主机构成了网络的资源子网。', 25               		</div><!-- /.row -->
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

















INSERT INTO `exam_question_22`(`user_id`, `name`, `start_time`, `stop_time`, `status`, `show_order`, `type_tag`, `topic`, `max_score`, `true_answer`, `warehouse_id`, `user_answer`, `tag`) VALUES (118, '卜玉景', 1585402204, 1585402217, 0, 1, 1, '用来上网查看网页内容的工具是（ ） ', 25, 'A', 8, 'A', NULL);
INSERT INTO `exam_question_22`(`user_id`, `name`, `start_time`, `stop_time`, `status`, `show_order`, `type_tag`, `topic`, `max_score`, `true_answer`, `warehouse_id`, `user_answer`, `tag`) VALUES (118, '卜玉景', 1585402204, 1585402217, 0, 3, 1, '具有隔离广播信息能力的网络互联设备是（） ', 25, 'C', 8, 'C', NULL);
INSERT INTO `exam_question_22`(`user_id`, `name`, `start_time`, `stop_time`, `status`, `show_order`, `type_tag`, `topic`, `max_score`, `true_answer`, `warehouse_id`, `user_answer`, `tag`) VALUES (118, '卜玉景', 1585402204, 1585402217, 0, 2, 1, '某网段子网掩码为：255．255．255．248，该网段实际可用IP地址个数为（ ） ', 25, 'C', 8, 'C', NULL);
INSERT INTO `exam_question_22`(`user_id`, `name`, `start_time`, `stop_time`, `status`, `show_order`, `type_tag`, `topic`, `max_score`, `true_answer`, `warehouse_id`, `user_answer`, `tag`) VALUES (118, '卜玉景', 1585402204, 1585402217, 0, 4, 1, '发送电子邮件时，如果接收方没有开机，那么邮件将（ ）。 ', 25, 'D', 8, 'D', NULL);
INSERT INTO `exam_question_22`(`user_id`, `name`, `start_time`, `stop_time`, `status`, `show_order`, `type_tag`, `topic`, `max_score`, `true_answer`, `warehouse_id`, `user_answer`, `tag`) VALUES (118, '卜玉景', 1585402204, 1585402217, 0, 5, 1, '下列四项中表示电子邮件地址的是（ ）。 ', 25, 'A', 8, 'A', NULL);
INSERT INTO `exam_question_22`(`user_id`, `name`, `start_time`, `stop_time`, `status`, `show_order`, `type_tag`, `topic`, `max_score`, `true_answer`, `warehouse_id`, `user_answer`, `tag`) VALUES (118, '卜玉景', 1585402204, 1585402217, 0, 6, 1, '通常所说的拨号上网，是指过（ ）与因特网服务器连接。 ', 25, 'B ', 8, 'B ', NULL);
INSERT INTO `exam_question_22`(`user_id`, `name`, `start_time`, `stop_time`, `status`, `show_order`, `type_tag`, `topic`, `max_score`, `true_answer`, `warehouse_id`, `user_answer`, `tag`) VALUES (118, '卜玉景', 1585402204, 1585402217, 0, 7, 1, '以下说法正确的是（ ）。 ', 25, 'B ', 8, 'B ', NULL);
INSERT INTO `exam_question_22`(`user_id`, `name`, `start_time`, `stop_time`, `status`, `show_order`, `type_tag`, `topic`, `max_score`, `true_answer`, `warehouse_id`, `user_answer`, `tag`) VALUES (118, '卜玉景', 1585402204, 1585402217, 0, 8, 1, '计算机网络建立的主要目的是实现计算机资源的共享。计算机资源主要指计算机（ ） ', 25, 'C', 8, 'C', NULL);
INSERT INTO `exam_question_22`(`user_id`, `name`, `start_time`, `stop_time`, `status`, `show_order`, `type_tag`, `topic`, `max_score`, `true_answer`, `warehouse_id`, `user_answer`, `tag`) VALUES (118, '卜玉景', 1585402204, 1585402217, 0, 9, 2, '大型网络存在哪三个常见问题？', 25, '["B","C","D"]', 8, '["B","C","D"]', NULL);
INSERT INTO `exam_question_22`(`user_id`, `name`, `start_time`, `stop_time`, `status`, `show_order`, `type_tag`, `topic`, `max_score`, `true_answer`, `warehouse_id`, `user_answer`, `tag`) VALUES (118, '卜玉景', 1585402204, 1585402217, 0, 10, 2, '下列哪些中间设备可用于在网络之间实施安全保护？', 25, '["A","D"]', 8, '["A","D"]', NULL);
INSERT INTO `exam_question_22`(`user_id`, `name`, `start_time`, `stop_time`, `status`, `show_order`, `type_tag`, `topic`, `max_score`, `true_answer`, `warehouse_id`, `user_answer`, `tag`) VALUES (118, '卜玉景', 1585402204, 1585402217, 0, 11, 1, '以下哪种设备用于创建或划分广播域', 25, 'A', 8, 'A', NULL);
INSERT INTO `exam_question_22`(`user_id`, `name`, `start_time`, `stop_time`, `status`, `show_order`, `type_tag`, `topic`, `max_score`, `true_answer`, `warehouse_id`, `user_answer`, `tag`) VALUES (118, '卜玉景', 1561593600, 1561597200, 0, 12, 3, '在共享介质方式的总线型局域网实现技术中,需要利用______方法解决多结点访问共享总线的冲突问题。', 25, 'CSMA/CD；', 8, 'CSMA/CD；', NULL);
INSERT INTO `exam_question_22`(`user_id`, `name`, `start_time`, `stop_time`, `status`, `show_order`, `type_tag`, `topic`, `max_score`, `true_answer`, `warehouse_id`, `user_answer`, `tag`) VALUES (118, '卜玉景', 1585402204, 1585402217, 0, 13, 3, '以集线器为中心的网络称为___________局域网,以交换机为中心的网络称为___________局域网。', 25, '共享式；交换式', 8, '共享式；交换式', NULL);
INSERT INTO `exam_question_22`(`user_id`, `name`, `start_time`, `stop_time`, `status`, `show_order`, `type_tag`, `topic`, `max_score`, `true_answer`, `warehouse_id`, `user_answer`, `tag`) VALUES (118, '卜玉景', 1585402204, 1585402217, 0, 14, 0, '在计算机网络中,所有的主机构成了网络的资源子网。', 25, '对', 8, '对', NULL);