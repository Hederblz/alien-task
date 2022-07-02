<x-app-layout>
    @section('subtitle', 'Tarefas')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Histórico de atividades') }}
        </h2>
    </x-slot>
    
    <x-icon></x-icon>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" id="main">

                    <h2>Sabemos o que você fez...</h2>

                    @if ($logs->count() > 0)
                        <ul class="list-group">
                            @foreach ($logs as $log)
                                <li class="list-group-item shadow" id="list"><p>Você {{$log->action}} a {{$log->type}} com titulo 
                                    {{$log->type_title}} em {{$log->created_at->format('d/m/Y')}}</p></li>
                            @endforeach

                        </ul>
                        @else
                        <h3>Você não realizou nenhuma atividade.</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/interfaces.js"></script>
</x-app-layout>