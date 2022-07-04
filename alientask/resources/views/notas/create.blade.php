<x-app-layout>
    @section('subtitle', 'Notas')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criação de nota') }}
        </h2>
    </x-slot>

    <x-icon></x-icon>

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
                        <label for="ismarkdown">Markdown(para usuários avançados):</label>
                        <input type="checkbox" name="markdown" id="ismarkdown" value="1" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="conteudo">Conteúdo</label>
                                <textarea name="conteudo" id="conteudo" rows="10" class="form-control d-flex" style="resize: none"></textarea>
                            </div>
                            <x-markdown theme="github-light" 
                            style="font-size: clamp(1em, 1.5em, 2em); max-height:auto; overflow: scroll; margin: .5rem; display:none;"
                            id="preview" class="col shadow form-control">
                            </x-markdown>
                        </div>
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
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script src="/js/showdown.js"></script>
    <script src="/js/markdown.js"></script>
</x-app-layout>