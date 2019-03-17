@extends('layout')

@section('title')
  <h1 class='title appTitle'>Список поставщиков по городам</h1>
@endsection

@section('content')
  <div class='box appForm-container' style='width: 800px'>
    @foreach($cities as $city)
      <div class='field' style='margin-bottom: 52px'>
        <section class="hero is-primary is-small">
          <div class="hero-body">
            <div class="container">
              <h3 class="title">
                {{ $city }}
              </h3>
            </div>
          </div>
        </section>
        <table class='table is-fullwidth'>
          <thead>
            <tr>
              <th>Наименование</th>
              <th>Представитель</th>
              <th>Телефон</th>
            </tr>
          </thead>
          <tbody>
            @foreach($providers as $provider)
                @if($provider->city == $city)
                  <tr>
                    <td style='width: 33%'>
                      <p>
                        <a href="/providers/{{ $provider->id }}">
                          {{ $provider->title }}
                        </a>
                      </p>
                    </td>
                    <td style='width: 33%'>
                      <p>{{ $provider->manager }}</p>
                    </td>
                    <td style='white-space: nowrap; width: 33%'>
                      <p>
                        <a href="tel:{{ $provider->phone }}">
                          {{ $provider->phone }}
                        </a>
                      </p>
                    </td>
                  </tr>
                @endif
            @endforeach
          </tbody>
        </table>
      </div>
    @endforeach
  </div>
@endsection
