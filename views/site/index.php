<?php

use yii\helpers\Url;
?>
<!--[if gte IE 7]><!-->
<!--
<link rel="stylesheet" media="screen, projection" href="https://d13yacurqjgara.cloudfront.net/assets/master-8b6cff77670d4e325d704b907284a82d.css" />
-->
<div id="portfolio-show"></div>
<div align="center">
    <a class="btn btn-default wow fadeInUp load_more" id="load_more_button">
        <span class="btnicon icon-social-dribbble"></span>
        <span class="button_text">View all items</span>
    </a> 
    <div class="animation_image" style="display:none;"> Loading...</div>
</div>

<!-- LiteBox Images -->
<div class="modal" id="dialog_images" role="dialog" style=" background: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style=" background: none;">
            <div class="modal-body">
                <div id="img_name"></div>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    function dialog_images(img_name) {
        var link = "<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">"
                + "<span class=\"glyphicon glyphicon-remove\" style=\" color: #FFF;\"></span></button>"
                + "<center><img src='<?php echo Url::base(); ?>/upload/" + img_name + "' class=\"img-responsive img-thumbnail\"/></center>";
        $("#img_name").html(link);
        $("#dialog_images").modal();
    }

</script>

<?php
$this->registerJs(
        "
    $(document).ready(function() {
        var track_click = 0; //track user click on 'load more' button, righ now it is 0 click
        var total_pages = '$total_pages';
        $('#portfolio-show').load('" . Url::to(['site/getmore']) . "', {'page':track_click}, function() {track_click++;}); //initial data to load
        $('.load_more').click(function (e) { 
            $(this).hide();
            $('.animation_image').show(); 
        
            if(track_click <= total_pages) {
                $.post('" . Url::to(['site/getmore']) . "',{'page': track_click}, function(data) {
                    $('.load_more').show(); 
                    $('#portfolio-show').append(data);
                //scroll page to button element
                //$('html, body').animate({scrollTop: $('#load_more_button').offset().top}, 500);
                //hide loading image
                $('.animation_image').hide(); //hide loading image once data is received
                track_click++; //user click increment on load button
            }).fail(function(xhr, ajaxOptions, thrownError) {
                alert(thrownError); //alert any HTTP error
                $('.load_more').show(); //bring back load more button
                $('.animation_image').hide(); //hide loading image once data is received
            });


            if(track_click >= total_pages-1){
                $('.load_more').attr('disabled', 'disabled');
            }
        }

    });
  });  "
);
?>





