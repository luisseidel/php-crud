<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Template project for php projects">
    <meta name="keywords" content="HTML, CSS, JavaScript, PHP">
    <meta name="author" content="Luis Guilherme Seidel">

    <link rel="stylesheet" href="extensions/glider_js/glider.css">
    <link rel="stylesheet" href="icons/fontawesome/all.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>

    <header class="container">
        
        <nav class="mobile-menu">
            <li class="haburger-menu">
                <button onclick="openMenu()">
                    <i class="fas fa-bars fa-lg"></i>
                </button>
            </li>

            <li>
                <h1>logo</h1>
            </li>

            <li></li>
        </nav>

        <nav id="sideNav" class="sidenav">
            <li class="close-container">
                <button onclick="closeMenu()">
                    <i class="fas fa-times fa-lg"></i>
                </button>
            </li>
            <li>
                <a href="#">
                    <i class="far fa-id-card"></i>
                    <p>Profile</p>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-briefcase"></i>
                    <p>Porfolio</p>
                </a>
            </li>

        </nav>

    </header>