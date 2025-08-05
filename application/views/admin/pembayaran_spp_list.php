<div class="container mt-3">
    <h4>Data Pembayaran SPP</h4>
    <a href="<?= base_url('admin/pembayaran_spp/tambah') ?>" class="btn btn-primary mb-3">Tambah Pembayaran</a>
    <table class="table table-bordered">
        <tr>
            <th>Nama</th><th>NIS</th><th>Bulan</th><th>Tahun</th><th>Jumlah</th>
            <th>Bukti</th><th>Status</th><th>Aksi</th>
        </tr>
        <?php foreach($pembayaran as $p): ?>
        <tr>
            <td><?= $p->nama_siswa ?></td>
            <td><?= $p->nis ?></td>
            <td><?= $p->bulan ?></td>
            <td><?= $p->tahun ?></td>
            <td>Rp <?= number_format($p->jumlah) ?></td>
            <td><a href="<?= base_url('uploads/bukti/' . $p->bukti_transfer) ?>" target="_blank">Lihat</a></td>
            <td><?= $p->status ?></td>
            <td>
                <?php if($p->status == 'Menunggu Verifikasi'): ?>
                <a href="<?= base_url('admin/pembayaran_spp/verifikasi/' . $p->id) ?>" class="btn btn-success btn-sm">Verifikasi</a>
                <?php endif; ?>
                <a href="<?= base_url('admin/pembayaran_spp/hapus/' . $p->id) ?>" class="btn btn-danger btn-sm"
       onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>