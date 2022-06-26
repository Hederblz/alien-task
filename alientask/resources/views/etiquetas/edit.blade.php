<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Painel inicial') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2>Criar etiqueta</h2>
                    <div class="container-fluid">
                        <form action="{{route('etiquetas-update', $etiqueta->id)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="titulo">Título</label>
                                <input type="text" name="titulo" id="titulo" class="form-control" value="{{$etiqueta->titulo}}" required>
                            </div>
                            <div class="form-group">
                                <label for="cor">Cor</label>
                                <input type="color" name="cor" value="{{$etiqueta->cor}}" id="cor" class="form-control">
                            </div>
                            <button type="submit" class="btn" id="add">Atualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>