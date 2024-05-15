<?= $this->extend('v_template') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h1 class="mb-4">List Barang</h1>
    <div class="d-flex justify-content-end mb-3">
    </div>
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    <div class="row">
        <?php foreach ($barang as $item): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="<?= $item['foto'] ?>" class="card-img-top" alt="<?= $item['nama'] ?>" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= $item['nama'] ?></h5>
                        <p class="card-text">Harga: Rp. <?= number_format($item['harga'], 0, ',', '.') ?></p>
                        <p class="card-text">Stok: <?= $item['stok'] ?></p>
                        <div class="mt-auto d-flex justify-content-between">
                            <a href="<?= site_url('barang/detail/' . $item['id']) ?>" class="btn btn-info">Detail</a>
                            
                            <a href="<?= site_url('cart/add/' . $item['id']) ?>" class="btn btn-success">Tambah ke Keranjang</a>
                             
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        
    </div>
</div>
<?= $this->endSection() ?>
