<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero">
  <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
    <?php foreach ($slider as $index => $slide): ?>
      <div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>">
        <img src="<?= base_url('assets/img/slider/' . $slide['foto_slider']) ?>"
          class="d-block w-100"
          alt="<?= ($lang == 'id') ? $slide['alt_foto_slider_id'] : $slide['alt_foto_slider_en']; ?>">

        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center" style="min-height: 100vh;">
          <div class="info d-flex align-items-center">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                  <h1 class="judul text-white" data-aos="fade-down">
                    <?= ($lang == 'id') ? $slide['alt_foto_slider_id'] : $slide['alt_foto_slider_en']; ?>
                  </h1>
                  <p data-aos="fade-up">
                    <?= ($lang == 'id') ? $slide['caption_slider_id'] : $slide['caption_slider_en']; ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>
<!-- End Hero Section -->

<!-- ======= Get Started Section ======= -->
<section id="get-started" class="get-started features section-bg">
  <div class="container">
    <div class="section-header">
      <h2><?= $lang == 'id' ? $aboutMeta['nama_halaman_id'] : $aboutMeta['nama_halaman_en']; ?></h2>
      <p><?= $lang == 'id' ? $aboutMeta['title_id'] : $aboutMeta['title_en']; ?></p>
    </div>
    <div class="tab-pane" id="tab-2">
      <div class="row">
        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
          <h3><?= $lang == 'id' ? $aboutMeta['deskripsi_halaman_id'] : $aboutMeta['deskripsi_halaman_en']; ?></h3>
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

<section id="product" class="product-section mb-3">
  <div class="container">
    <div class="section-header mb-2">
      <h2><?= $lang == 'id' ? $productMeta['nama_halaman_id'] : $productMeta['nama_halaman_en']; ?></h2>
      <p><?= $lang == 'id' ? $productMeta['title_id'] : $productMeta['title_en']; ?></p>
    </div>
    <div class="row">
      <?php foreach (array_slice($product, 0, 4) as $p) : ?>
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
    <div class="text-center mt-5">
      <a href="<?= base_url($lang == 'id' ? 'id/produk' : 'en/product') ?>" class="lihatsemua btn btn-warning text-white">
        <?= lang('bahasa.Lihat Semua'); ?>
      </a>
    </div>
  </div>
</section>


<!-- ======= Our Projects Section ======= -->
<!-- activity -->
<!-- activity -->
<section id="activity" class="activity-section section-bg mb-3">
  <div class="container">
    <div class="section-header mb-2">
      <h2><?= $lang == 'id' ? $aktivitasMeta['nama_halaman_id'] : $aktivitasMeta['nama_halaman_en']; ?></h2>
      <p><?= $lang == 'id' ? $aktivitasMeta['title_id'] : $aktivitasMeta['title_en']; ?></p>
    </div>
    <div class="row">
      <?php foreach (array_slice($aktivitas, 0, 4) as $item) : ?>
        <div class="col-md-3 py-3 py-md-0">
          <a href="<?= base_url(
                      $lang == 'id'
                        ? 'id/aktivitas/' . (!empty($item['slug_kategori_id']) ? $item['slug_kategori_id'] : 'kategori-tidak-ditemukan') . '/' . (!empty($item['slug_aktivitas_id']) ? $item['slug_aktivitas_id'] : 'aktivitas-tidak-ditemukan')
                        : 'en/activity/' . (!empty($item['slug_kategori_en']) ? $item['slug_kategori_en'] : 'category-not-found') . '/' . (!empty($item['slug_aktivitas_en']) ? $item['slug_aktivitas_en'] : 'activity-not-found')
                    ); ?>" style="text-decoration: none; color: inherit;">
            <div class="activitycard h-100">
              <img src="<?= base_url('assets/img/aktivitas/' . $item['foto_aktivitas']) ?>"
                alt="<?= $lang == 'id' ? $item['alt_aktivitas_id'] : $item['alt_aktivitas_en']; ?>"
                class="card image-top img-fluid">
              <div class="card-body">
                <h6 class="text-center activityname">
                  <?= $lang == 'id' ? $item['judul_aktivitas_id'] : $item['judul_aktivitas_en']; ?>
                </h6>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="text-center mt-5">
      <a href="<?= base_url($lang == 'id' ? 'id/aktivitas' : 'en/activity') ?>" class="lihatsemua btn btn-warning text-white">
        <?= lang('bahasa.Lihat Semua'); ?>
      </a>
    </div>
  </div>
</section>
<!-- end of activity -->

<!-- end of activity -->


