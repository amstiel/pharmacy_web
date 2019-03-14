@extends('layout')

@section('title')
  <h1 class='title appTitle'>Информация о поставщике {{ $provider->title }}</h1>
@endsection

@section('content')
  <div class='box appForm-container'>
    <div class='field'>
      <p class='label'>Наименование поставщика</p>
      <p>{{ $provider->title }}</p>
    </div>

    <div class='field'>
      <p class='label'>Город</p>
      <p>{{ $provider->city }}</p>
    </div>

    <div class='field'>
      <p class='label'>Адрес</p>
      <p>{{ $provider->address }}</p>
    </div>

    <div class='field'>
      <p class='label'>Имя представителя</p>
      <p>{{ $provider->manager }}</p>
    </div>

    <div class='field'>
      <p class='label'>Телефон</p>
      <p>
        <a href="tel:{{ $provider->phone }}">
          {{ $provider->phone }}
        </a>
      </p>
    </div>
    @if($provider->drugs->count() > 0)
      <div class='field'>
        <p class='label'>Список поставляемых товаров</p>
        <ul>
          @foreach($provider->drugs as $drug)
            <li>
              <a href="/drugs/{{ $drug->id }}">
              {{ $drug->title }}
              </a>
            </li>
          @endforeach
        </ul>
      </div>
    @endif
    <div class='columns appForm-actions'>
      <div class='column is-narrow'>
        <a href='/providers/{{ $provider->id }}/edit'
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
  </div>
@endsection
