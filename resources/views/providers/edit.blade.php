@extends('layout')

@section('title')
  <h1 class='title appTitle'>Добавление нового поставщика</h1>
@endsection

@section('content')
  <div class='box appForm-container'>
    <form action='/providers/{{ $provider->id }}' method='POST'>
      @method('PATCH')
      @csrf
      <div class='field'>
        <label for='title' class='label'>Наименование</label>
        <div class='control'>
          <input class="input" type='text' id='title' name='title' required
                 value='{{ $provider->title }}'
                 placeholder='Введите наименование поставщика'>
        </div>
      </div>

      <div class='field'>
        <label for='city' class='label'>Город</label>
        <div class='control'>
          <input class="input" type='text' id='city' name='city' required
                 value='{{ $provider->city }}'
                 placeholder='Введите город'>
        </div>
      </div>

      <div class='field'>
        <label for='address' class='label'>Адрес</label>
        <div class='control'>
          <input class="input" type='text' id='address' name='address' required
                 value='{{ $provider->address }}'
                 placeholder='Введите адрес'>
          <p class='help'>Например: Ленина ул., 37</p>
        </div>
      </div>

      <div class='field'>
        <label for='manager' class='label'>Имя представителя</label>
        <div class='control'>
          <input class="input" type='text' id='manager' name='manager' required
                 value='{{ $provider->manager }}'
                 placeholder='Введите имя'>
        </div>
      </div>

      <div class='field'>
        <label for='phone' class='label'>Телефон</label>
        <div class='control'>
          <input class="input" type='tel' id='phone' name='phone' required
                 value='{{ $provider->phone }}'
                 placeholder='Введите телефон'>
        </div>
      </div>

      <div class='columns appForm-actions'>
        <div class='column is-narrow'>
          <button class='button is-success' type='submit'>
              <span class="icon is-small">
                <i class="fas fa-edit"></i>
              </span>
            <span>Сохранить изменения</span>
          </button>
        </div>

        <div class='column is-narrow'>
          <button class='button' onclick='window.history.back()'>
            Отменить
          </button>
        </div>
      </div>
    </form>
    <div class='appForm-delete'>
      <form action='/providers/{{ $provider->id }}' method='POST'>
        @method('DELETE')
        @csrf
        <button class='button is-danger' type='submit'>
              <span class="icon is-small">
                <i class="fas fa-trash-alt"></i>
              </span>
          <span>Удалить запись</span>
        </button>
      </form>
    </div>
  </div>
@endsection
