<!DOCTYPE html>
<html>
    <head>

        <meta property="og:title" content="TheAssembler" />
        <meta property="og:type" content="assembler" />
        <meta property="og:site_name" content="theassembler.net" />
        <!--
        <meta property="og:url" content="http://203.157.144.140/assembler/index.php?r=blog" />
        -->
        <meta property="fb:app_id" content="1031523923526099" />
        <!--
        <meta property="og:image" content="http://farm7.static.flickr.com/6155/6162536862_306f1bb91c.jpg" />
        -->
        <meta property="fb:admins" content="748720665238823"/>
        <!--
        <meta property="fb:app_id" content="1031523923526099"/>
        <meta property="fb:admins" content="748720665238823"/>
        -->
        <style type="text/css">
            .dp-highlighter{}
            .dp-highlighter > ol{ background: #e7e5dc; border: #e7e5dc solid 1px;}
            .dp-highlighter > ol .alt{ background: #FFF;}
            .dp-highlighter > ol > li { border-left: solid 3px #6ce26c; background: #f8f8f8;}
            .dp-highlighter > ol > li .string{ color: #0000cc;}
        </style>
        
    </head>
    <body>
        <?php

        use yii\helpers\Url;

$this->title = $page['title'];
        $this->params['breadcrumbs'][] = ['label' => $category['blog_category'], 'url' => ['blog_page', 'category_id' => $category['id']]];
        $this->params['breadcrumbs'][] = $this->title;
        ?>
        <div class="well" style=" background: #FFF;">

            <h1 style=" color: #6ce26c;">
                <i class="fa fa-bookmark"></i>
                <?php echo $page['title']; ?></h1>
            <br/>
            <?php echo $page['detail']; ?>

        </div>


        <?php
        $this->registerJs(
                "
            $('.well img').addClass('img-responsive');
        "
        );
        ?>

        <script>
            window.fbAsyncInit = function () {
                FB.init({
                    appId: '1031523923526099',
                    xfbml: true,
                    version: 'v2.4'
                });
            };

            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {
                    return;
                }
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/th_TH/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>

        <div
            class="fb-like"
            data-share="true"
            data-width="450"
            data-show-faces="true">
        </div>

        <!-- Login -->
        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.4&appId=1637139006560611";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <div class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="true" data-auto-logout-link="false"></div>

        <!-- Comment -->
        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {
                    return;
                }
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/th_TH/all.js#xfbml=1";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>

        <!-- ด้านล่างใส่ข้อมูลเกี่ยวกับกล่อง COMMENT ดังนี้
        data-href คือ URL ของหน้าเว็บเพจที่ต้องการให้มีกล่อง Comment
        data-num-posts คือ จำนวน Comment ต่อหน้า
        data-width คือ ความกว้างของกล่อง Comment
        -->
        <!--
        data-href="http://www.codetukyang.com" 
        -->

        <div class="fb-comments" data-num-posts="20" data-href="http://www.theassembler.net/assembler/blog/blog/blog_detail?id=<?php echo $page['id'] ?>&category_id=<?php echo $category['id'] ?>"  data-width="100%"></div>


    </body>
</html>