<?php 
   $year = array();
   $jumlah = array();
   for($i=0;$i<sizeof($penderita);$i++){
       array_push($year, $penderita[$i]->tahun);
       array_push($jumlah, $penderita[$i]->jumlah);
   }
?>
<div class="page-content">
			<!-- BEGIN PAGE HEAD -->
			<div class="page-head">
				<!-- BEGIN PAGE TITLE -->
				<div class="page-title">
					<h1>Dashboard</h1>
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
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat2">
						<a href="<?= base_url('dinkes/data-penderita-tb') ?>">
							<div class="display">
								<div class="number">
									<h3 class="font-green-sharp"><?= count($penderita) ?></h3>
									<small>Data Penderita TB</small>
								</div>
								<div class="icon">
									<i class="icon-list"></i>
								</div>
							</div>
							<div class="progress-info">
								<div class="progress">
									<span style="width: 100%;" class="progress-bar progress-bar-success green-sharp">
									</span>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
			<div class="row margin-top-10">
				<div class="col-lg-12 col-md-3 col-sm-6 col-xs-12">
					<div class="portlet box red">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Data Penderita Tb
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
            var data = [];
        	var tahun = [<?php echo '"'.implode('","',$year).'"' ?>];
        	var jumlah = [<?php echo '"'.implode('","',$jumlah).'"' ?>];

        	for(i=0;i<tahun.length;i++){
               data[i] = [tahun[i],jumlah[i]];
        	}

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


               

                var plot = $.plot($("#chart_2"), [{
                    data: data,
                    label: "",
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

                            showTooltip(item.pageX, item.pageY, item.series.label +y);
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