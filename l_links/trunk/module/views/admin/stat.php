<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
	google.load("visualization", "1", {packages:["corechart"]});
	google.load('visualization', '1', {'packages': ['geochart']});
	google.setOnLoadCallback(drawChart);
	google.setOnLoadCallback(drawRegionsMap);
	google.setOnLoadCallback(drawChart2);

	function drawChart() {
		var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
		]);

		var options = {
			title: 'My Daily Activities' 
        };

		var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
		chart.draw(data, options);
	}

	function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
          ['Country', 'Popularity'],
          ['Germany', 200],
          ['United States', 300],
          ['Brazil', 400],
          ['Canada', 500],
          ['France', 600],
          ['RU', 700]
        ]);

        var options = {};

        var chart = new google.visualization.GeoChart(document.getElementById('map_chart_div'));
        chart.draw(data, options);
	}

	function drawChart2() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);

        var options = {
          title: 'Company Performance'
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
      }
	
</script>

<div style="overflow: hidden;">
	<div id="chart_div" style="width: 500px; height: 300px; border: 1px solid red; float: left;"></div>
	<div id="map_chart_div" style="width: 500px; height: 300px; float: left; border: 1px solid green;"></div>
	<div id="chart_div2" style="width: 500px; height: 300px; float: left; border: 1px solid green;"></div>
</div>
