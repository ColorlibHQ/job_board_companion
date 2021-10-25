(function ($) {
    'use strict';

    //  Job_Board load more button Ajax

    var $loadbutton = $('.loadAjax');

    if ($loadbutton.length) {

        var postNumber = job_boardloadajax.postNumber,
            Incr = 0;
        //
        $loadbutton.on('click', function () {


            Incr = Incr + parseInt(postNumber);

            var $button = $(this),
                $data;

            $data = {
                'action': 'job_board_job_board_ajax',
                'postNumber': postNumber,
                'postIncrNumber': Incr,
                'elsettings': job_boardloadajax.elsettings
            };

            $.ajax({

                url: job_boardloadajax.action_url,
                data: $data,
                type: 'POST',


                success: function (data) {

                    $('.job_board-job_board-load').html(data);

                    var $container = $('.job_board-job_board');

                    $container.isotope('reloadItems').isotope({
                        itemSelector: '.single_gallery_item',
                        percentPosition: true,
                        masonry: {
                            columnWidth: '.single_gallery_item'
                        }
                    });

                    var loaditems = parseInt(Incr) + parseInt(postNumber);

                    if (job_boardloadajax.totalitems == loaditems) {
                        $button.hide();
                    }

                }

            });

            return false;

        });


    }


})(jQuery);