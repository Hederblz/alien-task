<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table>
                        @foreach(Auth::user()->notas as $nota)
                        <tr>
                            <td>{{$nota->titulo}}</td>
                            <td>{{$nota->conteudo}}</td>
                        </tr>
                        @endforeach
                        <form action="add-nota" method="POST">
                            @csrf
                            <input type="text" name="titulo" placeholder="titulo">
                            <input type="text" name="conteudo" placeholder="conteudo">
                            <input type="submit" value ="add">
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
