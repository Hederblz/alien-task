<x-app-layout>
    @section('subtitle', 'Temporizador')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Temporizador') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <h2>Leve o tempo que precisar</h2>

                  <div class="container" id="timer">
                    <div class="row text-center">
                        <h1 id="counter">00:00:00</h1>
                    </div>
                    <div class="row text-center">
                        <div class="col">
                            <button class="btn btn-success" id="start" onclick="startCron()">Iniciar</button>
                            <button class="btn btn-warning" id="pause" onclick=pauseCron()>Pausar</button>
                            <button class="btn btn-danger" id="stop" onclick="stopCron()">Parar</button>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/timer.js"></script>
</x-app-layout>