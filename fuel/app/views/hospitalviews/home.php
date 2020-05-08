<table id="mainTable">
    <tr>
        <td class="mnav">
            <?php $link = Uri::base() . "index.php/ourhospital/about.php";
            echo "<h1><a href='$link'>About Us</a></h1>"; ?>
        </td>
        <td class="mnav">
            <?php
            $link = Uri::base() . "index.php/ourhospital/hospital_list.php";
            echo "<h1><a href='$link'>List of Hospitals</a></h1>";
            ?>
        </td>
        <td class="mnav">
            <?php
            $link = Uri::base() . "index.php/ourhospital/drg_list.php";
            echo "<h1><a href='$link'>List of DRGs</a></h1>";
            ?>
        </td>
        <td class="mnav">
            <?php
            if(!isset($_SESSION['username'])) {
                $link = Uri::base() . "index.php/ourhospital/login.php";
                echo "<h1><a class=\"nav-link\" href='$link'>Login</a></h1>";
            }else{
                $link = Uri::base() . "index.php/ourhospital/logout";
                echo "<h1><a class=\"nav-link\" href='$link'>Logout</a><h1>";
            }
            ?>
        </td>
    </tr>
</table>