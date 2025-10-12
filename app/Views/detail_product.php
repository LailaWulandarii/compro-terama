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

<section class="product-detail">
  <div class="container bg-white p-4 rounded shadow-sm">
    <div class="row">
      <!-- Gambar Produk -->
      <div class="col-lg-6 col-md-6 col-12 mb-4 ">
        <img src="<?= base_url('assets/img/produk/' . $product['foto_produk']); ?>"
          class="img-fluid rounded shadow"
          alt="<?= esc($lang === 'id' ? $product['alt_produk_id'] : $product['alt_produk_en']); ?>">
      </div>

      <!-- Deskripsi Produk -->
      <div class="col-lg-6 col-md-6 col-12">
        <h2 class="mb-3">
          <?= esc($lang === 'id' ? $product['nama_produk_id'] : $product['nama_produk_en']); ?>
        </h2>

        <p>
          <?= $lang == 'id' ? $product['deskripsi_produk_id'] : $product['deskripsi_produk_en']; ?>
        </p>

        <!-- Jika butuh tombol aksi -->
        <a href="<?= base_url($lang . '/produk'); ?>" class="btn btn-outline-primary mt-3">
          <?= $lang === 'id' ? 'Kembali ke Daftar Produk' : 'Back to Product List'; ?>
        </a>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>