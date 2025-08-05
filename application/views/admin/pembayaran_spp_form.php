<div class="container mt-3">
    <h4>Form Pembayaran SPP</h4>
    <h4>Kirim Ke Nomor Rekening BRI</h4>
    <h2>353501041080530</h2>
    <form action="<?= base_url('admin/pembayaran_spp/simpan') ?>" method="post" enctype="multipart/form-data">
        <input type="text" name="nama_siswa" placeholder="Nama Siswa" class="form-control" required><br>
        <input type="text" name="nis" placeholder="NIS" class="form-control" required><br>
        <input type="text" name="bulan" placeholder="Bulan" class="form-control" required><br>
        <input type="text" name="tahun" placeholder="Tahun" class="form-control" required><br>
        <input type="number" name="jumlah" placeholder="Jumlah Bayar" class="form-control" required><br>
        <input type="file" name="bukti_transfer" class="form-control" required><br>
        <button type="submit" class="btn btn-success">Kirim</button>
    </form> 
</div>