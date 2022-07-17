<x-app-layout>
    @section('subtitle', 'Painel de estatísticas')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Painel de estatisticas') }}
        </h2>
    </x-slot>

    <x-icon></x-icon>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h4>Relatório de tarefas</h4>
                                <div id="piecharttask"></div>
                            </div>
                            <div class="col">
                                <h4>Relatório de notas</h4>
                                <div id="piechartnote"></div>
                            </div>
                            <div class="col">
                                <h4>Relatório de etiquetas</h4>
                                <div id="piechartlabel"></div>
                            </div>
                        </div>

                        <div class="row">
                            
                        </div>
                    </div>

                </div>    
            </div>
        </div>
    </div>
</div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawPieChart);

      function drawPieChart()
      {
        var dataTask = google.visualization.arrayToDataTable([
          ['Ação', 'Tarefas'],
          ['Criadas',     {{$user->tarefas_criadas}}],
          ['Concluídas',     {{$user->tarefas_concluidas}}],
          ['Editadas',      {{$user->tarefas_editadas}}],
          ['Excluídas',  {{$user->tarefas_excluidas}}],
        ]);

        var dataLabel = google.visualization.arrayToDataTable([
          ['Ação', 'Etiquetas'],
          ['Criadas',     {{$user->etiquetas_criadas}}],
          ['Editadas',      {{$user->etiquetas_editadas}}],
          ['Excluídas',  {{$user->etiquetas_excluidas}}],
        ]);

        var dataNote = google.visualization.arrayToDataTable([
          ['Ação', 'Notas'],
          ['Criadas',     {{$user->notas_criadas}}],
          ['Editadas',      {{$user->notas_editadas}}],
          ['Excluídas',  {{$user->notas_excluidas}}],
        ]);

        var taskOptions = {
          width: 300,
          height: 200,
          colors: ['#9400D3', '#A020F0', '#DDA0DD', '#9370DB'],
        };

        var noteOptions = {
            width: 300,
            height: 200,
            colors: ['#BA55D3', '#9400D3', '#A020F0', '#9370DB'],
        }

        var labelOptions = {
            width: 300,
            height: 200,
            colors: ['#DA70D6', '#CD00CD', '#BA55D3', '#8A2BE2'],
        }

        var chartTask = new google.visualization.PieChart(document.getElementById('piecharttask'));
        var chartNote = new google.visualization.PieChart(document.getElementById('piechartnote'));
        var chartLabel = new google.visualization.PieChart(document.getElementById('piechartlabel'));
        chartTask.draw(dataTask, taskOptions);
        chartNote.draw(dataNote, noteOptions);
        chartLabel.draw(dataLabel, labelOptions);
      }

    </script>


</x-app-layout>