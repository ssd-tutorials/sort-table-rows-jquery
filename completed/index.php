<?php
try {

	// new pdo connection
	$objDb = new PDO('mysql:host=localhost;dbname=books', 'root', 'password');
	$objDb->exec("SET CHARACTER SET utf8");
	
	// get all records
	$sql = "SELECT *
			FROM `books`
			ORDER BY `order` ASC";
	$statement = $objDb->query($sql);
	$results = $statement->fetchAll(PDO::FETCH_ASSOC);

} catch(Exception $e) {

	echo 'There was a problem with the database';
	
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Draggable table row</title>
	<meta name="description" content="Draggable table row" />
	<meta name="keywords" content="Draggable table row" />
	<link href="/css/core.css" rel="stylesheet" type="text/css" />
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>

<section id="wrapper">

	<table cellpadding="0" cellspacing="0" border="0" class="tbl_repeat">
		<thead>
			<tr>
				<th>Title</th>
				<th>Author</th>
			</tr>
		</thead>
		<?php if (!empty($results)) { ?>
		<tbody>
			<?php foreach($results as $row) { ?>
			<tr id="order_<?php echo $row['id']; ?>">
				<td><?php echo $row['title']; ?></td>
				<td><?php echo $row['author']; ?></td>
			</tr>
			<?php } ?>
		</tbody>
		<?php } ?>
	</table>

</section>

<script src="/js/jquery-1.6.2.min.js" type="text/javascript"></script>
<script src="/js/jquery.tablednd_0_5.js" type="text/javascript"></script>
<script src="/js/core.js" type="text/javascript"></script>
</body>
</html>