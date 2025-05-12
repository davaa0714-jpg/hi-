
var map = L.map('mapid').setView([47.915, 106.912], 12);
// L.tileLayer('https://tile.jawg.io/225e6f42-18ab-4eb5-8829-f35b8aa20188/{z}/{x}/{y}{r}.png?access-token=0GrUZt4yiLfpNAaQlPcWSCdMn29Y4JoVgiFx573bZX8Nt3D5Vb3sq1VbEUYXVVRI', {}).addTo(map);

var CartoDB_Positron = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
    subdomains: 'abcd',
    maxZoom: 20
});
CartoDB_Positron.addTo(map);

// var geojsonLayer = new L.GeoJSON.AJAX("include/residential_buildings_0105.geojson");    

var geojsonMarkerOptions = {
    radius: 8,
    fillColor: "#dc143c",
    color: "#fff",
    weight: 2.5,
    opacity: 1,
    fillOpacity: 0.8
};


function highlightFeature(e) {
    highlightLayer = e.target;
    L.DomUtil.addClass(e.target.getElement(), 'leaflet-marker-hover');

    if (e.target.feature.geometry.type === 'LineString') {
      highlightLayer.setStyle({
        color: '#000',
      });
    } else {
      highlightLayer.setStyle({
        radius: 11,
        fillOpacity: 1
      });
    }
}

function resetHighligh(e){
    resetHigh = e.target;
    L.DomUtil.addClass(e.target.getElement(), 'leaflet-marker-hover');
    resetHigh.setStyle({
        radius: 8,
        fillOpacity: 0.8,
    })
}

function r_building_popup(feature, layer) {
    layer.on({
        mouseout: resetHighligh,
        mouseover: highlightFeature,
    });
    var popup_content = '<table>\
        <tr>\
            <td colspan="2">' + (feature.properties['cs_project']) + '</td>\
        </tr>\
        <tr>\
            <td>' + "Байршил" + '</td>\
            <td>' + (feature.properties['cs_district'] + ', ' + feature.properties['cs_khoroo'] + '-р хороо') + '</td>\
        </tr>\
        <tr>\
            <td>' + "Газрын төлөв" + '</td>\
            <td>' + (feature.properties['cs_land_status']) + '</td>\
        </tr>\
        <tr>\
            <td>' + "Барилгын төлөв" + '</td>\
            <td>' + (feature.properties['cs_build_type']) + '</td>\
        </tr>\
        <tr>\
            <td>' + "Барилгын суурь" + '</td>\
            <td>' + (feature.properties['cs_build_base']) + '</td>\
        </tr>\
        <tr>\
            <td>' + "Зориулалт" + '</td>\
            <td>' + (feature.properties['cs_purpose']) + '</td>\
        </tr>\
        <tr>\
            <td>' + "Зэрэглэл" + '</td>\
            <td>' + (feature.properties['cs_rank']) + '</td>\
        </tr>\
        <tr>\
            <td>' + "Бүтээц" + '</td>\
            <td>' + (feature.properties['cs_main_construction']) + '</td>\
        </tr>\
        <tr>\
            <td>' + "Комисс ажилласан" + '</td>\
            <td>' + (feature.properties['cs_comiss_date']) + '</td>\
        </tr>\
        <tr>\
            <td>' + "Комиссын дүгнэлт" + '</td>\
            <td>' + (feature.properties['cs_dugnelt_date']) + '</td>\
        </tr>\
        <tr>\
            <td>' + "Дүгнэлтийн дугаар" + '</td>\
            <td>' + (feature.properties['cs_dugnelt_number']) + '</td>\
        </tr>\
        <tr>\
            <td>' + "Захиалагч" + '</td>\
            <td>' + (feature.properties['cs_owner']) + '</td>\
        </tr>\
        <tr>\
            <td>' + "Зураг төсөл" + '</td>\
            <td>' + (feature.properties['cs_plan_executor']) + '</td>\
        </tr>\
        <tr>\
            <td>' + "Гүйцэтгэгч" + '</td>\
            <td>' + (feature.properties['cs_executor']) + '</td>\
        </tr>\
        </table>';
    
    layer.bindPopup(popup_content);
    // console.log(popup_content)
}


