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
	$GENRES = $DBH->query("SELECT genre FROM genres");
	$GENRES->setFetchMode(PDO::FETCH_ASSOC);
 ?>

<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display+SC:700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poiret+One&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../styles.css">
	<link href="https://fonts.googleapis.com/css?family=Neucha&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet">
	<title>Главная</title>
</head>
<body>

	<div class="container container--main">
		<img class="big__logo" src="assets/big_logo.jpg">
	</div>

	<div class="main__search main__search--main">
		<div class="container">

			<div class="search__item search__item--main">

				<p class="search__title" style="font-size: 24px; margin: -8px 0; text-align: center;">Поиск по сайту</p>

				<div class="search__ui">
					<form action="search.php">
						<input name="query_text" class="search__textbox" type="text" placeholder=<?php echo "$search_text"; ?>>
						<button class="search__btn" type="submit">
							<img class="search__btn__img" src="assets/search_ico.png">
						</button>
					</form>
				</div>


			</div>

		</div>
	</div>

	<div class="main__inside">
		<div class="container container--main__inside">
			
			<div class="categories">

				<div class="bar1">

					<div class="cat__bar">
						<p class="bar__title" style="font-weight: 700; color: #005;">Аниме по жанрам</p>
						<?php 
							$rows = $GENRES->fetchAll(PDO::FETCH_ASSOC);
							foreach ($rows as $row) {
								$genreTitle = $row['genre'];
								echo "<li><a href=\"search.php?query_text=$genreTitle\">$genreTitle</a></li>";
							}
						 ?>
					</div>

				</div>

				<div class="bar2">
					
					<div class="cat__bar">
						<p class="bar__title" style="font-weight: 700; color: #005;">Год</p>
						<?php 
						$yearsList = array(1985,1988,1994,1995,1998,2000,2001,2003,2006,2007,2008,2009,2010,2011,2012,2013,2014,2015,2016,2017,2018,2019);
						foreach ($yearsList as $year) {
							echo "<li><a href=\"search.php?query_text=$year\">$year</a></li>";
						}
						 ?>
					</div>

					<div class="cat__bar">
						<p class="bar__title" style="font-weight: 700; color: #005;">По типу</p>

						<li><a href="search.php?query_text=сериал">TV сериал</a></li>
						<li><a href="search.php?query_text=фильм">Фильм</a></li>
						<li><a href="search.php?query_text=ona">ONA</a></li>
						<li><a href="search.php?query_text=ova">OVA</a></li>
						<li><a href="search.php?query_text=спешл">Спешл</a></li>
					</div>

				</div>
				
			</div>





			<div class="anitop">
				<p class="top__title">Топ сайта:</p>
				<?php 

					$ALL_RECORDS = $DBH->query("SELECT * FROM anime_info");
					$ALL_RECORDS->setFetchMode(PDO::FETCH_ASSOC);
					$rows = $ALL_RECORDS->fetchAll();
					$topThree = array(0, 0, 0);

					for ($i=0; $i < count($rows); $i++) {
						$rate = ($rows[$i]['story_rate']+$rows[$i]['draw_rate']+$rows[$i]['ost_rate']) / 3;
						//echo $rate . "<br/>";
						if($rate > ($rows[$topThree[0]]['story_rate']+$rows[$topThree[0]]['draw_rate']+$rows[$topThree[0]]['ost_rate']) / 3){
							$topThree[2] = $topThree[1];
							$topThree[1] = $topThree[0];
							$topThree[0] = $i;
						}elseif ($rate > ($rows[$topThree[1]]['story_rate']+$rows[$topThree[1]]['draw_rate']+$rows[$topThree[1]]['ost_rate']) / 3) {
							$topThree[2] = $topThree[1];
							$topThree[1] = $i;
						}elseif ($rate > ($rows[$topThree[2]]['story_rate']+$rows[$topThree[2]]['draw_rate']+$rows[$topThree[2]]['ost_rate']) / 3) {
							$topThree[2] = $i;
						}
					}

					foreach ($topThree as $rec) {
						$id = $rows[$rec]['id'];
						$poster_link = $rows[$rec]['poster_link'];
						$title = $rows[$rec]['title'];
						$type = $rows[$rec]['type'];
						$genres = $rows[$rec]['genres'];
						$year = $rows[$rec]['year'];
						$producer = $rows[$rec]['producer'];
						echo "  <div class=\"res__item res__item--top\">
									<img class=\"res__poster\" src=\"$poster_link\">
									<div class=\"res__params\">
										<a href=\"review.php/?id=$id\" class=\"res__title\">$title</a>

										<div class=\"res__description res__description--top\">
											<p class=\"type\"><b>Тип: </b>$type</p>
											<p class=\"genre\"><b>Жанр: </b>$genres</p>
											<p class=\"year\"><b>Год выпуска: </b>$year</p>
											<p class=\"producer\"><b>Режиссёр: </b>$producer</p>
										</div>

										<a class=\"review__btn\" href=\"review.php/?id=$id\">Узнать больше</a>
									</div>
								</div>";
					}
				 ?>
				<!--
				<div class="res__item res__item--top">
					<img class="res__poster" src="assets/poster.jpg">
					<div class="res__params">
						<a href="#" class="res__title">Обещанный Неверленд</a>

						<div class="res__description res__description--top">
							<p class="type"><b>Тип: </b>ТВ (12 эп.), 25 мин.</p>
							<p class="genre"><b>Жанр: </b>сёнэн, ужасы, фантастика, детектив</p>
							<p class="year"><b>Год выпуска: </b>2019</p>
							<p class="producer"><b>Режиссёр: </b>Камбэ Мамору</p>
						</div>

						<a class="review__btn" href="review.html">Узнать больше</a>
					</div>
				</div>

				<div class="res__item res__item--top">
					<img class="res__poster" src="assets/poster.jpg">
					<div class="res__params">
						<a href="#" class="res__title">Обещанный Неверленд</a>

						<div class="res__description res__description--top">
							<p class="type"><b>Тип: </b>ТВ (12 эп.), 25 мин.</p>
							<p class="genre"><b>Жанр: </b>сёнэн, ужасы, фантастика, детектив</p>
							<p class="year"><b>Год выпуска: </b>2019</p>
							<p class="producer"><b>Режиссёр: </b>Камбэ Мамору</p>
						</div>

						<a class="review__btn" href="review.html">Узнать больше</a>
					</div>
				</div>

				<div class="res__item res__item--top">
					<img class="res__poster" src="assets/poster.jpg">
					<div class="res__params">
						<a href="#" class="res__title">Обещанный Неверленд</a>

						<div class="res__description res__description--top">
							<p class="type"><b>Тип: </b>ТВ (12 эп.), 25 мин.</p>
							<p class="genre"><b>Жанр: </b>сёнэн, ужасы, фантастика, детектив</p>
							<p class="year"><b>Год выпуска: </b>2019</p>
							<p class="producer"><b>Режиссёр: </b>Камбэ Мамору</p>
						</div>

						<a class="review__btn" href="review.html">Узнать больше</a>
					</div>
				</div>	
				-->
			</div>
		</div>
	</div>

</body>
</html>