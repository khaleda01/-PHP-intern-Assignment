<?php
// Define the Employee class with encapsulation for salary
class Employee {
    private $name;
    private $position;
    private $salary;

    // Constructor to initialize name and position
    public function __construct($name, $position) {
        $this->name = $name;
        $this->position = $position;
    }

    // Getter for name
    public function getName() {
        return $this->name;
    }

    // Getter for position
    public function getPosition() {
        return $this->position;
    }

    // Setter for salary, with validation to prevent negative values
    public function setSalary($salary) {
        if ($salary < 0) {
            throw new Exception("Salary cannot be negative.");
        }
        $this->salary = $salary;
    }

    // Getter for salary
    public function getSalary() {
        return $this->salary;
    }

    // Display Employee Information
    public function displayEmployeeInfo() {
        return "Employee Name: {$this->getName()}, Position: {$this->getPosition()}, Salary: " . number_format($this->getSalary(), 2);
    }
}

// Processing the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = floatval($_POST['salary']);

    try {
        // Create an Employee object
        $employee = new Employee($name, $position);

        // Set the salary securely
        $employee->setSalary($salary);

        // Display employee information
        $message = $employee->displayEmployeeInfo();
    } catch (Exception $e) {
        // Handle any errors (e.g., negative salary)
        $message = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
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
            width: 400px;
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
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
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
    <h2>Employee Management</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="name">Employee Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter employee name" required>
        </div>
        <div class="form-group">
            <label for="position">Employee Position:</label>
            <input type="text" id="position" name="position" placeholder="Enter employee position" required>
        </div>
        <div class="form-group">
            <label for="salary">Employee Salary:</label>
            <input type="number" id="salary" name="salary" placeholder="Enter employee salary" step="0.01" required>
        </div>
        <button type="submit">Submit</button>
    </form>

    <?php if (isset($message)): ?>
        <div class="<?php echo strpos($message, 'Error') === false ? 'result' : 'error'; ?>">
            <h3><?php echo htmlspecialchars($message); ?></h3>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
