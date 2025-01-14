<!-- ./col -->
<div class="col-md-5 pb-3">
<canvas id="dayPieChart" style="width:100%;"></canvas>

<script>
var xValues = ["Completed", "Open", "Others"];
var yValues = [{{$sr_count_today_completed}}, {{$sr_count_today_open}}, {{$sr_count_today_others}}];
var barColors = [
  "#00FF22",
  "#EEDD00",
  "#DD0000",
];

new Chart("dayPieChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Service Consumer Analysis - Today"
    }
  }
});
</script>

</div>