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
            foreach($drg_list as $row){
                echo "<tr>\n";
                $link = Uri::base() . "index.php/ourhospital/drg_details.php?id=" . $row['DRG_Number'] . "&description=" . $row['DRG_Description'];
                echo "<td><a href='$link'>" . $row['DRG_Number'] . "</a></td>\n<td>" . $row['DRG_Description'] . "</td>\n";
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
                [1,0]
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