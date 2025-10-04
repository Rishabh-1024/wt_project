<?php
session_start();

if (!isset($_SESSION['booking_info'])) {
    // Redirect to dining out page if no booking info
    header('Location: dining_out.php');
    exit();
}

$booking = $_SESSION['booking_info'];
$restaurant_name = htmlspecialchars($booking['restaurant_name']);
$booking_from = htmlspecialchars($booking['from_time']);
$booking_to = htmlspecialchars($booking['to_time']);
$number_people = (int)$booking['number_people'];

?>



<!DOCTYPE html>
<html>
<head>
  <title>Booking Confirmed | Momentum Eats</title>
  <link rel="stylesheet" href="../css/style.css" />
  <style>
    body {
      font-family: 'Segoe UI', Arial, sans-serif;
      background: #fff5f5;
      margin: 20px;
      padding: 0 10px;
      color: #d10f3e;
      text-align: center;
    }
    .container {
      background: white;
      padding: 26px;
      max-width: 600px;
      margin: 0 auto;
      border-radius: 12px;
      box-shadow: 0 5px 24px rgba(209, 15, 62, 0.3);
    }
    h1 {
      font-size: 2.2rem;
      font-weight: 700;
      margin-bottom: 12px;
    }
    p.rules {
      color: #8b3131;
      font-size: 0.97rem;
      margin-top: 8px;
      font-weight: 500;
    }
    button.show-menu-btn {
      background: linear-gradient(45deg, #ff2344, #ff7b6b);
      border: none;
      color: white;
      padding: 14px 36px;
      font-size: 1.2rem;
      font-weight: 700;
      border-radius: 24px;
      cursor: pointer;
      margin-top: 26px;
      box-shadow: 0 8px 26px rgba(255, 78, 108, 0.6);
      transition: background 0.3s ease;
    }
    button.show-menu-btn:hover {
      background: linear-gradient(45deg, #fa092f, #ff8377);
    }
    .menus {
      display: none;
      margin-top: 30px;
      text-align: left;
    }
    .menu-section {
      margin-bottom: 26px;
    }
    .menu-section h3 {
      color: #bf2a3c;
      margin-bottom: 8px;
    }
    ul.menu-list {
      list-style: none;
      padding-left: 0;
    }
    ul.menu-list li {
      padding-bottom: 6px;
      font-size: 1rem;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Thank You!</h1>
    <p class="rules">Please note: If you arrive more than 30 minutes late, your booking will be cancelled and the booking fee of ₹500 is non-refundable.</p>

    <button class="show-menu-btn" onclick="showMenu()">Show Menu</button>

    <!-- Show Menu Section with Only Veg Options -->
<form id="veg-menu-form" action="thank_you.php" method="post">
  <div class="menus" id="menu-sections">
    <div class="menu-section">
      <h3>Starter Menu</h3>
      <ul class="menu-list">
        <li>
          Paneer Tikka
          <input type="number" min="0" max="20" name="qty_paneer_tikka" value="0" style="width:60px; margin-left:10px;" />
        </li>
        <li>
          Veg Spring Rolls
          <input type="number" min="0" max="20" name="qty_veg_spring_rolls" value="0" style="width:60px; margin-left:10px;" />
        </li>
        <li>
          Hara Bhara Kabab
          <input type="number" min="0" max="20" name="qty_hara_bhara_kabab" value="0" style="width:60px; margin-left:10px;" />
        </li>
      </ul>
    </div>
    <div class="menu-section">
      <h3>Main Course Menu</h3>
      <ul class="menu-list">
        <li>
          Paneer Butter Masala
          <input type="number" min="0" max="20" name="qty_paneer_butter_masala" value="0" style="width:60px; margin-left:10px;" />
        </li>
        <li>
          Butter Naan
          <input type="number" min="0" max="20" name="qty_butter_naan" value="0" style="width:60px; margin-left:10px;" />
        </li>
        <li>
          Veg Biryani
          <input type="number" min="0" max="20" name="qty_veg_biryani" value="0" style="width:60px; margin-left:10px;" />
        </li>
        <li>
          Dal Makhani
          <input type="number" min="0" max="20" name="qty_dal_makhani" value="0" style="width:60px; margin-left:10px;" />
        </li>
      </ul>
    </div>
    <div class="menu-section">
      <h3>Dessert Menu</h3>
      <ul class="menu-list">
        <li>
          Gulab Jamun
          <input type="number" min="0" max="20" name="qty_gulab_jamun" value="0" style="width:60px; margin-left:10px;" />
        </li>
        <li>
          Chocolate Brownie
          <input type="number" min="0" max="20" name="qty_chocolate_brownie" value="0" style="width:60px; margin-left:10px;" />
        </li>
        <li>
          Ras Malai
          <input type="number" min="0" max="20" name="qty_ras_malai" value="0" style="width:60px; margin-left:10px;" />
        </li>
      </ul>
    </div>
    <button type="submit" class="show-menu-btn" style="margin-top:18px;">Order Selected Items</button>
  </div>
</form>

  <script>
    function showMenu() {
      var menuDiv = document.getElementById('menu-sections');
      if (menuDiv.style.display === 'none' || menuDiv.style.display === '') {
        menuDiv.style.display = 'block';
      } else {
        menuDiv.style.display = 'none';
      }
    }
  </script>
</body>
</html>
