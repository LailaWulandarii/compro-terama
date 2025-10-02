<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
  <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

    <h2>Blog</h2>
    <ol>
      <li><a href="index.html">Home</a></li>
      <li>Blog</li>
    </ol>

  </div>
</div><!-- End Breadcrumbs -->

<!-- ======= Recent Blog Posts Section ======= -->
<!-- Article Section -->
<section id="article" class="article-section mb-3">
  <div class="container">
    <div class="section-header mb-2">
      <h2><?= $lang == 'id' ? $meta['nama_halaman_id'] : $meta['nama_halaman_en']; ?></h2>
      <p><?= $lang == 'id' ? $meta['title_id'] : $meta['title_en']; ?></p>
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
<?= $this->endSection(); ?>