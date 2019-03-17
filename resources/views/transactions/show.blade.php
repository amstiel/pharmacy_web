@extends('layout')

@section('title')
  <h1 class='title appTitle'>Информация о категории {{ $category->title }}</h1>
@endsection

@section('content')
  <div class='box appForm-container'>
    <div class='field'>
      <p class='label'>Наименование категории</p>
      <p>{{ $category->title }}</p>
    </div>

    <div class='field'>
      <p class='label'>Описание</p>
      <p>{{ $category->description }}</p>
    </div>


    @if($category->drugs->count() > 0)
      <div class='field'>
        <p class='label'>Список товаров в данной категории</p>
        <ul>
          @foreach($category->drugs as $drug)
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
        <a href='/categories/{{ $category->id }}/edit'
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
