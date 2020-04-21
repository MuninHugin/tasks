<?php
require_once __DIR__ . '/db.php';

try { $pdo = new PDO($dsn, $db_user, $db_password, $opt); } 
catch (PDOException $e) { die('Подключение не удалось: ' . $e->getMessage()); }

$sql = 'SELECT U.id, U.name AS Uname, C.name AS Cname, GROUP_CONCAT(S.name) AS Sname
		FROM Users U
		JOIN City C ON C.id = U.city_id
		LEFT JOIN user_skills us ON us.user_id = U.id
		LEFT JOIN Skills S ON S.id = us.skill_id
		GROUP BY U.id';
$result = $pdo->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Users list</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<style>
		table {
			border-collapse: collapse;
			margin-bottom: 10px;
		}
		td {
			border: 1px solid #000;
			text-align: center;
			padding: 10px;
		}
	</style>
</head>
<body>
	<?=$user_random_name;?>
	<table>
		<tr>
			<th>Имя</th>
			<th>Место жительства</th>
			<th>Навыки</th>
		</tr>
	<?php
	while ($row = $result->fetch()) {?> 
	    <tr>
	    	<td><?=$row['Uname'];?></td>
	    	<td><?=$row['Cname'];?></td>
	    	<td> <?=$row['Sname'];?></td>
	    </tr>
	<?php }?>
	</table>
	<button>Add some user</button>
	<script>
		$('button').on('click', function(e){
			e.preventDefault();
			$.ajax({
			  type: "POST",
			  url: 'add_user.php',
			  data: 'post_data=some_post_data',
			  success: function(data){
			  	var user_data = $.parseJSON(data);
			  	var skills = user_data.skills || '';
			  	$('table > tbody:last').append('<tr><td>'+ user_data.user_random_name +'</td> <td>'+ user_data.city_name +'</td> <td>'+ skills +'</td></tr>');
			  	alert('Ok!');
			  }
			});
		});
	</script>
</body>
</html>


<?php

$pdo = NULL;?>