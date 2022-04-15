<?php include("header.php"); ?>
<div class="top-header">
    <div class="page-container" style="position:relative; z-index:2">
        <div class="search-wrapper">
            <div class="search-bar">
            <input autocomplete="off" name="hidden" type="text" style="display:none;">
                <input autocomplete="off" type="text" id="search-location" name="search" placeholder="Kërko qytetin tuaj..">

                <button class="submit-btn"><i class='bx bx-search'></i></button>
            </div>
            <div class="autocomplete-wrapper">
                <!-- <span>Prizren, Kosove</span>
                <span>Prishtine, Kosove</span> -->
            </div>
        </div>
        <div class="recent-locations">
            <div class="recent-location">
                <p>Prishtine</p>
                <span>
                    <span class="weather-icon"><i class='bx bx-sun'></i></span>
                    <span class="wether-celsius">12°C</span>
                </span>
            </div>
            <div class="recent-location">
                <p>Tiranë</p>
                <span>
                    <span class="weather-icon"><i class='bx bx-sun'></i></span>
                    <span class="wether-celsius">12°C</span>
                </span>
            </div>
        </div>
    </div>
    <div id="sky"></div>
    <div id="mountain-back"></div>
    <div id="mountain-front"></div>

</div>
<main class="home">
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