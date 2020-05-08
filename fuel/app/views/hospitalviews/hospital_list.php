<div class="row">
    <div class="col-12">
        <table id="hospitalList" class="tablesorter table">
            <thead class="thead-dark">
            <tr class="dark-row">
                <th colspan="6" class="sorter-false">
                    <h2 class="hl-title">LIST OF HOSPITALS</H2>
                </th>
            <tr>
                <th>Medicare Provider Number</th>
                <th>Provider Name</th>
                <th>Provider Address</th>
                <th>Provider City</th>
                <th>Provider State</th>
                <th>Hospital Referral Region</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($hospital_list as $row){
                echo "<tr>\n";
                $i = 0;
                foreach($row as $item) {
                    if ($i ==0) {
                        $uri = Uri::base() . "index.php/ourhospital/hospital_details.php?id=" . $row['provider_id'];
                        $link = '<a href="' . $uri . '">' . $item . "</a>";
                        
                        echo "<td>" . $link . "</td>\n";
                        //echo "<td>" . $row['provider_id'] . "</td>\n<td><a href='$link'>" . $row['provider_name'] . "</a></td>\n<td>" . $row['provider_street_address'] . "</td>\n
                              //<td>" . $row['provider_city'] . "</td>\n<td>" . $row['provider_state'] . "</td>\n<td>" . $row['hospital_referral_region_hrr_description'] . "</td>\n";                     
                    } else {
                        echo "<td>" . $item . "</td>\n";
                       // echo "<td>" . $row['provider_id'] . "</td>\n<td><a href='$link'>" . $row['provider_name'] . "</a></td>\n<td>" . $row['provider_street_address'] . "</td>\n
                              //<td>" . $row['provider_city'] . "</td>\n<td>" . $row['provider_state'] . "</td>\n<td>" . $row['hospital_referral_region_hrr_description'] . "</td>\n"; 
                             // echo "<td>" . $link . "</td>\n" . $row['provider_name'] . "</a></td>\n<td>" . $row['provider_street_address'] . "</td>\n
                       // <td>" . $row['provider_city'] . "</td>\n<td>" . $row['provider_state'] . "</td>\n<td>" . $row['hospital_referral_region_hrr_description'] . "</td>\n";
                    }
                    $i++;
                }
                echo "</tr>\n";
            }
            ?>
            </tbody>
        </table>
        </div>
        </div>

        <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <nav aria-label="Hospital Table Pagination">
            <ul class="pagination justify-content-sm-center">
                <?php
                    if ($start > 0) {
                        $prev_path=Uri::base() . "index.php/ourhospital/hospital_list/" . max($start - 25, 0);
                        echo '<li class="page-item"><a class="page-link" href="' . $prev_path . '">Previous</a></li>';
                    }                    
                ?>

                <?php 
                    $next_path = Uri::base() . "index.php/ourhospital/hospital_list/" . ($start + 25);
                    echo '<li class="page-item"><a class="page-link" href="' . $next_path . '">Next</a></li>';
                ?>
            </ul>
            </nav>
            </div>
            <div class="col-4"></div>
            </div>