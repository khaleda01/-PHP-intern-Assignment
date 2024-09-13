{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Todo</title>
</head>
<body>
    <h1>{{ $todo->title }}</h1>
    <p>{{ $todo->description }}</p>
    <p><strong>Completed:</strong> {{ $todo->completed ? 'Yes' : 'No' }}</p>
    <a href="{{ route('todos.index') }}">Back to List</a>
</body>
</html> --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Todo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-top: 20px;
        }

        p {
            color: #555;
            font-size: 18px;
            line-height: 1.6;
            text-align: center;
            margin: 20px;
        }

        strong {
            color: #333;
        }

        a {
            display: block;
            width: 150px;
            margin: 20px auto;
            padding: 10px;
            text-align: center;
            color: #007bff;
            text-decoration: none;
            border: 1px solid #007bff;
            border-radius: 4px;
            background-color: #fff;
        }

        a:hover {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }
    </style>
</head>
<body>
    <h1>{{ $todo->title }}</h1>
    <p>{{ $todo->description }}</p>
    <p><strong>Completed:</strong> {{ $todo->completed ? 'Yes' : 'No' }}</p>
    <a href="{{ route('todos.index') }}">Back to List</a>
</body>
</html>