<!-- ======= Recent Blog Posts Section ======= -->
<!-- Article Section -->
<section id="article" class="article-section mb-3">
  <div class="container">
    <div class="section-header mb-2">
      <h2><?= $lang == 'id' ? $articleMeta['nama_halaman_id'] : $articleMeta['nama_halaman_en']; ?></h2>
      <p><?= $lang == 'id' ? $articleMeta['title_id'] : $articleMeta['title_en']; ?></p>
    </div>

    <div class="row gy-4">
      <!-- Kolom Kiri dengan Artikel Besar -->
      <div class="col-lg-8">
        <?php if (!empty($article[0])): ?>
          <?php $mainArticle = $article[0]; ?>
          <div class="row">
            <a href="<?= base_url(
                        $lang === 'id'
                          ? 'id/artikel/' . ($mainArticle['slug_kategori_id'] ?? 'kategori-tidak-ditemukan') . '/' . ($mainArticle['slug_artikel_id'] ?? 'artikel-tidak-ditemukan')
                          : 'en/article/' . ($mainArticle['slug_kategori_en'] ?? 'category-not-found') . '/' . ($mainArticle['slug_artikel_en'] ?? 'article-not-found')
                      ); ?>" style="display: block; text-decoration: none; color: inherit;">
              <div class="articlecard d-flex flex-column justify-content-center">
                <img src="<?= base_url('assets/img/artikel/' . $mainArticle['foto_artikel']); ?>"
                  alt="<?= $lang == 'id' ? $mainArticle['alt_artikel_id'] : $mainArticle['alt_artikel_en']; ?>">
                <h2 class="mt-3">
                  <strong><?= $lang == 'id' ? $mainArticle['judul_artikel_id'] : $mainArticle['judul_artikel_en']; ?></strong>
                </h2>
                <div class="kategori-artikel mb-3" style="margin-top: 10px;">
                  <span class="badge text-bg-primary"><?= $mainArticle['nama_kategori']; ?></span>
                </div>
                <p style="margin-top: 10px;">
                  <?= $lang == 'id' ? $mainArticle['snippet_id'] : $mainArticle['snippet_en']; ?>
                </p>
                <div class="d-flex">
                  <a href="<?= base_url(
                              $lang === 'id'
                                ? 'id/artikel/' . ($mainArticle['slug_kategori_id'] ?? 'kategori-tidak-ditemukan') . '/' . ($mainArticle['slug_artikel_id'] ?? 'artikel-tidak-ditemukan')
                                : 'en/article/' . ($mainArticle['slug_kategori_en'] ?? 'category-not-found') . '/' . ($mainArticle['slug_artikel_en'] ?? 'article-not-found')
                            ); ?>" class="button-text button-bg" style="margin-top: 10px;">
                    <?= lang('bahasa.Baca Selengkapnya'); ?>
                  </a>
                </div>
              </div>
            </a>
          </div>
        <?php else: ?>
          <p><?= $lang == 'id' ? 'Belum ada artikel utama.' : 'No main article available.'; ?></p>
        <?php endif; ?>
      </div>

      <!-- Kolom Kanan dengan Artikel Kecil -->
      <div class="col-lg-4">
        <?php if (!empty($sideArtikel)): ?>
          <?php foreach (array_slice($sideArtikel, 0, 4) as $side): ?>
            <div class="row mb-4 align-items-start article-item">
              <a href="<?= base_url(
                          $lang == 'id'
                            ? 'id/artikel/' . ($side['slug_kategori_id'] ?? 'kategori-tidak-ditemukan') . '/' . ($side['slug_artikel_id'] ?? 'artikel-tidak-ditemukan')
                            : 'en/article/' . ($side['slug_kategori_en'] ?? 'category-not-found') . '/' . ($side['slug_artikel_en'] ?? 'article-not-found')
                        ); ?>" style="text-decoration: none; color: inherit;">
                <div class="col-12 d-flex">
                  <img src="<?= base_url('assets/img/artikel/' . $side['foto_artikel']); ?>"
                    alt="<?= $lang == 'id' ? $side['alt_artikel_id'] : $side['alt_artikel_en']; ?>"
                    class="d-block me-3"
                    style="width: 100px; height: 100px; object-fit: cover; border-radius: 5%;" loading="lazy">
                  <div>
                    <strong><?= $lang == 'id' ? $side['judul_artikel_id'] : $side['judul_artikel_en']; ?></strong>
                    <p class="deskripsi">
                      <?= implode(' ', array_slice(explode(' ', $lang == 'id' ? $side['snippet_id'] : $side['snippet_en']), 0, 7)) . '...'; ?>
                    </p>
                  </div>
                </div>
              </a>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p><?= $lang == 'id' ? 'Tidak ada artikel terkait.' : 'No related articles.'; ?></p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<!-- end of article -->
<!-- End Recent Blog Posts Section -->

<!-- ======= Contact Section ======= -->

<!-- contact -->

<section id="contact" class="contact-section mb-5 " style="margin-top: 30px;">

  <div class="container">
    <div class="section-header mb-2">
      <h2><?= $lang == 'id' ? $contactMeta['nama_halaman_id'] : $contactMeta['nama_halaman_en']; ?></h2>
      <p><?= $lang == 'id' ? $contactMeta['title_id'] : $contactMeta['title_en']; ?></p>
    </div>
    <div class="row align-items-center">
      <!-- Kolom kiri: informasi kontak dari database -->
      <div class="col-lg-4 col-12 ms-auto mb-5 mb-lg-0">
        <div class="contact-info-wrap">
          <!-- <h2><?= esc($lang == 'id' ? $meta['nama_halaman_id'] : $meta['nama_halaman_en']); ?></h2> -->


          <div class="contact-info">
            <!-- <h5 class="mb-3"><?= ($lang == 'id') ? $meta['deskripsi_halaman_id'] : $meta['deskripsi_halaman_en'] ?></h5> -->

            <p><?= ($lang == 'id') ? $kontak['deskripsi_kontak_id'] : $kontak['deskripsi_kontak_en'] ?></p>
          </div>
        </div>
      </div>

      <!-- Kolom kanan: Google Maps -->
      <div class="col-lg-6 col-12 mx-auto">
        <div class="ratio ratio-4x3">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.525694167994!2d112.61282937401006!3d-7.9445006920797265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78827489ab9d67%3A0xcad03ec85e51098!2sJl.%20Simpang%20Remujung%20No.3%2C%20Jatimulyo%2C%20Kec.%20Lowokwaru%2C%20Kota%20Malang%2C%20Jawa%20Timur%2065141!5e0!3m2!1sid!2sid!4v1739112900065!5m2!1sid!2sid"
            width="100%"
            height="100%"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end of contact -->
<?= $this->endSection(); ?>