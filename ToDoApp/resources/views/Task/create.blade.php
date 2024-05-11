<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To Do List</title>

    <!-- Include the Indie Flower font from Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap">

    <style>
        body {
            background-color: #FFF9D0;
            font-family: 'Indie Flower', cursive; /* Apply the Indie Flower font to the whole body */
        }

        header {
            background-color: #5AB2FF; 
            color: white; /* Text color */
            padding: 10px; 
            text-align: center; /* Center text */
            cursor: pointer; /* Change cursor to pointer when hovering over the header */
        }

        .container {
            display: flex;
            flex-direction: column; /* Stack items vertically */
            align-items: center; /* Center items horizontally */
            margin-top: 20px; /* Add space at the top */
        }

        .create-button {
            margin-bottom: 20px; /* Add space at the bottom */
        }

        .notes-container {
            display: flex;
            flex-direction: row; /* Stack items side by side */
            flex-wrap: wrap; /* Wrap items if they exceed container width */
            padding: 20px;
        }

        .note {
            /* Removed fixed width */
            margin-right: 10px; /* Add margin between notes */
            margin-bottom: 10px; /* Add margin at the bottom */
            background-color: #ffffff; /* White background color */
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add shadow */
        }

        .note h2 {
            margin-top: 0;
            margin-bottom: 5px; /* Add margin at the bottom of title */
        }

        .note p {
            margin: 0; /* Remove default margin */
        }

        .note-buttons {
            display: flex;
            justify-content: space-between;
        }

        .note-buttons button {
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header onclick="window.location='{{ route('tasks.index') }}';">
        <h1>To Do List</h1>
    </header>
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{ route('tasks.store') }}">
            @csrf 
            <div class="create-button">
                <input type="text" id="titleInput" name="title" placeholder="Title">
                <input type="text" id="descriptionInput" name="description" placeholder="Description">
                <button type="submit">Create</button>
            </div>
        </form>
        <!-- Other content -->
    </div>
</body>
</html>
