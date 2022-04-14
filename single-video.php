<?php include("header.php"); ?>
<main class="single-video">
    <div class="top">
        <div class="page-container">
            <div class="video-wrapper-top">
                <div class="video-player">
                    <?php include("video-item.php"); ?>
                </div>
                <div class="watch-next-videos">
                    <div class="swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <?php include("video-item.php"); ?>
                            </div>
                            <div class="swiper-slide">
                                <?php include("video-item.php"); ?>
                            </div>
                            <div class="swiper-slide">
                                <?php include("video-item.php"); ?>
                            </div>
                            <div class="swiper-slide">
                                <?php include("video-item.php"); ?>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="page-container">
        <?php include("ad-banner.php"); ?>

        <div class="section">
            <div class="section-title">
                <h2>Video nga motilokal</h2>
                <a href="#">më shumë</a>
            </div>
            <?php include("video-grid.php"); ?>
        </div>
        <?php include("ad-banner.php"); ?>
        <div class="section" style='padding-bottom: 100px;'>
            <div class="section-title">
                <h2>LIVE Video</h2>
                <a href="#">më shumë</a>
            </div>
            <?php include("live-grid.php"); ?>
        </div>
    </div>
</main>
<?php include("footer.php"); ?>

