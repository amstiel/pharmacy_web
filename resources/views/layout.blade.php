<!doctype html>
<html lang='ru'>
<head>
  <meta charset='UTF-8'>
  <meta name='viewport'
        content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
  <meta http-equiv='X-UA-Compatible' content='ie=edge'>
  <link rel='stylesheet' href='/css/app.css'>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  <title>База данных «Аптека»</title>
</head>
<body>
<div class='container' style='padding: 48px 16px 16px'>
  <div class='columns'>
    <div class='column is-narrow'>
      <nav>
        <ul>
          <li style='margin-bottom: 0.5rem'>
            <a href='/' class="button is-warning is-rounded">В главное меню</a>
          </li>
          <li style='margin-bottom: 0.5rem'>
            <a href='/drugs' class="button is-warning is-rounded">Таблица препаратов</a>
          </li>
          <li style='margin-bottom: 0.5rem'>
            <a href='/providers' class="button is-warning is-rounded">Таблица поставщиков</a>
          </li>
          <li style='margin-bottom: 0.5rem'>
            <a href='/categories' class="button is-warning is-rounded">Таблица категорий</a>
          </li>
          <li>
            <a href='/transactions' class="button is-warning is-rounded">Таблица продаж</a>
          </li>
        </ul>
      </nav>
    </div>

    <div class='column is-expanded'>
      <div class='columns is-centered'>
        <div class='column is-narrow'>
          @section('title')
            <h1 class='title appTitle'>Аптека</h1>
          @show()
          @yield('content')
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
