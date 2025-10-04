<?php
$restaurant_id = isset($_GET['restaurant_id']) ? intval($_GET['restaurant_id']) : 0;
$menus = [
  1 => ['name'=>'Mumbai Spice House', 'items'=>[
    ['item'=>'Vada Pav', 'price'=>30], ['item'=>'Pav Bhaji', 'price'=>70], ['item'=>'Sabudana Khichdi', 'price'=>55]
  ]],
  2 => ['name'=>'Seaside Chowpatty', 'items'=>[
    ['item'=>'Bhel Puri', 'price'=>25], ['item'=>'Pani Puri', 'price'=>30], ['item'=>'Kulfi Falooda', 'price'=>65]
  ]],
  3 => ['name'=>'Bombay Bistro', 'items'=>[
    ['item'=>'Paneer Frankie', 'price'=>90], ['item'=>'Veg Kolhapuri', 'price'=>110], ['item'=>'Bombay Masala Toast', 'price'=>50]
  ]],
  4 => ['name'=>'Delhi Darbar', 'items'=>[
    ['item'=>'Chole Bhature', 'price'=>80], ['item'=>'Butter Chicken', 'price'=>180], ['item'=>'Dal Makhani', 'price'=>100]
  ]],
  5 => ['name'=>'Chandni Chowk Eats', 'items'=>[
    ['item'=>'Paratha Platter', 'price'=>65], ['item'=>'Aloo Tikki Chaat', 'price'=>40], ['item'=>'Jalebi Rabri', 'price'=>55]
  ]],
  6 => ['name'=>'Red Fort Grille', 'items'=>[
    ['item'=>'Shahi Paneer', 'price'=>120], ['item'=>'Mutton Rogan Josh', 'price'=>220], ['item'=>'Phirni', 'price'=>45]
  ]],
  7 => ['name'=>'Ahmedabad Thali Corner', 'items'=>[
    ['item'=>'Gujarati Thali', 'price'=>150], ['item'=>'Sev Tameta', 'price'=>65], ['item'=>'Handvo', 'price'=>70]
  ]],
  8 => ['name'=>'Sabarmati Snack Shack', 'items'=>[
    ['item'=>'Dhokla', 'price'=>35], ['item'=>'Khandvi', 'price'=>40], ['item'=>'Fafda Jalebi', 'price'=>45]
  ]],
  9 => ['name'=>'Manek Chowk Pavilion', 'items'=>[
    ['item'=>'Bhajiya Basket', 'price'=>50], ['item'=>'Surti Locho', 'price'=>55], ['item'=>'Kulfi (Stick)', 'price'=>35]
  ]]
];
$curMenu = isset($menus[$restaurant_id]) ? $menus[$restaurant_id] : null;
?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $curMenu ? htmlspecialchars($curMenu['name']) : 'Menu'; ?></title>
  <style>
    body { background: #fff7f7; font-family: 'Segoe UI', Arial, sans-serif; margin:0; color:#b11b28;}
    .container { max-width:450px;margin:48px auto;background:#fff;border-radius:19px;box-shadow:0 11px 35px #ffa8b813;padding:38px 36px;}
    h2 { font-size:2.13rem;color:#e11a39;font-weight:800;margin-bottom:14px;}
    table { width:100%; border-collapse:collapse; margin-top:16px;}
    th, td { padding:11px 7px; font-size:1.07rem;}
    th {color:#b12746; background:#fff1f6;}
    tr:nth-child(even) { background:#fdedf1;}
    input[type="number"] { width:60px; border-radius:8px;border:1px solid #ffe3e3;padding:4px;}
    .order-btn { margin-top:23px;padding:13px 42px;color:#fff;background:linear-gradient(100deg,#fd2e41,#ff7b6b 80%);border:none; border-radius:23px; font-size:1.09rem; font-weight:700; cursor:pointer;}
    .order-btn:hover { background:linear-gradient(100deg,#c6153e,#ff8197 85%);}
    .msg { color:#e01d3e; font-size:1.12rem; margin-bottom:20px;}
    .back-link { display:inline-block; margin-top:23px; color:#fff; background:#e4133c; padding:10px 28px; border-radius:18px; text-decoration:none;}
    .back-link:hover { background:#be1b2b;}
  </style>
</head>
<body>
<div class="container">
  <?php if($curMenu): ?>
    <h2><?php echo htmlspecialchars($curMenu['name']); ?></h2>
    <form method="post" action="cart.php">
      <table>
        <tr>
          <th>Food Item</th>
          <th>Price (₹)</th>
          <th>Quantity</th>
        </tr>
        <?php foreach($curMenu['items'] as $item): ?>
        <tr>
          <td><?php echo htmlspecialchars($item['item']); ?></td>
          <td><?php echo $item['price']; ?></td>
          <td><input type="number" name="qty[<?php echo htmlspecialchars($item['item']); ?>]" min="0" max="20" value="0"></td>
        </tr>
        <?php endforeach; ?>
      </table>
      <input type="hidden" name="restaurant_id" value="<?php echo $restaurant_id; ?>">
      <button type="submit" class="order-btn">Add to Cart</button>
    </form>
  <?php else: ?>
    <div class="msg">Invalid or missing restaurant! Please go back and select a valid restaurant.</div>
  <?php endif; ?>
  <a href="delivery.php" class="back-link">Back to Restaurants</a>
</div>
</body>
</html>
