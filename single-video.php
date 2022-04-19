<?php include("header.php"); ?>
<main class="single-video">
    <div class="top">
        <div class="page-container">
            <div class="video-wrapper-top">
                <div class="video-player" style="position:relative">

                    <div id="video-player">
                        <video id="player" playsinline controls data-poster="/path/to/poster.jpg">
                            <source src="./video.mp4" type="video/mp4" />
                            <source src="./video.mp4" type="video/webm" />

                            <!-- Captions are optional -->
                            <track kind="captions" label="English captions" src="/path/to/captions.vtt" srclang="en"
                                default />
                        </video>
                        <!-- <div class="plyr__video-embed" id="player">
                   
                            <iframe
                                src="https://www.youtube.com/embed/Dx5qFachd3A?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
                                allowfullscreen allowtransparency allow="autoplay"></iframe>
                        </div> -->

                        <div id="reklama" style="background-image: url(./assets/images/video-ad.png)">
                            <div class="close-ad" onclick="hideAd()">
                                <p>Largo Reklamën</p>
                            </div>
                            <a href="https://motilokal.com/marketing" target="_blank"><span
                                    class="ad-redirect"></span></a>
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
window.addEventListener("resize", () => {
    watchNext.style.maxHeight = `${videoPlayerWrapper.offsetHeight}px`;
})
</script>

<script src="https://cdn.plyr.io/3.6.12/plyr.polyfilled.js"></script>

<script>
const player = new Plyr('#player');
let videoPlayer = document.querySelector(".plyr__video-wrapper");

let videoDuration = 0;
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
    let adFrequency = [];

    videoDuration = player.duration;
    for (let i = 0; i < videoDuration; i++) {
        if (i % videoDuration == 0) {
            let random = Math.floor(Math.random() * videoDuration);
            adFrequency.push(random);
            console.log(adFrequency);
        }
    }
    console.log("Video length: " + videoDuration);

    let currentTime;
    let adInterval = setInterval(() => {
        currentTime = player.currentTime;
        console.log("Inside Interval", {
            currentTime: Math.floor(currentTime),
            videoDuration: videoDuration
        })
        if (player.playing) {
            let foundItem = adFrequency.find(el => el == Math.floor(currentTime));
            if (foundItem) {
                toggleAd();
                adFrequency[adFrequency.indexOf(foundItem)] = -1;
                console.log(adFrequency);
            }
        }
        if (currentTime == videoDuration) {
            clearInterval(adInterval);
            console.log("Intervali u nal")
        }
    }, 1000);

})
</script>

<?php include("footer.php"); ?>