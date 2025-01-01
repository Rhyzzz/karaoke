<?php
// Basic PHP Template with full dynamic content
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo 'KaraOke'; ?></title>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet" />

    <!-- feather icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- my style -->
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <a href="#home" class="navbar-logo">Karaoke<span>Kita</span>.</a>
        <div class="navbar-nav">
            <?php
            $menu_items = [
                'home' => 'Home',
                'about' => 'Tentang kami',
                'menu' => 'Menu',
                'contact' => 'Kontak',
                'booking' => 'Booking'
            ];
            foreach ($menu_items as $id => $label) {
                echo "<a href='#$id'>$label</a>";
            }
            ?>
        </div>

        <div class="navbar-extra">
            <!-- <a href="#" id="search-button"><i data-feather="search"></i></a> -->
            <!-- <a href="#" id="shopping-cart-button"><i data-feather="shopping-cart"></i></a> -->
            <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
        </div>

        <!-- Search form -->
        <div class="search-form">
            <input type="search" id="search-box" placeholder="search here.." />
            <label for="search-box"><i data-feather="search"></i></label>
        </div>

        <nav>
    <!-- <a href="admin_login.php">Admin</a> -->
</nav>

    </nav>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <main class="content">
            <h1><?php echo 'Tempat Bersenandung <span>Ria</span>'; ?></h1>
            <p><?php echo 'Karaoke yang nyaman dan asik bersama keluarga dan teman teman anda'; ?></p>
            <a href="#booking" class="cta"><?php echo 'Booking sekarang'; ?></a>
        </main>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <h2>Tentang <span>Kami</span></h2>
        <div class="row">
            <div class="about-img">
                <img src="img/oke.jpg" alt="Tentang Kami" />
            </div>
            <div class="content">
                <h3>Kenapa Karaoke Kami?</h3>
                <p>Tempat karaoke kami menawarkan pengalaman unik dengan suasana hangat dan koleksi lagu lengkap. Setiap kunjungan menjanjikan momen menyenangkan bersama teman dan keluarga, menciptakan kenangan tak terlupakan.</p>
                <p>Dilengkapi dengan sistem suara canggih dan layar besar, penampilan Anda menjadi istimewa. Nikmati makanan dan minuman lezat selama sesi karaoke yang menyenangkan dan menghibur!</p>
            </div>
        </div>
    </section>

    <!-- Menu Section -->
    <section id="menu" class="menu">
        <h2>Menu <span>Kami</span></h2>
        <p>Anda dapat memesan makanan yang dapat anda nikmati sambil bersenandung ria</p>
        <div class="row">
            <?php
            $menu_items = [
                ['name' => 'Popcorn', 'price' => 'IDR 15K', 'image' => 'img/menu/popcorn.jpg'],
                ['name' => 'Dimsum', 'price' => 'IDR 20K', 'image' => 'img/menu/dimsm.jpg'],
                ['name' => 'Chicken Wings', 'price' => 'IDR 25K', 'image' => 'img/menu/wings.jpg'],
                ['name' => 'Cola', 'price' => 'IDR 10K', 'image' => 'img/menu/cole.jpg'],
                ['name' => 'Ice Tea', 'price' => 'IDR 7K', 'image' => 'img/menu/TEH.jpg'],
                ['name' => 'Mocktail', 'price' => 'IDR 20K', 'image' => 'img/menu/mock.jpg']
            ];

            foreach ($menu_items as $menu) {
                echo "<div class='menu-card'>
                        <img src='{$menu['image']}' alt='{$menu['name']}' class='menu-card-image' />
                        <h3 class='menu-card-title'>- {$menu['name']} -</h3>
                        <p class='menu-card-price'>{$menu['price']}</p>
                    </div>";
            }
            ?>
        </div>
    </section>

    <!-- Booking Section -->
    <section id="booking" class="booking">
    <div class="booking-info">
        <h2>Booking <span>Karaoke</span></h2>
        <p>Pesan ruangan karaoke Anda sekarang untuk pengalaman yang lebih seru.</p>
    </div>
    <div class="booking-form-container">
        <form action="process_booking.php" method="POST" class="booking-form">
            <div class="input-group">
                <label for="name">Nama</label>
                <input type="text" id="name" name="name" placeholder="Masukkan nama Anda" required />
            </div>
            <div class="input-group">
                <label for="phone">Nomor HP</label>
                <input type="tel" id="phone" name="phone" placeholder="Masukkan nomor HP Anda" required />
            </div>
            <div class="input-group">
                <label for="date">Tanggal</label>
                <input type="date" id="date" name="date" required />
            </div>
            <div class="input-group">
                <label for="time">Waktu</label>
                <input type="time" id="time" name="time" required />
            </div>
            <div class="input-group">
                <label for="duration">Durasi (jam)</label>
                <input type="number" id="duration" name="duration" placeholder="Durasi" required />
            </div>
            <div class="input-group">
                <label for="room_type">Tipe Ruangan</label>
                <select id="room_type" name="room_type" required>
                    <option value="small">Small  1-4 person</option>
                    <option value="medium">Medium  1-6 person</option>
                    <option value="large">Large  1-8 person</option>
                </select>
            </div>
            <button type="submit" class="btn">Kirim</button>
        </form>
    </div>
</section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <h2>Kontak <span>Kami</span></h2>
        <p>Butuh bantuan? Hubungi kami di bawah ini.</p>
        <div class="row">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7906.830920178008!2d110.35518909999998!3d-7.745680599999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1735647593794!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <form action="">
                <div class="input-group">
                    <i data-feather="user"></i>
                    <input type="text" placeholder="Nama" />
                </div>
                <div class="input-group">
                    <i data-feather="mail"></i>
                    <input type="text" placeholder="Email" />
                </div>
                <div class="input-group">
                    <i data-feather="phone"></i>
                    <input type="text" placeholder="No HP" />
                </div>
                <button type="submit" class="btn">Kirim Pesan</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="socials">
            <?php
            $socials = ['instagram', 'twitter', 'facebook'];
            foreach ($socials as $social) {
                echo "<a href='#'><i data-feather='$social'></i></a>";
            }
            ?>
        </div>
        <!-- <div class="links">
            <?php
            foreach ($menu_items as $id => $label) {
                echo "<a href='#$id'>$label</a>";
            }
            ?>
        </div> -->
        <div class="credit">
            <p><?php echo 'created by <a href="">RizkiAfrizal</a>. | &copy; ' . date('Y'); ?></p>
        </div>
    </footer>

    <script>
        feather.replace();
    </script>
    <script src="script.js"></script>
</body>
</html>
