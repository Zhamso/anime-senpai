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

						<li><a href="#">Боевые искусства</a></li>
						<li><a href="#">Война</a></li>
						<li><a href="#">Детектив</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
					</div>

				</div>

				<div class="bar2">
					
					<div class="cat__bar">
						<p class="bar__title" style="font-weight: 700; color: #005;">Год</p>

						<li><a href="#">2019</a></li>
						<li><a href="#">2018</a></li>
						<li><a href="#">2017</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
					</div>

					<div class="cat__bar">
						<p class="bar__title" style="font-weight: 700; color: #005;">По типу</p>

						<li><a href="#">Сериалы</a></li>
						<li><a href="#">Полнометражные</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
					</div>

					<div class="cat__bar">
						<p class="bar__title" style="font-weight: 700; color: #005;">Жанры</p>

						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
						<li><a href="#">Example</a></li>
					</div>

				</div>
				
			</div>





			<div class="anitop">
				<p class="top__title">Топ сайта:</p>

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

			</div>
		</div>
	</div>

</body>
</html>