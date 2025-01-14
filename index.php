<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Расчет Периметра Треугольника Русяев Я.С.</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: fit-content;
            margin: 0 auto;
        }
        h2 {
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"] {
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 200px;
        }
        button {
            padding: 10px 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .result {
          margin-top: 15px;
          font-weight: bold;
          color: #28a745;
        }
        .error {
          margin-top: 15px;
          color: #dc3545;
        }
    </style>
</head>
<body>
  <div class="container">
    <h2>Расчет Периметра Треугольника</h2>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="sideA">Сторона A:</label>
        <input type="text" name="sideA" id="sideA" required>
        <br>
        <label for="sideB">Сторона B:</label>
        <input type="text" name="sideB" id="sideB" required>
        <br>
        <label for="sideC">Сторона C:</label>
        <input type="text" name="sideC" id="sideC" required>
        <br>
        <button type="submit">Рассчитать Периметр</button>
      </form>

    <?php
      function calculateTrianglePerimeter($sideA, $sideB, $sideC) {
        // Проверяем, являются ли стороны положительными числами
        if (!is_numeric($sideA) || !is_numeric($sideB) || !is_numeric($sideC) || 
            $sideA <= 0 || $sideB <= 0 || $sideC <= 0) {
            return "Ошибка: Стороны треугольника должны быть положительными числами.";
          }
        
        // Проверяем условие существования треугольника: сумма любых двух сторон должна быть больше третьей
        if ($sideA + $sideB <= $sideC || $sideA + $sideC <= $sideB || $sideB + $sideC <= $sideA) {
          return "Ошибка: Треугольник с такими сторонами не существует.";
        }
        
        // Рассчитываем периметр
        $perimeter = $sideA + $sideB + $sideC;
        return $perimeter;
      }
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $sideA = $_POST["sideA"];
          $sideB = $_POST["sideB"];
          $sideC = $_POST["sideC"];
          $perimeter = calculateTrianglePerimeter($sideA, $sideB, $sideC);
          if (is_numeric($perimeter)) {
            echo "<p class='result'>Периметр треугольника равен: " . $perimeter . "</p>";
          } else {
            echo "<p class='error'>" . $perimeter . "</p>";
          }
        }
    ?>
  </div>
</body>
</html>