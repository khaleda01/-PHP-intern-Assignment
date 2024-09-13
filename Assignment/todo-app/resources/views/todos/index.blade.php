{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h1>Todo List</h1>
    <a href="{{ route('todos.create') }}">Create New Todo</a>

    @if ($message = Session::get('success'))
        <p>{{ $message }}</p>
    @endif

    <ul>
        @foreach ($todos as $todo)
            <li>
                <a href="{{ route('todos.show', $todo->id) }}">{{ $todo->title }}</a>
                <a href="{{ route('todos.edit', $todo->id) }}">Edit</a>
                <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html> --}}





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
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

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .container {
            width: 80%;
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        p {
            color: #28a745;
            text-align: center;
            font-weight: bold;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 10px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        form {
            display: inline;
        }

        button {
            display: inline-block;
            padding: 5px 10px;
            font-size: 14px;
            color: #fff;
            background-color: #dc3545;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }

        button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Todo List</h1>
        <a href="{{ route('todos.create') }}">Create New Todo</a>

        @if ($message = Session::get('success'))
            <p>{{ $message }}</p>
        @endif

        <ul>
            @foreach ($todos as $todo)
                <li>
                    
                    <a href="{{ route('todos.show', $todo->id) }}">{{ $todo->title }}</a>
                    <a href="{{ route('todos.show', $todo->id) }}">{{ $todo->description }}</a>
                    <span>
                        <a href="{{ route('todos.edit', $todo->id) }}">Edit</a>
                        <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </span>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
