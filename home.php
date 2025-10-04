<!DOCTYPE html>
<html>
<head>
  <title>Online Food Ordering - Home</title>
  <link rel="stylesheet" href="../css/style.css" />
  <style>
   body {
  background: radial-gradient(at top left, #ffe6e6 30%, #fff5f5 90%);
  font-family: 'Segoe UI', Arial, sans-serif;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;
  color: #d10f3e;
  text-align: center;
}

.container {
  background: linear-gradient(120deg, #ffffff 70%, #ffe6ec 100%);
  padding: 56px 48px;
  border-radius: 20px;
  box-shadow: 0 12px 50px 4px rgba(209, 15, 62, 0.23);
  max-width: 420px;
  width: 100%;
}

h1 {
  font-size: 2.3rem;
  font-weight: 850;
  margin-bottom: 12px;
  letter-spacing: 2px;
}

p {
  font-size: 1.16rem;
  margin-bottom: 26px;
  color: #ad2b44;
  font-weight: 500;
}

label {
  font-size: 1.10rem;
  margin-right: 14px;
  font-weight: 600;
  color: #d10f3e;
}

select {
  font-size: 1.07rem;
  padding: 11px 22px;
  border-radius: 14px;
  border: none;
  background: linear-gradient(105deg, #ffe9ef 70%, #f3b6cc 100%);
  color: #de1843;
  font-family: inherit;
  font-weight: 600;
  box-shadow: 0 2px 8px rgba(210,15,62,0.11);
  outline: none;
  margin-bottom: 18px;
  transition: box-shadow 0.18s;
}

select:focus {
  box-shadow: 0 0 10px rgba(209,15,62,0.27);
}

.go-btn {
  display: inline-block;
  background: linear-gradient(110deg, #ff2344 20%, #ff7b6b 85%);
  color: #fff;
  font-weight: 700;
  font-size: 1.22rem;
  padding: 13px 44px;
  border: none;
  border-radius: 28px;
  cursor: pointer;
  margin-top: 28px;
  margin-bottom: 6px;
  text-decoration: none;
  box-shadow: 0 8px 28px rgba(255,78,108,0.21);
  letter-spacing: 1px;
  transition: background 0.23s, transform 0.18s;
}

.go-btn:disabled {
  background: #f7bbc5;
  cursor: not-allowed;
  color: #f8eef1;
  box-shadow: none;
}

.go-btn:hover:enabled {
  background: linear-gradient(110deg, #fa0c38, #ff8377 88%);
  transform: scale(1.045);
}

  </style>
  <script>
    function checkCitySelected() {
      var sel = document.getElementById("city");
      var btn = document.getElementById("goToDelivery");
      btn.disabled = (sel.value === "");
    }
    function goToDeliveryPage() {
      var city = document.getElementById("city").value;
      if(city) {
        window.location.href = "delivery.php?city=" + encodeURIComponent(city);
      }
      return false; // Prevent normal form submission
    }
  </script>
</head>
<body>
  <div class="container">
    <h1>Welcome to Delivery Service</h1>
    <p>Select your location to continue.</p>
    <form onsubmit="return goToDeliveryPage();">
      <label for="city">Select Location:</label>
      <select id="city" name="city" onchange="checkCitySelected()">
        <option value="">Select city</option>
        <option value="mumbai">Mumbai</option>
        <option value="delhi">Delhi</option>
        <option value="ahmedabad">Ahmedabad</option>
      </select>
      <br>
      <button id="goToDelivery" class="go-btn" type="submit" disabled>Go to Delivery</button>
    </form>
  </div>
  <script>
    // Disable button on initial load
    checkCitySelected();
  </script>
</body>
</html>
