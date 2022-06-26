<x-app-layout>
    @section('subtitle', 'Painel inicial')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Painel inicial') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col md-4 shadow d-flex">
                                <div id="piecharttask" style="width: 100%; height: 400px;"></div>
                                
                            </div>

                            <div class="col md-4 shadow d-flex">
                                <div id="piechartnote" style="width: 100%; height: 400px;"></div>
                            </div>

                            <div class="col md-4 shadow d-flex">
                                <div id="piechartlabel" style="width: 100%; height: 400px;"></div>
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
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var dataTask = google.visualization.arrayToDataTable([
          ['Ação', 'Tarefas'],
          ['Criadas',     {{Auth::user()->tarefas_criadas}}],
          ['Concluídas',     {{Auth::user()->tarefas_concluidas}}],
          ['Editadas',      {{Auth::user()->tarefas_editadas}}],
          ['Excluídas',  {{Auth::user()->tarefas_excluidas}}],
        ]);

        var dataLabel = google.visualization.arrayToDataTable([
          ['Ação', 'Etiquetas'],
          ['Criadas',     {{Auth::user()->etiquetas_criadas}}],
          ['Editadas',      {{Auth::user()->etiquetas_editadas}}],
          ['Excluídas',  {{Auth::user()->etiquetas_excluidas}}],
        ])

        var dataNote = google.visualization.arrayToDataTable([
          ['Ação', 'Notas'],
          ['Criadas',     {{Auth::user()->notas_criadas}}],
          ['Editadas',      {{Auth::user()->notas_editadas}}],
          ['Excluídas',  {{Auth::user()->notas_excluidas}}],
        ])

        var taskOptions = {
          title: 'Relatório de tarefas'
        };

        var noteOptions = {
            title: 'Relatório de notas'
        }

        var labelOptions = {
            title: 'Relatório de etiquetas'
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