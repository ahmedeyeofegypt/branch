<?php
session_start();
define('TIMEZONE', 'Europe/Paris');
date_default_timezone_set(TIMEZONE);

if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
    require_once('login.php');
    return;
}

$page = 'dashboard.php';
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'package') {
        $page = 'package.php';
    };
};




require_once('lib/Response.php') ;
require_once('connection.php');
//$conn->close();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content System Managment</title>
    <link rel="stylesheet" href="shared/main.css">
    <script src="shared/main.js"></script>
</head>

<body>
    <header>
        <img class="menu-icon" src="shared/svg/menu.svg">
        <span>Content System Managment </span>
        Welcome <?= ucfirst($_SESSION['uid']) ?>
        <img class="menu-icon" src="shared/svg/search.svg">
        <img class="menu-icon" src="shared/svg/shopping_cart.svg">
        <img class="menu-icon" src="shared/svg/language.svg">
        <img class="menu-icon" src="shared/svg/help.svg">

        <a href="logout.php" style="display:flex;align-items:center;gap:0.2rem;font-size:0.9rem;">
            Logout<img class="menu-icon" src="shared/svg/disabled_by_default.svg">
        </a>


    </header>
    <main>
        <article>
            <section class="main-cnt">
                <nav class="main-nav">
                    <ul>
                        <li><a href="?action=">Dashboard</a><img src="shared/svg/grid_view.svg"></li>
                        <li><a href="?action=package">Packages</a><img src="shared/svg/package.svg"></li>
                        <li> <a href="?action=">Products</a><img src="shared/svg/shopping_cart.svg"></li>
                        <li><a href="?action=">Resources</a><img src="shared/svg/edit_note.svg"></li>
                        <li><a href="?action=">Sections</a></li>
                        <li><a href="?action=">Articals</a><img src="shared/svg/article.svg"></li>
                        <li><a href="?action=">Clients</a><img src="shared/svg/account_box.svg"></li>
                        <li><a href="?action=">Status</a></li>
                        <li><a href="?action=">Analtics</a><img src="shared/svg/bar_chart_4_bars.svg"></li>
                        <li><a href="?action=">CMS Users</a><img src="shared/svg/groups.svg"></li>
                        <li><a href="?action=">Languages</a><img src="shared/svg/language.svg"></li>
                        <li><a href="?action=">Chat System</a><img src="shared/svg/chat.svg"></li>
                        <li><a href="?action=">Tickets</a></li>
                        <li><a href="?action=">Blocking</a><img src="shared/svg/block.svg"></li>
                        <li><a href="?action=">Account Settings</a><img src="shared/svg/settings.svg"></li>
                        <li><a href="logout.php">Logout</a><img src="shared/svg/disabled_by_default.svg"></li>
                    </ul>
                </nav>
                <div class="main-content">
                    <?php require_once($page); ?>
                </div>
            </section>
        </article>
    </main>
    <footer>
        <span>Copyrighted materials</span>
    </footer>



</body>

</html>