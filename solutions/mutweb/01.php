<!doctype html>
<html lang="th">
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ข้อ 01 ) Rungroj Madisara (0814415656)</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<div id="layout">
<?php
	$input = $result = NULL;// store result to display
	if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
		if( isset($_POST['input']) ) {
			$input = (int) $_POST['input'];
			if( $input % 3 == 0 || $input % 5 == 0 ) {
				if( $input % 3 == 0 ) {
					$result .= 'Fizz';
				}
				if( $input % 5 == 0 ) {
					$result .= 'Buzz';
				}
			}else {
				$result = $input;
			}
		}

	}
?>
<form method="post">
<table class="table">
  <tbody>
    <tr>
      <td scope="row" style="text-align:right">ข้อที่ 01) ระบุตัวเลข : </td>
      <td><input type="number" name="input" min="1" max="100" maxlength="3" class="form-control" value="<?php echo $input; ?>"></td>
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