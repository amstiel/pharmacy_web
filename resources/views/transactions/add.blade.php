@extends('layout')

@section('title')
  <h1 class='title appTitle'>Добавление препарата на склад</h1>
@endsection

@section('content')
  <div class='box appForm-container'>
    <form action='/transactions/refresh' method='POST'>
      @csrf
      <div class='field'>
        <label for='drug_id' class='label'>Препарат</label>
        <div class='control'>
          <div class="select is-fullwidth">
            <select id='drug_id' name='drug_id' class='is-fullwidth'>
              @foreach($drugs as $drug)
                <option value='{{ $drug->id }}'>
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
                 placeholder='Выберите дату' value='{{ date("Y-m-d") }}'>
        </div>
      </div>

      <div class='field'>
        <label for='revenue' class='label'>Колличество</label>
        <div class='control'>
          <input class="input" type='number' id='revenue' name='revenue' required
                 value='10'
                 placeholder='Введите кол-во'>
        </div>
      </div>

      <div class='columns appForm-actions'>
        <div class='column is-narrow'>
          <button class='button is-success' type='submit'>
              <span class="icon is-small">
                <i class="fas fa-plus"></i>
              </span>
            <span>Внести</span>
          </button>
        </div>

        <div class='column is-narrow'>
          <button class='button' onclick='window.history.back()'>
            Отменить
          </button>
        </div>
      </div>
    </form>
  </div>
@endsection
