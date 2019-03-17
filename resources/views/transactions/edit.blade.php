@extends('layout')

@section('title')
  <h1 class='title appTitle'>Изме</h1>
@endsection

@section('content')
  <div class='box appForm-container'>
    <form action='/transactions/{{ $transaction->id }}' method='POST'>
      @csrf
      @method('PATCH')
      <div class='field'>
        <label for='drug_id' class='label'>Препарат</label>
        <div class='control'>
          <div class="select is-fullwidth">
            <select id='drug_id' name='drug_id' class='is-fullwidth'>
              @foreach($drugs as $drug)
                <option value='{{ $drug->id }}'
                        {{ $drug->id === $transaction->drug->id ? 'selected' : '' }}>
                  {{ $drug->title }}
                </option>
              @endforeach
            </select>
          </div>
        </div>
      </div>

      <div class='field'>
        <label for='date' class='label'>Дата</label>
        <div class='control'>
          <input class="input" type='date' id='date' name='date' required
                 placeholder='Выберите дату' value='{{ date_format($transaction->created_at, "Y-m-d") }}'>
        </div>
      </div>

      <div class='field'>
        <label for='amount' class='label'>Колличество</label>
        <div class='control'>
          <input class="input" type='number' id='amount' name='amount' required
                 placeholder='Введите кол-во' value='{{ $transaction->amount }}'>
        </div>
      </div>

      <div class='columns appForm-actions'>
        <div class='column is-narrow'>
          <button class='button is-success' type='submit'>
              <span class="icon is-small">
                <i class="fas fa-edit"></i>
              </span>
            <span>Сохранить изменения</span>
          </button>
        </div>

        <div class='column is-narrow'>
          <button class='button' onclick='window.history.back()'>
            Отменить
          </button>
        </div>
      </div>
    </form>

    <div class='appForm-delete'>
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
  </div>
@endsection
