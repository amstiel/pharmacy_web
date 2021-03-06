@extends('layout')

@section('title')
  <h1 class='title appTitle'>Добавление нового препарата</h1>
@endsection

@section('content')
  <div class='box appForm-container'>
    <form action='/drugs' method='POST'>
      @csrf
      <div class='field'>
        <label for='title' class='label'>Наименование</label>
        <div class='control'>
          <input class="input" type='text' id='title' name='title' required
                 placeholder='Введите наименование препарата'>
        </div>
      </div>

      <div class='field'>
        <label for='provider_id' class='label'>Поставщик</label>
        <div class='control'>
          <div class="select is-fullwidth">
            <select id='provider_id' name='provider_id' class='is-fullwidth'>
              @foreach($providers as $provider)
                <option value='{{ $provider->id }}'>
                  {{ $provider->title }}
                </option>
              @endforeach
            </select>
          </div>
        </div>
      </div>

      <div class='field'>
        <label for='category_id' class='label'>Категория</label>
        <div class='control'>
          <div class="select is-fullwidth">
            <select id='category_id' name='category_id' class='is-fullwidth'>
              @foreach($categories as $category)
                <option value='{{ $category->id }}'>
                  {{ $category->title }}
                </option>
              @endforeach
            </select>
          </div>
        </div>
      </div>

      <div class='field'>
        <label for='measure' class='label'>Единица измерения/фасовки</label>
        <div class='control'>
          <input class="input" type='text' id='measure' name='measure' required
                 placeholder='Введите единицу измерения'>
          <p class='help'>Например, 12 таблеток по 50мг</p>
        </div>
      </div>

      <div class='field'>
        <label for='price' class='label'>Цена препарата</label>
        <div class='field has-addons'>
          <div class='control is-expanded'>
            <input class="input" type='number' id='price' name='price' required
                   min='1' max='99999' step='0.01'
                   placeholder='Введите цену препарата'>
          </div>
          <p class="control">
            <a class="button is-static">
              ₽
            </a>
          </p>
        </div>
      </div>

      <div class='columns appForm-actions'>
        <div class='column is-narrow'>
          <button class='button is-success' type='submit'>
              <span class="icon is-small">
                <i class="fas fa-plus"></i>
              </span>
            <span>Добавить препарат</span>
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
