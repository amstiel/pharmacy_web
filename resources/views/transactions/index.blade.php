@extends('layout')

@section('title')
  <h1 class='title appTitle'>Список транзакций</h1>
@endsection

@section('content')
  <table class='table appTable'>
    <thead>
    <tr>
      <th>Номер транзакции</th>
      <th>Дата продажи</th>
      <th>Препарат</th>
      <th>Колличество</th>
      <th></th>
    </tr>
    </thead>

    <tbody>
    @foreach($transactions as $transaction)
      <tr>
        <td>
          {{ $transaction->id }}
        </td>
        <td>
          {{ date_format($transaction->created_at, "d.m.Y") }}
        </td>
        <td>
          <a href="/drugs/{{ $transaction->drug->id }}">
            {{ $transaction->drug->title }}
          </a>
        </td>
        <td>
          {{ $transaction->amount }}
        </td>
        <td>
          <a href='/transactions/{{ $transaction->id }}'
             class='button is-primary'>Подробнее</a>
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
