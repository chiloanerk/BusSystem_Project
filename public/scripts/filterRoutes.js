function showRoutes(bus_num) {
    if (bus_num == null) {
        document.getElementById('routeInfo').innerHTML = '';
        return;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById('routeInfo').innerHTML = this.responseText;
        }
    };
    xmlhttp.open('GET', 'filterRoutes.php?bus_num=' + bus_num, true);
    xmlhttp.send();
}
