<?php
$id = $_GET['id'];
$description = $_GET['description'];

echo "<h2>Data for $id: $description</h2>";



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
            $count = 0;
            foreach($drg_data as $row){
                $count += 1;
                echo "<tr>\n";
                echo "<td>" . $row['provider_id'] . "</td>\n<td>" . $row['provider_name'] . "</td>\n<td>" . $row['provider_state'] . "</td>\n
                      <td>" . $row['average_covered_charges'] . "</td>\n<td>" . $row['average_total_payments'] . "</td>\n<td>" . $row['average_medicare_payments'] . "</td>\n";
                echo "</tr>\n";
            }

           echo "</tbody>";
           echo "</table>";

            echo '<div class="d-flex btn-group justify-content-center" role="group">';
        if ($offset > 0){
            $_GET['description'] = str_replace("%20", " ", $_GET['description']);
            $_GET['description'] = str_replace("%3C", "<", $_GET['description']);
            $_GET['description'] = str_replace("%3E", ">", $_GET['description']);
            $_GET['description'] = str_replace("%25", "%", $_GET['description']);
            $_GET['description'] = str_replace("%26", "&", $_GET['description']);
            $_GET['description'] = str_replace("%2F", "/", $_GET['description']);
            $_GET['description'] = trim($_GET['description']);
            $_GET['description'] = filter_var($_GET['description'], FILTER_SANITIZE_ENCODED);
            $previous = Uri::base() . "index.php/ourhospital/drg_details/" . max($offset - 20, 0) . "?id=" . $_GET['id'] . "&description=" . $_GET['description'];
            echo "<a class=\"btn btn-secondary\" href=" . $previous . ">Previous 20 entries</a>";

        }
        if ($count >= 20 ) {
            $_GET['description'] = str_replace("%20", " ", $_GET['description']);
            $_GET['description'] = str_replace("%3C", "<", $_GET['description']);
            $_GET['description'] = str_replace("%3E", ">", $_GET['description']);
            $_GET['description'] = str_replace("%25", "%", $_GET['description']);
            $_GET['description'] = str_replace("%26", "&", $_GET['description']);
            $_GET['description'] = str_replace("%2F", "/", $_GET['description']);
            $_GET['description'] = trim($_GET['description']);
            $_GET['description'] = filter_var($_GET['description'], FILTER_SANITIZE_ENCODED);
            $next = Uri::base() . "index.php/ourhospital/drg_details/" . ($offset + 20) . "?id=" . $_GET['id'] . "&description=" . $_GET['description'];
            echo "<a class=\"btn btn-secondary\" href=" . $next . ">Next 20 entries</a>";

        }
        echo '</div>';
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

