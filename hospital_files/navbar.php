<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
        <?php
        if(isset($_SESSION['username'])){
            echo '<span class="navbar-text"> Welcome, ' . $_SESSION['username'] . '</span>';
        }
        ?>
        <li class="nav-item active">
            <?php
            $link = Uri::base() . "index.php/ourhospital/home.php";
            echo "<a class=\"nav-link\" href='$link'>Home</a>";
            ?>
        </li>
        <li class="nav-item">
            <?php
            $link = Uri::base() . "index.php/ourhospital/about.php";
            echo "<a class=\"nav-link\" href='$link'>About us</a>";
            ?>
        </li>
        <li class="nav-item">
            <?php
            $link = Uri::base() . "index.php/ourhospital/hospital_list.php";
            echo "<a class=\"nav-link\" href='$link'>List of Hospitals</a>";
            ?>
        </li>
        <li class="nav-item">
            <?php
            $link = Uri::base() . "index.php/ourhospital/drg_list.php";
            echo "<a class=\"nav-link\" href='$link'>List of DRGs</a>";
            ?>
        </li>
        <li class="nav-item">
            <?php
            if(!isset($_SESSION['username'])) {
                $link = Uri::base() . "index.php/ourhospital/login.php";
                echo "<a class=\"nav-link\" href='$link'>Login</a>";
            }else{
                $link = Uri::base() . "index.php/ourhospital/logout";
                echo "<a class=\"nav-link\" href='$link'>Logout</a>";
            }
            ?>
        </li>
    </ul>

    </div>

</nav>
