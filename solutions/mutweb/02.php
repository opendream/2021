<!doctype html>
<html lang="th">
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ข้อ 02 ) Rungroj Madisara (0814415656)</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<div id="layout">
<?php

	// Thai Sort Function
	function thaiSort($str_a, $str_b)
	{
			$regexp = '(^[เแโใไ]*)((.)(.*))';
			$match_a = $match_b = NULL;
			mb_ereg($regexp, $str_a, $match_a);
			mb_ereg($regexp, $str_b, $match_b);
			
			if( $match_a[1] !== $match_b[1] && $match_a[3] === $match_b[3]) {
					if( $match_a[1] === false ) {
						return -1;
					}else if( $match_b[1] === false ) {
						return 1;
					}else {
						return strcoll($match_a[1], $match_b[1]);
					}
			}
			
			return strcoll($match_a[2], $match_b[2]);
	}

	$result = $data = array();	// store result to display
	$input = NULL;
	if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
		if( isset($_POST['input']) ) {
			$input = preg_replace('#\'|\"|\[|\]|\(|\)#', '', $_POST['input']);
			$array = preg_split('#\,#', $input);
			/* Clean up data */
			foreach($array as $k => $v) {
				$data[$v] = trim($v);
			}
			usort($data, "thaiSort");
			$result = implode(', ', $data);
		}

	}
?>
<form method="post">
<table class="table">
  <tbody>
    <tr>
      <td scope="row" style="text-align:right">ข้อที่ 02) ระบุชุดตัวอักษรคั่นด้วย , : </td>
      <td><input type="text" name="input" class="form-control" value="<?php echo $input; ?>"></td>
      <td><div style="text-align:center"><input type="submit" value="คำนวณ" id="btnCalculate" class="btn btn-primary"></div></td>
    </tr>
    <?php if( $result ) { ?>
    <tr>
        <th scope="row" style="text-align:right">ผลลัพธ์ : </th>
        <th colspan="2"><?php echo $result; ?></th>
    </tr>	
    <?php } ?>
  </tbody>
</table>
</form>
</div>

</body>
</html>