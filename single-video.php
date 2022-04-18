<?php include("header.php"); ?>
<main class="single-video">
    <div class="top">
        <div class="page-container">
            <div class="video-wrapper-top">
                <div class="video-player" style="position:relative">

                    <div id="video-player">
                        <video id="player" playsinline controls data-poster="/path/to/poster.jpg">
                            <source src="./video.mp4" type="video/mp4" />
                            <source src="./video.webm" type="video/webm" />

                            <!-- Captions are optional -->
                            <track kind="captions" label="English captions" src="/path/to/captions.vtt" srclang="en"
                                default />
                        </video>

                        <div id="reklama" style="background-image: url(./assets/images/video-ad.png)"
                            onclick="window.href.location='https://google.com'">
                            <div class="close-ad" onclick="hideAd()">
                                <p>Largo Reklamën</p>
                            </div>
                        </div>

                    </div>
                    <div class="item-details">
                        <h3 class="item-title">Ftohtë, me erë dhe vranësira, priten reshje bore</h3>
                        <div class="item-meta">
                            <span>Motilokal</span>
                            <span>10/01/2022</span>
                        </div>
                    </div>
                </div>
                <div class="watch-next-videos">
                    <?php include("video-item.php"); ?>
                    <?php include("ad-square.php"); ?>
                    <?php include("video-item.php"); ?>
                    <?php include("video-item.php"); ?>
                    <?php include("video-item.php"); ?>
                    <?php include("video-item.php"); ?>
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

<script>
let videoPlayerWrapper = document.querySelector(".video-player");
let watchNext = document.querySelector(".watch-next-videos");
watchNext.style.maxHeight = `${videoPlayerWrapper.offsetHeight}px`;
</script>

<script src="https://cdn.plyr.io/3.6.12/plyr.polyfilled.js"></script>

<script>
const player = new Plyr('#player');
let videoPlayer = document.querySelector(".plyr__video-wrapper");

let videoDuration = 0;
let isVideoPlaying = false;

let inVideoAd = document.querySelector("#reklama");

const toggleAd = () => {
    player.pause();
    inVideoAd.style.display = `flex`;
}

const hideAd = () => {
    inVideoAd.style.display = `none`;
    player.play();
}

window.addEventListener("load", () => {
    videoDuration = player.duration;
    let random = Math.floor(Math.random() * videoDuration);
    console.log("Video length: " + videoDuration);
    console.log("Random :", random);

    let currentTime;

    let timePassed = 0;
    let adInterval = setInterval(() => {
        timePassed++;
        currentTime = player.currentTime;
        console.log(Math.floor(currentTime))
        if (player.playing) {
            if (Math.floor(currentTime) == random) {
                toggleAd();
            }
            if (timePassed > videoDuration) {
                clearInterval(adInterval);
            }
        }
    }, 1000);

})
</script>

<?php include("footer.php"); ?>