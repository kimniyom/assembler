<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use app\assets\ThemesAsset;

/* @var $this \yii\web\View */
/* @var $content string */

ThemesAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?php echo Url::to('@web/images/A_LOGO.png') ?>" type="image/x-icon" />
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <!--
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Antic|Raleway:300">
        -->

        <?php $this->head() ?>
    </head>
    <body data-spy="scroll">

        <?php $this->beginBody() ?>
        <!-- Preloader -->
        <div id="preloader">           
            <div id="status">
                <img src="<?php echo Url::to('@web/web/themes/Even/img/assembler_logo.png') ?>" height="80">
                <!--
                <div class="loadicon icon-moustache wow tada infinite" data-wow-duration="8s"></div>
                -->
            </div>
        </div>

        <header>               
            <!-- ===========================
            HERO AREA
            =========================== -->
            <div id="hero">   
                <div id="hero-in">
                    <div class="container herocontent">               
                        <h2 class="wow fadeInUp" data-wow-duration="2s">
                            <img src="<?php echo Url::to('@web/web/themes/Even/img/A_LOGO_W_full.png') ?>" height="80">
                        </h2>                
                        <h4 class="wow fadeInDown" data-wow-duration="3s" id="ff">The Assembler เป็นผู้ให้บริการทางด้านจัดทำเว็บไซต์ ไม่ว่าจะเป็นเว็บไซต์สำนักงาน องค์กร หรือเว็บไซต์ส่วนตัว รวมไปถึงทางด้านการออกแบบ Web Design ตามที่ลูกค้าต้องการ</h4>            
                    </div>
                    <!-- Featured image on the Hero area -->
                    <img class="heroshot wow bounceInUp" data-wow-duration="4s" src="<?php echo Url::to('@web/web/themes/Even/img/hero-img-new.png') ?>" alt="Featured Work">            
                </div>
            </div><!--HERO AREA END-->        

            <!-- ===========================
             NAVBAR START
             =========================== -->
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style=" border:none; background:url('<?php echo Url::to('@web/web/themes/Even/img/shadow-w.png') ?>');">
                <div class="container">

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <a class="navbar-brand" href="#hero">
                            <!-- Replace Drifolio Bootstrap with your Site Name and remove icon-grid to remove the placeholder icon -->
                            <!--
                            <span class="brandicon icon-grid"></span>
                            -->
                            <span class="brandname"><img src="<?php echo Url::to('@web/web/themes/Even/img/A_LOGO.png') ?>" height="24">The Assembler</span>
                        </a>
                    </div>

                    <div class="collapse navbar-collapse" style=" font-size: 18px;" id="ff-b">
                        <ul class="nav navbar-nav navbar-right"><!--YOUR NAVIGATION ITEMS STRAT BELOW-->
                            <li><a href="#about"><span class="btnicon icon-user"></span>เกี่ยวกับเรา</a></li>
                            <li><a href="#services"><span class="btnicon icon-cup"></span>บริการของเรา</a></li>
                            <li><a href="#portfolio"><span class="btnicon icon-rocket"></span>ผลงาน</a></li>
                            <li><a href="#testimonials"><span class="btnicon icon-bubble"></span>ทีมงาน</a></li>
                            <!--don't forget to replace my email address below with yours-->
                            <li><a href="mailto:m@creatrix.us"><span class="btnicon icon-envelope-open"></span>ติดต่อเรา</a></li>
                        </ul>
                    </div><!--.nav-collapse -->
                </div>
            </nav><!--navbar end-->        
        </header><!--header end-->     

        <!-- ===========================
        FEATURED CLIENTS SECTION START
        =========================== -->



        <!-- ===========================
        ABOUT SECTION START
        =========================== -->
        <div id="about-full" class="container-fluid">
            <div id="about" class="container">

                <!-- LEFT PART OF THE ABOUT SECTION -->
                <div class="col-md-6">
                    <div class="row">
                        <h2 class="wow fadeInDown" data-wow-duration="2s" style=" color: #ffcc00;" id="ff-b">เกี่ยวกับ The Assembler</h2>

                        <h4 class="wow fadeInUp" data-wow-duration="3s" style=" color: #ffff33;" id="ff-b">
                            The Assembler ทางเลือกใหม่สำหรับคุณ
                        </h4><br/>

                        <p class="wow fadeInDown" data-wow-duration="3s" style=" color: #FFF; font-size: 16px;" id="ff">
                            &nbsp;&nbsp;&nbsp;&nbsp;ปัจจุบันได้มีตัวช่วยเครื่องไม้เครื่องมือต่าง ๆ สำหรับการพัฒนา Web Application ที่มากมายหลายอย่าง
                            ซึ่งสิ่งเหล่านั้น ล้วนแล้วแต่ถูกสันสร้างมาให้เป็นมาตรฐานตามหลักสากลที่มีแบบแผนการพัฒนาโปรแกรมได้
                            ซึ่งรวมไปถึงมันทำให้ง่ายต่อการต่อยอดการพัฒนาที่ยุ่งยากในระดับองค์กร และสิ่งเหล่านี้ทำให้ลดเวลาการ
                            พัฒนาโปรแกรมที่เป็นระบบใหญ่ ๆ ทั้งที่เป็นองค์กรเล็ก ๆ ไปจนถึงองค์กรระดับใหญ่ ๆ
                            ให้เสร็จได้ในเวลาที่สั้นลง เพราะเราได้นำส่วนประกอบที่เป็นจุดเด็ด ต่าง ๆ ของสิ่งเหล่านั้น
                            มาประกอบรวมกันให้สามารถตอบโจทย์ได้เป็นสิ่งที่คุณต้องการอย่างลงตัว เพราะนี่คือ The Assembler
                            <br/><br/>


                            &nbsp;&nbsp;&nbsp;&nbsp; The Assembler เริ่มต้นขึ้นจากการเจอกันของคน 3 คนซึ่งด้วยหน้าที่การงานทำให้เรารู้จักกัน และได้ทำงานร่วมกันมานาน 
                            ทำโปรเจคช่วยคนอื่นบ้าง หาเทคโนโลยีใหม่ ๆ มาลองบ้าง ให้คำปรึกษาคนอื่นบ้าง 
                            ตอนแรก ๆ ก็รับงานแบบบอกต่อกันไปในแวดวง จนทำไปทำมามันเริ่มเยอะขึ้น จนถึงวันหนึ่งเราน่าจะมีหน้าเว็บไว้ให้คนอื่นติดต่อเป็นทางการเสียที 
                            จึงทำให้เกิดเว็บไซต์ Assemble ขึ้น
                        </p>

                    </div> <!-- ABOUT INFO END -->


                    <div class="myapps row">

                        <ul><!-- FAVORITE APP ICONS START -->
                            <img src="<?php echo Url::to('@web/web/themes/Even/img/A_LOGO_W_full.png') ?>" style=" height: 100px;">
                        </ul><!-- FAVORITE APP ICONS END -->
                    </div>
                </div><!-- LEFT PART OF THE ABOUT SECTION END -->
                <!--Left part end-->

                <!-- RIGHT PART OF THE ABOUT SECTION -->
                <div class="col-md-6 wow fadeInUp myphoto" data-wow-duration="4s">
                    <img src="<?php echo Url::to('@web/web/themes/Even/img/user.png') ?>" alt="Mamun Srizon">
                </div><!-- RIGHT PART OF THE ABOUT SECTION END -->        
            </div><!-- ABOUT SECTION END -->
        </div>


        <!-- ===========================
        SERVICE SECTION START
        =========================== -->

        <div id="services" class="container-fluid" style=" padding-bottom: 20px;">
            <div class="container" id="ff">
                <!-- SERVICE SECTION HEADING START -->
                <div class="sectionhead  row wow fadeInUp">
                    <span class="bigicon icon-cup "></span>
                    <h3 id="ff-b">บริการของเรา</h3>
                    <hr class="separetor">
                </div><!--SERVICE SECTION HEADING END-->

                <!-- SERVICE ITEMS START -->
                <div class="row">
                    <div class="col-md-6 col-lg-5 wow fadeInUp" data-wow-duration="3s">
                        <img src="<?php echo Url::to('@web/web/themes/Even/img/s1.png') ?>" alt="">
                        <h4 id="ff-b">Web Design</h4>
                        <p>รับออกแบบและจัดทำเว็บไซต์ทั้งในและนอกองค์กร โดยทางทีมงาน Assembler เลือกใช้เทคโนโลยีใหม่ ๆ มาเป็นเครื่องมือในการสร้างงานเสมอ</p>
                    </div> <!-- ITEM END -->
                    <!--
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="3s">
                        <img src="<?//php echo Url::to('@web/web/themes/Even/img/s2.png') ?>" alt="">
                        <h4>Android App Design</h4>
                        <p>Grinder affogato, dark, sweet carajillo, flavour seasonal aroma single origin cream. Percolator. Eligendi impedit dolores nulla.</p>
                    </div>
    
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="3s">
                        <img src="<?//php echo Url::to('@web/web/themes/Even/img/s3.png') ?>" alt="">
                        <h4>iOS App Design</h4>
                        <p>Grinder affogato, dark, sweet carajillo, flavour seasonal aroma single origin cream. Percolator. Eligendi impedit dolores nulla.</p>
                    </div> ITEM END -->
                    <div class="col-lg-2 wow fadeInUp" data-wow-duration="3s"></div>
                    <div class="col-md-6 col-lg-5 wow fadeInUp" data-wow-duration="3s">
                        <img src="<?php echo Url::to('@web/web/themes/Even/img/A_LOGO.png') ?>" alt="" width="100">
                        <h4 id="ff-b">Brand Identity Design</h4>
                        <p>Assembler มีบริการรับออกแบบงานด้านกราฟฟิก สื่อแอนิเมชั่น สื่อภาพนิ่ง สื่อนำเสนอแบบเคลื่อนไหว สื่อการเรียนการสอน โลโก้ <br/>ป้ายไวนิลต่าง ๆ</p>
                    </div> <!-- ITEM END -->

                    <!--
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="3s">
                        <img src="<?//php echo Url::to('@web/web/themes/Even/img/s6.png') ?>" alt="">
                        <h4>CMYK Print Design</h4>
                        <p>Grinder affogato, dark, sweet carajillo, flavour seasonal aroma single origin cream. Percolator. Eligendi impedit dolores nulla.</p>
                    </div>
                    -->

                </div><!-- SERVICE ITEMS END-->
                <div class="row">
                    <div class="col-md-6 col-lg-5 wow fadeInUp" data-wow-duration="3s">
                        <img src="<?php echo Url::to('@web/web/themes/Even/img/responsive-web-icon.png') ?>" alt="">
                        <h4 id="ff-b">Responsive Web Design</h4>
                        <p>เว็บไซต์รองรับการแสดงผลบนหน้าจอ Desktop ,Tablet ,Mobile เพื่อเข้าถึงเว็บไซต์ได้สะดวกสะบายและสวยงามมากขึ้น</p>
                    </div> <!-- ITEM END -->

                    <div class="col-md-12 col-lg-2 wow fadeInUp" data-wow-duration="3s"></div>

                </div>
            </div><!-- SERVICE SECTION END -->
        </div>

        <!-- ===========================
        PORTFOLIO SECTION START
        =========================== -->
        <div id="portfolio-full">
            <div id="portfolio" style=" margin-top: 0px;">
                <div class="sectionhead wow bounceInUp" data-wow-duration="2s">
                    <span class="bigicon icon-rocket"></span>
                    <h3 id="ff-b">ผลงานของบางส่วน The Assembler</h3>
                    <hr class="separetor">            
                </div><!-- PORTFOLIO SECTION HEAD END -->   

                <!-- PORTFOLIO ITEMS START -->
                <div class="portfolioitems container">
                    <?php echo $content; ?>
                </div><!-- PORTFOLIO ITEMS END -->
            </div><!-- PORTFOLIO SECTION END -->
        </div>

        <!-- ===========================
        TESTIMONIAL SECTION START
        =========================== -->
        <div id="testimonials" class="container">
            <div class="sectionhead wow bounceInUp" data-wow-duration="2s">
                <span class="bigicon icon-bubbles"></span>
                <h3 id="ff-b">ทีมงานของ The Assembler</h3>
                <h4 id="ff-b">The Assembler เริ่มก่อตั้งด้วยกันทั้งหมด 3 ท่านด้วยกัน ซึ่งแต่ละท่านก็มีความสามารถแต่ต่างกันไป</h4>
                <hr class="separetor">            
            </div><!-- TESTIMONIAL SECTIONHEAD END -->

            <!-- TESTIMONIAL ITEMS START -->
            <div class="row">
                <!-- 1ST TESTIMONIAL ITEM -->
                <div class="col-md-6 wow bounceIn" data-wow-duration="2s">
                    <div class="clientsphoto">
                        <img src="<?php echo Url::to('@web/web/themes/Even/img/shok.jpg') ?>" alt="โชค">
                    </div>

                    <div class="quote" id="ff">
                        <blockquote>
                            <h4 id="ff-b">โปรแกรมเมอร์ Tester And Debug</h4>             
                            Admin โรงพยาบาลแม่สอด
                        </blockquote>
                        <h5 id="ff">อำนาจ แก้วทันคำ (โชค)</h5>
                        <p id="ff">ผู้ก่อตั้งเว็บไซต์ Assembler และตั้งชื่อเว็บไซต์</p>
                    </div>                
                </div><!-- 1ST TESTIMONIAL ITEM END -->

                <!-- 2ND TESTIMONIAL ITEM -->
                <div class="col-md-6 wow bounceIn" data-wow-duration="3s" >
                    <div class="clientsphoto">
                        <img src="<?php echo Url::to('@web/web/themes/Even/img/note.jpg') ?>" alt="โน๊ต">
                    </div>

                    <div class="quote" id="ff">
                        <blockquote>
                            <h4 id="ff-b">โปรแกรมเมอร์ FrontEnd And Backend </h4>
                            Admin โรงพยาบาลพบพระ
                        </blockquote>
                        <h5 id="ff">ณัฐพล จันน้อย (โน๊ต)</h5>
                        <p id="ff">ผู้ก่อตั้งเว็บไซต์ Assembler</p>
                    </div>                
                </div><!-- 2ND TESTIMONIAL ITEM END -->

                <!-- 3RD TESTIMONIAL ITEM -->
                <div class="col-md-6 wow bounceIn" data-wow-duration="3s">
                    <div class="clientsphoto">
                        <img src="<?php echo Url::to('@web/web/themes/Even/img/kang.jpg') ?>" alt="กั้ง">
                    </div>

                    <div class="quote" id="ff">
                        <blockquote>
                            <h4 id="ff-b">ออกแบบดีไซหน้าเว็บไซต์, โปรแกรมเมอร์ FrontEnd</h4>     
                            Admin สำนักงานสาธารณสุขจังหว้ด
                        </blockquote>
                        <h5 id="ff">ทรงพล คำสะอาด (กั้ง) </h5>
                        <p id="ff">ผู้ก่อตั้งเว็บไซต์ Assembler</p>
                    </div>                
                </div><!-- 3RD TESTIMONIAL ITEM END -->

                <!-- 4TH TESTIMONIAL ITEM 
                <div class="col-md-6 wow bounceIn" data-wow-duration="2s">
                    <div class="clientsphoto">
                        <img src="<?php echo Url::to('@web/web/themes/Even/img/ramil.jpg') ?>" alt="Ramil">
                    </div>

                    <div class="quote">
                        <blockquote>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia et pariatur ipsam tempora officia ea iusto expedita, nulla, hic odit saepe repellat nesciunt dolorum, officiis laborum ad, aliquam. Quos, et.</p>                        
                        </blockquote>
                        <h5>Ramil Derogongun</h5>
                        <p>Visual Designer, Bluroon</p>
                    </div>                
                </div>4TH TESTIMONIAL ITEM END -->
            </div>        
        </div><!-- TESTIMONIAL SECTION END -->

        <!-- ===========================
        FOOTER START
        =========================== -->    
        <footer>
            <div class="container">
                <span class="bigicon icon-speedometer "></span>

                <div class="footerlinks"><!-- FOOTER LINKS START -->            
                    <ul>
                        <li><a href="#hero">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#portfolio">Portfolio</a></li>
                        <li><a href="#testimonials">Testimonials</a></li>

                        <!--replace the email address below with your email address-->
                        <li><a href="mailto:m@creatrix.us">Contact</a></li>                   
                    </ul>
                </div><!-- FOOTER LINKS END -->

                <div class="copyright"><!-- FOOTER COPYRIGHT START -->
                    <p>
                        &copy; The Assembler sing 2015 | 
                        credit 
                        <a href="http://www.f0nt.com/" target="_bank"><img src="<?php echo Url::to('@web/web/themes/Even/img/fontlogo.png') ?>" width="50"/></a>
                    </p>

                </div><!-- FOOTER COPYRIGHT END -->

                <div class="footersocial wow fadeInUp" data-wow-duration="3s"><!-- FOOTER SOCIAL ICONS START -->
                    <ul>
                        <li>
                            <a href="https://www.facebook.com/Theassembler2015" target="_bank">
                                <img src="<?php echo Url::to('@web/web/themes/Even/img/social-facebook-icon.png') ?>"/>
                                Facebook Fanpage</a>
                        </li>
                    </ul>
                </div><!-- FOOTER SOCIAL ICONS END -->
            </div>
        </footer><!-- FOOTER END -->
        <?php
        if (YII_DEBUG) {
            $this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
        }
        ?>
        <?php $this->endBody() ?>

    </body>
</html>
<?php $this->endPage() ?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script>new WOW().init();</script>

