{{--正确提示--}}
@if(!empty(session('success')))
<div class="alert alert-block alert-success" style="margin-bottom: 2px;">
    <button type="button" class="close" data-dismiss="alert">
        <i class="ace-icon fa fa-times"></i>
    </button>

    <i class="ace-icon fa fa-check green"></i>
        {{session('success')}}
</div>
@endif
{{--错误提示--}}
@if(!is_object($errors))
@if(count((array)$errors) > 0)
<div class="alert alert-block alert-danger" style="margin-bottom: 2px;">
    <button type="button" class="close" data-dismiss="alert">
        <i class="ace-icon fa fa-times"></i>
    </button>

    <i class="ace-icon fa fa-times red"></i>
        {{ $errors }}
</div>
@endif
@endif