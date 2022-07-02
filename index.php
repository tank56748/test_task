<div>Лесенка</div>
<?php

// Задание 1
$i = $rows = 1;
$max = 100;
while($i <= $max){
	for($nums = 1; $nums <= $rows; $nums++){
		echo $i.' ';
		$i++;
		if($i > 100){break;}
	}
	echo '<br>';
	$rows++;
}
// Задание 2
// Создаем массив
$arr = [];
for($i = 0; $i < 5; $i++){
	$innerArr = [];
	for($g = 0; $g < 7; $g++){
		array_push($innerArr, rand(1,1000));
	}
	array_push($arr, $innerArr);
}
// Выводим массив в таблицу
?>
<div>Выводим массив</div>
<table>
	<?php foreach($arr as $key => $value): ?>
		<tr>
			<? foreach($value as $k2 => $v2): ?>
				<td style="border:1px solid black;"><?=$v2?></td>
			<?php endforeach; ?>
		</tr>
	<?php endforeach; ?>
</table>
<?php
// Выводим сумму по строкам
foreach($arr as $key => $value){
	$sum = 0;
	foreach($value as $k2 => $v2){
		$sum += $v2;
	}
	echo 'Cумма чисел строки '.($key + 1).': '. $sum . '<br>';
}
// Выводим сумму по столбцам
for($i = 0; $i < 7; $i++){
	$sum = 0;
	foreach($arr as $key => $value){
		$sum += $value[$i];
	}
	echo 'Сумма чисел столбца ' . ($i+1) . ': ' . $sum . '<br>';
}

// Задание 3
?>

<div>Номера телефонов</div>
<?php
include("SxGeo/SxGeo.php");
$ip = $_SERVER['REMOTE_ADDR'];
$SxGeoCity = new SxGeo('SxGeo/SxGeoCity.dat', SXGEO_BATCH | SXGEO_MEMORY);
$city = $SxGeoCity->get($ip);
$city_name = $city["city"]["name_ru"];
echo $city_name;
$number = ['Москва' => '88005553535', 'Брянск' => '88926783434', 'Тула' => '88926678434'];
?>
<div>Телефон Вашего города: <? if(empty($number[$city_name])){echo '8-800-DIGITS';}else{echo $number[$city_name];}?></div>