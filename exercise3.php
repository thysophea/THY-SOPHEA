<?php session_start(); ?>
<!DOCTYPE html>
<html lang="km">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercise 3 - Thy Sophea</title>
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
      text-align: center;
    }
    h2 { color: #1a5276; margin-bottom: 8px; font-size: 20px; }
    p.sub { color: #555; font-size: 13px; margin-bottom: 20px; }
    label {
      font-weight: bold;
      display: block;
      text-align: left;
      margin-top: 10px;
      color: #555;
      font-size: 14px;
    }
    input[type="tel"] {
      width: 100%;
      padding: 11px;
      margin-top: 6px;
      margin-bottom: 14px;
      border: 1px solid #ccc;
      border-radius: 7px;
      font-size: 15px;
      background: rgba(255,255,255,0.9);
      text-align: center;
      letter-spacing: 2px;
    }
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
    }
    button[type="submit"]:hover { background: #154360; }
    .result-box {
      margin-top: 20px;
      padding: 20px;
      border-radius: 12px;
      background: rgba(255,255,255,0.75);
      border-left: 5px solid #1a5276;
      text-align: left;
      font-size: 15px;
      line-height: 2;
    }
    .result-number {
      font-size: 42px;
      font-weight: bold;
      color: #1a5276;
      text-align: center;
      margin-bottom: 8px;
    }
    .result-msg { font-size: 16px; font-weight: bold; text-align: center; margin-top: 6px; }
    .good   { color: #27ae60; }
    .normal { color: #e67e22; }
    .bad    { color: #e74c3c; }
    .error  { color: red; font-size: 14px; text-align: center; }
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
  <a href="exercise2.php">Exercise 2</a>
  <a href="exercise3.php" class="active">Exercise 3</a>
</div>

<div class="card">
  <h2>📱 Exercise 3 — ក្បួនទស្សន៍ទាយលេខទូរស័ព្ទ</h2>
  <p class="sub">បញ្ចូលលេខទូរស័ព្ទដើម្បីដឹងពីវាសនា</p>

  <form method="POST">
    <input type="hidden" name="ex3_submit" value="1">
    <label>លេខទូរស័ព្ទ (Phone Number):</label>
    <input type="tel" name="phone" placeholder="0XX XXX XXX" maxlength="10"
           onkeypress="return event.charCode >= 48 && event.charCode <= 57"
           oninput="this.value=this.value.replace(/[^0-9]/g,'')"
           value="<?= isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '' ?>">
    <button type="submit">គណនា / Calculate</button>
  </form>

  <?php
  if (isset($_POST['ex3_submit'])) {
    $phone = trim($_POST['phone'] ?? '');
    if (!ctype_digit($phone) || $phone === '') {
      echo "<div class='result-box'><p class='error'>⚠️ សូមបញ្ចូលលេខតែប៉ុណ្ណោះ!</p></div>";
    } elseif (strlen($phone) < 6) {
      echo "<div class='result-box'><p class='error'>⚠️ លេខត្រូវមានយ៉ាងហោចណាស់ 6 ខ្ទង់!</p></div>";
    } else {
      $lastSix = substr($phone, -6);
      $divide  = $lastSix / 80;
      $decimal = $divide - floor($divide);
      $final   = round($decimal * 80);
      if ($final == 0) $final = 80;

      $messages = [
        1=>"ល្អណាស់ = រីកចម្រើន និងជ័យជំនះ",        2=>"ធម្មតា = មានលាភមធ្យម",
        3=>"ល្អណាស់ = សម្រេចដូចបំណង",               4=>"អាក្រក់ = ឧបសគ្គច្រើន",
        5=>"ល្អណាស់ = កិត្តិយស និងផលប្រយោជន៍",      6=>"ល្អណាស់ = សំណាងធំ",
        7=>"ល្អ = ជោគជ័យធំ",                         8=>"ល្អ = មានឱកាសល្អ",
        9=>"អាក្រក់ = ឯកោ ពិបាក",                    10=>"អាក្រក់ = ខិតខំឥតផល",
        11=>"ល្អ = មានលំនឹងល្អ",                     12=>"អាក្រក់ = ទន់ខ្សោយ",
        13=>"ល្អណាស់ = សំណាងល្អ",                    14=>"ធម្មតា = ពឹងផ្អែកលើការតាំងចិត្ត",
        15=>"ល្អ = ជ័យជំនះច្រើន",                    16=>"ល្អណាស់ = សម្រេចកិច្ចការធំ",
        17=>"ល្អ = មានអ្នកធំជួយ",                    18=>"ល្អ = រីកចម្រើន",
        19=>"អាក្រក់ = ទំនាស់ច្រើន",                 20=>"អាក្រក់ = ឧបសគ្គ និងឈឺចាប់",
        21=>"ល្អ = ធ្វើការល្អ",                       22=>"អាក្រក់ណាស់ = ខាតបង់",
        23=>"ល្អណាស់ = កិត្តិយសធំ",                  24=>"ល្អ = ពឹងលើសមត្ថភាពខ្លួន",
        25=>"ល្អណាស់ = មានអ្នកជួយ",                  26=>"អាក្រក់ណាស់ = ឧបសគ្គច្រើន",
        27=>"ល្អ = សំណាង និងជ័យជំនះ",               28=>"ល្អណាស់ = រាសីឡើងខ្ពស់",
        29=>"អាក្រក់ = ល្អនិងអាក្រក់កើតព្រមគ្នា",   30=>"ល្អណាស់ = លាភសំណាង",
        31=>"ល្អណាស់ = សំណាង និងជោគជ័យ",            32=>"ល្អ = មានប្រាជ្ញា",
        33=>"អាក្រក់ណាស់ = ឧបសគ្គមិនចេះអស់",        34=>"ធម្មតា = ត្រូវមានលំនឹងចិត្ត",
        35=>"អាក្រក់ = ជួបភាពលំបាក",                 36=>"ល្អ = ឧបសគ្គក្លាយជាសំណាង",
        37=>"ធម្មតា = មានកិត្តិយស តែពិបាកលាភ",      38=>"ល្អណាស់ = អនាគតភ្លឺស្វាង",
        39=>"ធម្មតា = សំណាងមិនទៀង",                  40=>"ល្អណាស់ = អនាគតល្អ",
        41=>"អាក្រក់ = ខាតបង់",                       42=>"ល្អ = អត់ធ្មត់នាំមកលាភ",
        43=>"អាក្រក់ = ពិបាកសម្រេច",                 44=>"ល្អ = រីកចម្រើន",
        45=>"ល្អណាស់ = ឧបសគ្គមិនចេះអស់",            46=>"ល្អណាស់ = មានអ្នកជួយច្រើន",
        47=>"ល្អណាស់ = កិត្តិយស និងទ្រព្យ",         48=>"ធម្មតា = មានឧបសគ្គ តែមានសំណាង",
        49=>"ធម្មតា = មានឧបសគ្គ តែមានសំណាង",        50=>"ធម្មតា = លាភ និងឧបសគ្គមិនទៀង",
        51=>"ល្អ = ខិតខំបានជោគជ័យ",                 52=>"អាក្រក់ = សំណាងតែមានឧបសគ្គ",
        53=>"ធម្មតា = ខិតខំប៉ុន្តែលទ្ធផលតិច",       54=>"អាក្រក់ = មើលល្អតែពិតមានបញ្ហា",
        55=>"អាក្រក់ណាស់ = ឧបសគ្គ និងគ្រោះថ្នាក់",  56=>"ល្អ = អាចប្តូរវាសនា",
        57=>"ធម្មតា = ឧបសគ្គច្រើន តែសំណាងក្រោយ",   58=>"អាក្រក់ = ពិបាកសម្រេចចិត្ត",
        59=>"ធម្មតា = ចិត្តរវល់",                     60=>"អាក្រក់ = ឧបសគ្គច្រើន",
        61=>"អាក្រក់ = ស្មុគស្មាញ",                   62=>"ល្អ = ទទួលផលប្រយោជន៍",
        63=>"អាក្រក់ = ខិតខំឥតផល",                   64=>"ល្អ = សំណាងធំ",
        65=>"ធម្មតា = ខ្វះទំនុកចិត្ត",               66=>"ល្អណាស់ = សម្រេចជោគជ័យ",
        67=>"ល្អ = ចាប់ឱកាសបានជោគជ័យ",             68=>"អាក្រក់ = ចាញ់ និងឧបសគ្គ",
        69=>"អាក្រក់ = ខាតបង់",                       70=>"ធម្មតា = ពឹងលើភាពក្លាហាន",
        71=>"អាក្រក់ = បានហើយបាត់វិញ",               72=>"ល្អ = សុភមង្គល និងសំណាង",
        73=>"ធម្មតា = ពិបាកជោគជ័យ",                  74=>"ធម្មតា = ល្អនិងអាក្រក់",
        75=>"អាក្រក់ = ខាតបង់ទ្រព្យ",               76=>"ល្អ = មានមនុស្សគាំទ្រ",
        77=>"ធម្មតា = មិនអាចសម្រេចល្អ",              78=>"ធម្មតា = អនាគតមិនភ្លឺ",
        79=>"អាក្រក់ = ខិតខំឥតប្រយោជន៍",            80=>"ល្អណាស់ = ជោគជ័យច្រើន"
      ];

      $msg = $messages[$final] ?? '';
      if (strpos($msg, 'អាក្រក់ណាស់') !== false)    $class = 'bad';
      elseif (strpos($msg, 'អាក្រក់') !== false)     $class = 'bad';
      elseif (strpos($msg, 'ធម្មតា') !== false)      $class = 'normal';
      else                                             $class = 'good';

      echo "<div class='result-box'>";
      echo "<div class='result-number'>{$final}</div>";
      echo "<hr style='margin:8px 0; border-color:#ccc'>";
      echo "<p><strong>លេខទូរស័ព្ទ:</strong> {$phone}</p>";
      echo "<p><strong>លេខទស្សន៍ទាយ:</strong> {$final}</p>";
      echo "<p class='result-msg {$class}'>{$msg}</p>";
      echo "</div>";
    }
  }
  ?>

  <div class="nav-buttons">
    <a href="exercise2.php">← Exercise 2</a>
    <a href="index.php">🏠 Home</a>
  </div>
</div>

</body>
</html>