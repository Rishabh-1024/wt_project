<?php
include "config.php";
// This mapping must match your menu.php structure for restaurant_id and items/prices
$menus = [
  1 => ['name'=>'Mumbai Spice House', 'items'=>[
    ['item'=>'Vada Pav', 'price'=>40], ['item'=>'Pav Bhaji', 'price'=>80], ['item'=>'Sabudana Khichdi', 'price'=>60]
  ]],
  2 => ['name'=>'Seaside Chowpatty', 'items'=>[
    ['item'=>'Bhel Puri', 'price'=>50], ['item'=>'Pani Puri', 'price'=>45], ['item'=>'Kulfi Falooda', 'price'=>70]
  ]],
  3 => ['name'=>'Bombay Bistro', 'items'=>[
    ['item'=>'Paneer Frankie', 'price'=>95], ['item'=>'Veg Kolhapuri', 'price'=>110], ['item'=>'Bombay Masala Toast', 'price'=>60]
  ]],
  4 => ['name'=>'Delhi Darbar', 'items'=>[
    ['item'=>'Chole Bhature', 'price'=>90], ['item'=>'Butter Chicken', 'price'=>180], ['item'=>'Dal Makhani', 'price'=>100]
  ]],
  5 => ['name'=>'Chandni Chowk Eats', 'items'=>[
    ['item'=>'Paratha Platter', 'price'=>75], ['item'=>'Aloo Tikki Chaat', 'price'=>50], ['item'=>'Jalebi Rabri', 'price'=>65]
  ]],
  6 => ['name'=>'Red Fort Grille', 'items'=>[
    ['item'=>'Shahi Paneer', 'price'=>120], ['item'=>'Mutton Rogan Josh', 'price'=>220], ['item'=>'Phirni', 'price'=>60]
  ]],
  7 => ['name'=>'Ahmedabad Thali Corner', 'items'=>[
    ['item'=>'Gujarati Thali', 'price'=>150], ['item'=>'Sev Tameta', 'price'=>70], ['item'=>'Handvo', 'price'=>65]
  ]],
  8 => ['name'=>'Sabarmati Snack Shack', 'items'=>[
    ['item'=>'Dhokla', 'price'=>40], ['item'=>'Khandvi', 'price'=>45], ['item'=>'Fafda Jalebi', 'price'=>50]
  ]],
  9 => ['name'=>'Manek Chowk Pavilion', 'items'=>[
    ['item'=>'Bhajiya Basket', 'price'=>55], ['item'=>'Surti Locho', 'price'=>60], ['item'=>'Kulfi (Stick)', 'price'=>40]
  ]]
];
// Get submitted restaurant and menu choices
$restaurant_id = isset($_POST['restaurant_id']) ? intval($_POST['restaurant_id']) : 0;
$quantities = isset($_POST['qty']) ? $_POST['qty'] : [];
$menu = isset($menus[$restaurant_id]) ? $menus[$restaurant_id] : null;

$total = 0;
$orderItems = [];

if ($menu && $quantities) {
  foreach ($menu['items'] as $item) {
    $name = $item['item'];
    $price = $item['price'];
    $qty = isset($quantities[$name]) ? intval($quantities[$name]) : 0;
    if ($qty > 0) {
      $itemTotal = $qty * $price;
      $total += $itemTotal;
      $orderItems[] = [
        'name' => $name,
        'qty' => $qty,
        'price' => $price,
        'subtotal' => $itemTotal
      ];
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Your Cart - <?php echo $menu ? htmlspecialchars($menu['name']) : 'Restaurant'; ?></title>
  <style>
    body { background:#fff6fb; font-family:'Segoe UI',Arial,sans-serif; margin:0; color:#ad2457;}
    .container { max-width:540px; margin:60px auto 0 auto; background:#fff; border-radius:20px; box-shadow:0 10px 32px #eb5ca514; padding:48px 38px;}
    h2 { font-size:2rem; color:#e7455f; margin-bottom:16px;}
    table { width:100%; border-collapse:collapse; margin-bottom: 22px;}
    th, td { padding:11px 7px; font-size:1.10rem;}
    th { background: #ffe6ed; color:#b71456;}
    tr:nth-child(even) { background: #fff6fa;}
    .item-row td { font-size:1.12rem; }
    .total { text-align:right; font-size:1.17rem; font-weight:700; color:#e92a79; padding-top:8px; }
    .empty-msg { color:#cb1860; font-size:1.14rem; margin-bottom:22px;}
    .back-link { display:inline-block; margin-top:24px; color:#fff; background:#e4356c; padding:12px 30px; border-radius:18px; text-decoration:none; }
    .back-link:hover { background:#cf1559; }
    .place-btn { margin-top:19px;padding:13px 44px;background:linear-gradient(100deg,#ff2e41,#ff7b6b 89%);color:#fff;font-weight:700;font-size:1.13rem;border:none;border-radius:20px;cursor:pointer;transition:.18s;}
    .place-btn:hover { background:linear-gradient(100deg,#f60c36,#ff8377 98%);}
  </style>
</head>
<body>
  <div class="container">
    <h2>Your Cart - <?php echo $menu ? htmlspecialchars($menu['name']) : ''; ?></h2>
    <?php if($orderItems): ?>
    <table>
      <tr>
        <th>Food Item</th>
        <th>Price (₹)</th>
        <th>Quantity</th>
        <th>Subtotal</th>
      </tr>
      <?php foreach($orderItems as $row): ?>
      <tr class="item-row">
        <td><?php echo htmlspecialchars($row['name']); ?></td>
        <td><?php echo $row['price']; ?></td>
        <td><?php echo $row['qty']; ?></td>
        <td><?php echo $row['subtotal']; ?></td>
      </tr>
      <?php endforeach; ?>
    </table>
    <div class="total">Grand Total: ₹<?php echo $total; ?></div>
    <button class="place-btn" onclick="alert('Order placed successfully!')">Place Order</button>
    <?php else: ?>
      <div class="empty-msg">No items in your cart. Please go back and add food items.</div>
    <?php endif; ?>
    <a href="menu.php?restaurant_id=<?php echo $restaurant_id; ?>" class="back-link">Back to Menu</a>
  </div>
</body>
</html>
