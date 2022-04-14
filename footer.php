<footer>
    <div class="page-container">
        <p>Nëse dëshironi që ta reklamoni biznesin tuaj në motilokal.com, atëherë dërgojeni kërkesën tuaj në <a
                href="mailto:info@motilokal.com">info@motilokal.com</a>.</p>
        <ul class="socials">

            <li>
                <a href="#">
                    <img src="./assets/images/facebook.svg" alt="">
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="./assets/images/instagram.svg" alt="">
                </a>
            </li>

        </ul>
        <div class="bottom">
            <p>Në partneritet me <a href="yr.no">YR.no</a> <a href="#">Politika e privatësisë</a></p>
            <div class="copyright">
                Motilokal.com © 2022
            </div>
        </div>
    </div>
</footer>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script>
let searchWrapper = document.querySelector(".search-wrapper");
let searchInput = document.querySelector("#search-location");
let recentLocations = document.querySelector(".recent-locations");
let topHeader = document.querySelector(".top-header");
let menuWrapper = document.querySelector(".menu-wrapper");

if (searchInput) {
    searchInput.addEventListener("keyup", () => {
        if (searchInput.value.length < 1) {
            searchWrapper.classList.remove("show-results");
        } else {
            searchWrapper.classList.add("show-results");
        }
    })
}
</script>

<script>
let sky = document.querySelector("#sky");
let mountainBack = document.querySelector("#mountain-back");
let mountainFront = document.querySelector("#mountain-front");
let singleVideoTop = document.querySelector(".single-video .top");

window.addEventListener("scroll", () => {

    let scrollValue = window.scrollY;

    if (sky && mountainBack && mountainFront) {
        sky.style.top = scrollValue * 0.1 + 'px';
        mountainBack.style.top = scrollValue * 0.5 + 'px';
        mountainFront.style.top = scrollValue * 0.3 + 'px';
    }

    let opacityValue = (500 - scrollValue / 0.5) / 500;

    if (opacityValue >= 0 && searchWrapper && recentLocations) {

        searchWrapper.style.opacity = `${opacityValue}`;
        recentLocations.style.opacity = `${opacityValue}`;
    }
    if (topHeader && menuWrapper && window.scrollY > (topHeader.offsetHeight - menuWrapper.offsetHeight)) {
        menuWrapper.classList.add("inverted");
    } else {
        menuWrapper.classList.remove("inverted");
    }

    if (menuWrapper && window.scrollY > (singleVideoTop.offsetHeight - menuWrapper.offsetHeight)) {
        menuWrapper.classList.add("inverted");
    } else {
        menuWrapper.classList.remove("inverted");
    }
})
</script>

<script>
const swiper = new Swiper('.swiper', {
    // Optional parameters
    direction: 'vertical',
    slidesPerView: 2.6,
    spaceBetween: 20
});
</script>

</body>

</html>