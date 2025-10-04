-- Insert all 9 restaurants with city/description
INSERT INTO restaurants (id, name, city, description) VALUES
  (1, 'Mumbai Spice House', 'Mumbai', 'Authentic Maharashtrian and North Indian Cuisine'),
  (2, 'Seaside Chowpatty', 'Mumbai', 'Beachside Snacks & Street Food Favorites'),
  (3, 'Bombay Bistro', 'Mumbai', 'Trendy Café & Fusion Delights'),
  (4, 'Delhi Darbar', 'Delhi', 'Classic Mughlai & North Indian Flavours'),
  (5, 'Chandni Chowk Eats', 'Delhi', 'Paranthas, Chaat & Old Delhi Street Food'),
  (6, 'Red Fort Grille', 'Delhi', 'Family Restaurant | Modern Indian'),
  (7, 'Ahmedabad Thali Corner', 'Ahmedabad', 'Traditional Gujarati Thalis & More'),
  (8, 'Sabarmati Snack Shack', 'Ahmedabad', 'Popular Farsan & Vegetarian Snacks'),
  (9, 'Manek Chowk Pavilion', 'Ahmedabad', 'Celebrated Night Market & Street Food');

-- Now each menu (copy and adjust as needed)
INSERT INTO menu_items (restaurant_id, food_name, price) VALUES
  -- Mumbai Spice House
  (1, 'Vada Pav', 40),
  (1, 'Pav Bhaji', 80),
  (1, 'Sabudana Khichdi', 60),
  -- Seaside Chowpatty
  (2, 'Bhel Puri', 50),
  (2, 'Pani Puri', 45),
  (2, 'Kulfi Falooda', 70),
  -- Bombay Bistro
  (3, 'Paneer Frankie', 95),
  (3, 'Veg Kolhapuri', 110),
  (3, 'Bombay Masala Toast', 60),
  -- Delhi Darbar
  (4, 'Chole Bhature', 90),
  (4, 'Butter Chicken', 180),
  (4, 'Dal Makhani', 100),
  -- Chandni Chowk Eats
  (5, 'Paratha Platter', 75),
  (5, 'Aloo Tikki Chaat', 50),
  (5, 'Jalebi Rabri', 65),
  -- Red Fort Grille
  (6, 'Shahi Paneer', 120),
  (6, 'Mutton Rogan Josh', 220),
  (6, 'Phirni', 60),
  -- Ahmedabad Thali Corner
  (7, 'Gujarati Thali', 150),
  (7, 'Sev Tameta', 70),
  (7, 'Handvo', 65),
  -- Sabarmati Snack Shack
  (8, 'Dhokla', 40),
  (8, 'Khandvi', 45),
  (8, 'Fafda Jalebi', 50),
  -- Manek Chowk Pavilion
  (9, 'Bhajiya Basket', 55),
  (9, 'Surti Locho', 60),
  (9, 'Kulfi (Stick)', 40);
