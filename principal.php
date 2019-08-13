<?php
include "menu.php";
include "config.php";
$idusuario= $_SESSION['idusuariocicspro'];
?>
<style>
@media screen and (min-width: 50px) and (max-width: 640px) {
#teste { 
position:absolute;
left:-10%;

overflow-x: scroll;
    overflow-y: hidden;
    white-space: nowrap;
    width: 400px;
 } 
}
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Inicio
        <small>Controle do painel</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
            <?php
            $sql = "SELECT quantidade FROM valorsms WHERE idusuario='$idusuario'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()) {
                  $sms=$row["quantidade"];
                }
              }
              
            ?>
              <h3><?php echo"$sms"; ?></h3>

              <p>Crédito(s)</p>
            </div>
            <div class="icon">
              <i class="fa fa-wechat"></i>
            </div>
            <a href="#" class="small-box-footer">
              Mais informações <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <?php
            $sql = "SELECT COUNT(id) AS a FROM registro WHERE idusuario='$idusuario'";
            $result = $conn->query($sql);
            
            if (@$result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  $registro=$row["a"];
                }
              }
              if (@$registro == NULL){
                $registro = 0;
              } 
            ?>
              <h3><?php echo"$registro" ?></h3>

              <p>Envio(s)</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="registro.php" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            <?php
            $sql = "SELECT COUNT(id) AS b FROM usuario WHERE idusuario='$idusuario'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  $usuario=$row["b"];
                }
              }
              
            ?>
              <h3><?php echo"$usuario" ?></h3>

              <p>Usuario(s)</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <?php
            if ($_SESSION['tipocicspro'] == "admin"){
                ?>
            <a href="tableusuario.php" class="small-box-footer">Mais informações<i class="fa fa-arrow-circle-right"></i></a>
        
            <?php
        }
        else{
          ?>
          <a href="" class="small-box-footer">Sem informações</a>
          
          <?php
        }
            ?>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            <?php
            $sql = "SELECT COUNT(id) AS c FROM sms WHERE idusuario='$idusuario'";
            $result = $conn->query($sql);
            
            if (@$result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  $sms=$row["c"];
                }
              }
              if (@$sms == NULL){
                $sms = 0;
              } 
            ?>
              <h3><?php echo"$sms" ?></h3>

              <p>Telefone(s)</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            
            <a href="tablesms.php" class="small-box-footer">Mais informações<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <!-- ./col -->
      </div>
      <div class="col-md-6">
          <div class="box box-solid">
          <?php
	$mes =date('m');
	$sql = "SELECT enviado, dia, mes FROM registro WHERE mes = '$mes' and idusuario='$idusuario'";
$result = $conn->query($sql);

?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['dia', 'enviado'],
      <?php  
              while($row = $result->fetch_assoc()) {
                 echo "['".$row["dia"]."', ".$row["enviado"]."],";  
              }  
            ?> 
    ]);

    var options = {
      title: 'Company Performance',
      curveType: 'function',
      legend: { position: 'bottom' }
    };

    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

    chart.draw(data, options);
  }
</script>

<div id="teste">
<div id="curve_chart" style="width: 900px; height: 300px"></div>

            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
