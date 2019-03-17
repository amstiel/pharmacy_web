@extends('layout')

@section('title')
  <div class='columns is-vcentered'>
    <div class='column is-narrow'>
      <h3>Выберите год: </h3>
    </div>
    <div class='column is-narrow'>
      <form action='/sales' method='GET'>
        <div class="select">
          <select name='year' aria-label='Год' onchange='this.form.submit()'>
            @for($y = $max_year; $y >= $min_year; $y--)
              <option value='{{ $y }}' {{ $y == $year ? 'selected' : '' }}>
                {{ $y }}
              </option>
            @endfor
          </select>
        </div>
      </form>
    </div>
  </div>
  <h1 class='title appTitle'>Список продаж за {{ $year }} год</h1>
@endsection

@section('content')
  <div class='box appForm-container'>
    @foreach($months as $index => $month)
      @if($year == $max_year && $index > $current_month)
      @else
        <section class="hero is-warning is-small">
          <div class="hero-body">
            <div class="container">
              <h3 class="title">
                {{ $month }}
              </h3>
            </div>
          </div>
        </section>
        @empty($transactions[$index])
          <div class="notification is-info has-text-centered" style='margin-top: 0.5rem'>
            Транзакций нет
          </div>
        @endempty
        @isset($transactions[$index])
          <table class='table is-fullwidth'>
            <thead>
              <tr>
                <th>Номер</th>
                <th>Дата</th>
                <th>Препарат</th>
                <th>Кол-во</th>
                <th class='has-text-right'>Сумма</th>
              </tr>
            </thead>
            <tbody>
            @foreach($transactions[$index] as $trans)
              <tr>
                <td>
                  {{ $trans->id }}
                </td>
                <td>
                  {{ date_format($trans->created_at, "d.m.Y") }}
                </td>
                <td>
                  <a href='/drugs/{{ $trans->drug->id }}'>
                    {{ $trans->drug->title }}
                  </a>
                </td>
                <td>
                  {{ $trans->amount }}
                </td>
                <td class='has-text-right'>
                  {{number_format($trans->drug->price * $trans->amount, 2, '.', ' ').' ₽'}}
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        @endisset
      @endif
    @endforeach
  </div>
@endsection
