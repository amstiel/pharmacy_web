@extends('layout')

@section('title')
  <h1 class='title appTitle'>Добавление нового поставщика</h1>
@endsection

@section('content')
  <div class='box appForm-container'>
    <form action='/providers' method='POST'>
      @csrf
      <div class='field'>
        <label for='title' class='label'>Наименование</label>
        <div class='control'>
          <input class="input" type='text' id='title' name='title' required
                 placeholder='Введите наименование поставщика'>
        </div>
      </div>

      <div class='field'>
        <label for='city' class='label'>Город</label>
        <div class='control'>
          <input class="input" type='text' id='city' name='city' required
                 placeholder='Введите город'>
        </div>
      </div>

      <div class='field'>
        <label for='address' class='label'>Адрес</label>
        <div class='control'>
          <input class="input" type='text' id='address' name='address' required
                 placeholder='Введите адрес'>
          <p class='help'>Например: Ленина ул., 37</p>
        </div>
      </div>

      <div class='field'>
        <label for='manager' class='label'>Имя представителя</label>
        <div class='control'>
          <input class="input" type='text' id='manager' name='manager' required
                 placeholder='Введите имя'>
        </div>
      </div>

      <div class='field'>
        <label for='phone' class='label'>Телефон</label>
        <div class='control'>
          <input class="input" type='tel' id='phone' name='phone' required
                 placeholder='Введите телефон'>
        </div>
      </div>

      <div class='columns appForm-actions'>
        <div class='column is-narrow'>
          <button class='button is-success' type='submit'>
              <span class="icon is-small">
                <i class="fas fa-plus"></i>
              </span>
            <span>Добавить поставщика</span>
          </button>
        </div>

        <div class='column is-narrow'>
          <button class='button' onclick='window.history.back()'>
            Отменить
          </button>
        </div>
      </div>
    </form>
  </div>
@endsection
