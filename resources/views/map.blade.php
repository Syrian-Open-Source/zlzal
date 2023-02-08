<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>زلزال</title>
    <!-- Load Leaflet from CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.3.3/leaflet.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.3.3/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css" integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">

    <!-- Load geocoding plugin after Leaflet -->
    <link rel="stylesheet" href="https://maps.locationiq.com/v2/libs/leaflet-geocoder/1.9.6/leaflet-geocoder-locationiq.min.css">
    <script src="https://maps.locationiq.com/v2/libs/leaflet-geocoder/1.9.6/leaflet-geocoder-locationiq.min.js"></script>


<style>
    body{
        padding: 100px 0;
    }
    #map{
        height: 80vh
    }
    .rtl{
        direction: rtl;
    }
    .marker-view{
        text-align: start;
    }
    .text-center{
        text-align: center;
    }
</style>
</head>
<body>

<h2 class="text-center mb-5">زلزال</h2>
<p class="text-center mb-3">زلزال هو موقع بسيط يساعد على تحديد وتنظيم بيانات تتعلق بالاماكن والمناطق المنكوبة والفرق العاملة على ايصال المساعدات لها في سوريا</p>
<p class="text-center mb-3">انقر على الدبوس لعرض بيانات الحالة</p>

<h5 class="text-center"><a href="/"> لتعبئة البيانات من هنا</a> </h5>

<div id="map"></div>
<!-- For the search box -->
<div id="search-box"></div>
<!-- To display the result -->
<div id="result"></div>
<script>
    var data = @json($data);
    // This is an example of Leaflet usage; you should modify this for your needs.
    var map = L.map('map', {
        center: [34.7988293, 36.7584179], // Map loads with this location as center
        zoom: 7,
        zoomControl: true,
        attributionControl: true,
    });
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.syrianopensource.com">Syrian Open Source</a>'
    }).addTo(map);

    // Add markers to the map
    data.forEach(item => {
        let iconUrl ='https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png';
        let color = 'green'
        if(item.type == 1){
            iconUrl = 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png';
            color = 'red'
        }
        if(item.type >= 2 || item.typeKey <= 7 ){
            iconUrl = 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-yellow.png';
            color = 'yellow'
        }
        var greenIcon = L.icon({
            iconUrl: iconUrl,
            iconSize: [20, 25],
            popupAnchor: [1, -34],
        });
        var marker1 = L.marker([item.lat,item.long], {icon: greenIcon}).addTo(map);
        L.circle([item.lat,item.long], {
            color: color,
            fillColor: color,
            fillOpacity: 0.7,
            radius: 1000
        }).addTo(map);

        let titles = {
            "1": "اشخاص عالقين تحت الانقاض.",
            "2": "مراكز يتوفر فيها حاجات اساسية مثل الطعام والشراب",
            "3": " مراكز يتوفر فيها ملابس وتدفئة",
            "4": " مراكز استجابة، فرق تطوعية",
            "5": " مراكز ايواء",
            "6": " مراكز يتوفر فيها مواصلات",
            "7": " مراكز أمنة",
            "8": "مراكز غسيل كلية",
            "9": "مراكز ونقاط طبية",
            "10": "تقديم المساعدة والتطوع",
            "11": "أخرى"
        }
        marker1.bindPopup(`
        <div class='marker-view'>
            <h3 class='rtl'>${titles[item.type]}</h3>
            <h5 class='rtl'>الاسم: ${item.name}</h5>
            <hr>
            <h5 class='rtl'>العنوان: ${item.city} - ${item.area} - ${item.street}</h5>
            <hr>
            <h5 class='rtl'>معلومات التواصل: ${item.phone}</h5>
            <hr>
            <h5 class='rtl'>الوصف: ${item.description}</h5>
            <hr>
            <h5 class='rtl'>معلومات اضافية: ${item.more_info}</h5>
            <hr>
        </div>
        `);

    })


</script>


    </body>
</html>
