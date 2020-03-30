			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							网
						</button>

						<button class="btn btn-info">
							站
						</button>

						<button class="btn btn-warning">
							管
						</button>

						<button class="btn btn-danger">
							理
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="{{ Request::getPathinfo()=='/admin/index'?'active':'' }}">
						<a href="{{url('admin/index')}}">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> 欢迎使用 </span>
						</a>

						<b class="arrow"></b>

					</li>

                    <li class="{{ substr(Request::getPathinfo(),0,14)=='/admin/setting'?'active open':'' }}{{ substr(Request::getPathinfo(),0,14)=='/admin/manager'?'active open':'' }}">
						<a href="" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								系统初始
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="{{ substr(Request::getPathinfo(),0,14)=='/admin/setting'?'active':'' }}">
								<a href="{{url('admin/setting')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									站点管理
								</a>

								<b class="arrow"></b>
							</li>

							<li class="{{ substr(Request::getPathinfo(),0,14)=='/admin/manager'?'active':'' }}">
								<a href="{{url('admin/manager')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									管理员管理
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>

                    <li class="{{ substr(Request::getPathinfo(),0,12)=='/admin/menus'?'active':'' }}">
                    	<a href="{{url('admin/menus/0/menus')}}">
                    		<i class="menu-icon fa fa-pencil-square-o"></i>
                    		<span class="menu-text"> 菜单管理 </span>
                    	</a>

                    	<b class="arrow"></b>

                    </li>

                    <li class="{{ substr(Request::getPathinfo(),0,16)=='/admin/cont_type'?'active':'' }}">
                    	<a href="{{url('admin/cont_type/0/cont_type')}}">
                    		<i class="menu-icon fa fa-pencil-square-o"></i>
                    		<span class="menu-text"> 内容分类管理 </span>
                    	</a>

                    	<b class="arrow"></b>

                    </li>

                    <li class="{{substr(Request::getPathinfo(),0,11)=='/admin/link'?'active open':'' }}">
						<a href="" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text">
								内容管理
							</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
                            @foreach($cont_types as $v)
                            @if($v->up_id==0&&$v->type!=0)
                            <li class="{{ Request::url() == url('/admin/conts/'.$v->id.'/conts')?'active':''}}">
                                <a href="{{url('admin/conts/'.$v->id.'/conts')}}" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    {{$v->name}}
                                </a>
                            @elseif(@$v->up_id==0&&$v->type==0)
                            <li class="{{substr(Request::getPathinfo(),0,19+strlen($v->id))=='/admin/conts/'.$v->id.'/conts'?'active open':'' }}">
                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    {{$v->name}}
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>
                                <ul class="submenu">
                                    @foreach($cont_types as $v2)
                                    @if(@$v2->up_id!=0&&$v2->type==0)
                                        @if($v2->up_id==$v->id)
                                        <li class="{{ Request::url()==url('admin/links/'.$v->id.'/links')?'active':'' }}{{ Request::url()==url('admin/links/'.$v->id.'/links/create')?'active':'' }}{{substr(Request::getPathinfo(),0,24+strlen($v->id))=='/admin/links/'.$v->id.'/links/edit'?'active':'' }}">
                                            <a href="#" class="dropdown-toggle">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                {{$v2->name}}
                                                <b class="arrow fa fa-angle-down"></b>
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                        <ul>
                                            @foreach($cont_types as $v3)
                                            {{--三级循环再此--}}
                                            @endforeach
                                        </ul>
                                        @endif
                                    @elseif(@$v2->up_id!=0&&$v2->type!=0)
                                        @if($v2->up_id==$v->id)
                                        <li class="{{ Request::url()==url('admin/links/'.$v->id.'/links')?'active':'' }}{{ Request::url()==url('admin/links/'.$v->id.'/links/create')?'active':'' }}{{substr(Request::getPathinfo(),0,24+strlen($v->id))=='/admin/links/'.$v->id.'/links/edit'?'active':'' }}">
                                        <a href="{{url('admin/links/'.$v->id.'/links')}}">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            {{$v2->name}}
                                        </a>
                                        <b class="arrow"></b>
                                        </li>
                                        @endif
                                    @endif
                                    @endforeach
                                </ul>
                            </li>
                            @endif
                            @endforeach
						</ul>
					</li>

                    <li class="{{ substr(Request::getPathinfo(),0,10)=='/admin/pic'?'active open':'' }}">
						<a href="" class="dropdown-toggle">
							<i class="menu-icon fa fa-picture-o"></i>
							<span class="menu-text">
								图片管理
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="{{ substr(Request::getPathinfo(),0,15)=='/admin/pic_type'?'active':'' }}">
								<a href="{{url('admin/pic_type')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									图片类型管理
								</a>

								<b class="arrow"></b>
							</li>

                            <li class="{{ substr(Request::getPathinfo(),0,11)=='/admin/pics'?'active open':'' }}">
                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>

                                    图片内容管理
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>

                                <b class="arrow"></b>

                                <ul class="submenu">
                                    @foreach($pic_types as $v)
                                    <li class="{{ Request::url()==url('admin/pics/'.$v->id.'/pics')?'active':'' }}{{ Request::url()==url('admin/pics/'.$v->id.'/pics/create')?'active':'' }}{{substr(Request::getPathinfo(),0,22+strlen($v->id))=='/admin/pics/'.$v->id.'/pics/edit'?'active':'' }}">
                                        <a href="{{url('admin/pics/'.$v->id.'/pics')}}">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            {{$v->name}}
                                        </a>

                                        <b class="arrow"></b>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>


						</ul>
					</li>


                    <li class="{{substr(Request::getPathinfo(),0,11)=='/admin/link'?'active open':'' }}">
						<a href="" class="dropdown-toggle">
							<i class="menu-icon fa fa-globe"></i>
							<span class="menu-text">
								链接管理
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="{{ substr(Request::getPathinfo(),0,16)=='/admin/link_type'?'active':'' }}">
								<a href="{{url('admin/link_type')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									链接类型管理
								</a>

								<b class="arrow"></b>
							</li>

                            <li class="{{ substr(Request::getPathinfo(),0,12)=='/admin/links'?'active open':'' }}">
                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>

                                    链接内容管理
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>

                                <b class="arrow"></b>

                                <ul class="submenu">
                                    @foreach($link_types as $v)
                                    <li class="{{ Request::url()==url('admin/links/'.$v->id.'/links')?'active':'' }}{{ Request::url()==url('admin/links/'.$v->id.'/links/create')?'active':'' }}{{substr(Request::getPathinfo(),0,24+strlen($v->id))=='/admin/links/'.$v->id.'/links/edit'?'active':'' }}">
                                        <a href="{{url('admin/links/'.$v->id.'/links')}}">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            {{$v->name}}
                                        </a>

                                        <b class="arrow"></b>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>

						</ul>
					</li>


                    <li class="">
                    	<a href="" class="dropdown-toggle">
                    		<i class="menu-icon fa fa-cogs"></i>
                    		<span class="menu-text">
                    			安全设置
                    		</span>

                    		<b class="arrow fa fa-angle-down"></b>
                    	</a>

                    	<b class="arrow"></b>

                    	<ul class="submenu">

                    		<li class="">
                    			<a href="typography.html">
                    				<i class="menu-icon fa fa-caret-right"></i>
                    				密码管理
                    			</a>

                    			<b class="arrow"></b>
                    		</li>

                    		<li class="">
                    			<a href="elements.html">
                    				<i class="menu-icon fa fa-caret-right"></i>
                    				日志管理
                    			</a>

                    			<b class="arrow"></b>
                    		</li>

                    		<li class="">
                    			<a href="buttons.html">
                    				<i class="menu-icon fa fa-caret-right"></i>
                    				安全退出
                    			</a>

                    			<b class="arrow"></b>
                    		</li>

                    	</ul>
                    </li>


                </ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>
