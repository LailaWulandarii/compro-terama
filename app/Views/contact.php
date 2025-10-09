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
<section id="contact" class="contact-section ">

  <div class="container">
    <div class="section-header mb-2">
      <h2><?= $lang == 'id' ? $meta['nama_halaman_id'] : $meta['nama_halaman_en']; ?></h2>
      <p><?= $lang == 'id' ? $meta['title_id'] : $meta['title_en']; ?></p>
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
<?= $this->endSection(); ?>