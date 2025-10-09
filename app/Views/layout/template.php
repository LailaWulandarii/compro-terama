<?php
$lang = session()->get('lang') ?? 'id'; // Default ke 'id' jika tidak ada di session

$current_url = uri_string();

// Ambil query string (misalnya ?keyword=sukses)
$query_string = $_SERVER['QUERY_STRING'] ?? ''; // Pastikan tidak ada error jika query string kosong

// Simpan segmen bahasa saat ini
$segments = explode('/', $current_url);
$lang_segment = $segments[0] ?? ''; // Ambil segmen pertama dari URL

// Pastikan hanya 'en' atau 'id' yang dianggap sebagai segmen bahasa
if ($lang_segment !== 'en' && $lang_segment !== 'id') {
    $lang_segment = 'id'; // Default ke 'id' jika segmen bahasa tidak ada
}

// Definisikan tautan untuk setiap halaman berdasarkan bahasa
$homeLink    = ($lang_segment === 'en') ? '/' : '/';
$aboutLink   = ($lang_segment === 'en') ? 'about' : 'tentang';
$contactLink = ($lang_segment === 'en') ? 'contact' : 'kontak';
$articleLink = ($lang_segment === 'en') ? 'article' : 'artikel';
$activityLink = ($lang_segment === 'en') ? 'activity' : 'aktivitas';
$productLink = ($lang_segment === 'en') ? 'product' : 'produk';

// Ambil bagian dari URL tanpa segmen bahasa
array_shift($segments); // Hapus segmen bahasa dari array
$url_without_lang = implode('/', $segments); // Gabungkan kembali sisa URL

// Tentukan bahasa yang ingin digunakan
$new_lang = ($lang_segment === 'en') ? 'id' : 'en';

// Mapping penggantian segmen dalam URL berdasarkan bahasa yang aktif
$replace_map = [
    'tentang' => 'about',
    'kontak' => 'contact',
    'artikel' => 'article',
    'aktivitas' => 'activity',
    'produk' => 'product',
];

foreach ($replace_map as $id => $en) {
    if ($lang_segment === 'en') {
        // Jika bahasa saat ini 'en', ubah ke 'id'
        $url_without_lang = str_replace($en, $id, $url_without_lang);
    } else {
        // Jika bahasa saat ini 'id', ubah ke 'en'
        $url_without_lang = str_replace($id, $en, $url_without_lang);
    }
}

// Buat URL yang bersih
$clean_url = ($url_without_lang !== '') ? "$new_lang/$url_without_lang" : $new_lang;

// Gabungkan query string jika ada
if (!empty($query_string)) {
    $clean_url .= '?' . $query_string;
}

// Tautan Bahasa Inggris & Indonesia
$english_url = base_url($clean_url);
$indonesia_url = base_url($clean_url);

// Tautan Kategori Artikel untuk Navbar
$categoryLinks = [];
if (!empty($categories)) {
    foreach ($categories as $cat) {
        $slug = ($lang === 'id') ? $cat['slug_kategori_id'] : $cat['slug_kategori_en'];
        $name = ($lang === 'id') ? $cat['nama_kategori_id'] : $cat['nama_kategori_en'];
        $categoryLinks[] = [
            'url' => base_url("$lang/$articleLink/$slug"),
            'name' => $name
        ];
    }
}

// Tautan Kategori Aktivitas untuk Navbar
$kategoriAktivitasLinks = [];
if (!empty($categoriesAktivitas)) {
    foreach ($categoriesAktivitas as $cat) {
        $slug = ($lang === 'id') ? $cat['slug_kategori_id'] : $cat['slug_kategori_en'];
        $name = ($lang === 'id') ? $cat['nama_kategori_id'] : $cat['nama_kategori_en'];
        $kategoriAktivitasLinks[] = [
            'url' => base_url("$lang/$activityLink/$slug"),
            'name' => $name
        ];
    }
}
?>


