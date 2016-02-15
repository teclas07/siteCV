<?php session_start() ?>
<header>
  <nav>
    <div class="nav-wrapper light-blue darken-3">
      <ul id="nav-mobile" class="center hide-on-med-and-down">
        <li><a href="index.php">Index</a></li>
        <li><a href="blog.php">Blog</a></li>
        <?php
        if (!empty($_SESSION['User'])) {
        ?>
        <li><a href="account.php">Votre compte</a></li>
        <li><a href="action.php?focus=logout">Déconnectez-vous</a></li>
        <?php
        } else {
        ?>
        <li><a href="signin.php">Connectez-vous</a></li>
        <?php
        }
        ?>
      </ul>
    </div>
  </nav>
</header>
