<div>
    <div>
        <table id="hospitalList" class="table tablesorter">
            <thead class="tableHead">
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
            $count = 0;
            foreach($hospital_list as $row){
                $count += 1;
                echo "<tr>\n";
                $link = Uri::base() . "index.php/ourhospital/hospital_details.php?id=" . $row['provider_name'] . "&num=" . $row['provider_id'];
                echo "<td>" . $row['provider_id'] . "</td>\n<td><a href='$link'>" . $row['provider_name'] . "</a></td>\n<td>" . $row['provider_street_address'] . "</td>\n
                      <td>" . $row['provider_city'] . "</td>\n<td>" . $row['provider_state'] . "</td>\n<td>" . $row['hospital_referral_region_hrr_description'] . "</td>\n";
                echo "</tr>\n";
            }


            echo "</tbody>";
        echo "</table>";

                if ($offset > 0){
                    $previous = Uri::base() . "index.php/ourhospital/hospital_list/" . max($offset - 20, 0);
                    echo "<a href=" . $previous . ">Previous 20 entries</a>";
                    echo "<br>";
                }if($count >= 20) {
                $next = Uri::base() . "index.php/ourhospital/hospital_list/" . ($offset + 20);
                echo "<a href=" . $next . ">Next 20 entries</a>";
            }
        ?>


        <script>

            $(function() {
                $("table").tablesorter({
                    theme: "ice",
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
                    widgets: ['zebra', 'columns', 'uitheme'],
                    widgetOptions: {
                        columns: [
                            "DRG_Number",
                            "DRG_Description"
                        ],
                        columns_thead: true,
                        resizable: true,
                        zebra: [
                            "ui-widget-content even",
                            "ui-state-default odd"
                        ]
                    },


                });
            });
        </script>
    </div>
</div>