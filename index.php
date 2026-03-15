<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home - Thy Sophea</title>
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
    h1 { color: #1a5276; font-size: 21px; margin-bottom: 4px; }
    p  { color: #444; font-size: 14px; margin-bottom: 4px; }
    .badge {
      display: inline-block;
      margin: 12px 0 20px;
      background: #1a5276;
      color: white;
      padding: 5px 16px;
      border-radius: 20px;
      font-size: 13px;
    }
    .ex-buttons {
      display: flex;
      gap: 12px;
      justify-content: center;
      flex-wrap: wrap;
    }
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
  </style>
</head>
<body>

<div class="navbar">
  <a href="index.php" class="active">🏠 Home</a>
  <a href="exercise1.php">Exercise 1</a>
  <a href="exercise2.php">Exercise 2</a>
  <a href="exercise3.php">Exercise 3</a>
</div>

<div class="card">
  <img src="bbulogo.png" alt="School Logo" class="logo-img"
       onerror="this.src='https://web.bbu.edu.kh/bburesults">
  <h1>Buigh Brigh University</h1>
  <p>Subject: Computer &amp; Web Technology</p>
  <hr style="margin:12px 0; border-color:#ccc;">
  <img src="myphoto.jpg" alt="Thy Sophea" class="profile-img"
       onerror="this.src='https://via.placeholder.com/110x110?text=Photo'">
  <h1>Thy Sophea</h1>
  <p>Student Assignment Portfolio</p>
  <span class="badge">Academic Year 2024–2025</span>
  <div class="ex-buttons">
    <a href="exercise1.php">Exercise 1</a>
    <a href="exercise2.php">Exercise 2</a>
    <a href="exercise3.php">Exercise 3</a>
  </div>
</div>

</body>
</html>