<?php
$id = $_GET['id'];
$description = $_GET['description'];

echo "<h1>Data for $id: $description</h1>";



?>

<div>
    <div>
        <table id="drgDetails" class="table tablesorter">
            <thead class="tableHead">
            <tr>
                <th>Medicare Provider Number</th>
                <th>Provider Name</th>
                <th>Provider State</th>
                <th>Average Covered Charges</th>
                <th>Average Total Payments</th>
                <th>Average Medicare Payments</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($drg_data as $row){
                echo "<tr>\n";
                echo "<td>" . $row['provider_id'] . "</td>\n<td>" . $row['provider_name'] . "</td>\n<td>" . $row['provider_state'] . "</td>\n
                      <td>" . $row['average_covered_charges'] . "</td>\n<td>" . $row['average_total_payments'] . "</td>\n<td>" . $row['average_medicare_payments'] . "</td>\n";
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

