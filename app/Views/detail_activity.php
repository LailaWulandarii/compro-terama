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
  <!-- ======= Projet Details Section ======= -->
  <section id="project-details" class="project-details">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row">
        <!-- Kolom Kiri: Detail Aktivitas -->
        <div class="col-lg-8 col-md-12 mb-4">
          <div class="card shadow-sm border-0">
            <img src="<?= base_url('assets/img/aktivitas/' . esc($aktivitas['foto_aktivitas'])) ?>" class="card-img-top" alt="<?= esc($lang === 'id' ? $aktivitas['alt_aktivitas_id'] : $aktivitas['alt_aktivitas_en']) ?>">
            <div class="card-body">
              <h1 class="card-title"><?= esc($lang === 'id' ? $aktivitas['judul_aktivitas_id'] : $aktivitas['judul_aktivitas_en']) ?></h1>
              <p class="card-text"><small class="text-muted"><span class="badge text-bg-primary"><?= $lang == 'id' ? $category['nama_kategori_id'] : $category['nama_kategori_en']; ?></span> - <?= date('d M Y', strtotime($aktivitas['updated_at'])); ?>
                </small></p>
              <p class="card-text">
                <?= $lang === 'id' ? $aktivitas['deskripsi_aktivitas_id'] : $aktivitas['deskripsi_aktivitas_en'] ?>
              </p>

            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12">
          <div class="card shadow-sm border-0">
            <div class="card-header bg-white">
              <h5 class="mb-0"><?= $lang === 'id' ? 'Aktivitas Lainnya' : 'Other Activities' ?></h5>
            </div>
            <div class="list-group list-group-flush">
              <?php if (!empty($allAktivitas)) : ?>
                <?php foreach ($allAktivitas as $item) : ?>
                  <?php
                  $slug = $lang === 'id' ? $item['slug_aktivitas_id'] : $item['slug_aktivitas_en'];
                  $categorySlug = $lang === 'id' ? $item['slug_kategori_id'] : $item['slug_kategori_en'];
                  $url = base_url($lang . '/' . ($lang === 'id' ? 'aktivitas' : 'activity') . '/' . $categorySlug . '/' . $slug);
                  $title = $lang === 'id' ? $item['judul_aktivitas_id'] : $item['judul_aktivitas_en'];
                  $alt = $lang === 'id' ? $item['alt_aktivitas_id'] : $item['alt_aktivitas_en'];
                  $date = date('d M Y', strtotime($item['created_at']));
                  ?>
                  <a href="<?= $url ?>" class="list-group-item list-group-item-action d-flex gap-3 p-2">
                    <img src="<?= base_url('assets/img/aktivitas/' . esc($item['foto_aktivitas'])) ?>"
                      alt="<?= esc($alt) ?>"
                      class="rounded" width="64" height="64" style="object-fit: cover;">
                    <div>
                      <h6 class="mb-1"><?= esc($title) ?></h6>
                      <small class="text-muted"><?= $date ?></small>
                    </div>
                  </a>
                <?php endforeach; ?>
              <?php else : ?>
                <div class="list-group-item text-muted">
                  <?= $lang === 'id' ? 'Tidak ada aktivitas lain' : 'No other activities' ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    </div>
  </section><!-- End Projet Details Section -->

</main><!-- End #main -->
<?= $this->endSection(); ?>