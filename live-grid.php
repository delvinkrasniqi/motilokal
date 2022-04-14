<div class="video-grid">
    <?php $rand = rand(1, 8); ?>
    <?php for($i = 1; $i <= 8; $i++){ ?>
    <div class="video-item">
        <a href="./single-video.php">
            <?php if($i == $rand ){ ?>
                <?php include("ad-square.php"); ?>
            <?php } else{ ?>


            <div class="item-thumbnail">
                <img src="./assets/images/thumbnail-live.png" alt="">
                <span class="duration"><span class="red-dot"></span>LIVE</span>
            </div>
            <div class="item-details">
                <h3 class="item-title">SlowTV - Bogë, Rugovë</h3>
                <div class="item-meta">
                    <span>Motilokal</span>
                    <span>10/01/2022</span>
                </div>
            </div>
            <?php } ?>
        </a>
    </div>

    <?php } ;?>
</div>