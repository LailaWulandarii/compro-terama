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
<section id="get-started" class="get-started features section-bg">
  <div class="container">
    <div class="tab-pane" id="tab-2">
      <div class="row">
        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
          <ul>
            <li><i class="bi bi-check2-all"></i> <?= $lang == 'id' ? $profil['deskripsi_perusahaan_id'] : $profil['deskripsi_perusahaan_en']; ?></li>
          </ul>
          <div class="col-12">
            <a href="<?= base_url($lang == 'id' ? 'id/tentang' : 'en/about') ?>"><button class="btn btn-warning text-white"><?= ($lang == 'id') ? 'Selengkapnya' : 'More'; ?></button></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 text-center">
          <img style="height: 500px;" src="<?= base_url('assets/img/profil/' . $profil['foto_perusahaan']); ?>" alt="<?= $lang == 'id' ? $profil['alt_foto_perusahaan_id'] : $profil['alt_foto_perusahaan_en']; ?>" class="img-fluid">
        </div>
      </div>
    </div><!-- End tab content item -->
  </div>
</section><!-- End Get Started Section -->
<?= $this->endSection(); ?>