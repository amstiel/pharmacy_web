@extends('layout')

@section('title')
  <h1 class='title appTitle'>Информация о препарате {{ $drug->title }}</h1>
@endsection

@section('content')
  <div class='box appForm-container'>
    <div class='field'>
      <p class='label'>Наименование товара</p>
      <p>{{ $drug->title }}</p>
    </div>

    <div class='field'>
      <p class='label'>Поставщик</p>
      <p>
        <a href="/providers/{{ $drug->provider->id }}">
          {{ $drug->provider->title }}
        </a>
      </p>
    </div>

    <div class='field'>
      <p class='label'>Категория</p>
      <p>
        <a href="/categories/{{ $drug->category->id }}">
          {{ $drug->category->title }}
        </a>
      </p>
    </div>

    <div class='field'>
      <p class='label'>Единица измерения/фасовки</p>
      <p>{{ $drug->measure }}</p>
    </div>

    <div class='field'>
      <p class='label'>Цена</p>
      <p>{{ number_format($drug->price, 2, '.', ' ') }} ₽</p>
    </div>

    <div class='columns appForm-actions'>
      <div class='column is-narrow'>
        <a href='/drugs/{{ $drug->id }}/edit'
           class='button is-info'>
              <span class="icon is-small">
                <i class="fas fa-edit"></i>
              </span>
          <span>Изменить запись</span>
        </a>
      </div>

      <div class='column is-narrow'>
        <button class='button' onclick='window.history.back()'>Назад</button>
      </div>
    </div>
    </form>
  </div>
@endsection
