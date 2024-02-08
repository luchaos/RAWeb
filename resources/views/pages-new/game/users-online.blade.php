<?php
$playersOnlineArray = [];
if (file_exists(storage_path('app/playersonline.log'))) {
    $playersOnlineCSV = file_get_contents(storage_path('app/playersonline.log'));
    $playersCSV = preg_split('/\n|\r\n?/', $playersOnlineCSV);
    for ($i = 0; $i < 48; $i++) {
        $playersOnlineArray[] = $playersCSV[(is_countable($playersCSV) ? count($playersCSV) : 0) - ($i + 2)];
    }
}

$numGridlines = 24;
$largestWonByCount = 0;
$count = 0;
$now = date("Y/m/d G:0:0");
//error_log( $now );

$data = '';
if (count($playersOnlineArray)) {
    for ($i = 0; $i < 48; $i++) {
        if (count($playersOnlineArray) < $i) {
            continue;
        }
        $players = $playersOnlineArray[$i];
        settype($players, 'integer');
        if ($i != 0) {
            $data .= ", ";
        }
        $mins = $i * 30;
        $timestamp = strtotime("-$mins minutes", strtotime($now));
        $yr = date("Y", $timestamp);
        $month = date("m", $timestamp) - 1; //	PHP-js datetime
        $day = date("d", $timestamp);
        $hour = date("G", $timestamp);
        $min = date("i", $timestamp);
        $data .= "[ new Date($yr,$month,$day,$hour,$min), {v:$players, f:\"$players online\"}]";
    }
}
?>
<x-section>
    <h4>Users Online</h4>
    <div style="min-height: 160px;" id="chart_usersonline"></div>
</x-section>

@push('scripts')
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load('current', {
            callback: drawCharts,
            packages: ['corechart']
        });

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawCharts() {
            var dataTotalScore = new google.visualization.DataTable();
            // Declare columns
            dataTotalScore.addColumn('datetime', 'Time');
            dataTotalScore.addColumn('number', 'Players Online');
            dataTotalScore.addRows([{{ $data }}]);
            var optionsTotalScore = {
                backgroundColor: 'transparent',
                //title: 'Achievement Distribution',
                titleTextStyle: { color: '#186DEE' }, //cc9900
                //hAxis: {textStyle: {color: '#186DEE'}, gridlines:{count:24, color: '#334433'}, minorGridlines:{count:0}, format:'#', slantedTextAngle:90, maxAlternation:0 },
                hAxis: { textStyle: { color: '#186DEE' } },
                vAxis: { textStyle: { color: '#186DEE' }, viewWindow: { min: 0 }, format: '#' },
                legend: { position: 'none' },
                chartArea: { 'width': '85%', 'height': '78%' },
                height: 160,
                colors: ['#cc9900'],
                pointSize: 4
            };
        }
    </script>
@endpush
