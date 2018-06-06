<?php
	require_once __DIR__ . '/../vendor/autoload.php';
	use Code\Code;
	$code = isset($_GET['code']) ? $_GET['code'] : '';
	if (!empty($code)) {
		$data = Code::checkCode($code);
		echo json_encode($data);die;
	}
?>

<style type="text/css">
	.code_div{width:300px;background:#ccc;margin:0 auto;margin-top:200px;padding:10px}
	.code_div input{width:301px;height:50px;border:1px solid #28A845;margin-top:10px}
	.code_div input.btn{background:#28A845;color:#fff;font-weight:bold}
	.return_info{width:300px;line-height:30px;background:#ccc;margin:0 auto;padding:10px;padding-top:0;text-align:center;display:none;font-weight:bold}
</style>
<div class="code_div">
	<img class='code_img fr' src="getCode.php" onclick= this.src="getCode.php?"+Math.random() />
	<input type="text" name="code" class="code" value="<?=$code?>" placeholder="请输入验证码">
	<input type="button" class="btn" value="验 证">
</div>
<div class="return_info"></div>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	$('.btn').click(function(){
		var code = $('.code').val();
		if (code == '') {
			$('.return_info').show().html('<span style="color: red;">请输入验证码</span>');
			return
		};
		$.ajax({
            type:'get',
            url:'index.php?code='+code,
            dataType:'JSON',
            success:function (data){
            	if (data.code == 0) {
            		$('.return_info').show().html('<span style="color: green;">'+data.msg+'</span>');
            		return
            	};
            	$('.return_info').show().html('<span style="color: red;">'+data.msg+'</span>');                
            },
            error:function (){
                $('.return_info').show().html('<span style="color: red;">网络异常-_-</span>');
            }
        });/// end $.ajax
	});
</script>
