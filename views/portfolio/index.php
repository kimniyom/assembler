<?php

use yii\helpers\Url;
?>
<!--[if gte IE 7]><!-->
<!--
<link rel="stylesheet" media="screen, projection" href="https://d13yacurqjgara.cloudfront.net/assets/master-8b6cff77670d4e325d704b907284a82d.css" />
-->
<ol class="dribbbles group" style="padding-left: 0px;">
    <?php for ($i = 0; $i <= 10; $i++): ?>
        <li id="screenshot-<?php echo $i; ?>" class="col-lg-3 col-md-4 col-sm-6">
            <div class="dribbble">
                <div class="dribbble-shot">
                    <div class="dribbble-img">
                        <a class="dribbble-link" href="/shots/2166663-Retinabbble-Chrome-extension-for-dribbble">
                            <div data-picture data-alt="Retinabbble - Chrome extension for dribbble">
                                <img src="<?php echo Url::to('web/themes/Even/img/hero-img.png') ?>"/>
                            </div>
                        </a>
                        <a class="dribbble-over" href="/shots/2166663-Retinabbble-Chrome-extension-for-dribbble">    
                            <div class="btn btn-default" style="margin-top: 30%; border-radius: 0px; border: solid #00b3ee 1px;">
                                <span class="glyphicon glyphicon-fullscreen"> </span> ขยาย
                            </div>
                        </a>
                    </div>

                    <ul class="tools group">
                        <li class="fav">
                            <a title="View fans of this shot" href="/shots/2166663-Retinabbble-Chrome-extension-for-dribbble/fans">20</a>
                        </li>
                        <li class="cmnt">
                            <span>
                                2
                            </span>
                        </li>
                        <li class="views">
                            <span>67</span>
                        </li>
                    </ul>

                </div>
            </div>
        </li>
    <?php endfor; ?>

</ol>






