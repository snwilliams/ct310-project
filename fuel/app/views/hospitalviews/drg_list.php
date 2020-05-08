<div>
    <div>
        <table id="drgList" class="table tablesorter">
            <thead class="tableHead">
            <tr>
                <th>DRG Number</th>
                <th>DRG Description</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $count = 0;
            foreach($drg_list as $row){
                $count += 1;
                echo "<tr>\n";
                $link = Uri::base() . "index.php/ourhospital/drg_details.php?id=" . $row['DRG_Number'] . "&description=" . $row['DRG_Description'];
                echo "<td><a href='$link'>" . $row['DRG_Number'] . "</a></td>\n<td>" . $row['DRG_Description'] . "</td>\n";
                echo "</tr>\n";
            }

            echo   "</tbody>";
        echo    "</table>";

        if ($offset > 0){
            $previous = Uri::base() . "index.php/ourhospital/drg_list/" . max($offset - 20, 0);
            echo "<a href=" . $previous . ">Previous 20 entries</a>";
            echo "<br>";
        }if($count >= 20) {
                $next = Uri::base() . "index.php/ourhospital/drg_list/" . ($offset + 20);
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
                [1,0]
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