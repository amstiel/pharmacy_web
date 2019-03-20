@extends('layout')

@section('title')
  <h1 class='title appTitle'>Список препаратов</h1>
@endsection

@section('content')
  <table class='table appTable'>
    <thead>
      <tr>
        <th>Наименование препарата</th>
        <th>Поставщик</th>
        <th>Категория</th>
        <th>Кол-во на складе</th>
        <th>Единица измерения</th>
        <th class='has-text-right'>Цена</th>
      </tr>
    </thead>

    <tbody>
      @foreach($drugs as $drug)
        <tr>
          <td>
            <a href="/drugs/{{ $drug->id }}">{{ $drug->title }}</a>
          </td>
          <td>
            <a href="/providers/{{ $drug->provider->id }}">
              {{ $drug->provider->title }}
            </a>
          </td>
          <td>
            <a href="/categories/{{ $drug->category->id }}">
              {{ $drug->category->title }}
            </a>
          </td>
          <td class='has-text-right'>{{ $drug->balance }}</td>
          <td>{{ $drug->measure }}</td>
          <td class='has-text-right'>
            {{ number_format($drug->price, 2, '.', ' ') }} ₽
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <a href='/drugs/create' class='button is-success'>
    <span class="icon is-small">
      <i class="fas fa-plus"></i>
    </span>
    <span>Добавить препарат</span>
  </a>
@endsection
