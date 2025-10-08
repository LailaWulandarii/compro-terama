<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs d-flex align-items-center">
    <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
      <h2> <?= $lang === 'id' ? $meta['nama_halaman_id'] : $meta['nama_halaman_en']; ?></h2>
      <p class="mt-2" style="color: white;">
        <?= $lang == 'id' ? $meta['deskripsi_halaman_id'] : $meta['deskripsi_halaman_en']; ?>
      </p>
    </div>
  </div>
  <!-- ======= Our Projects Section ======= -->
  <section id="projects" class="projects">
    <div class="container" data-aos="fade-up">
      <div class="row gy-4">

        <!-- Filter kategori aktivitas -->

        <div class="col-12 mb-4 text-center">
          <?php foreach ($categoriesAktivitas as $cat): ?>
            <?php
            $slug = $lang === 'id' ? $cat['slug_kategori_id'] : $cat['slug_kategori_en'];
            $nama = $lang === 'id' ? $cat['nama_kategori_id'] : $cat['nama_kategori_en'];
            ?>
            <a href="<?= base_url($lang . '/' . ($lang === 'id' ? 'aktivitas' : 'activity') . '/' . $slug) ?>"
              class="btn btn-outline-primary btn-sm m-1">
              <?= esc($nama) ?>
            </a>
          <?php endforeach; ?>
        </div>
        <?php if (!empty($allAktivitas)): ?>
          <?php foreach ($allAktivitas as $item): ?>
            <div class="col-lg-4 col-md-6 col-12 mb-4">
              <div class="card h-100">
                <img src="<?= base_url('assets/img/aktivitas/' . esc($item['foto_aktivitas'])) ?>"
                  class="card-img-top"
                  alt="<?= esc($lang === 'id' ? $item['alt_aktivitas_id'] : $item['alt_aktivitas_en']) ?>">
                <div class="card-body">
                  <h5 class="card-title">
                    <?= esc($lang === 'id' ? $item['judul_aktivitas_id'] : $item['judul_aktivitas_en']) ?>
                  </h5>
                  <p class="card-text"><small class="text-muted"><span class="badge text-bg-primary"><?= $lang == 'id' ? $item['nama_kategori'] : $item['nama_kategori']; ?></span> - <?= date('d M Y', strtotime($item['updated_at'])); ?>
                    </small></p>
                  <p class="card-text">
                    <?= $lang === 'id' ? $item['meta_desc_id'] : $item['meta_desc_en'] ?>...
                  </p>
                  <?php
                  $categorySlug = $lang === 'id' ? $item['slug_kategori_id'] : $item['slug_kategori_en'];
                  $activitySlug = $lang === 'id' ? $item['slug_aktivitas_id'] : $item['slug_aktivitas_en'];
                  $urlmenu = $lang === 'id' ? 'aktivitas' : 'activity';
                  ?>
                  <a href="<?= base_url("$lang/$urlmenu/$categorySlug/$activitySlug") ?>" class="custom-btn btn ">
                    <?= $lang === 'id' ? 'Lihat Detail' : 'View Detail' ?>
                  </a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="col-12 text-center">
            <p><?= $lang === 'id' ? 'Belum ada aktivitas.' : 'No activities available.' ?></p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section><!-- End Our Projects Section -->

</main><!-- End #main -->
<?= $this->endSection(); ?>