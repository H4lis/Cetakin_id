<?php
include("function.php");


if (isset($_POST["submit"])) {

    var_dump($_POST);
    var_dump($_FILES['gambar']['name']);

    // cek apakah data berhasil di tambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
    } else {
        echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <title>Cetakin.id</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
        rel="stylesheet" />

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- My Style -->
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <!-- Navbar start -->
    <nav class="navbar">
        <a href="#" class="navbar-logo">Cetakin<span>.id</span></a>

        <div class="navbar-nav">
            <a href="#home">Home</a>
            <a href="#about">Tentang Kami</a>
            <a href="#menu">Partner</a>
            <a href="#products">Produk</a>
            <a href="#contact">Kontak</a>
        </div>

        <div class="navbar-extra">
            <a href="#" id="search-button"><i data-feather="search"></i></a>
            <a href="#" id="shopping-cart-button"><i data-feather="shopping-cart"></i></a>
            <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
        </div>

        <!-- Search Form start -->
        <div class="search-form">
            <input type="search" id="search-box" placeholder="search here..." />
            <label for="search-box"><i data-feather="search"></i></label>
        </div>
        <!-- Search Form end -->

        <!-- Shopping Cart start -->
        <div class="shopping-cart">
            <div class="cart-item">
                <img src="img/products/1.jpg" alt="Product 1" />
                <div class="item-detail">
                    <h3>Product 1</h3>
                    <div class="item-price">IDR 30K</div>
                </div>
                <i data-feather="trash-2" class="remove-item"></i>
            </div>
            <div class="cart-item">
                <img src="img/products/1.jpg" alt="Product 1" />
                <div class="item-detail">
                    <h3>Product 1</h3>
                    <div class="item-price">IDR 30K</div>
                </div>
                <i data-feather="trash-2" class="remove-item"></i>
            </div>
            <div class="cart-item">
                <img src="img/products/1.png" alt="Product 1" />
                <div class="item-detail">
                    <h3>Product 1</h3>
                    <div class="item-price">IDR 30K</div>
                </div>
                <i data-feather="trash-2" class="remove-item"></i>
            </div>
        </div>
        <!-- Shopping Cart end -->
    </nav>
    <!-- Navbar end -->

    <!-- Hero Section start -->
    <section class="hero" id="home">
        <div class="mask-container">
            <main class="content">
                <h1>Ayo Gunakan Cetak<span>in</span>.id</h1>
                <p>
                    Membantu mahasiswa mencari percetakan dengan lokasi, harga, dan
                    produk yang sesuai
                </p>
            </main>
        </div>
    </section>
    <!-- Hero Section end -->

    <!-- About Section start -->
    <section id="about" class="about">
        <h2><span>Tentang</span> Kami</h2>
        <div class="row">
            <div class="about-img">
                
                <img src="img/cetakin_c_logo.png" alt="Tentang Kami" />
            </div>
            <div class="content">
                <h3>Kenapa memilih Cetakin.id?</h3>
                <p>
                    CetakCerdas.id memungkinkan pelanggan untuk dengan mudah memesan
                    cetakan produk seperti kartu nama, brosur, poster, dan banyak lagi,
                    dengan akses ke berbagai pilihan tempat percetakan yang berkualitas.
                </p>
                <p>
                    dengan akses ke berbagai pilihan tempat percetakan yang berkualitas.
                    ke berbagai pilihan tempat percetakan yang berkualitas.
                </p>
            </div>
        </div>
    </section>
    <!-- About Section end -->
    <!-- Menu Section start -->
    <section id="menu" class="menu">
        <h2><span>PARTNER</span> KAMI</h2>
        <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita,
            repellendus numquam quam tempora voluptatum.
        </p>
        <div class="row">
            <div class="menu-card">
                <img src="img/menu/1.png" alt="Espresso" class="menu-card-img" />
                <h3 class="menu-card-title">- An-Nur -</h3>
            </div>
            <div class="menu-card">
                <img src="img/menu/2.png" alt="Espresso" class="menu-card-img" />
                <h3 class="menu-card-title">- An-Nur -</h3>
            </div>
            <div class="menu-card">
                <img src="img/menu/3.png" alt="Espresso" class="menu-card-img" />
                <h3 class="menu-card-title">- An-Nur -</h3>
            </div>
            <div class="menu-card">
                <img src="img/menu/4.png" alt="Espresso" class="menu-card-img" />
                <h3 class="menu-card-title">- An-Nur -</h3>
            </div>
        </div>
    </section>
    <!-- Menu Section end -->

    <!-- Products Section start -->
    <section class="products" id="products">
        <h2><span>Produk Unggulan</span> Kami</h2>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo unde eum,
            ab fuga possimus iste.
        </p>

        <div class="row">
            <?php
            include("config/connection.php");
            $sql = "SELECT * FROM produk";
            $hasil = mysqli_query($koneksi, $sql);

            $jmlProduk = mysqli_num_rows($hasil);

            if ($jmlProduk > 0) {
                while ($row = mysqli_fetch_assoc($hasil)) {
                    ?>
                    <div class="product-card">
                        <div class="product-icons">
                            <a href="#"><i data-feather="shopping-cart"></i></a>
                            <a href="#" class="item-detail-button"><i data-feather="eye"></i></a>
                        </div>
                        <div class="product-image">
                            <img src="img/products/<?= $row["image_path"]; ?>" alt="Product 1" />
                        </div>
                        <div class="product-content">
                            <h3>
                                <?= $row["name"]; ?>

                                <div class="product-stars">
                                    <i data-feather="star" class="star-full"></i>
                                    <i data-feather="star" class="star-full"></i>
                                    <i data-feather="star" class="star-full"></i>
                                    <i data-feather="star" class="star-full"></i>
                                    <i data-feather="star"></i>
                                </div>
                                <div class="product-price">IDR
                                    <?= $row["harga"]; ?>K <span>IDR 55 K</span>
                                </div>
                        </div>
                    </div>
                    <?php
                }

            }
            ?>
            <!-- <div class="product-card">
          <div class="product-icons">
            <a href="#"><i data-feather="shopping-cart"></i></a>
            <a href="#" class="item-detail-button"
              ><i data-feather="eye"></i
            ></a>
          </div>
          <div class="product-image">
            <img src="img/products/2.png" alt="Product 1" />
          </div>
          <div class="product-content">
            <h3>Cetak HandSanitizer</h3>
            <div class="product-stars">
              <i data-feather="star"></i>
              <i data-feather="star"></i>
              <i data-feather="star"></i>
              <i data-feather="star"></i>
              <i data-feather="star"></i>
            </div>
            <div class="product-price">IDR 30K <span>IDR 55K</span></div>
          </div>
        </div> -->
            <!-- <div class="product-card">
          <div class="product-icons">
            <a href="#"><i data-feather="shopping-cart"></i></a>
            <a href="#" class="item-detail-button"
              ><i data-feather="eye"></i
            ></a>
          </div>
          <div class="product-image">
            <img src="img/products/3.png" alt="Product 1" />
          </div>
          <div class="product-content">
            <h3>Cetak HandSanitizer</h3>
            <div class="product-stars">
              <i data-feather="star"></i>
              <i data-feather="star"></i>
              <i data-feather="star"></i>
              <i data-feather="star"></i>
              <i data-feather="star"></i>
            </div>
            <div class="product-price">IDR 30K <span>IDR 55K</span></div>
          </div>
        </div> -->
        </div>
    </section>
    <!-- Products Section end -->

    <!-- Contact Section start -->
    <section id="contact" class="contact">
        <h2><span>Kontak</span> Kami</h2>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis,
            provident.
        </p>

        <div class="row">
            <div class="menu-card">
                <img src="img/kontak/1.png" alt="Espresso" class="menu-card-img" />
                <h3 class="menu-card-title">-Waddah-</h3>
            </div>
            <div class="menu-card">
                <img src="img/kontak/2.png" alt="Espresso" class="menu-card-img" />
                <h3 class="menu-card-title">- Nur Halis -</h3>
            </div>
            <div class="menu-card">
                <img src="img/kontak/3.png" alt="Espresso" class="menu-card-img" />
                <h3 class="menu-card-title">- Fanisa-</h3>
            </div>
        </div>

        <div class="row">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.56347862248!2d107.57311709235512!3d-6.903444341687889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0x146a1f93d3e815b2!2sBandung%2C%20Bandung%20City%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1672408575523!5m2!1sen!2sid"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>

            <form action="">
                <div class="input-group">
                    <i data-feather="user"></i>
                    <input type="text" placeholder="nama" />
                </div>
                <div class="input-group">
                    <i data-feather="mail"></i>
                    <input type="text" placeholder="email" />
                </div>
                <div class="input-group">
                    <i data-feather="phone"></i>
                    <input type="text" placeholder="no hp" />
                </div>
                <button type="submit" class="btn">kirim pesan</button>
            </form>
        </div>
    </section>
    <!-- Contact Section end -->

    <!-- Footer start -->
    <footer>
        <div class="socials">
            <a href="#"><i data-feather="instagram"></i></a>
            <a href="#"><i data-feather="twitter"></i></a>
            <a href="#"><i data-feather="facebook"></i></a>
        </div>

        <div class="links">
            <a href="#home">Home</a>
            <a href="#about">Tentang Kami</a>
            <a href="#menu">Menu</a>
            <a href="#contact">Kontak</a>
        </div>

        <div class="credit">
            <p>Created by <a href="">HaKiWa</a>. | &copy; 2023.</p>
        </div>
    </footer>
    <!-- Footer end -->

    <!-- Modal Box Item Detail start -->
    <div class="modal" id="item-detail-modal">
        <div class="modal-container">
            <a href="#" class="close-icon"><i data-feather="x"></i></a>
            <div class="modal-content">
                <img src="img/products/1.jpg" alt="Product 1" />
                <div class="product-content">
                    <h3>Product 1</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                        Provident, tenetur cupiditate facilis obcaecati ullam maiores
                        minima quos perspiciatis similique itaque, esse rerum eius
                        repellendus voluptatibus!
                    </p>
                    <div class="product-stars">
                        <i data-feather="star" class="star-full"></i>
                        <i data-feather="star" class="star-full"></i>
                        <i data-feather="star" class="star-full"></i>
                        <i data-feather="star" class="star-full"></i>
                        <i data-feather="star"></i>
                    </div>
                    <div class="product-price">IDR 30K <span>IDR 55K</span></div>
                    <a href="#"><i data-feather="shopping-cart"></i> <span>add to cart</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Box Item Detail end -->

    <!-- Feather Icons -->
    <script>
        feather.replace();
    </script>

    <!-- My Javascript -->
    <script src="js/script.js"></script>
</body>

</html>