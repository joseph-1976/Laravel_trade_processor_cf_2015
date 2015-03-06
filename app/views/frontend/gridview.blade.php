@extends('frontend::layout')

@section('content')

<div class="container-fluid" style="margin-top: 50px;">
        <div class="row-fluid">
            <?php
                //echo '<pre>';
                //var_dump($messages);
            ?>
            <div class="portlet box blue-madison">
                    <div class="portlet-title">
                            <div class="caption">
                                    <i class="fa fa-globe"></i>Messages
                            </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="message_grid">
                        <thead>
                        <tr>
                                <th>
                                         ID message
                                </th>
                                <th>
                                         UserId
                                </th>
                                <th>
                                         CurrencyFrom
                                </th>
                                <th>
                                         CurrencyTo
                                </th>
                                <th>
                                         Amount Sell
                                </th>
                                <th>
                                         Amount Buy
                                </th>
                                <th>
                                         Rate
                                </th>
                                <th>
                                         Time Placed
                                </th>
                                <th>
                                         Originating Country
                                </th>
                                <th>
                                         Created at
                                </th>
                        </tr>
                        </thead>
                        <tbody>

                            <?php
                                if (!empty($messages))
                                {
                                    foreach ($messages as $message)
                                    {
                                        echo '<tr id="entry'.$message['id_message'].'">';
                                        echo '<td>'.$message['id_message'].'</td>';
                                        echo '<td>'.$message['userId'].'</td>';
                                        echo '<td>'.$message['currencyFrom'].'</td>';
                                        echo '<td>'.$message['currencyTo'].'</td>';
                                        echo '<td>'.$message['amountSell'].'</td>';
                                        echo '<td>'.$message['amountBuy'].'</td>';
                                        echo '<td>'.$message['rate'].'</td>';
                                        echo '<td>'.$message['timePlaced'].'</td>';
                                        echo '<td>'.$message['originatingCountry'].'</td>';
                                        echo '<td>'.$message['created_at'].'</td>';
                                        echo '</tr>';
                                    }
                                }
                                else{
                                    echo '<tr><td colspan="10">No entries found</td></tr>';
                                }
                            ?>

                        </tbody>
                    </table>
                     
                    <div class="row-fluid" id="alert_div">
                        <a id="more" href='#' onclick='more();return false;' class="btn btn-block blue">Load more entries</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type='text/javascript'>
    var page = 1;
    function more()
    {
        //retrieves more entries from the db and then appends them to grid view
        $.ajax({
            url: '<?php echo URL::to('frontend/moremessages');?>',
            type: 'POST',
            data: 'page='+page,
        }).done(function(msg){
            if (msg !== 'fail'){
                //found more entries
                var info = JSON.parse(msg);
                
                for (var k in info)
                {
                    //append each entry to the table
                    $('#message_grid tbody').append('<tr id="entry'+info[k]['id_message']+'"><td>'+info[k]['id_message']+'</td><td>'+info[k]['userId']+'</td><td>'+info[k]['currencyFrom']+'</td><td>'+info[k]['currencyTo']+'</td><td>'+info[k]['amountSell']+'</td><td>'+info[k]['amountBuy']+'</td><td>'+info[k]['rate']+'</td><td>'+info[k]['timePlaced']+'</td><td>'+info[k]['originatingCountry']+'</td><td>'+info[k]['created_at']+'</td></tr>');
                }
                
                //increment the page counter if the user presses it again
                page++;
            }
            else{//no more entries
                $('#alert_div').prepend('<div class="alert alert-warning">No more entries found.</div>');
                $('#more').attr('onclick', 'return false;');
            }
        }).fail(function(){
            //error handling here
            $('#alert_div').prepend('<div class="alert alert-danger">Oops. Something went wrong.</div>');
            
            //remove functionality from the button to not cause anymore internal problems
            $('#more').attr('onclick', 'return false;');
        });
    }
</script>
@stop