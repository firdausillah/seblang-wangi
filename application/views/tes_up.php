<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?= form_open_multipart(base_url('tes_up/save'))?>
		<input type="file" name="foto">
		<button type="submit">Simpan</button>
	</form>
</body>
</html>