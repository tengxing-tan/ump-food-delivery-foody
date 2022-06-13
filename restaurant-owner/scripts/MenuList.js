function filterFc(showFc) {
    const fcId = document.getElementsByClassName('food-category-id');
    // console.log(fcId.length, "items");

    // show all item
    if (showFc === 'all') {
        for (let i = 0; i < fcId.length; i++) {
            fcId[i].parentElement.style.display = "flex";
        }
    } else {

        // show category: main,side dish, drink
        for (let i = 0; i < fcId.length; i++) {
            if (fcId[i].innerHTML !== showFc) {

                fcId[i].parentElement.style.display = "none";
            } else {
                fcId[i].parentElement.style.display = "flex";
            }
            // console.log(fcId[i].innerHTML, showFc, fcId[i].innerHTML !== showFc);
        }
    }

    /**
     * change button color
     */
    const filter = document.getElementsByClassName('filter');
    console.log(filter);

    for (let i = 0; i < filter.length + 1; i++) {
        if (filter[i].value == showFc) {

            filter[i].className = "filter btn"
        } else {
            filter[i].className = "filter btn secondary-btn"
        }
        // console.log(typeof filter[i], showFc);
        // console.log(filter[i].className)
    }
}