var r_building_layer = L.geoJSON(data, {
    pointToLayer: function (feature, latlng) {
        return L.circleMarker(latlng, geojsonMarkerOptions);
    },
    onEachFeature: r_building_popup, 
})

var r_building_cluster = L.markerClusterGroup({
    showCoverageOnHover: false
});

var res_buildings = r_building_cluster.addLayer(r_building_layer).addTo(map);
// var res_buildings = r_building_cluster.addLayer(r_building_layer);



// commercial buildings

function c_building_popup(feature, layer) {
    layer.on({
        mouseout: resetHighligh,
        mouseover: highlightFeature,
    });
    var c_popup_content = '<table>\
        <tr>\
            <td colspan="2">' + (feature.properties['cs_project']) + '</td>\
        </tr>\
        <tr>\
            <td>' + "Байршил" + '</td>\
            <td>' + (feature.properties['cs_district'] + ', ' + feature.properties['cs_khoroo'] + '-р хороо') + '</td>\
        </tr>\
        <tr>\
            <td>' + "Газрын төлөв" + '</td>\
            <td>' + (feature.properties['cs_land_status']) + '</td>\
        </tr>\
        <tr>\
            <td>' + "Барилгын төлөв" + '</td>\
            <td>' + (feature.properties['cs_build_type']) + '</td>\
        </tr>\
        <tr>\
            <td>' + "Барилгын суурь" + '</td>\
            <td>' + (feature.properties['cs_build_base']) + '</td>\
        </tr>\
        <tr>\
            <td>' + "Зориулалт" + '</td>\
            <td>' + (feature.properties['cs_purpose']) + '</td>\
        </tr>\
        <tr>\
            <td>' + "Давхар" + '</td>\
            <td>' + (feature.properties['cs_floor']) + '</td>\
        </tr>\
        <tr>\
            <td>' + "Бүтээц" + '</td>\
            <td>' + (feature.properties['cs_main_construction']) + '</td>\
        </tr>\
        <tr>\
            <td>' + "Комисс ажилласан" + '</td>\
            <td>' + (feature.properties['cs_comiss_date']) + '</td>\
        </tr>\
        <tr>\
            <td>' + "Комиссын дүгнэлт" + '</td>\
            <td>' + (feature.properties['cs_dugnelt_date']) + '</td>\
        </tr>\
        <tr>\
            <td>' + "Дүгнэлтийн дугаар" + '</td>\
            <td>' + (feature.properties['cs_dugnelt_number']) + '</td>\
        </tr>\
        <tr>\
            <td>' + "Захиалагч" + '</td>\
            <td>' + (feature.properties['cs_owner']) + '</td>\
        </tr>\
        <tr>\
            <td>' + "Зураг төсөл" + '</td>\
            <td>' + (feature.properties['cs_plan_executor']) + '</td>\
        </tr>\
        <tr>\
            <td>' + "Гүйцэтгэгч" + '</td>\
            <td>' + (feature.properties['cs_executor']) + '</td>\
        </tr>\
        </table>';
    
    layer.bindPopup(c_popup_content);
    // console.log(popup_content)
}


var c_building_layer = L.geoJSON(commercial_data, {
    pointToLayer: function (feature, latlng) {
        return L.circleMarker(latlng, geojsonMarkerOptions);
    },
    onEachFeature: c_building_popup,
})

var c_building_cluster = L.markerClusterGroup({
    showCoverageOnHover: false
});

var com_buildings = c_building_cluster.addLayer(c_building_layer);


var overlays = {
    "Орон сууцны барилга": res_buildings,
    "Олон нийтийн барилга": com_buildings
}

var layercontrol = L.control.layers(overlays).addTo(map);

