  @extends('layouts.master')
  @section('title')
      compacto
  @endsection
  @section('main')
      @include('widgets.test-include')
      <h2>compact test</h2>
      nom : {{ $nom }} <br>
      email: {{ $email }} <br>
      {{-- commantaire qui s'affiche pas même en inspection --}}
      <hr>
      @if (count($languages) > 0)
          <h4>liste des langage:</h4>
          <ul>
              @foreach ($languages as $language)
                  <li>{{ $language }} </li>
              @endforeach
          </ul>
      @else
          <p>liste vide !</p>
      @endif
      <hr>
      @unless (count($languages) > 0)
          <p>liste vide !</p>
      @else
          <h4>liste des langage:</h4>
          <ul>
              @foreach ($languages as $language)
                  <li>{{ $language }} </li>
              @endforeach
          </ul>
      @endunless
      <hr>
      @foreach ($vals as $val)
          @if ($val > 10)
              <li>{{ $val }} </li>
          @endif
      @endforeach
      <hr>
      @isset($nom)
          variable nom existe et n'est pas null isset1 <br>
      @endisset
      @isset($nom2)
          variable nom2 existe et n'est pas null isset2 <br>
      @endisset
      @isset($age)
          variable age existe et n'est pas null isset3 <br>
      @endisset
      <hr>
      @empty($nom)
          variable nom existe et n'est pas null empty1 <br>
      @endempty
      @empty($nom2)
          variable nom2 existe et n'est pas null empty2 <br>
      @endempty
      @empty($age)
          variable age existe et n'est pas null empty3 <br>
      @endempty
      @empty($tab)
          variable age existe et n'est pas null empty4 <br>
      @endempty
      <hr>
      @switch($color)
          @case('red')
              <h4>rouge</h4>
          @break

          @case('blue')
              <h4>bleu</h4>
          @break

          @default
              <h4>couleur simple</h4>
      @endswitch
      <hr>
      @php
          $x3 = $x1 + $x2;
      @endphp
      x3 = {{ $x3 }}
      <hr>
      <script>
          var x = 0;
      </script>
      <script>
          x++;
          console.log('inc depuis mother .... =' + x);
      </script>
      @include('widgets.inc')
      @include('widgets.inc')
      @include('widgets.inc')
      @include('widgets.inc')
      @include('widgets.once')
      @include('widgets.once')
      @include('widgets.once')
  @endsection
