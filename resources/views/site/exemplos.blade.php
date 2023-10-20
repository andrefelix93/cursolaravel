@extends('site.layout')
@section('title', 'HOME')
@section('conteudo')
<h1>Empresa</h1>

Meu nome é {{$nome}} e minha idade é {{$idade}}.

{!! $html !!}

<h1>Aqui o base está sendo herdado de layout.blade.php, o section é um bloco chamado conteúdo que está sendo inserido dentro do campo yield do arquivo 'layout.blade.php'.</h1>

{{-- Isso é um comentário --}}

{{ isset($nome) ? 'Existe' : 'Não existe' }}

<br>
@if ($nome == 'André')
true
@else
false
@endif
<br>
@for ($i = 0; $i < 10; $i++)
valor atual é {{ $i }} <br>
@endfor
<br>
@php $i = 0; @endphp
@while ($i<=10)
valor atual usando while é {{ $i }} <br>
@php $i++ @endphp
@endwhile

@include('includes.mensagem', ['titulo'=>'Mensagem de sucesso!'])

@component('components.sidebar')
@slot('paragrafo')
Texto qualquer vindo do slot.
@endslot
@endcomponent

@endsection