<!DOCTYPE html>
<html lang="<?= session()->get('lang') ?? 'id'; ?>">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <?php if (isset($metaCategory)): ?>
        <title><?= $lang == 'id' ? $metaCategory['title_id'] : $metaCategory['title_en']; ?></title>
        <meta name="description" content="<?= $lang == 'id' ? $metaCategory['meta_desc_id'] : $metaCategory['meta_desc_en']; ?>">
    <?php else: ?>
        <title><?= $lang == 'id' ? $meta['title_id'] : $meta['title_en']; ?></title>
        <meta name="description" content="<?= $lang == 'id' ? $meta['meta_desc_id'] : $meta['meta_desc_en']; ?>">
    <?php endif; ?>

    <!-- Favicons -->
    <link href=" <?= base_url('favicon.ico') ?>" rel="icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/aos/aos.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/glightbox/css/glightbox.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/swiper/swiper-bundle.min.css'); ?>" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('assets/css/main.css'); ?>" rel="stylesheet">
    <style>
        .header {
            background: transparent !important;
            box-shadow: none !important;
            /* hilangkan bayangan */
            transition: background 0.3s ease;
            position: absolute;
            /* biar nempel di atas hero section */
            width: 100%;
            z-index: 999;
        }
    </style>

    <!-- =======================================================
  * Template Name: UpConstruction - v1.3.0
  * Template URL: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="/" class="logo d-flex align-items-center">
                <!-- <img src="<?= base_url('assets/img/logo.png') ?>" alt=""> -->
                <h1>Terama<span>.</span></h1>
            </a>

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

            <nav id="navbar" class="navbar">
                <ul>
                    <li>
                        <a href="<?= base_url($lang . '/') ?>"
                            class="nav-link <?= isset($data['activeMenu']) && $data['activeMenu'] === 'home' ? 'active' : '' ?>">
                            <?= lang('bahasa.Beranda'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url($lang . '/' . $aboutLink) ?>" class="nav-link <?= isset($data['activeMenu']) && $data['activeMenu'] === 'about' ? 'active' : '' ?>"><?= lang('bahasa.Tentang'); ?></a>
                    </li>
                    <li>
                        <a href="<?= base_url($lang . '/' . $productLink) ?>" class="nav-link <?= isset($activeMenu) && $activeMenu === 'product' ? 'active' : '' ?>"><?= lang('bahasa.Produk'); ?></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle <?= (uri_string() === 'activity' || str_contains(uri_string(), 'activity')) ? 'active' : '' ?>"
                            href="#" role="button">
                            <?= lang('bahasa.Aktivitas'); ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="nav-link dropdown-item" href="<?= base_url($lang . '/' . $activityLink) ?>"><?= $lang == 'id' ? 'Semua Aktivitas' : 'All Activity'; ?></a>
                                </a>
                            </li>
                            <?php if (!empty($kategoriAktivitasLinks)): ?>
                                <?php foreach ($kategoriAktivitasLinks as $kategoriAktivitasLink): ?>
                                    <li>
                                        <a class="nav-link dropdown-item" href="<?= $kategoriAktivitasLink['url']; ?>">
                                            <?= $kategoriAktivitasLink['name']; ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li><a class="dropdown-item"><?= $lang == 'id' ? 'Tidak ada kategori' : 'No Categories available'; ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle <?= (uri_string() === 'article' || str_contains(uri_string(), 'article')) ? 'active' : '' ?>"
                            href="#" role="button">
                            <?= lang('bahasa.Artikel'); ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="nav-link dropdown-item" href="<?= base_url($lang . '/' . $articleLink) ?>">
                                    <?= $lang == 'id' ? 'Semua Artikel' : 'All Article'; ?>
                                </a>
                            </li>
                            <?php if (!empty($categoryLinks)): ?>
                                <?php foreach ($categoryLinks as $categoryLink): ?>
                                    <li>
                                        <a class="nav-link dropdown-item" href="<?= $categoryLink['url']; ?>">
                                            <?= $categoryLink['name']; ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li><a class="dropdown-item"><?= $lang == 'id' ? 'Tidak ada kategori' : 'No Categories available'; ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li>
                        <a href="<?= base_url($lang . '/' . $contactLink) ?>" class="nav-link <?= isset($activeMenu) && $activeMenu === 'contact' ? 'active' : '' ?>"><?= lang('bahasa.Kontak'); ?></a>
                    </li>
                    <li class="dropdown">
                        <a href="#"><span><?= ($lang === 'en') ? 'English' : 'Indonesia'; ?></span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li><a class="<?= $lang === 'id' ? 'active disabled' : ''; ?>" href="<?= $indonesia_url; ?>"><img src="<?= base_url('assets/img/logo/indonesia.jpg') ?>" style="width: 20px;" alt="">Indonesia</a></li>
                            <li><a class="<?= $lang === 'en' ? 'active disabled' : ''; ?>" href="<?= $english_url; ?>"><img src="<?= base_url('assets/img/logo/english.jpg') ?>" style="width: 20px;" alt="">English</a></li>
                        </ul>
                    </li>
                </ul>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <?= $this->renderSection('content'); ?>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="footer-content position-relative">
            <div class="container">
                <div class="row text-center text-lg-start">
                    <!-- Brand and Description -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <h5 class="title">
                            <a href="/">
                                <img src="<?= base_url('assets/img/profil/' . $profil['logo_perusahaan']); ?>" alt="<?= $lang == 'id' ? $profil['alt_logo_perusahaan_id'] : $profil['alt_logo_perusahaan_en']; ?>" style="width: 30px; margin-right: 10px;">
                            </a>Terama
                        </h5>
                        <p class="deskripsi">Copyright © 2025 Aul. All rights reserved.</p>
                    </div>

                    <!-- Navigation Menu -->
                    <div class="col-lg-2 col-md-6 mb-4">
                        <h5><?= lang('bahasa.headerLink'); ?></h5>
                        <ul class="list-unstyled">
                            <li>
                                <a href="<?= base_url($lang . '/' . $homeLink) ?>"
                                    class="<?= isset($data['activeMenu']) && $data['activeMenu'] === 'home' ? 'active' : '' ?>" style="color: white; text-decoration: none;">
                                    <?= lang('bahasa.Beranda'); ?>
                                </a>
                            </li>
                            <li><a style="color: white; text-decoration: none;" href="<?= base_url($lang . '/' . $aboutLink) ?>" class="<?= isset($data['activeMenu']) && $data['activeMenu'] === 'about' ? 'active' : '' ?>"><?= lang('bahasa.Tentang'); ?></a></li>
                            <li><a style="color: white; text-decoration: none;" style="color: white; text-decoration: none;" href="<?= base_url($lang . '/' . $articleLink) ?>" class="<?= isset($data['activeMenu']) && $data['activeMenu'] === 'article' ? 'active' : '' ?>"><?= lang('bahasa.Artikel'); ?></a></li>
                            <li><a style="color: white; text-decoration: none;" href="<?= base_url($lang . '/' . $productLink) ?>" class="<?= isset($activeMenu) && $activeMenu === 'product' ? 'active' : '' ?>"><?= lang('bahasa.Produk'); ?></a></li>
                            <li><a style="color: white; text-decoration: none;" href="<?= base_url($lang . '/' . $contactLink) ?>" class="<?= isset($data['activeMenu']) && $data['activeMenu'] === 'contact' ? 'active' : '' ?>"><?= lang('bahasa.Kontak'); ?></a></li>
                        </ul>
                    </div>

                    <!-- Navigation Artikel -->
                    <div class="col-lg-2 col-md-6 mb-4">
                        <h5><?= lang('bahasa.headerService'); ?></h5>
                        <ul class="list-unstyled">
                            <?php if (!empty($kategori_teratas) && is_array($kategori_teratas)): ?>
                                <?php foreach ($kategori_teratas as $kategori): ?>
                                    <li>
                                        <a style="color: white; text-decoration: none;" href="<?= base_url("id/artikel/" . $kategori['slug_kategori_id']) ?>">
                                            <?= $kategori['nama_kategori_id']; ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li>No categories available</li>
                            <?php endif; ?>
                        </ul>
                    </div>

                    <!-- Social Media Links -->
                    <div class="col-lg-2 col-md-6 mb-4 text-center text-lg-start">
                        <h5><?= lang('bahasa.sosmedLink'); ?></h5>
                        <ul class="list-unstyled">
                            <?php if (!empty($sosmed) && is_array($sosmed)): ?>
                                <?php foreach ($sosmed as $s): ?>
                                    <li>
                                        <a style="color: white; text-decoration: none;" href="<?= $s['link_sosmed']; ?>" target="_blank">
                                            <img src="<?= base_url('assets/img/logo/' . $s['logo_sosmed']); ?>" alt="<?= $s['nama_sosmed']; ?>" style="width: 20px; height: 20px; margin-right: 5px;">
                                            <?= $s['nama_sosmed']; ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li>No social media available</li>
                            <?php endif; ?>
                        </ul>
                    </div>

                    <!-- Marketplace -->
                    <div class="col-lg-2 col-md-6 mb-4 text-center text-lg-start">
                        <h5><?= lang('bahasa.marketplaceLink'); ?></h5>
                        <ul class="list-unstyled">
                            <?php if (!empty($marketplace) && is_array($marketplace)): ?>
                                <?php foreach ($marketplace as $s): ?>
                                    <li>
                                        <a style="color: white; text-decoration: none;" href="<?= $s['link_marketplace']; ?>" target="_blank">
                                            <img src="<?= base_url('assets/img/logo/' . $s['logo_marketplace']); ?>" alt="<?= $s['nama_marketplace']; ?>" style="width: 20px; height: 20px; margin-right: 5px;">
                                            <?= $s['nama_marketplace']; ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li>No social media available</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/aos/aos.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/glightbox/js/glightbox.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/isotope-layout/isotope.pkgd.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/swiper/swiper-bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/purecounter/purecounter_vanilla.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/php-email-form/validate.js'); ?>"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url('assets/js/main.js'); ?>"></script>

</body>

</html>