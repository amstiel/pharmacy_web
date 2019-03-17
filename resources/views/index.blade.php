@extends('layout')

@section('content')
  <ul>
    <li><a class='button is-primary'
           href='/drugs/create'>Добавить лекарство</a></li>
    <li><a class='button is-primary'
           href='/drugs'>Список лекарств</a></li>
    <li> <a class='button is-primary'
            href='/providers-by-cities'>Список поставщиков по городам</a></li>
  </ul>
  <div class='columns is-multiline'>
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
    <div class='column is-half'>
      <a class='button is-primary'
         href='/pricelist'>Прайслист по категориям</a>
    </div>
  </div>
@endsection
