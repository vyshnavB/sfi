<?php
echo '<!DOCTYPE html>';
echo '<html lang="en">';
echo '';
echo '<head>';
echo '<meta charset="utf-8">';
echo '<title>Makaan - Real Estate HTML Template</title>';
echo '<meta content="width=device-width, initial-scale=1.0" name="viewport">';
echo '<meta content="" name="keywords">';
echo '<meta content="" name="description">';
echo '';
echo '<link href="css/bootstrap.min.css" rel="stylesheet">';
echo '<link rel="stylesheet" href="css/language.css">';
echo '<!-- Template Stylesheet -->';
echo '<link href="css/style.css" rel="stylesheet">';
echo '</head>';
echo '';
echo '<body>';

// Establish a database connection
$hostname = '';  // Replace 'your_host' with the actual hostname or IP address
$username = 'sfidatabase';
$password = 'brNa7NrRh1__UA0V';
$database = 'sfi_db';

$conn = new mysqli($hostname, $username, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve the fish records from the "products" table
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Display the fish names and images
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $fishName = $row['name'];
    $fishImage = $row['image'];
   

    echo '<div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">';
    echo '<a class="cat-item d-block bg-light text-center rounded p-3" href="">';
    echo '<div class="rounded p-4">';
    echo '<div class="icon mb-3">';
    echo '<img class="img-fluid" src="' . $fishImage . '" alt="Icon">';
    echo '</div>';
    echo '<h6>' . $fishName . '</h6>';
    echo '<div class="p-icon" style="font-size: 14px;">';
    echo '<p ><i class="fas fa-map-marker-alt"></i> &nbsp; origin : Indonesia </p>';
    echo '<p ><i class="fas fa-suitcase"></i> &nbsp; packing : MC, etc (as per requested) </p>';
    echo '</div>';
    echo '</div>';
    echo '</a>';
    echo '</div>';
  }
} else {
  echo "No fish found.";
}

$conn->close();





echo '<div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">';
echo '</div>';
echo '';
echo '';
echo '';
echo '';
echo '';
echo '</div>';
echo '</div>';
echo '</div>';
echo '<!-- Category End -->';
echo '';
echo '';
echo '<!-- Footer Start -->';
echo '<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">';
echo '<div class="container py-5">';
echo '<div class="row g-5">';
echo '<div class="col-lg-3 col-md-6 ">';
echo '<div class="icon mb-3">';
echo '<img class="img-fluid " src="img/logo/sfi logo.png" alt="Icon">';
echo '</div>';
echo '<div class="d-flex" style="padding-left: 60px;">';
echo '';
echo '<a class="btn btn-outline-light btn-social" href="https://www.instagram.com/ptsunifathi_indonesia/"><i class="fab fa-instagram"></i></a>';
echo '<a class="btn btn-outline-light btn-social" href="https://www.facebook.com/profile.php?id=100093461989142"><i class="fab fa-facebook"></i></a>';
echo '<a class="btn btn-outline-light btn-social" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>';
echo '<a class="btn btn-outline-light btn-social" href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>';
echo '';
echo '';
echo '</div>';
echo '</div>';
echo '<div class="col-lg-3 col-md-6">';
echo '<h5 class="text-white mb-4">Get In Touch</h5>';
echo '<p class="mb-2" ><i class="fa fa-map-marker-alt me-3"></i>1JL.Kabul,RT 01 RW 05,';
echo '';
echo '</p>';
echo '';
echo '<p style="margin-left: 30px;" > Desa Peacengaan kulon,';
echo 'Kabupaten Jepara,Jawa Tengah </p>';
echo '<p style="margin-left: 30px;" > Indonesia -59462</p>';
echo '<p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+62 8132 9410041</p>';
echo '<p class="mb-2"><i class="fa fa-envelope me-3"></i>sunifathiindonesia@gmail.com</p>';
echo '';
echo '</div>';
echo '<div class="col-lg-3 col-md-6">';
echo '<h5 class="text-white mb-4">Quick Links</h5>';
echo '<a class="btn btn-link text-white-50" href="about.php">About Us</a>';
echo '<a class="btn btn-link text-white-50" href="contact.php">Contact Us</a>';
echo '<a class="btn btn-link text-white-50" href="products.php">Our Services</a>';
echo '<a class="btn btn-link text-white-50" href="404.php">Privacy Policy</a>';
echo '<a class="btn btn-link text-white-50" href="404.php">Terms & Condition</a>';
echo '</div>';
echo '<div class="col-lg-3 col-md-6">';
echo '<h5 class="text-white mb-4">Photo Gallery</h5>';
echo '<div class="row g-2 pt-2">';
echo '<div class="col-4">';
echo '<img class="img-fluid rounded bg-light p-1" src="img/gallery/1.png" alt="">';
echo '</div>';
echo '<div class="col-4">';
echo '<img class="img-fluid rounded bg-light p-1" src="img/gallery/2.png" alt="">';
echo '</div>';
echo '<div class="col-4">';
echo '<img class="img-fluid rounded bg-light p-1" src="img/gallery/3.png" alt="">';
echo '</div>';
echo '<div class="col-4">';
echo '<img class="img-fluid rounded bg-light p-1" src="img/gallery/4.png" alt="">';
echo '</div>';
echo '<div class="col-4">';
echo '<img class="img-fluid rounded bg-light p-1" src="img/gallery/5.png" alt="">';
echo '</div>';
echo '<div class="col-4">';
echo '<img class="img-fluid rounded bg-light p-1" src="img/gallery/6.png" alt="">';
echo '</div>';
echo '</div>';
echo '</div>';
echo '';
echo '</div>';
echo '</div>';
echo '<div class="container">';
echo '<div class="copyright">';
echo '<div class="row">';
echo '<div class="col-md-6 text-center text-md-start mb-3 mb-md-0">';
echo '&copy; <a   href="#">2023 Suni fathi indonesia </a>, All Right Reserved.';
echo '';
echo '<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you\'d like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->';
echo 'Designed By <a class="border-bottom" target="_blank" href="https://lcmproductions.in/">LCM Productions</a>';
echo '</div>';
echo '<div class="col-md-6 text-center text-md-end">';
echo '<div class="footer-menu">';
echo '<a href="#">Home</a>';
echo '<a href="#">Cookies</a>';
echo '<a href="#">Help</a>';
echo '<a href="#">FQAs</a>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '<!-- Footer End -->';
echo '';
echo '';
echo '<!-- Back to Top -->';
echo '<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>';
echo '</div>';
echo '';
echo '<!-- JavaScript Libraries -->';
echo '<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>';
echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>';
echo '<script src="lib/wow/wow.min.js"></script>';
echo '<script src="lib/easing/easing.min.js"></script>';
echo '<script src="lib/waypoints/waypoints.min.js"></script>';
echo '<script src="lib/owlcarousel/owl.carousel.min.js"></script>';
echo '';
echo '<!-- Template Javascript -->';
echo '<script src="js/main.js"></script>';
echo '<script src="js/translation.js"></script>';
echo '';
echo '<script type="text/javascript">';
echo 'function googleTranslateElementInit() {';
    echo 'new google.translate.TranslateElement({pageLanguage: "en", includedLanguages: "en,fr", layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL}, "google_translate_element");';
    echo '}';
echo '';
echo '';
echo '';
echo '</script>';

echo '</body>';
echo '';
echo '</html>';
?>
