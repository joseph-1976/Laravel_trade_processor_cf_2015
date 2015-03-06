@extends('frontend::layout')

@section('content')

<div class="container-fluid" style="margin-top: 50px;">
    <!-- home options -->
    <div class="row-fluid">
        <div class="portlet box blue">
                    <div class="portlet-title">
                            <div class="caption">
                                    <i class="fa fa-gift"></i>Select currency pair
                            </div>
                    </div>
                    <div class="portlet-body">
                            Select a currency pair from the existing data:<br>
                            <select id="currency_pair_sel">
                                <option>None selected</option>
                                <?php
                                    if (!empty($pairs))
                                    {
                                        foreach ($pairs as $id => $pair)
                                        {
                                            echo '<option value="'.$pair['to'].'-'.$pair['from'].'">'.$pair['to'].' - '.$pair['from'].'</option>';
                                        }
                                    }
                                ?>
                            </select>
                    </div>
            </div>
        
    </div>
    <div class="row-fluid">
            <!-- BEGIN BASIC CHART PORTLET-->
            <div class="portlet box blue">
                    <div class="portlet-title">
                            <div class="caption">
                                    <i class="fa fa-gift"></i>Transaction Volume
                            </div>
                    </div>
                    <div class="portlet-body">
                            <div id="volumes_legendPlaceholder">
                            </div>
                            <div id="volumes" class="chart">
                            </div>
                    </div>
            </div>
            <!-- END BASIC CHART PORTLET-->
    </div>
    <!-- end home options !-->
</div>

<script type="text/javascript">
    var global_data;
    var global_y_labels;
    //renders data to a graph chart with tooltip per point
    function Chart(data)
    {
            var options = {
                    series:{
                        lines: {
                                show: true,
                                lineWidth: 2,
                                fill: true,
                                fillColor: {
                                    colors: [{
                                            opacity: 0.05
                                        }, {
                                            opacity: 0.01
                                        }
                                    ]
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
                            
                    xaxis: {
				mode: "categories",
				tickLength: 0,
                                font: {
                                    color: '#ffffff'
                                }
                        },
            };
 
            $.plot($("#volumes"),
             [{
                data: data,
                lines: {
                    lineWidth: 1,
                },
                shadowSize: 0
             }]
             , options);
             
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
                $("#volumes").bind("plothover", function (event, pos, item) {
                    $("#x").text(pos.x.toFixed(2));
                    $("#y").text(pos.y.toFixed(2));

                    if (item) {
                        if (previousPoint != item.dataIndex) {
                            previousPoint = item.dataIndex;

                            $("#tooltip").remove();
                            var x = item.datapoint[0].toFixed(2),
                                y = item.datapoint[1].toFixed(2);

                            showTooltip(item.pageX, item.pageY, global_y_labels[parseInt(x)]+' - '+y);
                        }
                    } else {
                        $("#tooltip").remove();
                        previousPoint = null;
                    }
                });
    }
    
    function genDataForPair(to, from)
    {
        $.ajax({
            url: '<?php echo URL::to('frontend/transactionvolume');?>',
            type: 'POST',
            data: 'from='+from+'&to='+to
        }).done(
            function(msg)
            {
                if (msg !== 'fail')
                {
                    var info = JSON.parse(msg);
                    global_data = [];
                    global_y_labels = [];
                    var counter = 0;
                    for (var k in info)
                    {
                        global_data.push([k, info[k]]);
                        global_y_labels[counter] = k;
                        counter++;
                    }
                    Chart(global_data);
                }
            }
        ).fail();
    }
    
    $('#currency_pair_sel').on('change', function(){
        //console.dir($('#currency_pair_sel').val());
        var pair = $('#currency_pair_sel').val().split('-');
        genDataForPair(pair[0], pair[1]);
    });
</script>
@stop