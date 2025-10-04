<?php
// The same menu and restaurant mapping as in menu.php and cart.php
$menus = [
  1 => ['city' => 'Mumbai', 'name'=>'Mumbai Spice House', 'items'=>[
    ['item'=>'Vada Pav', 'price'=>40], ['item'=>'Pav Bhaji', 'price'=>80], ['item'=>'Sabudana Khichdi', 'price'=>60]
  ]],
  2 => ['city' => 'Mumbai', 'name'=>'Seaside Chowpatty', 'items'=>[
    ['item'=>'Bhel Puri', 'price'=>50], ['item'=>'Pani Puri', 'price'=>45], ['item'=>'Kulfi Falooda', 'price'=>70]
  ]],
  3 => ['city' => 'Mumbai', 'name'=>'Bombay Bistro', 'items'=>[
    ['item'=>'Paneer Frankie', 'price'=>95], ['item'=>'Veg Kolhapuri', 'price'=>110], ['item'=>'Bombay Masala Toast', 'price'=>60]
  ]],
  4 => ['city' => 'Delhi', 'name'=>'Delhi Darbar', 'items'=>[
    ['item'=>'Chole Bhature', 'price'=>90], ['item'=>'Butter Chicken', 'price'=>180], ['item'=>'Dal Makhani', 'price'=>100]
  ]],
  5 => ['city' => 'Delhi', 'name'=>'Chandni Chowk Eats', 'items'=>[
    ['item'=>'Paratha Platter', 'price'=>75], ['item'=>'Aloo Tikki Chaat', 'price'=>50], ['item'=>'Jalebi Rabri', 'price'=>65]
  ]],
  6 => ['city' => 'Delhi', 'name'=>'Red Fort Grille', 'items'=>[
    ['item'=>'Shahi Paneer', 'price'=>120], ['item'=>'Mutton Rogan Josh', 'price'=>220], ['item'=>'Phirni', 'price'=>60]
  ]],
  7 => ['city' => 'Ahmedabad', 'name'=>'Ahmedabad Thali Corner', 'items'=>[
    ['item'=>'Gujarati Thali', 'price'=>150], ['item'=>'Sev Tameta', 'price'=>70], ['item'=>'Handvo', 'price'=>65]
  ]],
  8 => ['city' => 'Ahmedabad', 'name'=>'Sabarmati Snack Shack', 'items'=>[
    ['item'=>'Dhokla', 'price'=>40], ['item'=>'Khandvi', 'price'=>45], ['item'=>'Fafda Jalebi', 'price'=>50]
  ]],
  9 => ['city' => 'Ahmedabad', 'name'=>'Manek Chowk Pavilion', 'items'=>[
    ['item'=>'Bhajiya Basket', 'price'=>55], ['item'=>'Surti Locho', 'price'=>60], ['item'=>'Kulfi (Stick)', 'price'=>40]
  ]]
];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel - Restaurant Overview</title>
  <style>
    body { background: #fff4fa; font-family: 'Segoe UI', Arial, sans-serif; margin:0; color: #c72040;}
    .container { max-width: 900px; margin: 45px auto 40px auto; background: #fff; border-radius: 22px; box-shadow: 0 10px 36px rgba(220,16,64,0.11); padding: 52px 40px;}
    h1 { text-align:center; font-size:2.35rem; font-weight:900; color:#e81b44; letter-spacing:1.5px; margin-bottom: 35px;}
    .overview-table { width:100%; border-collapse:collapse; margin-bottom:18px;}
    .overview-table th, .overview-table td { padding: 12px 10px; border-bottom:1.5px solid #ffe6ed; font-size: 1.08rem; }
    .overview-table th { background: #ffe6ed; color: #bb1455; }
    .overview-table td { background: #fff7fc; vertical-align:top;}
    .menu-list { margin:0; padding-left:22px; color:#ab206a;}
    .city-badge { display:inline-block; background:#fff3ee; color:#d0102e; padding:4px 14px; border-radius:10px; font-weight: 600; font-size: 1rem; margin-bottom: 5px;}
    .restaurant-head { font-size:1.17rem; font-weight:800; color:#e13b5d;}
    .menu-title { font-size: .98rem; color: #af2252; margin-top:6px; margin-bottom:3px; font-weight:700;}
    .edit-btn { background:linear-gradient(90deg,#ff2344 35%,#ff7b6b 89%);color:#fff;font-weight:700;padding:6px 18px;border:none;border-radius:11px;cursor:pointer;transition:.13s;font-size:.97rem; box-shadow:0 2px 8px #ffb6c6ab;}
    .edit-btn:hover { background:linear-gradient(90deg,#be1650,#ff7b6b);}
  </style>
</head>
<body>
  <div class="container">
    <h1>Admin Panel: Restaurant & Menu Overview</h1>
    <table class="overview-table">
      <tr>
        <th>Restaurant Name</th>
        <th>City</th>
        <th>Menu</th>
        <th>Action</th>
      </tr>
      <?php foreach($menus as $id => $res): ?>
      <tr>
        <td>
          <span class="restaurant-head"><?php echo htmlspecialchars($res['name']); ?></span>
        </td>
        <td>
          <span class="city-badge"><?php echo htmlspecialchars($res['city']); ?></span>
        </td>
        <td>
          <div class="menu-title">Items & Prices:</div>
          <ul class="menu-list">
            <?php foreach($res['items'] as $item): ?>
              <li><?php echo htmlspecialchars($item['item']); ?> (₹<?php echo $item['price']; ?>)</li>
            <?php endforeach; ?>
          </ul>
        </td>
        <td>
          <button class="edit-btn" onclick="alert('Edit feature coming soon!')">Edit</button>
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>
</body>
</html>
