@component('mail::message')
# Noticias diarias

Aqui le traigo las noticias nuevas
@foreach ($noticias as $noticia)
    @component('mail::panel')
        <img src="https://www.abc.com.py/resizer/dW2BCMzoCjxr1R01w1fOZt1TVlI=/fit-in/770x495/smart/arc-anglerfish-arc2-prod-abccolor.s3.amazonaws.com/public/VKVGJTMSMNGL5FQYGPE2BXGFPE.jpeg" class="panel-img"/>
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
