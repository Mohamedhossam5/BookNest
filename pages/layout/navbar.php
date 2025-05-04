<header class="headerzz">
    <h1>BookNest</h1>
    <nav>
        <a href="main.php"><i class="fas fa-home"></i><span>Home</span></a>
        <a href="Books.php"><i class="fas fa-book"></i><span>Books</span></a>
        <a href="Add.php"><i class="fas fa-user"></i><span>Add books</span></a>

        <?php if ((new \App\Auth())->isAuth() ): ?>
            <a href="?logout=1"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
        <?php else: ?>
            <a href="login.php"><i class="fas fa-sign-out-alt"></i><span>Log in</span></a>
            <a href="register.php"><i class="fas fa-sign-out-alt"></i><span>Sign up</span></a>
        <?php endif; ?>


    </nav>
</header>



