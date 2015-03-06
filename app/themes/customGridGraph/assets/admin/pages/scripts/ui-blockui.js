var UIBlockUI = function () {

    var handleSample1 = function () {

        $('#blockui_sample_1_1').click(function(){
            customGridGraph.blockUI({
                target: '#blockui_sample_1_portlet_body'
            });

            window.setTimeout(function () {
                customGridGraph.unblockUI('#blockui_sample_1_portlet_body');
            }, 2000);
        });

        $('#blockui_sample_1_2').click(function(){
            customGridGraph.blockUI({
                target: '#blockui_sample_1_portlet_body',
                boxed: true
            });

            window.setTimeout(function () {
                customGridGraph.unblockUI('#blockui_sample_1_portlet_body');
            }, 2000);
        });
    }

    var handleSample2 = function () {

        $('#blockui_sample_2_1').click(function(){
            customGridGraph.blockUI();

            window.setTimeout(function () {
                customGridGraph.unblockUI();
            }, 2000);
        });

        $('#blockui_sample_2_2').click(function(){
            customGridGraph.blockUI({boxed: true});

            window.setTimeout(function () {
                customGridGraph.unblockUI();
            }, 2000);
        });


        $('#blockui_sample_2_3').click(function(){
            customGridGraph.startPageLoading('Please wait...');

            window.setTimeout(function () {
                customGridGraph.stopPageLoading();
            }, 2000);
        });

    }

    var handleSample3 = function () {

         $('#blockui_sample_3_1_0').click(function(){
            customGridGraph.blockUI({
                target: '#basic',
                overlayColor: 'none',
                cenrerY: true,
                boxed: true
            });

            window.setTimeout(function () {
                customGridGraph.unblockUI('#basic');
            }, 2000);
        });

         $('#blockui_sample_3_1').click(function(){
            customGridGraph.blockUI({
                target: '#blockui_sample_3_1_element',
                overlayColor: 'none',
                boxed: true
            });
        });

         $('#blockui_sample_3_1_1').click(function(){
            customGridGraph.unblockUI('#blockui_sample_3_1_element');
        });

        $('#blockui_sample_3_2').click(function(){
            customGridGraph.blockUI({
                target: '#blockui_sample_3_2_element',
                boxed: true
            });
        });

         $('#blockui_sample_3_2_1').click(function(){
            customGridGraph.unblockUI('#blockui_sample_3_2_element');
        });



    }

    var handleSample4 = function () {

        $('#blockui_sample_4_1').click(function(){
            customGridGraph.blockUI({
                target: '#blockui_sample_4_portlet_body',
                boxed: true,
                message: 'Processing...'
            });

            window.setTimeout(function () {
                customGridGraph.unblockUI('#blockui_sample_4_portlet_body');
            }, 2000);
        });

        $('#blockui_sample_4_2').click(function(){
            customGridGraph.blockUI({
                target: '#blockui_sample_4_portlet_body',
                iconOnly: true
            });

            window.setTimeout(function () {
                customGridGraph.unblockUI('#blockui_sample_4_portlet_body');
            }, 2000);
        });

        $('#blockui_sample_4_3').click(function(){
            customGridGraph.blockUI({
                target: '#blockui_sample_4_portlet_body',
                boxed: true,
                textOnly: true
            });

            window.setTimeout(function () {
                customGridGraph.unblockUI('#blockui_sample_4_portlet_body');
            }, 2000);
        });
    }

   
    return {
        //main function to initiate the module
        init: function () {

           handleSample1();
           handleSample2();
           handleSample3();
           handleSample4();

        }

    };

}();