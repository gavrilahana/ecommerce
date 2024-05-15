<?= $this->extend('v_template') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h1 class="mb-4">Keranjang</h1>
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($barang)): ?>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">Nama Barang</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $totalHarga = 0;
            foreach ($barang as $id => $item): 
                $subtotal = isset($item['quantity']) ? $item['harga'] * $item['quantity'] : 0;
                $totalHarga += $subtotal;
            ?>
                <tr>
                    <td><?= $item['nama'] ?></td>
                    <td>Rp. <?= number_format($item['harga'], 0, ',', '.') ?></td>
                    <td><?= isset($item['quantity']) ? $item['quantity'] : 0 ?></td>
                    <td>Rp. <?= number_format($subtotal, 0, ',', '.') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3" class="text-end">Total Harga:</th>
                <td>Rp. <?= number_format($totalHarga, 0, ',', '.') ?></td>
            </tr>
            <tr>
                <td colspan="4" class="text-start">
                    <a href="<?= site_url('checkout') ?>" class="btn btn-primary">Lanjut</a>
                </td>
            </tr>
        </tfoot>
    </table>
    <?php else: ?>
    <div class="text-center">
        <p>Keranjang kosong</p>
        <a href="<?= site_url('/') ?>" class="btn btn-primary">Belanja Sekarang</a>
    </div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>
