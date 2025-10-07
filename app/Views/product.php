<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs d-flex align-items-center">
  <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
    <h2> <?= $lang === 'id' ? $meta['nama_halaman_id'] : $meta['nama_halaman_en']; ?></h2>
    <p class="mt-2" style="color: white;">
      <?= $lang == 'id' ? $meta['deskripsi_halaman_id'] : $meta['deskripsi_halaman_en']; ?>
    </p>
  </div>
</div>

<!-- ======= Services Section ======= -->
<section id="product" class="product-section mb-3">
  <div class="container">
    <div class="row">
      <?php foreach ($product as $p) : ?>
        <div class="col-md-3 py-3 py-md-0">
          <a href="<?= base_url(
                      $lang == 'id'
                        ? 'id/produk/' . (!empty($p['slug_id']) ? $p['slug_id'] : 'produk-tidak-ditemukan')
                        : 'en/product/' . (!empty($p['slug_en']) ? $p['slug_en'] : 'product-not-found')
                    ); ?>" style="text-decoration: none; color: inherit;">
            <div class="productcard h-100">
              <img src="<?= base_url('assets/img/produk/' . $p['foto_produk']); ?>"
                alt="<?= $lang == 'id' ? $p['alt_produk_id'] : $p['alt_produk_en']; ?>"
                class="card image-top img-fluid">
              <div class="card-body">
                <h6 class="text-center productname">
                  <?= $lang == 'id' ? $p['nama_produk_id'] : $p['nama_produk_en']; ?>
                </h6>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>