</div>
</div>

      <!-- /.row -->
      <!-- Main row -->
     
      
            <!-- /.chat -->
            
            <!-- /.box-header -->
            
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
  include"footer.php";
  ?>

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
  $(function () {
    /* jQueryKnob */
    $(".knob").knob({
      /*change : function (value) {
       //console.log("change : " + value);
       },
       release : function (value) {
       console.log("release : " + value);
       },
       cancel : function () {
       console.log("cancel : " + this.value);
       },*/
      draw: function () {
        // "tron" case
        if (this.$.data('skin') == 'tron') {
          var a = this.angle(this.cv)  // Angle
              , sa = this.startAngle          // Previous start angle
              , sat = this.startAngle         // Start angle
              , ea                            // Previous end angle
              , eat = sat + a                 // End angle
              , r = true;
          this.g.lineWidth = this.lineWidth;
          this.o.cursor
          && (sat = eat - 0.3)
          && (eat = eat + 0.3);
          if (this.o.displayPrevious) {
            ea = this.startAngle + this.angle(this.value);
            this.o.cursor
            && (sa = ea - 0.3)
            && (ea = ea + 0.3);
            this.g.beginPath();
            this.g.strokeStyle = this.previousColor;
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
            this.g.stroke();
          }
          this.g.beginPath();
          this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
          this.g.stroke();
          this.g.lineWidth = 2;
          this.g.beginPath();
          this.g.strokeStyle = this.o.fgColor;
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
          this.g.stroke();
          return false;
        }
      }
    });
    /* END JQUERY KNOB */
    //INITIALIZE SPARKLINE CHARTS
    $(".sparkline").each(function () {
      var $this = $(this);
      $this.sparkline('html', $this.data());
    });
    /* SPARKLINE DOCUMENTATION EXAMPLES http://omnipotent.net/jquery.sparkline/#s-about */
    drawDocSparklines();
    drawMouseSpeedDemo();
  });
  function drawDocSparklines() {
    // Bar + line composite charts
    $('#compositebar').sparkline('html', {type: 'bar', barColor: '#aaf'});
    $('#compositebar').sparkline([4, 1, 5, 7, 9, 9, 8, 7, 6, 6, 4, 7, 8, 4, 3, 2, 2, 5, 6, 7],
        {composite: true, fillColor: false, lineColor: 'red'});
    // Line charts taking their values from the tag
    $('.sparkline-1').sparkline();
    // Larger line charts for the docs
    $('.largeline').sparkline('html',
        {type: 'line', height: '2.5em', width: '4em'});
    // Customized line chart
    $('#linecustom').sparkline('html',
        {
          height: '1.5em', width: '8em', lineColor: '#f00', fillColor: '#ffa',
          minSpotColor: false, maxSpotColor: false, spotColor: '#77f', spotRadius: 3
        });
    // Bar charts using inline values
    $('.sparkbar').sparkline('html', {type: 'bar'});
    $('.barformat').sparkline([1, 3, 5, 3, 8], {
      type: 'bar',
      tooltipFormat: '{{value:levels}} - {{value}}',
      tooltipValueLookups: {
        levels: $.range_map({':2': 'Low', '3:6': 'Medium', '7:': 'High'})
      }
    });
    // Tri-state charts using inline values
    $('.sparktristate').sparkline('html', {type: 'tristate'});
    $('.sparktristatecols').sparkline('html',
        {type: 'tristate', colorMap: {'-2': '#fa7', '2': '#44f'}});
    // Composite line charts, the second using values supplied via javascript
    $('#compositeline').sparkline('html', {fillColor: false, changeRangeMin: 0, chartRangeMax: 10});
    $('#compositeline').sparkline([4, 1, 5, 7, 9, 9, 8, 7, 6, 6, 4, 7, 8, 4, 3, 2, 2, 5, 6, 7],
        {composite: true, fillColor: false, lineColor: 'red', changeRangeMin: 0, chartRangeMax: 10});
    // Line charts with normal range marker
    $('#normalline').sparkline('html',
        {fillColor: false, normalRangeMin: -1, normalRangeMax: 8});
    $('#normalExample').sparkline('html',
        {fillColor: false, normalRangeMin: 80, normalRangeMax: 95, normalRangeColor: '#4f4'});
    // Discrete charts
    $('.discrete1').sparkline('html',
        {type: 'discrete', lineColor: 'blue', xwidth: 18});
    $('#discrete2').sparkline('html',
        {type: 'discrete', lineColor: 'blue', thresholdColor: 'red', thresholdValue: 4});
    // Bullet charts
    $('.sparkbullet').sparkline('html', {type: 'bullet'});
    // Pie charts
    $('.sparkpie').sparkline('html', {type: 'pie', height: '1.0em'});
    // Box plots
    $('.sparkboxplot').sparkline('html', {type: 'box'});
    $('.sparkboxplotraw').sparkline([1, 3, 5, 8, 10, 15, 18],
        {type: 'box', raw: true, showOutliers: true, target: 6});
    // Box plot with specific field order
    $('.boxfieldorder').sparkline('html', {
      type: 'box',
      tooltipFormatFieldlist: ['med', 'lq', 'uq'],
      tooltipFormatFieldlistKey: 'field'
    });
    // click event demo sparkline
    $('.clickdemo').sparkline();
    $('.clickdemo').bind('sparklineClick', function (ev) {
      var sparkline = ev.sparklines[0],
          region = sparkline.getCurrentRegionFields();
      value = region.y;
      alert("Clicked on x=" + region.x + " y=" + region.y);
    });
    // mouseover event demo sparkline
    $('.mouseoverdemo').sparkline();
    $('.mouseoverdemo').bind('sparklineRegionChange', function (ev) {
      var sparkline = ev.sparklines[0],
          region = sparkline.getCurrentRegionFields();
      value = region.y;
      $('.mouseoverregion').text("x=" + region.x + " y=" + region.y);
    }).bind('mouseleave', function () {
      $('.mouseoverregion').text('');
    });
  }
  /**
   ** Draw the little mouse speed animated graph
   ** This just attaches a handler to the mousemove event to see
   ** (roughly) how far the mouse has moved
   ** and then updates the display a couple of times a second via
   ** setTimeout()
   **/
  function drawMouseSpeedDemo() {
    var mrefreshinterval = 500; // update display every 500ms
    var lastmousex = -1;
    var lastmousey = -1;
    var lastmousetime;
    var mousetravel = 0;
    var mpoints = [];
    var mpoints_max = 30;
    $('html').mousemove(function (e) {
      var mousex = e.pageX;
      var mousey = e.pageY;
      if (lastmousex > -1) {
        mousetravel += Math.max(Math.abs(mousex - lastmousex), Math.abs(mousey - lastmousey));
      }
      lastmousex = mousex;
      lastmousey = mousey;
    });
    var mdraw = function () {
      var md = new Date();
      var timenow = md.getTime();
      if (lastmousetime && lastmousetime != timenow) {
        var pps = Math.round(mousetravel / (timenow - lastmousetime) * 1000);
        mpoints.push(pps);
        if (mpoints.length > mpoints_max)
          mpoints.splice(0, 1);
        mousetravel = 0;
        $('#mousespeed').sparkline(mpoints, {width: mpoints.length * 2, tooltipSuffix: ' pixels per second'});
      }
      lastmousetime = timenow;
      setTimeout(mdraw, mrefreshinterval);
    };
    // We could use setInterval instead, but I prefer to do it this way
    setTimeout(mdraw, mrefreshinterval);
  }
</script>

</body>
</html>