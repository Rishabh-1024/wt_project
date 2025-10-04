<?php
$city = isset($_GET['city']) ? strtolower($_GET['city']) : '';
$restaurants = [
  'mumbai' => [
    ['id' => 1, 'name' => 'Mumbai Spice House', 'description' => 'Authentic Maharashtrian and North Indian Cuisine'],
    ['id' => 2, 'name' => 'Seaside Chowpatty', 'description' => 'Beachside Snacks & Street Food Favorites'],
    ['id' => 3, 'name' => 'Bombay Bistro', 'description' => 'Trendy Café & Fusion Delights'],
  ],
  'delhi' => [
    ['id' => 4, 'name' => 'Delhi Darbar', 'description' => 'Classic Mughlai & North Indian Flavours'],
    ['id' => 5, 'name' => 'Chandni Chowk Eats', 'description' => 'Paranthas, Chaat & Old Delhi Street Food'],
    ['id' => 6, 'name' => 'Red Fort Grille', 'description' => 'Family Restaurant | Modern Indian'],
  ],
  'ahmedabad' => [
    ['id' => 7, 'name' => 'Ahmedabad Thali Corner', 'description' => 'Traditional Gujarati Thalis & More'],
    ['id' => 8, 'name' => 'Sabarmati Snack Shack', 'description' => 'Popular Farsan & Vegetarian Snacks'],
    ['id' => 9, 'name' => 'Manek Chowk Pavilion', 'description' => 'Celebrated Night Market & Street Food'],
  ]
];
$activeRestaurants = isset($restaurants[$city]) ? $restaurants[$city] : [];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Delivery Restaurants</title>
  <link rel="stylesheet" href="../css/style.css" />
  <style>
   body {
  background: linear-gradient(110deg, #fff7f9 70%, #ffebef 100%);
  font-family: 'Segoe UI', Arial, sans-serif;
  margin: 0;
  color: #c72040;
}

.container {
  max-width: 820px;
  margin: 52px auto;
  background: #fff;
  border-radius: 24px;
  box-shadow: 0 10px 35px rgba(215, 24, 56, 0.12);
  padding: 62px 52px 38px 52px;
}

h1 {
  font-size: 2.4rem;
  font-weight: 900;
  margin-bottom: 36px;
  color: #e81b44;
  letter-spacing: 2px;
  text-align: center;
}

.restaurants-list {
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: stretch;
  gap: 40px; /* spacing between cards */
  margin: 32px 0 0 0;
  padding: 0;
  list-style: none;
}

.restaurant-card {
  background: #fff6fa;
  border: 1.5px solid #f4d1dd;
  border-radius: 18px;
  box-shadow: 0 4px 18px #f91a3a26;
  min-width: 230px;
  max-width: 260px;
  flex: 1 1 240px;
  padding: 30px 16px 22px 16px;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: center;
  margin: 0;
  transition: box-shadow 0.18s, transform 0.12s;
}



.restaurant-card:hover {
  box-shadow: 0 10px 32px rgba(220,10,50,0.16);
  transform: scale(1.025);
  border-color: #e4376f;
}

.restaurant-card h2 {
  color: #ea2355;
  font-size: 1.28rem;
  font-weight: 800;
  margin-bottom: 4px;
  letter-spacing: 1px;
}

.restaurant-card p {
  font-size: 1.07rem;
  color: #844166;
  margin-bottom: 18px;
  font-weight: 500;
}

.view-menu-btn {
  display: inline-block;
  background: linear-gradient(105deg, #ff2344 16%, #ff7b6b 86%);
  color: #fff;
  font-weight: 700;
  font-size: 1.09rem;
  padding: 11px 30px;
  border: none;
  border-radius: 14px;
  text-decoration: none;
  box-shadow: 0 4px 13px rgba(255,78,108,0.13);
  transition: background 0.14s, transform 0.10s;
  cursor: pointer;
}
.view-menu-btn:hover {
  background: linear-gradient(105deg, #fd2140 49%, #ff6e90 100%);
  transform: scale(1.04);
}

.back-btn {
  display: block;
  margin: 52px auto 0 auto;
  background: linear-gradient(120deg, #ff2344 14%, #ff7b6b 99%);
  color: #fff;
  font-weight: 700;
  font-size: 1.12rem;
  padding: 13px 42px;
  border-radius: 22px;
  text-decoration: none;
  border: none;
  outline: none;
  box-shadow: 0 5px 20px rgba(255,78,108,0.09);
  cursor: pointer;
  transition: background 0.15s, transform 0.08s;
}
.back-btn:hover {
  background: linear-gradient(120deg, #cf1859, #ff6e90 98%);
  transform: scale(1.04);
}

.empty-msg {
  font-size: 1.13rem;
  color: #c62546;
  margin: 56px 0 36px 0;
  text-align: center;
}


  </style>
</head>
<body>
  <div class="container">
    <h1>
      <?php
      if ($city === 'mumbai') echo "Mumbai Restaurant Delivery";
      elseif ($city === 'delhi') echo "Delhi Restaurant Delivery";
      elseif ($city === 'ahmedabad') echo "Ahmedabad Restaurant Delivery";
      else echo "Select a Location to See Restaurants";
      ?>
    </h1>
    <?php if ($activeRestaurants): ?>
      <ul class="restaurants-list">
        <?php foreach ($activeRestaurants as $res): ?>
        <li class="restaurant-card">
          <h2><?php echo htmlspecialchars($res['name']); ?></h2>
          <p><?php echo htmlspecialchars($res['description']); ?></p>
          <a href="menu.php?restaurant_id=<?php echo $res['id']; ?>" class="view-menu-btn">View Menu</a>
        </li>
        <?php endforeach; ?>
      </ul>
    <?php else: ?>
      <div class="empty-msg">Please return to the previous page and Select The location.</div>
    <?php endif; ?>
    <a href="home.php" class="back-btn">Back to Location Selection</a>
  </div>
</body>
</html>
