<div id="map" style="height:500px"></div>


<script>
    var map = L.map('map').setView([-6.175696, 106.857294], 20);


    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
    id: 'mapbox/dark-v10',
    }).addTo(map);

    <?php foreach ($pemetaan as $key => $value) { ?>
        L.circle([<?= $value->latitude ?>,<?=$value->longitude?>], {
            radius: <?=$value->radius ?>, 
            color: '<?= $value->warna ?>',
            fillColor: '<?= $value->warna ?>',
            fillOpacity: 0.5,
        }).bindPopup("<h5> Nama Virus :<?= $value->nama_virus ?></h5><h5> Nama Wilayah :<?= $value->nama_wilayah ?></h5><h5> Kabupaten :<?= $value->kabupaten ?></h5><h5> Jumlah Meninggal :<?= $value->jml_meninggal ?></h5><h5> Jumlah Sembuh :<?= $value->jml_sembuh ?></h5>").addTo(map);
    
    <?php } ?>
    
</script>
