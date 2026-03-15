
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assignment - Thy Sophea</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      min-height: 100vh;
      background: linear-gradient(180deg, #87CEEB 0%, #e0f4ff 100%);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* ===== NAVBAR ===== */
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

    /* ===== CARDS ===== */
    .card {
      background: rgba(255,255,255,0.65);
      border-radius: 16px;
      padding: 35px 40px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      max-width: 480px;
      width: 95%;
      margin: 50px auto;
    }

    /* ===== HOME ===== */
    .home-card { text-align: center; }
    .profile-img {
      width: 110px; height: 110px;
      border-radius: 50%;
      object-fit: cover;
      border: 4px solid #1a5276;
      margin-bottom: 12px;
    }
    .logo-img {
      width: 75px; height: 75px;
      object-fit: contain;
      margin-bottom: 8px;
    }
    .home-card h1 { color: #1a5276; font-size: 21px; margin-bottom: 4px; }
    .home-card p  { color: #444; font-size: 14px; margin-bottom: 4px; }
    .badge {
      display: inline-block;
      margin: 12px 0 20px;
      background: #1a5276;
      color: white;
      padding: 5px 16px;
      border-radius: 20px;
      font-size: 13px;
    }
    .ex-buttons { display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; }
    .ex-buttons a {
      background: #1a5276;
      color: white;
      text-decoration: none;
      padding: 11px 22px;
      border-radius: 10px;
      font-size: 14px;
      transition: background 0.2s;
    }
    .ex-buttons a:hover { background: #154360; }

    /* ===== FORMS ===== */
    h2 { color: #1a5276; margin-bottom: 18px; }
    label { font-weight: bold; display: block; margin-top: 10px; color: #555; font-size: 14px; }
    input[type="number"],
    input[type="text"],
    textarea,
    select {
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
    textarea { resize: vertical; }

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

    /* ===== RESULTS ===== */
    .receipt {
      margin-top: 18px;
      padding: 15px;
      background: rgba(233,236,239,0.85);
      border-left: 5px solid #28a745;
      border-radius: 6px;
      font-size: 14px;
    }
    .receipt h3 { margin: 10px 0 0 0; color: #28a745; }
    .result-box {
      margin-top: 15px;
      padding: 15px;
      background: rgba(255,255,255,0.75);
      border-radius: 10px;
      font-size: 15px;
      color: #1a5276;
    }

    /* ===== TABLE ===== */
    table { width: 100%; border-collapse: collapse; margin-top: 12px; font-size: 14px; }
    th { background: #1a5276; color: white; padding: 9px 12px; }
    td { padding: 9px 12px; border-bottom: 1px solid #ccc; background: rgba(255,255,255,0.5); }
    tr:hover td { background: rgba(255,255,255,0.85); }

    /* ===== NAV BUTTONS ===== */
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

<!-- ===== NAVBAR ===== -->
<div class="navbar">
  <a href="?page=home"      class="<?= $page==='home'      ? 'active':'' ?>">🏠 Home</a>
  <a href="?page=exercise1" class="<?= $page==='exercise1' ? 'active':'' ?>">Exercise 1</a>
  <a href="?page=exercise2" class="<?= $page==='exercise2' ? 'active':'' ?>">Exercise 2</a>
  <a href="?page=exercise3" class="<?= $page==='exercise3' ? 'active':'' ?>">Exercise 3</a>
</div>

<?php /* ==================== HOME ==================== */ ?>
<?php if ($page === 'home'): ?>
<div class="card home-card">
  <img src="logo.png" alt="School Logo" class="logo-img"
       onerror="this.src='https://via.placeholder.com/75x75?text=Logo'">
  <h1>Buigh Brigh University</h1>
  <p>Subject: Computer &amp; Web Technology</p>
  <hr style="margin:12px 0; border-color:#ccc;">
  <img src="photo.jpg" alt="Thy Sophea" class="profile-img"
       onerror="this.src='https://via.placeholder.com/110x110?text=Photo'">
  <h1>Thy Sophea</h1>
  <p>Student Assignment Portfolio</p>
  <span class="badge">Academic Year 2024–2025</span>
  <div class="ex-buttons">
    <a href="?page=exercise1">Exercise 1</a>
    <a href="?page=exercise2">Exercise 2</a>
    <a href="?page=exercise3">Exercise 3</a>
  </div>
</div>

<?php /* ==================== EXERCISE 1 ==================== */ ?>
<?php elseif ($page === 'exercise1'): ?>
<div class="card">
  <h2>Exercise 1 — Student Information Form</h2>
  <?php
  $submitted = false;
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ex1_submit'])) {
    $submitted = true;
    $name = htmlspecialchars($_POST['name'] ?? '');
    $id   = htmlspecialchars($_POST['student_id'] ?? '');
    $msg  = htmlspecialchars($_POST['message'] ?? '');
  }
  ?>
  <?php if (!$submitted): ?>
  <form method="POST" action="?page=exercise1">
    <label>Full Name:</label>
    <input type="text" name="name" placeholder="Enter your name" required>
    <label>Student ID:</label>
    <input type="text" name="student_id" placeholder="Enter your student ID" required>
    <label>Message / Notes:</label>
    <textarea name="message" rows="3" placeholder="Write something..."></textarea>
    <button type="submit" name="ex1_submit">Submit</button>
  </form>
  <?php else: ?>
  <div class="result-box">
    <p><strong>Name:</strong> <?= $name ?></p>
    <p><strong>Student ID:</strong> <?= $id ?></p>
    <p><strong>Message:</strong> <?= $msg ?></p>
    <br>
    <a href="?page=exercise1" style="color:#1a5276; font-size:13px;">← Submit Again</a>
  </div>
  <?php endif; ?>
  <div class="nav-buttons">
    <a href="?page=home">← Home</a>
    <a href="?page=exercise2">Exercise 2 →</a>
  </div>
</div>

<?php /* ==================== EXERCISE 2 ==================== */ ?>
<?php elseif ($page === 'exercise2'): ?>
<div class="card">
  <h2>⚡ Exercise 2 — Electric Bill Calculator</h2>
  <form method="POST" action="?page=exercise2" onsubmit="return validateForm()">
    <label>Previous Number (Kw):</label>
    <input type="number" id="oldnum" name="oldnum" min="0" required
           value="<?= isset($_POST['oldnum']) ? htmlspecialchars($_POST['oldnum']) : '' ?>">
    <label>Current Number (Kw):</label>
    <input type="number" id="newnum" name="newnum" min="0" required
           value="<?= isset($_POST['newnum']) ? htmlspecialchars($_POST['newnum']) : '' ?>">
    <button type="submit" name="calculate">Calculate Bill</button>
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
    <a href="?page=exercise1">← Exercise 1</a>
    <a href="?page=exercise3">Exercise 3 →</a>
  </div>
</div>

<?php /* ==================== EXERCISE 3 ==================== */ ?>
<?php elseif ($page === 'exercise3'): ?>
<div class="card">
  <h2>🔢 Exercise 3 — Simple Calculator</h2>
  <p style="color:#555; font-size:14px; margin-bottom:15px;">Enter two numbers and choose an operation.</p>

  <?php
  $result = null;
  $equation = '';
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ex3_submit'])) {
    $a  = floatval($_POST['num1'] ?? 0);
    $b  = floatval($_POST['num2'] ?? 0);
    $op = $_POST['op'] ?? '+';
    if ($op === '+')      { $result = $a + $b; $equation = "$a + $b"; }
    elseif ($op === '-')  { $result = $a - $b; $equation = "$a - $b"; }
    elseif ($op === '*')  { $result = $a * $b; $equation = "$a × $b"; }
    elseif ($op === '/')  {
      $result   = $b != 0 ? $a / $b : "Cannot divide by zero";
      $equation = "$a ÷ $b";
    }
  }
  ?>

  <form method="POST" action="?page=exercise3">
    <label>Number 1:</label>
    <input type="number" name="num1" placeholder="e.g. 10" required
           value="<?= isset($_POST['num1']) ? htmlspecialchars($_POST['num1']) : '' ?>">
    <label>Operation:</label>
    <select name="op">
      <option value="+" <?= (isset($_POST['op']) && $_POST['op']=='+') ? 'selected':'' ?>>+ Add</option>
      <option value="-" <?= (isset($_POST['op']) && $_POST['op']=='-') ? 'selected':'' ?>>− Subtract</option>
      <option value="*" <?= (isset($_POST['op']) && $_POST['op']=='*') ? 'selected':'' ?>>× Multiply</option>
      <option value="/" <?= (isset($_POST['op']) && $_POST['op']=='/') ? 'selected':'' ?>>÷ Divide</option>
    </select>
    <label>Number 2:</label>
    <input type="number" name="num2" placeholder="e.g. 5" required
           value="<?= isset($_POST['num2']) ? htmlspecialchars($_POST['num2']) : '' ?>">
    <button type="submit" name="ex3_submit">Calculate</button>
  </form>

  <?php if ($result !== null): ?>
  <div class="result-box">
    <p><?= $equation ?> = <strong style="font-size:18px"><?= $result ?></strong></p>
  </div>
  <?php endif; ?>

  <div class="nav-buttons">
    <a href="?page=exercise2">← Exercise 2</a>
    <a href="?page=home">🏠 Home</a>
  </div>
</div>

<?php endif; ?>

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