<?php 
    $var = './includes/';
    include_once $var."header.php" ?>

    <main class="container">

        <?php 
            if(isset($_GET['page']) && !($_GET['page'] == 'home')) {
                require('pages/' . $_GET['page'] . '.php');
            }
        ?>

    </main>

<?php include_once $var."footer.php" ?>