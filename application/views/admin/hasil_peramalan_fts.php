<div class="page-content">
			<!-- BEGIN PAGE HEAD -->
			<div class="page-head">
				<!-- BEGIN PAGE TITLE -->
				<div class="page-title">
					<h1>Dashboard Peramlaan Penderita TB</h1>
				</div>
				<!-- END PAGE TITLE -->
			</div>
			<!-- END PAGE HEAD -->
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb hide">
				<li>
					<a href="javascript:;">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Dashboard
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row margin-top-10">
				<div class="col-lg-12 col-md-3 col-sm-6 col-xs-12">
					<?= $this->session->flashdata('msg') ?>
					<div class="portlet box red">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Grafik Data Aktual dan Peramalan Penderita TB daerah <?= $peramalan_fts['wilayah']?>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div id="chart_2" class="chart">

							</div>
						</div>
					</div>
				</div>
			</div>
           <div class="row margin-top-10">
        <div class="col-md-12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Fuzzy Set 
                    </div>
                </div>
                <div class="portlet-body form">
                        <div class="form-body">                       
                                 <?php 
                                     for($i=1;$i<=sizeof($peramalan_fts["log_pelatihan"]["fuzzy_set"]);$i++){
                                        echo "A".$i." = [ ".$peramalan_fts["log_pelatihan"]["fuzzy_set"]["A".$i][0]." , ".$peramalan_fts["log_pelatihan"]["fuzzy_set"]["A".$i][1]." ] <br>";
                                     }
  
                                 ?>
                        </div>
                </div>
            </div>
        </div>
         <div class="col-md-12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Jumlah Fuzzy Set 
                    </div>
                </div>
                <div class="portlet-body form">
                        <div class="form-body">
                            <?php 
                               for($i=1;$i<=sizeof($peramalan_fts["log_pelatihan"]["jumlah_fuzzy_set"]);$i++){
                                  echo "A".$i." = ".$peramalan_fts["log_pelatihan"]["jumlah_fuzzy_set"]["A".$i]["jumlah"]." <br>";
                               }

                            ?>
                        </div>
                </div>
            </div>
        </div>
       <!--  <div class="col-md-12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Re-divide 
                    </div>
                </div>
                <div class="portlet-body form">
                        <div class="form-body">
                              <?php 
                                     for($i=1;$i<=sizeof($peramalan_fts["log_pelatihan"]["re-divide"]);$i++){
                                        echo "A".$i." = [ ".$peramalan_fts["log_pelatihan"]["re-divide"]["A".$i][0]." , ".$peramalan_fts["log_pelatihan"]["re-divide"]["A".$i][1]." ] <br>";
                                     }
  
                                 ?>
                        </div>
                </div>
            </div>
        </div> -->
        <div class="col-md-12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Himpunan Fuzzy Pada Data
                    </div>
                </div>
                <div class="portlet-body form">
                        <div class="form-body">
                              <?php 
                                     for($i=0;$i<sizeof($peramalan_fts["log_pelatihan"]["himpunan_fuzzy"]);$i++){
                                        echo $peramalan_fts["log_pelatihan"]["himpunan_fuzzy"][$i]["nilai"]." => ".$peramalan_fts["log_pelatihan"]["himpunan_fuzzy"][$i]["fuzzy"]."<br>";
                                     }
  
                                 ?>
                        </div>
                </div>
            </div>
        </div>
         <div class="col-md-12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Fuzzy Logical Relationship
                    </div>
                </div>
                <div class="portlet-body form">
                        <div class="form-body">
                             <?php 
                                     for($i=0;$i<sizeof($peramalan_fts["log_pelatihan"]["flr"]);$i++){
                                        echo $peramalan_fts["log_pelatihan"]["flr"][$i]["current_state"]." => ".$peramalan_fts["log_pelatihan"]["flr"][$i]["next_state"]."<br>";
                                     }
  
                                 ?>
                        </div>
                </div>
            </div>
        </div>
         <div class="col-md-12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Fuzzy Logical Relationship Group
                    </div>
                </div>
                <div class="portlet-body form">
                        <div class="form-body">
                             <?php 
                                  for($i=0;$i<sizeof($peramalan_fts["log_pelatihan"]["flrg"]);$i++){
                                       echo $peramalan_fts["log_pelatihan"]["flrg"][$i]["fuzzy"]." = {"; 
                                       for($j=0;$j<sizeof($peramalan_fts["log_pelatihan"]["flrg"][$i]["group"]);$j++){
                                         echo " ".$peramalan_fts["log_pelatihan"]["flrg"][$i]["group"][$j]." ";
                                       }
                                       echo "}<br>";
                                   }
                                 ?>
                        </div>
                </div>
            </div>
        </div>

    </div>
			<!-- END PAGE CONTENT INNER -->
