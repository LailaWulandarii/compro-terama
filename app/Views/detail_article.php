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

  <!-- ======= Blog Details Section ======= -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-12">

        <article class="blog-details">

          <div class="post-img">
            <img src="<?= base_url('assets/img/artikel/' . $artikel['foto_artikel']); ?>" alt="<?= $lang == 'id' ? $artikel['alt_artikel_id'] : $artikel['alt_artikel_en']; ?>" class="img-fluid" style="height: 300px; width: 100%; object-fit: cover;">
          </div>

          <h2 class="title"><?= $lang == 'id' ? $artikel['judul_artikel_id'] : $artikel['judul_artikel_en']; ?></h2>

          <div class="meta-top">
            <ul>
              <li class="d-flex align-items-center"><i class="bi bi-person"></i> <?= $lang == 'id' ? $artikel['nama_kategori_id'] : $artikel['nama_kategori_en']; ?></li>
              <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <time
                  datetime="2020-01-01"><?= date('d F Y', strtotime($artikel['created_at'])); ?></time></li>
            </ul>
          </div><!-- End meta top -->

          <div class="content">
            <?= $lang == 'id' ? $artikel['deskripsi_artikel_id'] : $artikel['deskripsi_artikel_en']; ?>
          </div><!-- End post content -->
        </article><!-- End blog post -->
      </div>
  </section><!-- End Blog Details Section -->

</main><!-- End #main -->
<?= $this->endSection(); ?>