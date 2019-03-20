@extends('layout')

@section('summary')
  <div style='margin-bottom: 1rem'>
    <p><strong>Наименование организации:</strong> ООО «Лечфарм+»</p>
    <p><strong>ИНН:</strong> 6449013711</p>
    <p><strong>Адрес:</strong> г.Владивосток, Светланская ул., 36б</p>
  </div>
@endsection

@section('title')
  <h1 class='title appTitle'>Товарный чек № {{ $sale->id }} от {{ date_format($sale->created_at, "d.m.Y") }}</h1>
@endsection

@section('content')
  <table class='table is-bordered'>
    <thead>
      <tr>
        <th>№</th>
        <th>Наименование товара</th>
        <th>Единица измерения</th>
        <th class='has-text-right'>Цена за 1 ед.</th>
        <th>Кол-во</th>
        <th class='has-text-right'>Сумма</th>
      </tr>
    </thead>
    <tbody>
      @foreach($sale->drugs as $index => $drug)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $drug->title }}</td>
          <td>{{ $drug->measure }}</td>
          <td class='has-text-right'>{{ number_format($drug->price, 2, '.', ' ').' ₽' }}</td>
          <td>{{ $drug->pivot->amount }}</td>
          <td class='has-text-right'>{{ number_format($drug->price * $drug->pivot->amount, 2, '.', ' ').' ₽' }}</td>
        </tr>
      @endforeach
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><strong>Итог:</strong></td>
        <td class='has-text-right'><strong>{{ number_format($sale->drugs->reduce(function($sum, $drug){
          return $sum + $drug->price * $drug->pivot->amount;
        }), 2, '.', ' ').' ₽' }}</strong></td>
      </tr>
    </tbody>
  </table>

  <div class='columns' style='justify-content: flex-end'>
    <div class='column is-narrow'>
      <button class='button is-warning is-hidden-print' onclick='window.print()'>
        <span class='icon is-small'>
          <i class='fas fa-print'></i>
        </span>
        <span>Печать</span>
      </button>
    </div>
  </div>
@endsection
