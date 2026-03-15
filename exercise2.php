<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercise 2 - Thy Sophea</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      min-height: 100vh;
      background: linear-gradient(180deg, #87CEEB 0%, #e0f4ff 100%);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .navbar {
      background: rgba(255,255,255,0.35);
      backdrop-filter: blur(6px);
      padding: 10px 30px;
      display: flex;
      gap: 12px;
      align-items: center;
      border-bottom: 1px solid rgba(255,255,255,0.5);
      flex-wrap: wrap;
    }
    .navbar a {
      text-decoration: none;
      color: #1a5276;
      font-weight: bold;
      padding: 6px 14px;
      border-radius: 8px;
      background: rgba(255,255,255,0.4);
      transition: background 0.2s;
      font-size: 14px;
    }
    .navbar a:hover { background: rgba(255,255,255,0.75); }
    .navbar a.active { background: #1a5276; color: white; }
    .card {
      background: rgba(255,255,255,0.65);
      border-radius: 16px;
      padding: 35px 40px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      max-width: 480px;
      width: 95%;
      margin: 50px auto;
    }
    h2 { color: #1a5276; margin-bottom: 18px; }
    label {
      font-weight: bold;
      display: block;
      margin-top: 10px;
      color: #555;
      font-size: 14px;
    }
    input[type="number"] {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      margin-bottom: 14px;
      border: 1px solid #ccc;
      border-radius: 7px;
      font-size: 14px;
      background: rgba(255,255,255,0.9);
      -moz-appearance: textfield;
    }
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; }
    button[type="submit"] {
      width: 100%;
      padding: 12px;
      background: #1a5276;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 15px;
      cursor: pointer;
      transition: background 0.3s;
      margin-top: 4px;
    }
    button[type="submit"]:hover { background: #154360; }
    .receipt {
      margin-top: 18px;
      padding: 15px;
      background: rgba(233,236,239,0.85);
      border-left: 5px solid #28a745;
      border-radius: 6px;
      font-size: 14px;
      line-height: 1.8;
    }
    .receipt h3 { margin: 10px 0 0 0; color: #28a745; }
    .nav-buttons {
      display: flex;
      justify-content: space-between;
      margin-top: 22px;
      gap: 10px;
    }
    .nav-buttons a {
      text-decoration: none;
      background: #1a5276;
      color: white;
      padding: 8px 18px;
      border-radius: 8px;
      font-size: 13px;
      transition: background 0.2s;
    }
    .nav-buttons a:hover { background: #154360; }
  </style>
</head>
<body>

<div class="navbar">
  <a href="index.php">🏠 Home</a>
  <a href="exercise1.php">Exercise 1</a>
  <a href="exercise2.php" class="active">Exercise 2</a>
  <a href="exercise3.php">Exercise 3</a>
</div>

<div class="card">
  <h2>⚡ Exercise 2 — Electric Bill Calculator</h2>

  <form method="POST" onsubmit="return validateForm()">
    <label>Previous Number (Kw):</label>
    <input type="number" id="oldnum" name="oldnum" min="0" required
           value="<?= isset($_POST['oldnum']) ? htmlspecialchars($_POST['oldnum']) : '' ?>">
    <label>Current Number (Kw):</label>
    <input type="number" id="newnum" name="newnum" min="0" required
           value="<?= isset($_POST['newnum']) ? htmlspecialchars($_POST['newnum']) : '' ?>">
    <button type="submit" name="calculate" value="1">Calculate Bill</button>
  </form>

  <?php
  if (isset($_POST['calculate'])) {
    $oldnum = floatval($_POST['oldnum']);
    $newnum = floatval($_POST['newnum']);
    $last   = $newnum - $oldnum;
    if ($last <= 10)     $total = $last * 700;
    elseif ($last <= 20) $total = $last * 800;
    elseif ($last <= 30) $total = $last * 900;
    else                 $total = $last * 1000;
    $formatMoney = number_format($total, 2, '.', ',');
    echo "<div class='receipt'>";
    echo "<strong>Previous Number:</strong> {$oldnum} Kw<br>";
    echo "<strong>Current Number:</strong> {$newnum} Kw<br>";
    echo "<strong>Usage This Month:</strong> {$last} Kw<br>";
    echo "<hr style='margin:8px 0'>";
    echo "<h3>Total Payment: {$formatMoney} ៛</h3>";
    echo "</div>";
  }
  ?>

  <div class="nav-buttons">
    <a href="exercise1.php">← Exercise 1</a>
    <a href="exercise3.php">Exercise 3 →</a>
  </div>
</div>

<script>
  function validateForm() {
    let oldnum = parseFloat(document.getElementById('oldnum').value);
    let newnum = parseFloat(document.getElementById('newnum').value);
    if (newnum < oldnum) {
      alert("កំហុស៖ លេខថ្មីមិនអាចតូចជាងលេខចាស់បានទេ!");
      return false;
    }
    return true;
  }
</script>

</body>
</html>