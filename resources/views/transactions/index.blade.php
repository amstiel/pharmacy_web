@extends('layout')

@section('title')
  <h1 class='title appTitle'>Движение товара на складе</h1>
@endsection

@section('content')
  <table class='table appTable'>
    <thead>
    <tr>
      <th>Дата</th>
      <th>Препарат</th>
      <th>Приход</th>
      <th>Расход</th>
      <th></th>
    </tr>
    </thead>

    <tbody>
    @foreach($transactions as $transaction)
      <tr>
        <td>
          {{ date_format($transaction->created_at, "d.m.Y") }}
        </td>
        <td>
          <a href="/drugs/{{ $transaction->drug->id }}">
            {{ $transaction->drug->title }}
          </a>
        </td>
        <td class='has-text-right'>
          {{ $transaction->revenue }}
        </td>
        <td class='has-text-right'>
          {{ $transaction->expense }}
        </td>
        <td>
          <a href='/transactions/{{ $transaction->id }}'
             class='button is-primary'>
            <span class='icon is-small'>
              <i class="fas fa-info-circle"></i>
              </span>
            <span>Подробнее</span></a>
          {{--<a href='/reciepts/{{ $transaction->id }}'--}}
             {{--class='button is-info'>--}}
            {{--<span class='icon is-small'>--}}
              {{--<i class="fas fa-receipt"></i>--}}
              {{--</span>--}}
            {{--<span>Чек</span>--}}
          {{--</a>--}}
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  <a href='/add-transaction' class='button is-success'>
    <span class="icon is-small">
      <i class="fas fa-plus"></i>
    </span>
    <span>Внести препарат</span>
  </a>
  <a href='/remove-transaction' class='button is-danger'>
    <span class="icon is-small">
      <i class="fas fa-minus"></i>
    </span>
    <span>Списать препарат</span>
  </a>
@endsection
