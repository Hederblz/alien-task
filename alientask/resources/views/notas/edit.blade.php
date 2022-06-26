<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editor de notas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2>Editando nota '{{$nota->titulo}}'</h2>
                <form action="{{route('notas-update', $nota->id)}}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" name="titulo" name="titulo" class="form-control" value="{{$nota->titulo}}">
                </div>
                <div class="form-group">
                    <label for="conteudo">Conteúdo</label>
                    <textarea class="form-control" name="conteudo" id="conteudo" rows="10" required></textarea>
                </div>
                <div class="form-group">
                    <h2>Etiquetas</h2>
                    @foreach ($etiquetas as $etiqueta)
                    @php
                $jsonDecode = json_decode($etiqueta)   
               @endphp
               <div class="row form-group">
                   <label id="checklabel" for="etiquetas" style="background: {{$etiqueta['cor']}}; color: #FFF; padding: .5rem;">{{$etiqueta['titulo']}}</label>
                   <input type="checkbox" name="etiquetas[]" id="etiqueta" class="form-control" value="{{$etiqueta}}">
                </div>
                @endforeach
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
</x-app-layout>