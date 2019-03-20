@extends('layout')

@section('content')
  <table class='table is-fullwidth'>
    <thead>
    <tr>
      <th>Номер чека</th>
      <th>Дата</th>
      <th>Препараты</th>
      <th class='has-text-right'>Сумма</th>
      <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($sales as $sale)
      <tr>
        <td>
          <a href='/receipts/{{ $sale->id }}'>
            {{ $sale->id }}
          </a>
        </td>
        <td>
          {{ date_format($sale->created_at, "d.m.Y") }}
        </td>
        <td>
          @foreach($sale->drugs as $drug)
            <p>
              <a href='/drugs/{{ $drug->id }}'>
                {{ $drug->title }}
              </a>
              x
              {{ $drug->pivot->amount }}
            </p>
          @endforeach
        </td>
        <td class='has-text-right'>
          {{ number_format($sale->drugs->reduce(function($sum, $drug) {
            return $sum + $drug->price * $drug->pivot->amount;
          }), 2, '.', ' ').' ₽'}}
        </td>
        <td>
          <a class='button is-link'
             href='/receipts/{{ $sale->id }}'>
            <span class='icon is-small'>
              <i class='fas fa-receipt'></i>
            </span>
            <span>Товарный чек</span>
          </a>
        </td>
        {{--<td>--}}
        {{--<a href='/drugs/{{ $trans->drug->id }}'>--}}
        {{--{{ $trans->drug->title }}--}}
        {{--</a>--}}
        {{--</td>--}}
        {{--<td>--}}
        {{--{{ $trans->amount }}--}}
        {{--</td>--}}
        {{--<td class='has-text-right'>--}}
        {{--{{number_format($trans->drug->price * $trans->amount, 2, '.', ' ').' ₽'}}--}}
        {{--</td>--}}
      </tr>
    @endforeach
    </tbody>
  </table>
@endsection
