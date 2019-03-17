@extends('layout')

@section('title')
  <h1 class='title appTitle'>Информация о транзакции № {{ $transaction->id }}</h1>
@endsection

@section('content')
  <div class='box appForm-container'>
    <div class='field'>
      <p class='label'>Дата продажи</p>
      <p>{{ date_format($transaction->created_at, "d.m.Y") }}</p>
    </div>

    <div class='field'>
      <p class='label'>Препарат</p>
      <p>
        <a href="/drugs/{{ $transaction->drug->id }}">
          {{ $transaction->drug->title }}
        </a>
      </p>
    </div>

    <div class='field'>
      <p class='label'>Кол-во проданного препарата</p>
      <p>{{ $transaction->amount }}</p>
    </div>

    <div class='columns appForm-actions'>
      <div class='column is-narrow'>
        <a href='/transactions/{{ $transaction->id }}/edit'
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
