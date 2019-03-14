@extends('layout')

@section('title')
  <h1 class='title appTitle'>Список поставщиков</h1>
@endsection

@section('content')
  <table class='table appTable'>
    <thead>
    <tr>
      <th>Наименование поставщика</th>
      <th>Город</th>
      <th>Адрес</th>
      <th>Имя представителя</th>
      <th>Телефон</th>
    </tr>
    </thead>

    <tbody>
    @foreach($providers as $provider)
      <tr>
        <td>
          <a href="/providers/{{ $provider->id }}">{{ $provider->title }}</a>
        </td>
        <td>{{ $provider->city }}</td>
        <td>{{ $provider->address }}</td>
        <td>{{ $provider->manager }}</td>
        <td>
          <a href="tel:{{ $provider->phone }}">
            {{ $provider->phone }}
          </a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  <a href='/providers/create' class='button is-success'>
    <span class="icon is-small">
      <i class="fas fa-plus"></i>
    </span>
    <span>Добавить поставщика</span>
  </a>
@endsection
