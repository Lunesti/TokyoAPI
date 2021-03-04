<header>
    <nav>
        <div id="logo">
            <div class="circle"></div>
            <h1>Tokyo Guide</h1>
        </div>

        <input class="menu-btn" type="checkbox" id="menu-btn" />
        <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>

        <ul class="navigation">
            <li><a href="index.php">Accueil</a></li>
            <?php
            if (isset($_SESSION['username'])) {
            ?>
                <li><a href="index.php?action=disconnected">Deconnexion</a></li>
            <?php
            } else {
            ?>
                <li><a href="index.php?action=connection">Connectez-vous </a></li>
            <?php
            }
            ?>

        </ul>
    </nav>
</header>
