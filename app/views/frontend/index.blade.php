@extends('frontend::layout')

@section('content')

<div class="container-fluid" style="margin-top: 50px;">
    <!-- home options -->
    <div class="row-fluid">
            <div class="col-md-12">
                    <div class="dashboard-stat blue-madison">
                            <div class="visual">
                                    <i class="fa fa-comments"></i>
                            </div>
                            <div class="details">
                                    <div class="number">
                                             Message Gridview
                                    </div>
                            </div>
                            <a class="more" href="<?php echo URL::to('frontend/gridview')?>">
                            Go <i class="m-icon-swapright m-icon-white"></i>
                            </a>
                    </div>
            </div>
    </div>
    
    <div class="row-fluid">
            <div class="col-md-12">
                    <div class="dashboard-stat blue-madison">
                            <div class="visual">
                                    <i class="fa fa-comments"></i>
                            </div>
                            <div class="details">
                                    <div class="number">
                                             Message Analytics
                                    </div>
                            </div>
                            <a class="more" href="<?php echo URL::to('frontend/analytics')?>">
                            Go <i class="m-icon-swapright m-icon-white"></i>
                            </a>
                    </div>
            </div>
    </div>
    <!-- end home options !-->
</div>
@stop