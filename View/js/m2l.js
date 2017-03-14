jQuery(document).ready(function($){

        var $active = false;

    $('.work').click(function(e){
        e.preventDefault();

        var $work = $(this);
        var $detail = $work.parent().nextAll('.row-detail:first');
        var $work_detail = $('.work_detail', $work).clone().show();

        if ($active){
            $active.remove();
        }

        $detail.append($work_detail);
        $active = $work_detail;


    });


});

