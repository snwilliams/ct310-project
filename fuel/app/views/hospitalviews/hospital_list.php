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
            foreach($hospital_list as $row){
                echo "<tr>\n";
                $link = Uri::base() . "index.php/ourhospital/hospital_details.php?id=" . $row['provider_name'];
                echo "<td>" . $row['provider_id'] . "</td>\n<td><a href='$link'>" . $row['provider_name'] . "</a></td>\n<td>" . $row['provider_street_address'] . "</td>\n
                      <td>" . $row['provider_city'] . "</td>\n<td>" . $row['provider_state'] . "</td>\n<td>" . $row['hospital_referral_region'] . "</td>\n";
                echo "</tr>\n";
            }
            ?>
            </tbody>
        </table>
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
