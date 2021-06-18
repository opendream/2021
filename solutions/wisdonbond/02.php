<?php
	
	function calPrimeNumber($sum){
		$result = true;
		for($i = 2;$i< $sum;$i++){
			if($sum%$i==0){
				return false;
			}	
		}
		return true;
	}
	
	$plusArray = [];
	for($i = 1 ;$i <= 100 ;$i++){
		for($e = 1 ;$e <= 100 ;$e++){
			if($i==$e)
				continue;
			if(calPrimeNumber($i+$e))
				$plusArray[] = $i+$e;
			
		}
	}
	
	$minusArray = [];
	for($i = 1 ;$i <= 100 ;$i++){
		for($e = 1 ;$e <= 100 ;$e++){
			$result = $i-$e;
			if($i==$e)
				continue;
			if($result <= 0)
				continue;
			if(calPrimeNumber($result))
				$minusArray[] = $result;	
		}
	}
	$minusArray = array_unique($minusArray);
	$plusArray	= array_unique($plusArray);

	
?>
<html>
<head>
<style>
table {
  border-collapse: collapse;
}
tr {
  border: 1px solid #ccc;
}
th, td {
  text-align: left;
  padding: 4px;
}
</style>
</head>
<body>
	<table>
		<tr>
			<th>Plus Method</th>
		</tr>
			<?php	
				foreach($plusArray as $print){
					print_r('<tr><td>'.$print.'</td></tr>');
				}
			?>
	</table>
	
		<table>
		<tr>
			<th>Minus Method</th>
		</tr>
			<?php	
				foreach($minusArray as $print){
					print_r('<tr><td>'.$print.'</td></tr>');
				}
			?>
	</table>
	<!--Time 1 Hr-->
</body>
</html>