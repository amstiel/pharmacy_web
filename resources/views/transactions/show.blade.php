@extends('layout')

@section('title')
  <h1 class='title appTitle'>Информация об операции складе</h1>
@endsection

@section('content')
  <div class='box appForm-container'>
    <div class='field'>
      <p class='label'>Дата операции</p>
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
      <p class='label'>Кол-во принятого товара</p>
      <p>{{ $transaction->revenue }}</p>
    </div>

    <div class='field'>
      <p class='label'>Кол-во списанного товара</p>
      <p>{{ $transaction->expense }}</p>
    </div>

    <div class='columns appForm-actions'>
      <div class='column is-narrow'>
        <form action='/transactions/{{ $transaction->id }}' method='POST'>
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

      <div class='column is-narrow'>
        <button class='button' onclick='window.history.back()'>Назад</button>
      </div>
    </div>
  </div>
@endsection
