function showByBus(bus_num) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById('waiting_list').innerHTML = this.responseText;
        }
    };

    if (bus_num === 'all') {
        // When "All Buses" is selected, don't pass the 'bus_num' parameter
        xmlhttp.open('GET', 'filterByBus.php', true);
    } else {
        // When a specific bus is selected, pass the 'bus_num' parameter
        xmlhttp.open('GET', 'filterByBus.php?bus_num=' + bus_num, true);
    }

    xmlhttp.send();
}