</div>

<script src="<?= base_url('assets/metronic') ?>/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
   ChartsFlotcharts.initCharts();
});
</script>

<script type="text/javascript">
	var ChartsFlotcharts = function() {

    return {
        //main function to initiate the module

        init: function() {

            Metronic.addResizeHandler(function() {
                Charts.initPieCharts();
            });

        },

        initCharts: function() {

            var wilayah = "<?= $peramalan_fts['wilayah']?>";
            var real = [<?php echo '"'.implode('","', $peramalan_fts["data_real"]).'"' ?>];
            var forecast = [<?php echo '"'.implode('","', $peramalan_fts["data_peramalan"]).'"' ?>];
            var year = [<?php echo '"'.implode('","', $peramalan_fts["tahun"]).'"' ?>];

            if (!jQuery.plot) {
                return;
            }
            function chart2() {
                if ($('#chart_2').size() != 1) {
                    return;
                }

                function randValue() {
                    return (Math.floor(Math.random() * (1 + 40 - 20))) + 20;
                }


                var ramal = [];

                for(i=0;i<year.length;i++){
                    if(i!=0){
                      ramal[i] = [year[i],forecast[i]];
                    }
                }
                
                var aktual = [];
                
                for(i=0;i<year.length;i++){
                    if(i != (year.length)-1){
                       aktual[i] = [year[i],real[i]];
                    }
                }

                var plot = $.plot($("#chart_2"), [{
                    data: ramal,
                    label: "Data Peramlaan FTS",
                    lines: {
                        lineWidth: 1,
                    },
                    shadowSize: 0

                }, {
                    data: aktual,
                    label: "Data Aktual",
                    lines: {
                        lineWidth: 1,
                    },
                    shadowSize: 0
                }], {
                    series: {
                        lines: {
                            show: true,
                            lineWidth: 2,
                            fill: true,
                            fillColor: {
                                colors: [{
                                    opacity: 0.05
                                }, {
                                    opacity: 0.01
                                }]
                            }
                        },
                        points: {
                            show: true,
                            radius: 3,
                            lineWidth: 1
                        },
                        shadowSize: 2
                    },
                    grid: {
                        hoverable: true,
                        clickable: true,
                        tickColor: "#eee",
                        borderColor: "#eee",
                        borderWidth: 1
                    },
                    colors: ["#d12610", "#37b7f3", "#52e136"],
                    xaxis: {
                        ticks: 11,
                        tickDecimals: 0,
                        tickColor: "#eee",
                    },
                    yaxis: {
                        ticks: 11,
                        tickDecimals: 0,
                        tickColor: "#eee",
                    }
                });


                function showTooltip(x, y, contents) {
                    $('<div id="tooltip">' + contents + '</div>').css({
                        position: 'absolute',
                        display: 'none',
                        top: y + 5,
                        left: x + 15,
                        border: '1px solid #333',
                        padding: '4px',
                        color: '#fff',
                        'border-radius': '3px',
                        'background-color': '#333',
                        opacity: 0.80
                    }).appendTo("body").fadeIn(200);
                }

                var previousPoint = null;
                $("#chart_2").bind("plothover", function(event, pos, item) {
                    $("#x").text(pos.x.toFixed(1));
                    $("#y").text(pos.y.toFixed(1));

                    if (item) {
                        if (previousPoint != item.dataIndex) {
                            previousPoint = item.dataIndex;

                            $("#tooltip").remove();
                            var x = item.datapoint[0].toFixed(0),
                                y = item.datapoint[1].toFixed(0);

                            showTooltip(item.pageX, item.pageY, item.series.label + " Tahun " + x + " = " + y);
                        }
                    } else {
                        $("#tooltip").remove();
                        previousPoint = null;
                    }
                });
            }
            //graph
            chart2();
        },
    };

}();
</script>