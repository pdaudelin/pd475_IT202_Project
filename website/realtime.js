function getRealTime() {
    var domFidgetTypes = document.getElementById("fidgettypecount");
    var domFidgets = document.getElementById("fidgetcount");
    var domWholesale = document.getElementById("wholesalepricetotal");
    var domListPrice = document.getElementById("listpricetotal");

    var request = new XMLHttpRequest();
    request.open("GET", "realtime.php", true);

    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            var xml = request.responseXML;

            var fidgetTypeCount = xml.getElementsByTagName("fidgettypes")[0].textContent;
            var fidgetCount = xml.getElementsByTagName("fidgets")[0].textContent;
            var wholesaleTotal = xml.getElementsByTagName("wholesalepricetotal")[0].textContent;
            var listPriceTotal = xml.getElementsByTagName("listpricetotal")[0].textContent;

            domFidgetTypes.innerHTML = fidgetTypeCount;
            domFidgets.innerHTML = fidgetCount;
            domWholesale.innerHTML = wholesaleTotal;
            domListPrice.innerHTML = listPriceTotal;
        }
    };

    request.send(null);
}

// update every 3 seconds
setInterval(getRealTime, 3000);
