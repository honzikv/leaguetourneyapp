<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href='bootstrap/css/bootstrap.min.css'/>
    <link rel="stylesheet" href="css/main.css"/>
    <title>League Tournament WebApp</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="/" class="nav-link ">Home</a>
            </li>
            <li class="nav-item">
                <a href="/tournaments" class="nav-link">Tournaments</a>
            </li>

            <li class="nav-item">
                <a href="/profile" class="nav-link">Profile</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="/register" class="nav-link">Register</a>
            </li>

            <li class="nav-item">
                <a href="/login" class="nav-link">Login</a>
            </li>
        </ul>

    </div>
</nav>

<div class="container mt-4">
    <div>
        {{content}}
    </div>
</div>

</body>
