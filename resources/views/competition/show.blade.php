<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Manager - {{ $competition['name'] }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1a1a1a;
            color: white;
        }
        .header {
            background-image: url('path/to/your/dotted-background.jpg');
            background-size: cover;
            padding: 20px 0;
        }
        .red-underline {
            border-bottom: 3px solid red;
            display: inline-block;
            padding-bottom: 5px;
        }
    </style>
</head>
<body>
    <header class="header mb-5">
        <div class="container">
            <h1>Show Manager</h1>
        </div>
    </header>

    <main class="container">
        <h1 class="text-center mb-5">
            <span class="red-underline">SHOW MANAGER</span>
        </h1>

        <div class="row mb-5">
            <div class="col-md-6">
                <img src="/placeholder.svg?height=300&width=500" alt="Run Your Local Show" class="img-fluid mb-3">
                <h2>RUN YOUR LOCAL SHOW</h2>
            </div>
            <div class="col-md-6">
                <img src="/placeholder.svg?height=300&width=500" alt="Manage Your Competitions" class="img-fluid mb-3">
                <h2>MANAGE YOUR COMPETITIONS</h2>
            </div>
        </div>

        <div class="competition-details mb-5">
            <h2>{{ $competition['name'] }}</h2>
            <p>{{ $competition['description'] }}</p>
            <!-- Add more competition details here -->
        </div>

        <div class="text-center">
            <h3>THIS SITE IS UNDER DEVELOPMENT</h3>
            <p>SUPPORTING THE EVOLUTION OF THE SHOW MANAGER PRODUCT</p>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>