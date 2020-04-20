<div>
    <form method="GET">
        <input type="number" id="mpn" min="10001" max="670122" name="searchquery" placeholder="MPN: "><label>Please enter the MPN you would like additional information on, then press Enter.  The minimum value is 10001, the maximum value is 670122.</label>
    </form>
    <div>
        <?php
        if (isset($_GET['searchquery']) && sizeof($hospital_data) > 0) {
            $item = $_GET['searchquery'];
            echo "<p>Your search for MPN: " . $item . " returned the following results: </p>";
            echo "<p>Provider name: " . $hospital_data[0]['provider_name'] . "</p>";
            echo "<p>Provider street address: " . $hospital_data[0]['provider_street_address'] . "</p>";
            echo "<p>Provider city: " . $hospital_data[0]['provider_city'] . "</p>";
            echo "<p>Provider state: " . $hospital_data[0]['provider_state'] . "</p>";
            echo "<p>Referral region: " . $hospital_data[0]['hospital_referral_region'] . "</p>";


            echo "<table id='drgSpecifics' class='table tablesorter'>";
            echo "<thead class='tableHead'>";
            echo "<tr>";
            echo "<th>DRG Number</th>";
            echo "<th>DRG Description</th>";
            echo "<th>Average Covered Charges</th>";
            echo "<th>Average Total Payments</th>";
            echo "<th>Average Medicare Payments</th>";
            echo "</tr >";
            echo "</thead >";
            echo "<tbody >";


                foreach ($hospital_data as $row) {
                    echo "<tr>\n";
                    $link = Uri::base() . "index.php/ourhospital/drg_details.php?id=" . $row['DRG_Number'] . "&description=" . $row['DRG_Description'];
                    echo "<td><a href='$link'>" . $row['DRG_Number'] . "</a></td>\n<td>" . $row['DRG_Description'] . "</td>\n<td>" . $row['average_covered_charges'] . "</td>\n
                      <td>" . $row['average_total_payments'] . "</td>\n<td>" . $row['average_medicare_payments'] . "</td>\n";
                    echo "</tr>\n";
                }

            echo "</tbody >";
        echo "</table >";
        }
        elseif (isset($_GET['id'])){
            echo "<p>Provider name: " . $hospital_data[0]['provider_name'] . "</p>";
            echo "<p>Provider street address: " . $hospital_data[0]['provider_street_address'] . "</p>";
            echo "<p>Provider city: " . $hospital_data[0]['provider_city'] . "</p>";
            echo "<p>Provider state: " . $hospital_data[0]['provider_state'] . "</p>";
            echo "<p>Referral region: " . $hospital_data[0]['hospital_referral_region'] . "</p>";


            echo "<table id='drgSpecifics' class='table tablesorter'>";
            echo "<thead class='tableHead'>";
            echo "<tr>";
            echo "<th>DRG Number</th>";
            echo "<th>DRG Description</th>";
            echo "<th>Average Covered Charges</th>";
            echo "<th>Average Total Payments</th>";
            echo "<th>Average Medicare Payments</th>";
            echo "</tr >";
            echo "</thead >";
            echo "<tbody >";


            foreach ($hospital_data as $row) {
                echo "<tr>\n";
                $link = Uri::base() . "index.php/ourhospital/drg_details.php?id=" . $row['DRG_Number'] . "&description=" . $row['DRG_Description'];
                echo "<td><a href='$link'>" . $row['DRG_Number'] . "</a></td>\n<td>" . $row['DRG_Description'] . "</td>\n<td>" . $row['average_covered_charges'] . "</td>\n
                      <td>" . $row['average_total_payments'] . "</td>\n<td>" . $row['average_medicare_payments'] . "</td>\n";
                echo "</tr>\n";
            }

            echo "</tbody >";
            echo "</table >";
        }
        else {
            echo "<p>No values found for MPN: " . $_GET['searchquery'] . ".</p>";
        }
            ?>
        <script>

            $(function() {
                $("table").tablesorter({
                    widthFixed: false,
                    cancelSelection: true,
                    tabIndex: true,
                    usNumberFormat: true,
                    serverSideSorting: false,
                    resort: true,
                    ignoreCase: true,
                    sortForce: null,
                    sortList: [
                        [0,0],
                        [1,0],
                        [2.0],
                        [3,0],
                        [4,0],
                        [5,0]
                    ],
                    sortInitialOrder: "asc",
                    sortReset: true,
                    initWidgets: true,
                    widgets: ['zebra', 'columns'],
                    widgetOptions: {
                        columns: [
                            "DRG_Number",
                            "DRG_Description"
                        ],
                        columns_thead: true,
                        resizable: true,
                        zebra: [
                            "even",
                            "odd"
                        ]
                    },


                });
            });
        </script>
    </div>
</div>

