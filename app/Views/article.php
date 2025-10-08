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

<!-- ======= Recent Blog Posts Section ======= -->
<!-- Article Section -->
<section class="news-section section-padding section-bg" id="section_5">
  <div class="container">
    <div class="row">

      <!-- Filter kategori artikel -->
      <div class="col-12 mb-4 text-center">
        <?php foreach ($categories as $cat): ?>
          <?php
          $slug = $lang === 'id' ? $cat['slug_kategori_id'] : $cat['slug_kategori_en'];
          $nama = $lang === 'id' ? $cat['nama_kategori_id'] : $cat['nama_kategori_en'];
          $urlmenu = $lang === 'id' ? 'artikel' : 'article';
          ?>
          <a href="<?= base_url("$lang/$urlmenu/$slug") ?>"
            class="btn btn-outline-primary btn-sm m-1 <?= ($categoryId == $cat['id_kategori_artikel']) ? 'active' : '' ?>">
            <?= esc($nama) ?>
          </a>
        <?php endforeach; ?>
      </div>


      <!-- Artikel Utama -->
      <div class="col-lg-8 col-12 bg-white p-4 rounded shadow-sm">
        <?php
        if (!empty($allArticle)) {
          usort($allArticle, function ($a, $b) {
            return strtotime($b['created_at']) - strtotime($a['created_at']);
          });
          $item = $allArticle[0];
        ?>
          <div class="news-block mb-4">
            <div class="news-block-top">
              <a href="<?= base_url("$lang/" . ($lang === 'id' ? 'artikel' : 'article') . '/' . ($item['slug_kategori'] ?? '') . '/' . ($lang === 'id' ? $item['slug_artikel_id'] : $item['slug_artikel_en'])) ?>">
                <img src="<?= base_url('assets/img/artikel/' . $item['foto_artikel']) ?>"
                  class="img-fluid w-100 rounded shadow-sm"
                  style="height: 360px; object-fit: cover;"
                  alt="<?= esc($lang === 'id' ? $item['alt_artikel_id'] : $item['alt_artikel_en']) ?>">
              </a>
              <div class="bg-secondary text-white px-3 py-1 mt-2 d-inline-block rounded">
                <?= esc($item['nama_kategori'] ?? '-') ?>
              </div>
            </div>

            <div class="mt-3">
              <p class="text-muted mb-1">

                <?= date('F d, Y', strtotime($item['created_at'])) ?>
              </p>
              <h4 class="mb-1">
                <a href="<?= base_url("$lang/" . ($lang === 'id' ? 'artikel' : 'article') . '/' . ($item['slug_kategori'] ?? '') . '/' . ($lang === 'id' ? $item['slug_artikel_id'] : $item['slug_artikel_en'])) ?>"
                  class="text-dark">
                  <?= esc($lang === 'id' ? $item['judul_artikel_id'] : $item['judul_artikel_en']) ?>
                </a>
              </h4>
              <p class="text-secondary">
                <?= esc(strip_tags($lang === 'id' ? $item['snippet_id'] : $item['snippet_en'])) ?>
              </p>
            </div>
          </div>
        <?php } else { ?>
          <p class="text-center text-muted">
            <?= $lang === 'id' ? 'Belum ada artikel di kategori ini.' : 'No articles in this category.' ?>
          </p>
        <?php } ?>
      </div>

      <!-- Sidebar -->
      <div class="col-lg-4 col-12">
        <div class="p-4 bg-white rounded">
          <h5 class="mb-3"><?= $lang === 'id' ? 'Artikel Lainnya' : 'Other Articles' ?></h5>

          <?php foreach ($sideArticle as $side): ?>
            <div class="d-flex mb-3">
              <div class="me-3" style="flex-shrink: 0;">
                <a href="<?= base_url("$lang/" . ($lang === 'id' ? 'artikel' : 'article') . '/' . ($side['slug_kategori'] ?? '') . '/' . ($lang === 'id' ? $side['slug_artikel_id'] : $side['slug_artikel_en'])) ?>">
                  <img src="<?= base_url('assets/img/artikel/' . $side['foto_artikel']) ?>"
                    class="img-fluid rounded"
                    style="width: 80px; height: 80px; object-fit: cover;"
                    alt="<?= esc($lang === 'id' ? $side['alt_artikel_id'] : $side['alt_artikel_en']) ?>">
                </a>
              </div>
              <div>
                <h6 class="mb-1">
                  <a href="<?= base_url("$lang/" . ($lang === 'id' ? 'artikel' : 'article') . '/' . ($side['slug_kategori'] ?? '') . '/' . ($lang === 'id' ? $side['slug_artikel_id'] : $side['slug_artikel_en'])) ?>"
                    class="text-dark">
                    <?= esc($lang === 'id' ? $side['judul_artikel_id'] : $side['judul_artikel_en']) ?>
                  </a>
                </h6>
                <small class="text-muted">
                  <i class="bi-calendar4 me-1"></i>
                  <?= date('F d, Y', strtotime($side['created_at'])) ?>
                </small>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>