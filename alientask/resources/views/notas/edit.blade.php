<x-app-layout>
    @section('subtitle', 'Notas')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editor de nota') }}
        </h2>
    </x-slot>

    <x-icon></x-icon>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2>Editando nota '{{$nota->titulo}}'</h2>
                <form action="{{route('notas-atualizar', $nota->id)}}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" name="titulo" name="titulo" class="form-control" value="{{$nota->titulo}}">
                </div>
                <div class="form-group">
                    <label for="conteudo">Conteúdo</label>
                    <textarea class="form-control" name="conteudo" id="conteudo" rows="10" required style="resize: none;">{{$nota->conteudo}}</textarea>
                </div>
                <div class="form-group">
                <details>
                    <summary style="font-size: 1.5em">Etiquetas</summary>
                    @if ($etiquetas->count() > 0)
                    @foreach ($etiquetas as $etiqueta)
                    @php
                     $jsonDecode = json_decode($etiqueta)   
                    @endphp
                    <div class="row form-group">
                        <div class="col d-flex shadow" id="label-check" style="background: {{$etiqueta->cor}}">
                            <input type="checkbox" name="etiquetas[]" id="etiqueta" value="{{$etiqueta}}">
                            <label for="etiquetas" style="color: #FFF;">{{$etiqueta['titulo']}}</label>
                        </div>
                    </div>
                    @endforeach
                    @else
                        <p>Você não possui etiquetas.</p>
                    @endif
                    </details>
                </div>
                <button type="submit" class="btn btn-success">Alterar</button>
            </div>
        </form>
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
</x-app-layout>