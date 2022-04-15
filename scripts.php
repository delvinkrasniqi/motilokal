
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