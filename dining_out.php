<?php
$location = isset($_GET['location']) ? htmlspecialchars($_GET['location']) : 'Ahmedabad';

$restaurants_by_location = [
    "Mumbai" => [
        1 => "The Bombay Canteen",
        2 => "Peshwa Pavilion",
        3 => "KOKO Mumbai"
    ],
    "Ahmedabad" => [
        4 => "Agashiye",
        5 => "Patang",
        6 => "650-The Global Kitchen"
    ],
    "Delhi" => [
        7 => "Bukhara",
        8 => "Pindi Restaurant in Delhi",
        9 => "Indian Accent"
    ],
];

// Fallback to empty if location not found
$restaurants = isset($restaurants_by_location[$location]) ? $restaurants_by_location[$location] : [];
?>


<!DOCTYPE html>
<html>
<head>
  <title>Momentum Eats</title>
  <link rel="stylesheet" href="../css/style.css" />
  <style>
    body {
      background: #fafbfc;
      font-family: 'Segoe UI', Arial, sans-serif;
      margin: 0;
      min-height: 100vh;
    }
    .page-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 28px 12px;
      min-height: 100vh;
    }
    .main-card {
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 6px 24px #ed213a18;
      padding: 24px 30px 20px 30px;
      display: flex;
      align-items: start;
      justify-content: space-between;
      margin-bottom: 24px;
      gap: 18px;
    }
    .main-logo {
      font-size: 2.43rem;
      font-weight: bold;
      color: #ff2344;
      line-height: 1.1;
      margin: 0;
      min-width: 210px;
      font-family: 'Segoe UI', Arial, sans-serif;
    }
    .search-container {
      flex: 1 1 420px;
      display: flex;
      align-items: center;
      justify-content: center;
      padding-top: 16px;
    }
    .search-box {
      background: #fff;
      border: 1.5px solid #eae1e7;
      border-radius: 12px;
      box-shadow: 0 3px 18px #e5656521;
      padding: 0 12px;
      display: flex;
      align-items: center;
      max-width: 410px;
      width: 100%;
      height: 48px;
    }
    .search-box input[type="text"] {
      border: none;
      outline: none;
      font-size: 1.10em;
      width: 100%;
      background: transparent;
      color: #ff2344;
      padding: 10px 0 10px 8px;
      font-weight: 500;
    }
    .auth-links {
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      gap: 2px;
      min-width: 115px;
    }
    .auth-links a {
      color: #6d6a6a;
      font-size: 1.10em;
      text-decoration: none;
      margin-left: 0;
      padding: 2px 0;
      font-weight: 500;
      transition: color 0.18s;
    }
    .auth-links a:hover { color: #fa0c38; }
    .breadcrumb {
      margin: 15px 0 18px 0;
      font-size: 1.01em;
      color: #ac2343;
      letter-spacing: .01em;
      padding-left: 12px;
    }
    .toggle-row {
      display: flex;
      align-items: center;
      gap: 46px;
      margin: 0 0 32px 0;
      padding-left: 10px;
    }
    .toggle-col {
      display: flex; align-items: center; gap: 13px;
    }
    .toggle-card {
      background: #eff0f5;
      border-radius: 50%;
      width: 76px; height: 76px;
      display: flex; align-items: center; justify-content: center;
      border: 2.5px solid #fff;
      box-shadow: 0 2px 8px #e2abbe63;
      overflow: hidden;
    }
    .toggle-col img {
      width: 41px; height: 41px; object-fit: contain;
      background: #f8f4f8;
      border-radius: 50%;
      border:1px solid #eab8c2;
      padding:6px;
    }
    .toggle-label {
      font-size: 1.25em;
      font-weight: 600;
      cursor: pointer;
      color:#fe3252;
      transition: color 0.15s;
    }
    .toggle-label.delivery { color: #838fa9; }
    .toggle-label.active { color: #d10d3e; }
    .dine-form-wrapper {
      margin-top: 12px;
      display: flex;
      justify-content: flex-start;
      padding-left: 12px;
    }
    .dine-form {
      background: #ffe2e9;
      max-width: 380px;
      padding: 23px 23px;
      border-radius: 14px;
      box-shadow: 0 2px 13px #dfa6bd35;
    }
    .dine-form h3 {
      color: #e24141;
      font-size: 1.22rem;
      margin-bottom:12px;
    }
    .dine-form label {
      font-weight: 500;
      display: block;
      margin-bottom: 8px;
      font-size: .97rem;
      color: #d03a4f;
    }
    .dine-form select,
    .dine-form input[type="time"] {
      width: 100%;
      padding: 10px 13px;
      border-radius: 7px;
      border: 1.3px solid #ee8b96;
      font-size: 1.01em;
      margin-bottom: 16px;
      background: #fefbfa;
    }
    .dine-form button {
      background: linear-gradient(90deg,#ff3e53, #ff7b6b);
      color: #fff;
      font-weight: 700;
      font-size: 1em;
      border: none;
      border-radius: 8px;
      padding: 11px 0;
      width: 100%; cursor: pointer;
    }
    .dine-form button:hover { background: #ff325a; }
    @media (max-width:900px) {
      .main-card {flex-direction:column;align-items: stretch;gap:0;}
      .auth-links {flex-direction:row;gap:16px;justify-content: flex-end;align-items: center;}
      .search-container{padding: 12px 0;}
      .dine-form-wrapper{justify-content: center;}
    }
    @media (max-width:530px) {
      .main-card{padding:11px 5px;}
      .search-box{height:38px;}
      .breadcrumb,.toggle-row,.dine-form-wrapper{padding-left:3px;}
      .dine-form{padding:13px 8px;}
    }
  </style>
</head>
<body>
<div class="page-container">
  <div class="main-card">
    <div class="main-logo">
      Momentum<br>Eats
    </div>
    <div class="search-container">
      <div class="location-dropdown-wrapper" style="margin: 0 0 0 30px;">
  <label for="select-location" style="font-size:1.15rem; color:#ff2344;font-weight:600;padding-right:12px;">Select Location:</label>
  <select name="location" id="select-location" style="font-size:1.12rem;padding:8px 18px;border-radius:8px;border:1.2px solid #ffd3db;">
    <option value="Mumbai">Mumbai</option>
    <option value="Ahmedabad">Ahmedabad</option>
    <option value="Delhi">Delhi</option>
  </select>
</div>

    </div>
  </div>
  <div class="breadcrumb">
  Home / India / <?php echo $location; ?> Restaurants
</div>

  <div class="toggle-row">
    <div class="toggle-col">
      <div class="toggle-card">
        <img src="../images/dining_out.jpeg" alt="Dining Out" />
      </div>
      <div class="toggle-label active">Dining Out</div>
    </div>
    <div class="toggle-col">
  <a href="home.php" style="display:flex; align-items:center; text-decoration:none;">
    <div class="toggle-card">
      <img src="../images/delivery.jpeg" width="40" />
    </div>
    <span class="toggle-label delivery" style="margin-left: 6px;">Delivery</span>
  </a>
</div>

  </div>
  <div class="dine-form-wrapper">
    <form class="dine-form" method="POST" action="book_table.php" onsubmit="return validateBookingForm();">
  <h3>Book a Table</h3>

  <label for="restaurant">Choose Restaurant:</label>
  <select name="restaurant" id="restaurant" required>
    <option value="" disabled selected>Select restaurant</option>
    <?php foreach($restaurants as $id => $name): ?>
      <option value="<?php echo $id; ?>"><?php echo htmlspecialchars($name); ?></option>
    <?php endforeach; ?>
  </select>

  <label for="from_time">From Time:</label>
  <input type="time" name="from_time" id="from_time" required />

  <label for="to_time">To Time:</label>
  <input type="time" name="to_time" id="to_time" required />

  <label for="number_people">Number of People:</label>
  <input type="number" name="number_people" id="number_people" min="1" max="20" required />

  <label for="payment_method">Payment Method:</label>
  <select name="payment_method" id="payment_method" required>
    <option value="" disabled selected>Select payment method</option>
    <option value="UPI">UPI</option>
    <option value="Card">Credit Card / Debit Card</option>
  </select>

  <p>Booking Fee: ₹500</p>

  <button type="submit">Book Now</button>
</form>

  </div>
</div>
<script>
  document.getElementById('select-location').addEventListener('change', function() {
    var loc = this.value;
    window.location.href = 'dining_out.php?location=' + loc;
  });

  window.onload = function() {
    var loc = "<?php echo $location; ?>";
    var select = document.getElementById('select-location');
    for (var i = 0; i < select.options.length; i++) {
      if (select.options[i].value === loc) {
        select.selectedIndex = i;
        break;
      }
    }
  }
</script>

</body>
</html>