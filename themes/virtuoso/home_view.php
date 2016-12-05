<?php require_once('common/head.php');?>
<body>
        <div id="body_bg">
            <?php require_once('common/social.php');?>
            <div class="primary-container-group">
                <!-- Background -->
                <div class="primary-container-background">
                    <div class="primary-container"></div>
                    <div class="clearfix"></div>
                </div>
                <!--End Background -->
                <div class="primary-container">
                    <?php require_once('common/header.php');?>
                    
                    
                    
                    <div class="container no-padding">
                        <!-- === END HEADER === -->
                        <!-- === BEGIN CONTENT === -->
                        <div class="row">
                            <?php require_once ('common/home_slideshow.php');?>
                            <?php require_once('common/home_tabs.php');?>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <!-- Main Article -->
                            <div class="col-md-12 margin-top-30">
                                <h2 class="item-title">
                                    Nulla in enim quis
                                </h2>
                                <p>
                                    <img class="animate fadeInRight" style="float: right;" src="<?=$url->site_url($config['theme_path'].'assets/img/frontpage//responsive_screens.png');?>" alt="responsive screens">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit
                                    lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto
                                    odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                <p>Mirum est notare quam littera gothica, quam nunc putamus. Cras non sem sem, at eleifend mi. Vivamus sit amet ante est, sit amet rutrum augue. Cras non sem sem, at eleifend mi. Nam liber tempor cum soluta nobis eleifend
                                    option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Curabitur eget nisl a risus.</p>
                            </div>
                            <div class="clearfix"></div>
                            <!-- End Main Article -->
                        </div>
                    </div>
                    
                    <?php require_once ('common/footer_contact.php');?>
                    <?php require_once ('common/footer_links.php');?>
                </div>
            </div>
            <?php require_once ('common/copyright.php');?>
        </div>
        <?php require_once ('common/footer_scripts.php');?>
    </body>
</html>
<!-- === END FOOTER === -->