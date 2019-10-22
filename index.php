<!-- Вывод изображения -->
<style>
	.img_wrap {
		width: 200px;
		height: 100px;
		overflow: hidden;
	}
	.img_wrap img{
		width: 100%;
		height: auto;
		outline: 0;
	}
</style>
<div class="img_wrap">
	<img src="Screenshot_1.jpg" alt="">	
</div>
===============================
<br>
<?php
$arr = [11,11,3,43,5,5,5,5];
$length = count($arr) - 1;
$count = 0;
for($i = 0; $i < $length; $i++) {
	if($arr[$i] == $arr[$i+1]) $count++;
}
echo $count;

?>