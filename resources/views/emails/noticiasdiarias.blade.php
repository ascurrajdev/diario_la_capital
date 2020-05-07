@component('mail::message')
# Noticias diarias

Aqui le traigo las noticias nuevas
@foreach ($noticias as $noticia)
    @component('mail::panel')
        <img src="{{$noticia->asset->asset_url}}" class="panel-img"/>
        <div class="panel-notica">
            <p class="text-default">Hace 8 horas</p>
            <h2>{{$noticia->titulo_noticia}}</h2>
            @component('mail::button', ['url' => ''])
                Ver mas
            @endcomponent
        </div>
    @endcomponent
@endforeach
Que tenga un buen dia,<br>
{{ config('app.name') }}
@endcomponent
