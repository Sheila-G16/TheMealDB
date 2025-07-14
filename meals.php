<?php
$conn = new mysqli("localhost", "root", "", "meals_db");
$result = $conn->query("SELECT * FROM meals ORDER BY search_time DESC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Saved Meals</title>
  <style>
    body { font-family: Arial; background: #f4f4f4; padding: 20px; }
    .container { max-width: 1000px; margin: auto; background: #fff; padding: 20px; border-radius: 8px; }
    h1 { text-align: center; }
    .meal-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px; }
    .card { background: #fafafa; padding: 10px; border-radius: 6px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
    .card img { width: 100%; border-radius: 4px; }
    .card h2 { font-size: 18px; margin: 10px 0 5px; }
    .card p, .card a { font-size: 14px; }
  </style>
</head>
<body>
  <div class="container">
    <h1>Saved Meals</h1>
    <div class="meal-grid">
      <?php while ($row = $result->fetch_assoc()): ?>
        <div class="card">
          <img src="<?= $row['thumbnail'] ?>" alt="<?= $row['meal_name'] ?>">
          <h2><?= htmlspecialchars($row['meal_name']) ?></h2>
          <p><strong>Category:</strong> <?= $row['category'] ?></p>
          <a href="<?= $row['youtube_link'] ?>" target="_blank">Watch Video</a>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</body>
</html>

<?php $conn->close(); ?>
