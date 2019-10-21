<?php 
	function editDescription($str) {
		$new_str = "";
		if(strlen($str) > 250) {
			//$str = substr_replace($str, "...", 247);
			for ($i=0; $i < 245; $i++) { 
				$new_str .= $str[$i];
			}
			$new_str[244] = '.';
			$new_str[245] = '.';
			$new_str[246] = '.';
		}
		return $new_str;
	}

	$host = "127.0.0.1";
	$dbname = "anime_senpai_db";
	$user = "root";
	$pass = "";
	try{
		$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	}catch(PDOException $e) {  
	    echo $e->getMessage();  
	}

	$search_text = $_GET['query_text'];
	//$anime_id = $_GET['id'];
	//$STH = $DBH->query("SELECT * FROM anime_info WHERE id = $anime_id");
	//$STH->setFetchMode(PDO::FETCH_ASSOC);
	$STH = $DBH->query("SELECT * FROM anime_info WHERE LOCATE('$search_text', title) != 0");
	//$STH->setFetchMode(PDO::FETCH_ASSOC);
	$rows = $STH->fetchAll(PDO::FETCH_ASSOC);
	//print_r($rows);
?>

<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display+SC:700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poiret+One&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Neucha&display=swap" rel="stylesheet">
	<title>Результаты поиска</title>
</head>
<body>

	<header class="header">
		<div class="container container--head">

			<a class="logo" href="http://anime-senpai.com/index.php">
				<img class="logo__bg" src="assets/logo.png">
			</a>

			<div class="search__mini">
				<form action="search.php">
					<input name="query_text" class="mini__textbox" type="text" placeholder="Тут поиск, хозяин">
					<button class="mini__btn" type="submit">
						<img class="mini__btn__img" src="assets/search.png">
					</button>
				</form>
			</div>

			<!--<div class="search">
				Тут поиск, хозяин
				<img class="search__icon" src="assets/search.png">
			</div>-->
		</div>
	</header>

	<div class="main__search">
		<div class="container">

			<p class="search__title">Поиск по сайту</p>

			<div class="search__item">

				<div class="search__ui">
					<form action="search.php">
						<input name="query_text" class="search__textbox" type="text" placeholder=<?php echo "$search_text"; ?>>
						<button class="search__btn" type="submit">
							<img class="search__btn__img" src="assets/search_ico.png">
						</button>
					</form>
				</div>

				<div class="search__results">Результатов поиска: <?php echo count($rows); ?></div>

			</div>

		</div>
	</div>

	<div class="results">
		<div class="container">
			<!--отдельный результат-->
			<?php 
			foreach ($rows as $row) {
				$anime = $STH->fetch();
				$id = $row['id'];
				$title = $row['title'];
				$type = $row['type'];
				$year = $row['year'];
				$poster_link = $row['poster_link'];
				$genre = $row['genre'];
				$producer = $row['producer'];
				//$description = substr_replace($row['description'], '...', 247);
				$description = $row['description'];
				$review = $row['review'];
				$story_rate = $row['story_rate'];
				$draw_rate = $row['draw_rate'];
				$ost_rate = $row['ost_rate'];
				$watch_url = $row['watch_url'];
				echo "<div class=\"res__item\">
				<img class=\"res__poster\" src=\"$poster_link\">
				<div class=\"res__params\">
					<div class=\"res__title\">$title</div>
					<div class=\"res__description\">
						<p class=\"type\"><b>Тип: </b>$type</p>
						<p class=\"genre\"><b>Жанр: </b>$genre</p>
						<p class=\"year\"><b>Год выпуска: </b>$year</p>
						<p class=\"producer\"><b>Режиссёр: </b>$producer</p>
						<p class=\"lil__descr\"><b>Описание: </b>$description</p>
					</div>

					<a class=\"review__btn\" href=\"http://anime-senpai.com/review.php/?id=$id\">Узнать больше</a>
				</div>
			</div>";
			}
			//while ($res = $STH->fetch()) {
				//echo $res['title']."<br/>";
			//}
			?>
			<!--
			<div class="res__item">
				<img class="res__poster" src="assets/poster.jpg">
				<div class="res__params">
					<div class="res__title">Обещанный Неверленд</div>
					<div class="res__description">
						<p class="type"><b>Тип: </b>ТВ (12 эп.), 25 мин.</p>
						<p class="genre"><b>Жанр: </b>сёнэн, ужасы, фантастика, детектив</p>
						<p class="year"><b>Год выпуска: </b>2019</p>
						<p class="producer"><b>Режиссёр: </b>Камбэ Мамору</p>
						<p class="lil__descr"><b>Описание: </b>Описание: Сирота не может похвалиться тем, что у него лучшая жизнь. Дети, у которых по разным причинам нет родителей, вынуждены находиться в приюте. Очень много людей наслышаны о том, какие жуткие условия в тех самых приютах...</p>
					</div>

					<a class="review__btn" href="review.html">Узнать больше</a>
				</div>
			</div>
			-->
		</div>
	</div>	
</body>
</html>