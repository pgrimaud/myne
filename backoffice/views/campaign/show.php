<?php add('header'); ?>

<!-- main content -->
<div id="contentwrapper">
  <div class="main_content">
    <div class="row-fluid">
      <div class="span12">
        <h3 class="heading">Campagne : Salons de jardin (2014-06-20 20:23:56)</h3>
      </div>
    </div>
    <div class="row-fluid" style="margin-top:0px;">
      <div class="span3">
        <div class="alert alert-myne textcenter" style="font-size:24px;padding-top:30px;padding-bottom:30px;">
          22 Produits
        </div>
      </div>
      <div class="span3">
        <div class="alert alert-myne textcenter" style="font-size:24px;padding-top:30px;padding-bottom:30px;">
          840 Mails envoyés
        </div>
      </div>
      <div class="span3">
        <div class="alert alert-myne textcenter" style="font-size:24px;padding-top:30px;padding-bottom:30px;">
          361 Clics
        </div>
      </div>
      <div class="span3">
        <div class="alert alert-myne textcenter" style="font-size:24px;padding-top:30px;padding-bottom:30px;">
         42.98% D'ouverture
        </div>
      </div>
    </div>
    <div class="row-fluid" style="margin-top:0px;">
      <div class="span12">
        <h3 class="heading">Evolution des clics depuis le début de la campagne</h3>
        <div class="row-fluid">
          <div class="span12" style="height:200px;" id="stats_reviews"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="/lib/amcharts/amcharts.js"></script>
<script src="/lib/amcharts/serial.js"></script>
<script type="text/javascript">
  var chart = new AmCharts.AmSerialChart();

  var chartData = [{'date': '2014-06-20','review': 102},{'date': '2014-06-21','review': 50},{'date': '2014-06-22','review': 28},{'date': '2014-06-23','review': 10},{'date': '2014-06-24','review': 15},{'date': '2014-06-25','review': 21},{'date': '2014-06-26','review': 9},{'date': '2014-06-27','review': 12},{'date': '2014-06-28','review': 5},{'date': '2014-06-29','review': 2},{'date': '2014-06-30','review': 12},{'date': '2014-07-01','review': 8},{'date': '2014-07-02','review': 1},{'date': '2014-07-03','review': 2}];

  var chart = AmCharts.makeChart("stats_reviews", {
    type: "serial",
    pathToImages: "/lib/amcharts/images/",
    dataProvider: chartData,
    categoryField: "date",
    categoryAxis: {
      parseDates: true,
      gridAlpha: 0.15,
      minorGridEnabled: false,
      axisColor: "#DADADA"
    },
    valueAxes: [{
        axisAlpha: 50,
        id: "review",
        offset: 50,
        axisColor: "#058dc7",
        axisThickness: 2,
        "gridAlpha": 0,
      }],
    
    graphs: [{
        title: "Avis",
        id: "review",
        valueAxis: "review",
        valueField: "review",
        bullet: "round",
        bulletBorderColor: "#FFFFFF",
        bulletBorderAlpha: 1,
        lineThickness: 2,
        lineColor: "#058dc7",
        balloonText: "[[category]]<br><b><span style='font-size:14px;'>Clics: [[value]]</span></b>"
      }],
    chartCursor: {
      cursorPosition: "mouse"
    },
  });

  var legend = new AmCharts.AmLegend();
  legend.useGraphSettings = true;
  legend.valueText = "";
  chart.write("stats_reviews");

  chart.creditsPosition = "bottom-right";

</script>
<?php add('footer'); ?>
