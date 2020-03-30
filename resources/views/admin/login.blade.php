
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>普通网站管理系统</title>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    @include('admin.public.style')
    @include('admin.public.script')
</head>

	<body class="login-layout light-login">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									{{-- <img src="http://10.6.30.43/Public/Super/logo.png"  /> --}}
									<span class="red">普通网站管理系统</span>
								</h1>
								<h4 class="blue" id="id-company-text">&copy; 日照职业技术学院</h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												请输入超级管理员的帐户信息
											</h4>

											<form action="{{url('admin/dologin')}}" method="POST">
                                                {{ csrf_field() }}
												<fieldset>
                                                    @if(count((array)$errors) > 0)
                                                        <div class="alert alert-danger" style="margin: 0;padding: 0;border: 0;">
                                                           <ul>
                                                               @if(is_object($errors))
                                                                   @foreach ($errors->all() as $error)
                                                                       <li>{{ $error }}</li>
                                                                   @endforeach
                                                               @else
                                                                   <li>{{ $errors }}</li>
                                                               @endif
                                                           </ul>
                                                        </div>
                                                    @endif

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input name="username" type="text" class="form-control" placeholder="用户名" value="" required=""; />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input name="password" type="password" class="form-control" placeholder="密码" required="";/>
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<label class="block clearfix">
														<div class="row">
															<div class="col-xs-7">
																<span class="block input-icon input-icon-right">
																	<input name="captcha" type="text" class="form-control" placeholder="验证码" required="";/>
																</span>
															</div>
															<div class="col-xs-5">
																<img src="{{captcha_src()}}" style="cursor: pointer;width: 110px;" onclick="this.src='{{captcha_src()}}'+Math.random()">
															</div>
														</div>
													</label>

													<div class="space"></div>


													<div class="clearfix">


														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">登录</span>
														</button>
													</div>
													<div class="space-4"></div>
												</fieldset>
											<input type="hidden" name="__hash__" value="e07cda5e057db4edd1274b2ba9138ff6_1b67b0a553acbec0d83182f972db22bd" /></form>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>



	</body>
</html>
