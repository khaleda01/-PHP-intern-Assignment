<?php
// Abstract Animal class
abstract class Animal {
    // Abstract method that subclasses must override
    abstract public function makeSound();
}

// Dog class that extends Animal
class Dog extends Animal {
    // Override the makeSound method
    public function makeSound() {
        return "Woof!";
    }
}

// Cat class that extends Animal
class Cat extends Animal {
    // Override the makeSound method
    public function makeSound() {
        return "Meow!";
    }
}

// Cow class that extends Animal
class Cow extends Animal {
    // Override the makeSound method
    public function makeSound() {
        return "Moo!";
    }
}

// Function to get the sound from the selected animal
function getAnimalSound($animalType) {
    $animal = null;

    switch ($animalType) {
        case 'dog':
            $animal = new Dog();
            break;
        case 'cat':
            $animal = new Cat();
            break;
        case 'cow':
            $animal = new Cow();
            break;
        default:
            return "Unknown animal type.";
    }

    return $animal->makeSound();
}

// Process the form submission
$sound = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $animalType = $_POST['animal_type'];
    $sound = getAnimalSound($animalType);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Sounds</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
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
            font-weight: bold;
        }
        select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .result {
            margin-top: 20px;
            text-align: center;
            color: green;
        }
        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Animal Sounds</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="animal_type">Select an Animal:</label>
            <select id="animal_type" name="animal_type" required>
                <option value="">Select...</option>
                <option value="dog">Dog</option>
                <option value="cat">Cat</option>
                <option value="cow">Cow</option>
            </select>
        </div>
        <button type="submit">Get Sound</button>
    </form>

    <?php if ($sound !== ''): ?>
        <div class="result">
            <h3><?php echo htmlspecialchars($sound); ?></h3>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
