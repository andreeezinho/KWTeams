<div class="col-12 my-2">
    @if($saudacao == "Bom dia")
        <p class="text-muted"><i class="bi-sun"></i> {{$saudacao}}, {{$user->name}}</p>
    @endif

    @if($saudacao == "Boa tarde")
    <p class="text-muted"><i class="bi-sunset-fill"></i> {{$saudacao}}, {{$user->name}}</p>
    @endif

    @if($saudacao == "Boa noite")
        <p class="text-muted"><i class="bi-moon-fill"></i> {{$saudacao}}, {{$user->name}}</p>
    @endif
</div>  