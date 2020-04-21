<?php
if(!$_POST['post_data']) die();

require_once __DIR__ . '/db.php';

try { $pdo = new PDO($dsn, $db_user, $db_password, $opt); } 
catch (PDOException $e) { die('Подключение не удалось: ' . $e->getMessage()); }

// Случайное имя формируем в коде из массива
$names_array = ['John', 'Dow', 'Ваня', 'Mary', 'Гриша'];
$user_random_name = $names_array[array_rand($names_array)];

// Случайный город формируем из базы
$sql_cities = 'SELECT id, name FROM City';
$result = $pdo->query($sql_cities);
$city_ids__arr = [];
$city_names__arr = [];
while ($row = $result->fetch()) {
	array_push($city_ids__arr, $row['id']);
	$city_names__arr["${row['id']}"] = $row['name']; // для выходных данных
}
$city_id = $city_ids__arr[array_rand($city_ids__arr)];

// Случайный(ые) навык(и) формируем из базы
$sql_skills = 'SELECT id, name FROM Skills';
$result = $pdo->query($sql_skills);
$skills_arr = [''];
$skills_toStr_prev_arr = ["0" => NULL];
while ($row = $result->fetch()) {
	array_push($skills_arr, $row['id']);
	$skills_toStr_prev_arr["${row['id']}"] = $row['name']; // для выходных данных
}
$skills_count = rand(1, count($skills_arr));
$skill_id = array_rand($skills_arr, $skills_count) ? array_rand($skills_arr, $skills_count) : 0;

// Преобразуем навыки в строку для выходных данных
if($skills_count == 1) $skillsStr = $skills_toStr_prev_arr[$skill_id];
else {
	$skills_toStr_final_arr = [];
	for ($i=0; $i < $skills_count; $i++) {
		if(!$skill_id[$i]) continue;
		array_push($skills_toStr_final_arr, $skills_toStr_prev_arr["$skill_id[$i]"]);
	}
	$skillsStr = implode(",", $skills_toStr_final_arr);	
}

// Запись в базу в таблицу Users
$sqlUser = 'INSERT INTO `Users` (id, name, city_id) VALUES(?,?,?)';
$sql_insert = $pdo->prepare($sqlUser);
$sql_insert->execute([NULL, $user_random_name, $city_id]);


// Запись в базу в таблицу user_skills
$user_id = $pdo->lastInsertId();
if($skills_count == 1) {
	$sqlSkills = 'INSERT INTO `user_skills` (user_id, skill_id) VALUES('. $user_id .', ?)';
	$sql_insert = $pdo->prepare($sqlSkills);
	$sql_insert->execute(array($skill_id));
}else {
	$sqlSkills = '';
	foreach ($skill_id as $key => $value) {
		$sqlSkills .= ' INSERT INTO `user_skills` (user_id, skill_id) VALUES('. $user_id .', ?);';
	}
	$sql_insert = $pdo->prepare($sqlSkills);
	$sql_insert->execute($skill_id);
}

// Данные для вставки в html-таблицу
$output_data = [
	"user_random_name" => $user_random_name,
	"city_name" => $city_names__arr[$city_id],
	"skills" => $skillsStr
];
echo json_encode($output_data, JSON_UNESCAPED_UNICODE);

$pdo = NULL;
?>