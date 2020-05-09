<nav>
    <ul>
        <li>
            <?php
            $link = Uri::base() . "index.php/ourhospital/home.php";
            echo "<a href='$link'>Home</a>";
            ?>
        </li>
        <li>
            <?php
            $link = Uri::base() . "index.php/ourhospital/about.php";
            echo "<a href='$link'>About us</a>";
            ?>
        </li>
        <li>
            <?php
            $link = Uri::base() . "index.php/ourhospital/hospital_list.php";
            echo "<a href='$link'>List of Hospitals</a>";
            ?>
        </li>
        <li>
            <?php
            $link = Uri::base() . "index.php/ourhospital/drg_list.php";
            echo "<a href='$link'>List of DRGs</a>";
            ?>
        </li>
        <li>
            <?php
            if(empty($_SESSION['username'])) {
                $link = Uri::base() . "index.php/ourhospital/login.php";
                echo "<a class=\"nav-link\" href='$link'>Login</a>";
            }else{
                $link = Uri::base() . "index.php/ourhospital/logout";
                echo "<a class=\"nav-link\" href='$link'>Logout</a>";
            }
            ?>
        </li>
    </ul>
    </nav>