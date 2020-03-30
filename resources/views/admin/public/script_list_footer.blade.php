	<script type="text/javascript">
		window.jQuery || document.write("<script src='{{asset('admin/assets/js/jquery.min.js')}}'>" + "<" + "/script>");
	</script>

	<!-- <![endif]-->

	<!--[if IE]>
<script type="text/javascript">
window.jQuery || document.write("<script src='{{ asset('resources/admin/js/jquery1x.min.js') }}'>"+"<"+"/script>");
</script>
<![endif]-->
	<script type="text/javascript">
		if ('ontouchstart' in document.documentElement) document.write("<script src='{{asset('admin/assets/js/jquery.mobile.custom.min.js')}}'>" + "<" + "/script>");
	</script>
    <script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>

	<!-- page specific plugin scripts -->

	<!--@yield('plugins')-->




	<!-- ace scripts -->
    <script src="{{asset('admin/assets/js/ace-elements.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/ace.min.js')}}"></script>

	<!-- inline scripts related to this page -->
	<script src="{{asset('admin/assets/js/jquery-ui.custom.min.js')}}"></script>

	<script src="{{asset('admin/assets/js/jquery.cookie.js')}}"></script>

	<!-- 好用的js日期选择器 -->
	<script src="{{asset('admin/assets/js/foundation-datepicker.js')}}"></script>
	<script src="{{asset('admin/assets/js/foundation-datepicker.zh-CN.js')}}"></script>

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
