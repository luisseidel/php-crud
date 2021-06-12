<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Meu Projeto PHP para Porfólio">
    <meta name="keywords" content="HTML, CSS, JavaScript, PHP">
    <meta name="author" content="Luis Guilherme Seidel">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="<?=$var?>css/glider.css">
    <link rel="stylesheet" href="<?=$var?>css/reset.css">
    <link rel="stylesheet" href="<?=$var?>css/menu.css">
    <link rel="stylesheet" href="<?=$var?>css/scrollbar.css">
    <link rel="stylesheet" href="<?=$var?>css/style.css">
    <title>Portfólio</title>
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

        <?php
            require('menuItems.php');
        ?>

        <nav id="sideNav" class="sidenav">
            <div class="menu-items">
                <li class="close-container">
                    <button onclick="closeMenu()">
                        <i class="fas fa-times fa-lg"></i>
                    </button>
                </li>
                
                <?php foreach($menuItems as $mi): ?>

                <li>
                    <a href="?page=<?=$mi['page']?>">
                        <i class="<?=$mi['icon']?>"></i>
                        <p><?=$mi['item']?></p>
                    </a>
                </li>

                <?php endforeach; ?>

            </div>

            <div class="menu-bottom">
                <div class="social-icons">
                    <?php foreach($socialIcons as $si): ?>
                    <div class="<?=$si['class']?>">
                        <a href="<?=$si['link']?>" target="_blank">
                            <i class="<?=$si['icon']?>"></i>   
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </nav>

    </header>