<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shape Area Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        .result {
            margin-top: 20px;
            text-align: center;
            font-size: 18px;
            color: #333;
        }

        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Shape Area Calculator</h2>

        <form method="POST" action="">
            <div class="form-group">
                <label for="shape">Select Shape:</label>
                <select name="shape" id="shape" onchange="toggleInputFields()">
                    <option value="circle">Circle</option>
                    <option value="rectangle">Rectangle</option>
                </select>
            </div>

            <div id="circleFields" class="form-group">
                <label for="radius">Circle Radius:</label>
                <input type="number" name="radius" id="radius" placeholder="Enter radius">
            </div>

            <div id="rectangleFields" class="form-group" style="display: none;">
                <label for="width">Rectangle Width:</label>
                <input type="number" name="width" id="width" placeholder="Enter width">
                <label for="height">Rectangle Height:</label>
                <input type="number" name="height" id="height" placeholder="Enter height">
            </div>

            <button type="submit">Calculate Area</button>
        </form>

        <div class="result">
            <?php
            // Base class: Shape
            abstract class Shape {
                // Abstract method to calculate area (to be implemented by subclasses)
                abstract public function calculateArea();
            }

            // Derived class: Circle
            class Circle extends Shape {
                private $radius;

                public function __construct($radius) {
                    $this->radius = $radius;
                }

                // Implement the area calculation for circle
                public function calculateArea() {
                    return pi() * pow($this->radius, 2);
                }
            }

            // Derived class: Rectangle
            class Rectangle extends Shape {
                private $width;
                private $height;

                public function __construct($width, $height) {
                    $this->width = $width;
                    $this->height = $height;
                }

                // Implement the area calculation for rectangle
                public function calculateArea() {
                    return $this->width * $this->height;
                }
            }

            // Form handling logic
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $shape = $_POST['shape'];

                if ($shape == 'circle') {
                    $radius = $_POST['radius'];
                    if ($radius > 0) {
                        $circle = new Circle($radius);
                        echo "Circle Area: " . number_format($circle->calculateArea(), 2) . " sq units";
                    } else {
                        echo '<p class="error">Please enter a valid radius.</p>';
                    }
                } elseif ($shape == 'rectangle') {
                    $width = $_POST['width'];
                    $height = $_POST['height'];
                    if ($width > 0 && $height > 0) {
                        $rectangle = new Rectangle($width, $height);
                        echo "Rectangle Area: " . number_format($rectangle->calculateArea(), 2) . " sq units";
                    } else {
                        echo '<p class="error">Please enter valid dimensions.</p>';
                    }
                }
            }
            ?>
        </div>
    </div>

    <script>
        // Toggle visibility of input fields based on shape selection
        function toggleInputFields() {
            const shape = document.getElementById('shape').value;
            if (shape === 'circle') {
                document.getElementById('circleFields').style.display = 'block';
                document.getElementById('rectangleFields').style.display = 'none';
            } else {
                document.getElementById('circleFields').style.display = 'none';
                document.getElementById('rectangleFields').style.display = 'block';
            }
        }
    </script>

</body>
</html>
