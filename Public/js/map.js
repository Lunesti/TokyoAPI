/*------------------------------------------
MAP
------------------------------------------*/

function ajaxGet(url, callback) {

    let req;
    if (window.XMLHttpRequest) {
        req = new XMLHttpRequest();
    } else {
        req = new ActiveXObject('Microsoft.XMLHTTP');
    }

    req.open("GET", url);


    req.addEventListener("load", function () {
        if (req.status >= 200 && req.status < 400) {

            callback(req.responseText);
        } else {
            console.error(req.status + " " + req.statusText + " " + url);
        }
    });

    req.addEventListener("error", function () {
        console.error("Erreur réseau avec l'URL " + url);
    });

    req.send();
}


function initMarkers() {

    var map = L.map('map').setView([34.886306, 134.379711], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',

    }).addTo(map);

    this.ajaxGet('http://localhost/Api/index.php?action=json_data', (reponse) => {

        let datas = JSON.parse(reponse);

        for (const data of datas) {

            //Coordonnées
            let coords = {
                latitude: data.latitude,
                longitude: data.longitude
            }

            L.marker(Object.values(coords, data.cover_img), {
                "data": coords
            })

                .addTo(map)
                .on("click", function () {

                    //On affiche les infos à gauche
                    const locationWindow = document.querySelector(".locationInfos");
                    const locationPage = document.getElementById('locationPage');
                    const locationName = document.getElementById('locationName');
                    locationWindow.style.display = "flex";
                    locationWindow.style.width == "300px";
                    locationWindow.style.width = "300px";
                    locationWindow.style.flexDirection = "column";
                    locationWindow.style.alignItems = "center";
                    locationWindow.style.justifyContent = "space-around";
                    locationPage.style.backgroundColor = "rgb(4, 151, 75)";
                    locationPage.style.padding = "10px";
                    locationPage.style.borderRadius = "5px";
                    locationPage.style.fontSize = "1em";
                    locationName.style.fontSize = "1em";


                    if (window.matchMedia("(max-device-width: 768px)").matches) {
                        section = document.querySelector('.section');
                        section.style.height = '800px';
                        section.style.alignItems = 'center';
                    }

                    //Nom du lieu
                    locationName.innerHTML = data.location_name;
                    locationName.style.textTransform = "uppercase";
                    locationName.style.fontWeight = "bold";

                    //Image
                    const img = document.querySelector('.img');
                    img.src = data.cover_img;

                    //On récupère l'id dans l'URL
                    locationPage.addEventListener("click", function () {
                        window.location.href = "http://localhost/Api/index.php?action=location&id=" + data.id;
                    })
                })


                .bindPopup(data.location_name)
                .openPopup();
        }

    });
}

initMarkers();



/*var map = L.map("map");
L.tileLayer("http://{s}.tile.osm.org/{z}/{x}/{y}.png").addTo(map);

map.setView([48.85, 2.35], 12);

marker = L.marker([48.85, 2.35]).addTo(map);
popupContent = document.createElement("img");

popupContent.src = "http://c4.staticflickr.com/1/691/21131215939_49601d06ef_b.jpg";
marker.bindPopup(popupContent, {
  maxWidth: "auto"
});*/



