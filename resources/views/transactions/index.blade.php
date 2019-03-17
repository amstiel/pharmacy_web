@extends('layout')

@section('title')
  <h1 class='title appTitle'>Список транзакций</h1>
@endsection

@section('content')
  <table class='table appTable'>
    <thead>
    <tr>
      <th>Дата продажи</th>
      <th>Препарат</th>
      <th>Колличество</th>
    </tr>
    </thead>

    <tbody>
    @foreach($transactions as $transaction)
      <tr>
        <td>
          {{ $transaction->date }}
        </td>
        <td>
          <a href="/drugs/{{ $transaction->drug->id }}">
            {{ $transaction->drug->title }}
          </a>
        </td>
        <td>
          {{ $transaction->amount }}
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  <a href='/transactions/create' class='button is-success'>
    <span class="icon is-small">
      <i class="fas fa-plus"></i>
    </span>
    <span>Оформить продажу</span>
  </a>
@endsection
