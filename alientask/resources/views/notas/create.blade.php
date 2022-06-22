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
                    <h2>Criar nota</h2>
                    <form action="{{route('notas-store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <input type="text" name="titulo" id="titulo" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="conteudo">Conteúdo</label>
                        <textarea class="form-control" name="conteudo" id="conteudo" rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn" id="add">Criar tarefa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>