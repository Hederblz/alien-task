<x-app-layout>
    @section('subtitle', 'Notas')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criação de nota') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2>Criar nota</h2>
                    <form action="{{route('notas-store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="titulo">Título(opcional)</label>
                        <input type="text" name="titulo" id="titulo" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="conteudo">Conteúdo</label>
                        <textarea name="conteudo" id="conteudo" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        @if ($etiquetas->count() > 0)
                            @foreach ($etiquetas as $etiqueta)
                            <div class="row form-group">
                                <label for="etiqueta" style="background-color: {{$etiqueta->cor}}; color: #FFF;">{{$etiqueta->titulo}}</label>
                                <input type="checkbox" name="etiquetas[]" id="etiqueta" class="form-control" value="{{$etiqueta}}">
                            </div>
                            @endforeach
                        @endif
                    </div>
                    <button type="submit" class="btn btn-secondary" id="add">Criar nota</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>