<div class="table-wrap">
    <div class="table-responsive ">
        <table id="tb_riwayat" class="table table-hover display">
            <thead>
                <tr class="bg-success">
                    <th>NO SEP</th>
                    <th>NO KARTU</th>
                    <th>NAMA</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row) {
                } ?>
                <tr>
                    <td><?php echo $row['noSep']; ?></td>
                    <td><?php echo $row['peserta']['noKartu']; ?></td>
                    <td><?php echo $row['peserta']['nama']; ?></td>
                </tr>
            </tbody>
            <tfoot>
                <tr class="bg-success">
                    <th>NO SEP</th>
                    <th>NO KARTU</th>
                    <th>NAMA</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>