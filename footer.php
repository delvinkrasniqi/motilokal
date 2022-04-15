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
let autocompleteWrapper = document.querySelector(".autocomplete-wrapper");
let headerLogo = document.querySelector("#header-logo");


if (searchInput) {
    searchInput.addEventListener("keyup", (e) => {
        if (e.keyCode != '40' && e.keyCode != '38') {
            if (searchInput.value.length < 1) {
                searchWrapper.classList.remove("show-results");

            } else {
                searchWrapper.classList.add("show-results");
                fetch("./cities.php")
                    .then(res => res.json())
                    .then(data => {
                        let filteredCities = [];
                        data.forEach(el => {

                            if (el.city.toLowerCase().includes(e.target.value.toLowerCase())) {
                                let recordString =
                                    `<span onclick="window.location.href ='${el.url}'" data-url="${el.url}">${el.city}, ${el.country}</span>`;
                                filteredCities.push(recordString);
                            }
                        })
                        if (filteredCities.length > 0) {
                            autocompleteWrapper.innerHTML = filteredCities.join(' ');
                        } else {
                            autocompleteWrapper.innerHTML =
                                `<span>No results match your search criteria</span>`;
                        }
                        let autocompleteResult = document.querySelector(".autocomplete-wrapper span");
                        autocompleteWrapper.style.maxHeight = `${autocompleteResult.offsetHeight * 4}px`;
                        console.log("filtered", filteredCities.join(' '));
                    })
            }
        }
    })

    searchInput.addEventListener("focus", () => {

        let startIndex = -1;

        searchInput.addEventListener("keyup", (e) => {
            if (searchInput.value.length < 1) {
                startIndex = -1;
            }
            //remove focused Classes
            if (e.keyCode == '40') {
                let autocompleteResults = document.querySelectorAll(".autocomplete-wrapper span");
                console.log(autocompleteResults.length, " ", startIndex);

                if (startIndex < autocompleteResults.length) {
                    startIndex++;
                    autocompleteResults.forEach((el, index) => {
                        console.log("index", index, " - ", startIndex);
                        if (index !== startIndex) {
                            el.classList.remove("focused")
                        }

                    });
                    autocompleteResults[startIndex].classList.add("focused");


                }
            }
            if (e.keyCode == '38') {
                let autocompleteResults = document.querySelectorAll(".autocomplete-wrapper span");
                console.log(autocompleteResults.length, " ", startIndex);

                if (startIndex > -1) {
                    startIndex--;
                    autocompleteResults.forEach((el, index) => {
                        console.log("index", index, " - ", startIndex);
                        if (index !== startIndex) {
                            el.classList.remove("focused")
                        }

                    });
                    autocompleteResults[startIndex].classList.add("focused");


                }
            }
        })
    })

    searchInput.addEventListener("keydown", (e) => {
        let focusedResult = document.querySelector(".autocomplete-wrapper span.focused");

        if (focusedResult) {
            if (e.keyCode == '13') {
                // alert("Enter");
                window.location.href = `${focusedResult.getAttribute("data-url")}`;
            }
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
    console.log(singleVideoTop.offsetHeight);
    if (singleVideoTop && menuWrapper && (window.scrollY > (singleVideoTop.offsetHeight - menuWrapper
            .offsetHeight))) {
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

<script>
let toggler = document.querySelector("#toggler");
let fixedMenu = document.querySelector(".fixed-menu");
let menuItems = document.querySelectorAll(".menu-items");


toggler.addEventListener("click", () => {
    fixedMenu.classList.toggle("active");
    menuWrapper.classList.toggle("active");

    document.body.classList.toggle("fixed");

    let delay = 0.5;
    menuItems.forEach(item => {
        item.classList.toggle("animate");
        item.style.animationDelay = `${delay}s`;
        delay += 0.2;
    })

    //change logo to dark
    // headerLogo.setAttribute("src", headerLogo.getAttribute("data-logo-dark"))
})
</script>

</body>

</html>