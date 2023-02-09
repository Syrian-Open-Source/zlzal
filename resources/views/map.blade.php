<x-layouts.app>
    <x-slot name="styles">
        <!-- Load Leaflet from CDN -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.3.3/leaflet.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.3.3/leaflet.js"></script>
        </style>

        <!-- Load geocoding plugin after Leaflet -->
        <link rel="stylesheet"
            href="https://maps.locationiq.com/v2/libs/leaflet-geocoder/1.9.6/leaflet-geocoder-locationiq.min.css">
        <script src="https://maps.locationiq.com/v2/libs/leaflet-geocoder/1.9.6/leaflet-geocoder-locationiq.min.js"></script>


        <style>
            body {
                padding: 100px 0;
            }

            #map {
                height: 80vh
            }

            .rtl {
                direction: rtl;
            }

            .marker-view {
                text-align: start;
            }

            .text-center {
                text-align: center;
            }
        </style>
    </x-slot>


    <x-navbar />

    <h5 class="text-center"><a href="/"> لتعبئة البيانات من هنا</a> </h5>
    <br>
    <div id="map"></div>
    <!-- For the search box -->
    <div id="search-box"></div>
    <!-- To display the result -->
    <div id="result"></div>






    <x-slot name="scripts">
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
                let iconUrl =
                'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png';
                let color = 'green'
                if (item.type == 1) {
                    iconUrl = 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png';
                    color = 'red'
                }
                if (item.type >= 2 || item.type <= 6) {
                    iconUrl =
                        'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-yellow.png';
                    color = 'yellow'
                }
                if (item.type == 7 || item.type == 8) {
                    if (item.active) {
                        iconUrl =
                            'https://cdn.iconscout.com/icon/premium/png-512-thumb/first-aids-bag-2299218-1920340.png?f=avif&w=512';
                    } else {
                        iconUrl =
                            'https://cdn.iconscout.com/icon/premium/png-512-thumb/first-aids-bag-2299387-1920490.png?f=avif&w=512';
                    }
                }

                var greenIcon = L.icon({
                    iconUrl: iconUrl,
                    iconSize: [20, 25],
                    popupAnchor: [1, -34],
                });
                var marker1 = L.marker([item.lat, item.long], {
                    icon: greenIcon
                }).addTo(map);
                L.circle([item.lat, item.long], {
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
            <h3 class='rtl'>${titles[item.type]??''}</h3>
            <h5 class='rtl'>الاسم: ${item.name??''}</h5>
            <hr>
            <h5 class='rtl'>العنوان: ${item.city??''} - ${item.area??''} - ${item.street??''}</h5>
            <hr>
            <h5 class='rtl'>معلومات التواصل: ${item.phone??''}</h5>
            <hr>
            <h5 class='rtl'>الوصف: ${item.description??''}</h5>
            <hr>
            <h5 class='rtl'>معلومات اضافية: ${item.more_info??''}</h5>
            <hr>
        </div>
        `);

            })
        </script>

    </x-slot>
</x-layouts.app>
