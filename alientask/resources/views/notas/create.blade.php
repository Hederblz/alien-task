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
                    <button type="submit" class="btn btn-secondary" id="add">Criar nota</button>
                    </form>
                    <hr>
                    <div class="container-fluid">
                        <h2>Criar etiqueta</h2>
                        <form action="{{route('etiquetas-simple-store')}}" method="post">
                            @csrf
                            <div class="d-flex">
                            <div class="form-group">
                                <label for="titulo">Título</label>
                                <input type="text" name="titulo" id="titulo" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="cor">Cor</label>
                                <input type="color" name="cor" id="cor">
                            </div>
                            </div>
                            <button type="submit" class="btn" id="add">Criar etiqueta</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script src="/js/showdown.js"></script>
    <script src="/js/markdown.js"></script>
</x-app-layout>