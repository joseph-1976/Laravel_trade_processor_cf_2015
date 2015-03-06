<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src=".<?php echo ThemePath::getPath('local');?>/assets/global/plugins/respond.min.js"></script>
<script src="<?php echo ThemePath::getPath('local');?>/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="<?php echo ThemePath::getPath('local');?>/assets/global/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo ThemePath::getPath('local');?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo ThemePath::getPath('local');?>/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo ThemePath::getPath('local');?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo ThemePath::getPath('local');?>/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo ThemePath::getPath('local');?>/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo ThemePath::getPath('local');?>/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo ThemePath::getPath('local');?>/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->

<script type="text/javascript" src="<?php echo ThemePath::getPath('local');?>/assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo ThemePath::getPath('local');?>/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo ThemePath::getPath('local');?>/assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="<?php echo ThemePath::getPath('local');?>/assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="<?php echo ThemePath::getPath('local');?>/assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="<?php echo ThemePath::getPath('local');?>/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

<script src="<?php echo ThemePath::getPath('local');?>/assets/global/plugins/flot/jquery.flot.min.js"></script>
<script src="<?php echo ThemePath::getPath('local');?>/assets/global/plugins/flot/jquery.flot.resize.min.js"></script>
<script src="<?php echo ThemePath::getPath('local');?>/assets/global/plugins/flot/jquery.flot.pie.min.js"></script>
<script src="<?php echo ThemePath::getPath('local');?>/assets/global/plugins/flot/jquery.flot.stack.min.js"></script>
<script src="<?php echo ThemePath::getPath('local');?>/assets/global/plugins/flot/jquery.flot.crosshair.min.js"></script>
<script src="<?php echo ThemePath::getPath('local');?>/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo ThemePath::getPath('local');?>/assets/global/scripts/customGridGraph.js" type="text/javascript"></script>
<script src="<?php echo ThemePath::getPath('local');?>/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo ThemePath::getPath('local');?>/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="<?php echo ThemePath::getPath('local');?>/assets/admin/pages/scripts/table-advanced.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {       
    // initiate layout and plugins
    customGridGraph.init(); // init customGridGraph core components
    Layout.init(); // init current layout
    QuickSidebar.init() // init quick sidebar
});
</script>