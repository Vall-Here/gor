<?php require_once __DIR__ . '/shafy/logics/libs/data.php';
$fields = getFields();
// $cities = getCities();
$categories = getCategories();
require_once __DIR__ . '/partials/navbar.php';
require "./config/connection.php" ;
if(!isset($_SESSION)) 
{ 
    session_start(); 
}

if (!isset($_SESSION['id'])){
  $rows_user["first_name"] = "User";
  session_abort();
}else{
$id = $_SESSION['id'];
$user = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
$rows_user = mysqli_fetch_assoc($user);
}
?>


<main>
  <div class="container hero" data-animated>
    <div class="hero__left">
      <h1 class="hero__title">Rent our fields and conquer the game</h1>
      <p class="hero__subtitle">Selamat Datang <?= $rows_user["first_name"]; ?></p>
      <a href="./login.php" class="hero__button">Get started</a>
    </div>
    <div class="hero__right">
      <div class="hero__img-group"><img alt="Field" src="./shafy/img/heros/hero-1.png"> <img alt="Field"
          src="./shafy/img/heros/hero-2.png"></div>
      <div class="hero__img-group"><img alt="Field" src="./shafy/img/heros/hero-3.png"> <img alt="Field"
          src="./shafy/img/heros/hero-4.png"></div>
    </div>
  </div>
  <!-- <form action="./fields.php" class="container filter" data-animated>
    <div class="filter__search"><label for="search"><img alt="Search"
          src="./shafy/img/icons/magnifier-gray.png"></label> <input id="search" name="search" type="search"
        placeholder="Search for fields"> <button type="submit">Search</button></div>
    <div class="filter__list"> -->
      <!-- <div class="filter__item"><label for="location"><img alt="Location"
            src="./shafy/img/icons/location-gray.png"></label> <select id="location" name="location">
          <option value="" disabled selected>Location</option>
          <?php foreach ($cities as $city): ?>
            <option value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
          <?php endforeach; ?>
        </select></div> -->
      <!-- <div class="filter__item"><label for="category"><img alt="Category"
            src="./shafy/img/icons/grid-8-gray.png"></label> <select id="category" name="category">
          <option value="" disabled selected>Category</option> -->
          <!-- <?php foreach ($categories as $category): ?>
            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
          <?php endforeach; ?> -->
        <!-- </select></div> -->
      <!-- <div class="filter__item"><label for="time"><img alt="Time" src="./shafy/img/icons/clock-gray.png"></label> <input
          id="time" name="time" type="date"></div>
    </div>
  </form> -->
  <div class="container featured-fields">
    <div class="featured-fields__header" data-animated>
      <h2>Featured fields</h2><a href="./fields.php">Browse all fields</a>
    </div>
    <div class="featured-fields__body">
      <?php for ($i = 0; $i < 1; $i++): ?>
        <div class="featured-fields__card" data-animated>
          <div class="featured-fields__card-left"><img alt="" src="data:image/jpeg;base64,<?php echo base64_encode ($fields[$i]['photo']) ?>"
              class="featured-fields__card-img"> <button class="featured-fields__card-favorite"
              data-field-id="<?= $fields[$i]['id'] ?>"><img alt="Favorite" src="./shafy/img/icons/heart-black.png"> <img
                alt="Favorite" src="./shafy/img/icons/heart-solid-primary.png"></button></div>
          <div class="featured-fields__card-right">
            <div class="featured-fields__card-top">
              <p class="featured-fields__card-price">Rp
                <?= number_format($fields[$i]['price'], 0, ',', '.') ?>
              </p>
            </div>
            <h3 class="featured-fields__card-name"><a
                href="./field-single.php?id=<?= $fields[$i]['id'] ?>"><?= $fields[$i]['name'] ?></a></h3>
            <p class="featured-fields__card-description">
              <?= $fields[$i]['description'] ?>
            </p>
            <hr>
            <div class="featured-fields__card-feature-list">
              <div class="featured-fields__card-feature-item"><img alt="Category" src="./shafy/img/icons/grid-8-gray.png">
                <span>
                  <?= $fields[$i]['category']['name'] ?>
                </span></div>
              <div class="featured-fields__card-feature-item"><img alt="Size" src="./shafy/img/icons/crop-gray.png">
                <span>
                  <?= $fields[$i]['size'] ?>Meters
                </span></div>
              <div class="featured-fields__card-feature-item"><img alt="Lamp" src="./shafy/img/icons/lamp-gray.png">
                <?php
                    $id_buatStatus =  $fields[$i]['status_id'];
                    $statusTable = mysqli_query($conn,"SELECT * FROM status WHERE id_status = $id_buatStatus");
                    $rows_status = mysqli_fetch_assoc($statusTable);
                    // $query = "SELECT * FROM status WHERE id_status = $fields[$i]['status_id'] ";
                    // $row_status = mysqli_query($conn, $query);
                ?> 
                <span>
                <?=$rows_status['kondisi_status']?>
                </span></div>
            </div>
          </div>
        </div>
      <?php endfor; ?>
    </div>
  </div>
  <div class="container fields">
    <div class="fields__header" data-animated>
      <h2>Fields</h2><a href="./fields.php">Browse all fields</a>
    </div>
    <div class="fields__body">
      <?php for ($i = 2; $i < 5; $i++): ?>
        <div class="fields__card" data-animated>
          <div class="fields__card-top"><img alt="" src="data:image/jpeg;base64,<?php echo base64_encode ($fields[$i]['photo']) ?>" class="fields__card-img"> <button
              class="fields__card-favorite" data-field-id="<?= $fields[$i]['id'] ?>"><img alt="Favorite"
                src="./shafy/img/icons/heart-black.png"> <img alt="Favorite"
                src="./shafy/img/icons/heart-solid-primary.png"></button></div>
          <div class="fields__card-body">
            <p class="fields__card-price">Rp
              <?= number_format($fields[$i]['price'], 0, ',', '.') ?>
            </p>
            <h3 class="fields__card-name"><a
                href="./field-single.php?id=<?= $fields[$i]['id'] ?>"><?= $fields[$i]['name'] ?></a></h3>
            <!-- <p class="fields__card-location"><img alt="Location" src="./shafy/img/icons/location-gray.png"> -->
              <!-- <?= $fields[$i]['sports_arena']['address'] ?>
              <?= $fields[$i]['sports_arena']['city']['name'] ?> -->
            <!-- </p> -->
            <hr>
            <div class="fields__card-feature-list">
              <div class="fields__card-feature-item"><img alt="Category" src="./shafy/img/icons/grid-8-gray.png"> <span>
                  <?= $fields[$i]['category']['name'] ?>
                </span></div>
              <div class="fields__card-feature-item"><img alt="Size" src="./shafy/img/icons/crop-gray.png"> <span>
                  <?= $fields[$i]['size'] ?>Meters
                </span></div>
            </div>
          </div>
        </div>
      <?php endfor; ?>
    </div>
  </div>
  <div class="container how">
    <h2 class="how__header" data-animated>How to rent a field in 3 easy steps</h2>
    <div class="how__body">
      <div class="how__list" data-animated>
        <div class="how__item"><img alt="Step 1" src="./shafy/img/how/how-1.png" class="how__img">
          <h3 class="how__title">1. Pilih Field yang anda inginkan</h3>
          <p class="how__description">Lorem ipsum dolor sit amet consectetur adipiscing elit odio massa ege.</p>
        </div>
        <div class="how__item"><img alt="Step 1" src="./shafy/img/how/how-2.png" class="how__img">
          <h3 class="how__title">2. Mulai pesan dan lakukan pembayaran</h3>
          <p class="how__description">Lorem ipsum dolor sit amet consectetur adipiscing elit odio massa ege.</p>
        </div>
        <div class="how__item"><img alt="Step 1" src="./shafy/img/how/how-3.png" class="how__img">
          <h3 class="how__title">3. Serahkan nota pembayarana Saat datang </h3>
          <p class="how__description">Lorem ipsum dolor sit amet consectetur adipiscing elit odio massa ege.</p>
        </div>
      </div><a href="./fields.php" class="how__button" data-animated>Explore fields</a>
    </div>
  </div>
  <div class="promotion">
    <div class="container promotion__container" data-animated>
      <div class="promotion__left">
        <h2 class="promotion__title">Experience the best field rental service</h2>
        <p class="promotion__description">Lorem ipsum dolor sit amet consectetur adipiscing elit odio massa eget posuere
          at proin lectus proin morbi euismod itae purus donec cursus neque adipiscing maecenas proin eu viverra commodo
          felis risus at amet ornare pellentesque nulla ipsu.</p><a href="./fields.php" class="promotion__button"
          data-animated>Explore fields</a>
      </div>
      <div class="promotion__right"><img alt="Promotion" src="./shafy/img/promotions/promotion-1.png"
          class="promotion__img"> <img alt="Promotion" src="./shafy/img/promotions/promotion-2.png"
          class="promotion__img" data-animated></div>
    </div>
  </div>
  <div class="container join">
    <div class="join__card join__card_partner" data-animated>
      <h2 class="join__title">Join Membership</h2>
      <p class="join__description">Dapatkan promo dan keuntungan Sebagai membership, Daftar Sekarang !!!.</p><a href="./partner/login.php" class="join__button join__button_primary" data-animated>Join as a
        Membership</a>
    </div>
    <div class="join__card" data-animated>
      <h2 class="join__title">Mulai Menyewa</h2>
      <p class="join__description">Siapkan akun anda untuk menyewa , Login segera !!!</p><a href="./login.php" class="join__button" data-animated>Join as a user</a>
    </div>
  </div>
</main>
<script src="./shafy/js/user/landing-page.js"></script>
<?php require_once './partials/footer.php' ?>