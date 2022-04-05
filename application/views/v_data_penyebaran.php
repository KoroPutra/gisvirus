<?php

if($this->session->flashdata('pesan')) 
    {
        echo '<div class="alert alert-success">';
        echo $this->session->flashdata('pesan');
        echo '</div>';
    }

?>  

<table class="table table-responsive table-striped table-bordered table-hove" id="dataTables-example">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Wilayah</th>
            <th>Provinsi</th>
            <th>Kabupaten</th>
            <th>Kecamatan</th>
            <th>Nama Virus</th>
            <th>Korban</th>
            <th>Meninggal</th>
            <th>Sembuh</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach ($penyebaran as $key => $value) { ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?=$value->nama_wilayah?></td>
                <td><?=$value->provinsi?></td>
                <td><?=$value->kabupaten?></td>
                <td><?=$value->kecamatan?></td>
                <td><?=$value->nama_virus?></td>
                <td><?=$value->jml_korban?></td>
                <td><?=$value->jml_meninggal?></td>
                <td><?=$value->jml_sembuh?></td>
                <td>
                    <a href="<?= base_url('home/edit/'.$value->id) ?>" class="btn btn-xs btn-success">Edit</a>
                    <a href="<?= base_url('home/delete/'.$value->id) ?>" class="btn btn-xs btn-danger">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>