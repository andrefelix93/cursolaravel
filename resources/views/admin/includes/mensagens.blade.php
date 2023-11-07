@if($mensagem = Session::get('sucesso'))
        
<div class="card green">
    <div class="card-content white-text">
      <p>{{$mensagem}}</p>
    </div>
  </div>
@endif