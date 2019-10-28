<?php 
	$host = "127.0.0.1";
	$dbname = "anime_senpai_db";
	$user = "root";
	$pass = "";
	try{
		$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	}catch(PDOException $e) {  
	    echo $e->getMessage();  
	}
	$anime_id = $_GET['id'];
	$STH = $DBH->query("SELECT * FROM anime_info WHERE id = $anime_id");
	$STH->setFetchMode(PDO::FETCH_ASSOC);

	$anime = $STH->fetch();
	$title = $anime['title'];
	$type = $anime['type'];
	$year = $anime['year'];
	$poster_link = $anime['poster_link'];
	$genre = $anime['genre'];
	$producer = $anime['producer'];
	$description = $anime['description'];
	$review = $anime['review'];
	$story_rate = $anime['story_rate'] - 0.1;
	$draw_rate = $anime['draw_rate'] + 0.1;
	$ost_rate = $anime['ost_rate'];
	$watch_url = $anime['watch_url'];
?>
<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display+SC:700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poiret+One&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../styles.css">
	<title>
		<?php echo "$title"; ?>
	</title>
</head>
<body>

	<header class="header">
		<div class="container container--head">

			<a class="logo" href="http://localhost/index.php">
				<img class="logo__bg" src="../assets/logo.png">
			</a>

			<div class="search__mini">
				<form action="../search.php">
					<input name="query_text" class="mini__textbox" type="text" placeholder="Тут поиск, хозяин">
					<button class="mini__btn" type="submit">
						<img class="mini__btn__img" src="assets/search.png">
					</button>
				</form>
			</div>
		</div>
	</header>

	<div class="content">
		<div class="container">

			<div class="about">
				<div class="about__item1">

					<img class="poster" src=<?php echo "\"$poster_link\""; ?>>

					<div class="rating">

						<div class="total"><?php echo ($ost_rate + $draw_rate + $story_rate) / 3; ?></div>

						<div class="particular">

							<div class="particular__item">
								<div class="score"><?php echo $story_rate ?></div>
								<div class="score__title">Сюжет</div>
							</div>

							<div class="particular__item">
								<div class="score"><?php echo $draw_rate ?></div>
								<div class="score__title">Рисовка</div>
							</div>

							<div class="particular__item">
								<div class="score"><?php echo $ost_rate ?></div>
								<div class="score__title">Музыка</div>
							</div>

						</div>

					</div>

				</div>

				<div class="about__item2">

					<div class="anime__title"><?php echo $title ?></div>

					<div class="anime__property">
						<div class="property__line"></div>

						<div class="properties">
							<p class="type"><b>Тип: </b><?php echo $type ?></p>
							<p class="genre"><b>Жанр: </b><?php echo $genre ?></p>
							<p class="year"><b>Год выпуска: </b><?php echo $year ?></p>
							<p class="producer"><b>Режиссёр: </b><?php echo $producer ?></p>
						</div>
					</div>

					<div class="anime__description">
						<p><b>Описание:</b> 
							<?php echo $description ?>
						</p>
					</div>
				</div>

			</div>

			<div class="review">
				<p>
					<?php echo $review ?>
				</p>
			</div>
			
			<!--<div class="watch__btn">
				<a href="https://animego.org/anime/obeschannyy-neverlend-760"> Посмотреть</a>
			</div> -->
			<a href=<?php echo "\"$watch_url\"" ?> class="my_btn">
				Посмотреть
			</a>
			
		</div>

	</div>

</body>
</html>