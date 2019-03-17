@extends('layout')

@section('content')
  <div class='columns'>
    <div class='column is-half'>
      <a class='button is-primary'
         href='/drugs/create'>Добавить лекарство</a>
    </div>
    <div class='column is-half'>
      <a class='button is-primary'
         href='/drugs'>Список лекарств</a>
    </div>
    <div class='column is-half'>
      <a class='button is-primary'
         href='/providers-by-cities'>Список поставщиков по городам</a>
    </div>
  </div>
@endsection
