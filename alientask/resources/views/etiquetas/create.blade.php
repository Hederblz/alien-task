<x-app-layout>
    @section('subtitle', 'Etiquetas')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criação de Etiqueta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2>Criar etiqueta</h2>
                    <form action="{{route('etiquetas-store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <input type="text" name="titulo" id="titulo" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="cor">Cor</label>
                        <input type="color" name="cor" id="cor" class="form-control">
                    </div>
                    <button type="submit" class="btn" id="add">Criar etiqueta</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>