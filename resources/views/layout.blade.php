<!doctype html>
<html lang='ru'>
<head>
  <meta charset='UTF-8'>
  <meta name='viewport'
        content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
  <meta http-equiv='X-UA-Compatible' content='ie=edge'>
  <link rel='stylesheet' href='/css/app.css'>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  <title>Аптека «Лечфарм+»</title>
</head>
<body>
<nav class="navbar is-hidden-print" role="navigation" aria-label="main navigation">
  <div class='container'>
    <div class="navbar-brand">
      <a class="navbar-item" href="/">
        <img src='/images/logo.svg' alt='Аптека'>
      </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
      <div class="navbar-start">
        <a href='/' class="navbar-item">
          Главное меню
        </a>

        <a href='/drugs' class="navbar-item">
          Препараты
        </a>

        <a href='/sales-list' class="navbar-item">
          Продажи
        </a>

        <a href='/providers' class="navbar-item">
          Поставщики
        </a>

        <a href='/categories' class="navbar-item">
          Категории
        </a>

        <a href='/transactions' class="navbar-item">
          Движение товара на складе
        </a>

      </div>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-primary" href='/create-sale'>
            <span class='icon is-small'>
              <i class="fas fa-dollar-sign"></i>
              </span>
            <span>Оформить продажу</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>
<div class='container' style='padding: 48px 16px 16px'>
  <div class='columns is-centered'>
    <div class='column is-narrow'>
      @section('title')
        <div class='has-text-centered' style='margin-bottom: 1rem'>
          <img src='/images/logo.svg' width='80' height='80' alt='Аптека «Лечфарм+»'>
        </div>
        <h1 class='title appTitle'>Аптека «Лечфарм+»</h1>
      @show()
      @yield('summary')
      <div id='app'>
        @yield('content')
      </div>
    </div>
  </div>
</div>
<script src='/js/app.js'></script>
</body>
</html>
