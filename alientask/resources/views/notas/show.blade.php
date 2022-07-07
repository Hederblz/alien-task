<x-app-layout>
    @section('subtitle', 'Notas')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Leitor de nota') }}
        </h2>
    </x-slot>

    <x-icon></x-icon>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <a href="{{url()->previous()}}" class="btn text-dark text-decoration-none align-middle">
                        <ion-icon name="chevron-back-outline"></ion-icon>
                        Voltar às tarefas
                    </a>

                    <h2>Visualizando nota '{{$nota->titulo}}'</h2>
                    <div class="container" id="note">
                        @if ($nota->markdown)
                        <x-markdown theme="github-light" style="font-size: clamp(1em, 1.5em, 2em)">
                            {{$nota->conteudo}}
                        </x-markdown>
                        @else
                        <p>
                            {{$nota->conteudo}}
                        </p>
                        @endif
                    </div>
                    <div class="row" id="labels-row">
                       <h4>Etiquetas</h4>
                       @if ($nota->etiquetas)
                       @foreach ($nota->etiquetas as $etiqueta)
                       @php
                           $jsonDecode = json_decode($etiqueta, true);
                       @endphp
                       <div class="d-flex" id="task-label" class="col" style="background-color: {{$jsonDecode['cor']}}; color: #FFF; margin:.2rem">
                           <b>{{$jsonDecode['titulo']}}</b>
                       </div>
                       @endforeach
                       @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    #etiqueta:checked
    {
        background-color: #9400D3;
    }

    #checklabel
    {
        border-radius: 10px;
    }
</style>
<script src="/js/jquery.js"></script>
<script src="/js/showdown.js"></script>
<script src="/js/markdown.js"></script>
</x-app-layout>