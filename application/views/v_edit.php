
<div class="col-sm-7">
    <div id="map" style="height:500px"></div>
</div>


<div class="col-sm-5">

<?php
    if($this->session->flashdata('pesan')) 
    {
        echo '<div class="alert alert-success">';
        echo $this->session->flashdata('pesan');
        echo '</div>';
    }

echo form_open('home/edit/'.$data->id);
?>
        <div class="form-group">
            <label>Nama Wilayah</label>
            <input name="nama_wilayah" value="<?= $data->nama_wilayah ?>" placeholder="Wiayah" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Provinsi</label>
            <input name="provinsi" value="<?= $data->provinsi ?>" placeholder="Provinsi" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Kabupaten</label>
            <input name="kabupaten" value="<?= $data->kabupaten ?>" placeholder="Kabupaten" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Kecamatan</label>
            <input name="kecamatan" value="<?= $data->kecamatan ?>" placeholder="Kecamatan" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Nama Virus</label>
            <input name="nama_virus" value="<?= $data->nama_virus ?>" placeholder="Virus" class="form-control" required>
        </div>

        <div class="col-sm-4">
        <div class="form-group">
            <label>Jumlah Korban</label>
            <input name="jml_korban" value="<?= $data->jml_korban ?>" placeholder="Korban" class="form-control" required>
        </div>
        </div>
        
        <div class="col-sm-4">
        <div class="form-group">
            <label>Jumlah Meninggal</label>
            <input name="jml_meninggal" value="<?= $data->jml_meninggal ?>" placeholder="Meninggal" class="form-control" required>
        </div>
        </div>

        <div class="col-sm-4">
        <div class="form-group">
            <label>Jumlah Sembuh</label>
            <input name="jml_sembuh" value="<?= $data->jml_sembuh ?>" placeholder="Sembuh" class="form-control" required>
        </div>
        </div>

        <div class="col-sm-6">
        <div class="form-group">
            <label>Latitude</label>
            <input name="latitude" id="Latitude" value="<?= $data->latitude ?>" placeholder="Latitude" class="form-control" required readonly>
        </div>
        </div>

        <div class="col-sm-6">
        <div class="form-group">
            <label>Longitude</label>
            <input name="longitude" id="Longitude" value="<?= $data->longitude ?>" placeholder="Longitude" class="form-control" required readonly>
        </div>
        </div>

        <div class="col-sm-6">
        <div class="form-group">
            <label>Radius</label>
            <select name="radius" class="form-control">
                <option value="<?= $data->radius ?>"><?= $data->radius ?></option>
                <option value="250">250</option>
                <option value="500">500</option>
                <option value="750">750</option>
                <option value="1000">1000</option>
                <option value="1250">1250</option>
            </select>

        </div>
        </div>

        <div class="col-sm-6">
        <div class="form-group">
            <label>Warna</label>
            <select name="warna" class="form-control">
                <option value="<?= $data->warna ?>"><?= $data->warna ?></option>
                <option value="red">Merah</option>
                <option value="purple">Ungu</option>
                <option value="yellow">Kuning</option>
                <option value="green">Hijau</option>
            </select>
        </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="reset" class="btn btn-success">Reset</button>
        </div>
        
<?php
echo form_close();
?>


</div>














<script>

var curLocation=[0,0];
if (curLocation[0]==0 && curLocation[1]==0) {
	curLocation =[-6.175696, 106.857294];	
}

var map = L.map('map').setView([-6.175696, 106.857294], 8);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 18,
    id: 'mapbox/streets-v11',
}).addTo(map);

map.attributionControl.setPrefix(false);

var marker = new L.marker(curLocation, {
	draggable:'true'
});

marker.on('dragend', function(event) {
var position = marker.getLatLng();
marker.setLatLng(position,{
	draggable : 'true'
	}).bindPopup(position).update();
	$("#Latitude").val(position.lat);
	$("#Longitude").val(position.lng).keyup();
});

$("#Latitude, #Longitude").change(function(){
	var position =[parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
	marker.setLatLng(position, {
	draggable : 'true'
	}).bindPopup(position).update();
	map.panTo(position);
});
map.addLayer(marker);
</script>