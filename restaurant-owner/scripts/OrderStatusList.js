function filterOrderStatus(selectOrderStatus) {
    const orderStatus = document.getElementsByClassName('order-status');
    console.log(orderStatus.length, "items");

    // show category: main,side dish, drink
    for (let i = 0; i < orderStatus.length; i++) {
        if (orderStatus[i].innerHTML.toUpperCase() !== selectOrderStatus.toUpperCase()) {

            orderStatus[i].parentElement.parentElement.parentElement.style.display = "none";
        } else {
            orderStatus[i].parentElement.parentElement.parentElement.style.display = "grid";
        }
        // console.log(orderStatus[i].innerHTML, showFc, orderStatus[i].innerHTML !== showFc);
    }

    /**
     * change button color
     */
    const filter = document.getElementsByClassName('filter');
    // console.log(filter);

    for (let i = 0; i < filter.length + 1; i++) {
        if (filter[i].value == selectOrderStatus) {

            filter[i].style.backgroundColor = 'var(--primary-bg)';
            filter[i].style.color = 'white';
        } else {
            filter[i].style.backgroundColor = 'white';
            filter[i].style.color = 'var(--primary-bg)';
        }
        // console.log(filter[i].value, selectOrderStatus);
        // console.log(filter[i].className)
    }
}