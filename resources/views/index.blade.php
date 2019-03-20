@extends('layout')

@section('content')
  <div id='app'>
    <div class='box appForm-container' style='width:330px;'>
      <div class='columns is-multiline'>
        <div class='column is-full'>
          <a class='button is-success'
             href='/sales-list'>
            <span class='icon is-small'>
                <i class="fas fa-dollar-sign"></i>
                </span>
            <span>Продажи</span>
          </a>
        </div>
        <div class='column is-full'>
          <a class='button is-success'
             href='/drugs'>
            <span class='icon is-small'>
                <i class="fas fa-list-ol"></i>
                </span>
            <span>Список препаратов</span>
          </a>
        </div>
        <div class='column is-full'>
          <a class='button is-warning'
             href='/transactions'>
            <span class='icon is-small'>
                <i class="fas fa-exchange-alt"></i>
                </span>
            <span>Движение товара на складе</span>
          </a>
        </div>
        <div class='column is-full'>
          <p class='label'>Отчеты</p>
          <a class='button is-link'
             href='/providers-by-cities'>
            <span class='icon is-small'>
                <i class="fas fa-clipboard-list"></i>
                </span>
            <span>Список поставщиков по городам</span></a>
        </div>
        <div class='column is-full'>
          <a class='button is-link'
             href='/pricelist'><span class='icon is-small'>
                <i class="fas fa-list-alt"></i>
                </span>
            <span>Прайслист по категориям</span></a>
        </div>
        <div class='column is-full'>
          <a class='button is-link'
             href='/sales'>
            <span class='icon is-small'>
                <i class="fas fa-calendar-alt"></i>
                </span>
            <span>Список продаж по годам</span></a>
        </div>
      </div>
    </div>
  </div>
@endsection
<script>
  import DrugsSelect from '../js/components/DrugsSelect'
  export default {
    components: { DrugsSelect }
  }
</script>
