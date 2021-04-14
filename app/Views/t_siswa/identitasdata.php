<table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%" id="dataidentitas">
    <thead>
        <tr>
            <th>No</th>
            <th>Nis</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>No Telpon</th>
            <th style="width:80px;">Action
                </p>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($tampildata as $identitas) { ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $identitas['nis']; ?></td>
                <td><?php echo $identitas['nama']; ?></td>
                <td><?php echo $identitas['jenis_kelamin']; ?></td>
                <td><?php echo $identitas['no_telpon']; ?></td>
                <td>
                    <button class="btn btn-primary" onclick="delete_modul(<?php echo $identitas['id']; ?>)">View</button>
                </td>
            </tr>
        <?php } ?>

    </tbody>

    <tfoot>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Keterangan</th>
            <th>Format</th>
            <th>Tanggal</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>
</div>