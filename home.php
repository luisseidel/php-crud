<?php 
    $var = './includes/';
    include_once $var."header.php";
    include_once ($var."dbConnection.php"); ?>

    <main class="container">

        <?php 
            if(isset($_GET['page']) && !($_GET['page'] == 'home')) {
                require('pages/' . $_GET['page'] . '.php');
            }
        ?>

    </main>

<?php include_once $var."footer.php" ?>