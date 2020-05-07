<div class="container">
    <form method="GET">
        <input type="number" id="mpn" min="10001" max="670122" name="searchquery" placeholder="MPN: "><label>Please enter the MPN you would like additional information on, then press Enter.  The minimum value is 10001, the maximum value is 670122.</label>
    </form>
    <div>
        <?php
        $count = 0;
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
                    $count += 1;
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
            $_POST['num'] = $_GET['id'];
            echo "<p>Provider ID: " . $_POST['num'] . "</p>";
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
                $count += 1;
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


            if ($offset > 0) {
                $_GET['id'] = str_replace("%20", " ", $_GET['id']);
                $_GET['id'] = str_replace("%3C", "<", $_GET['id']);
                $_GET['id'] = str_replace("%3E", ">", $_GET['id']);
                $_GET['id'] = str_replace("%25", "%", $_GET['id']);
                $_GET['id'] = str_replace("%26", "&", $_GET['id']);
                $_GET['id'] = str_replace("%2F", "/", $_GET['id']);
                $_GET['id'] = trim($_GET['id']);
                $_GET['id'] = filter_var($_GET['id'], FILTER_SANITIZE_ENCODED);
                $previous = Uri::base() . "index.php/ourhospital/hospital_details/" . max($offset - 20, 0) . "?num=" . $_GET['num'] . "&id=" . $_GET['id'];
                echo "<a href=" . $previous . ">Previous 20 entries</a>";
                echo "<br>";
            }
            if($count >= 20) {
                $_GET['id'] = str_replace("%20", " ", $_GET['id']);
                $_GET['id'] = str_replace("%3C", "<", $_GET['id']);
                $_GET['id'] = str_replace("%3E", ">", $_GET['id']);
                $_GET['id'] = str_replace("%25", "%", $_GET['id']);
                $_GET['id'] = str_replace("%26", "&", $_GET['id']);
                $_GET['id'] = str_replace("%2F", "/", $_GET['id']);
                $_GET['id'] = trim($_GET['id']);
                $_GET['id'] = filter_var($_GET['id'], FILTER_SANITIZE_ENCODED);
                $next = Uri::base() . "index.php/ourhospital/hospital_details/" . ($offset + 20) . "?num=" . $_GET['num'] . "&id=" . $_GET['id'];
                echo "<a href=" . $next . ">Next 20 entries</a>";
            }
        ?>
        <div style="height: 40px"></div>
        <div class="row">
            <div class="col-md-6">
                <?php
                foreach($comments as $comment){
                    echo Form::open(array(
                            "action" => "/index.php/ourhospital/comment_response/hospital_details/",
                            "method" => "post"
                    ));
                    echo "<input id='provider-id' name='provider-id' type='hidden' value='" . $hospital_data[0]['provider_id'] . "'>";
                    echo "<input id='chat' name='chat' type='hidden' value='" . $comment['comment_id'] . "'>";
                    echo "<input id='id' name='id' type='hidden' value='" . $hospital_data[0]['provider_name'] . "'>";
                    echo "<small class='form-text text-muted'>" . $comment['username'] . " says:</small>";
                    echo '<input type="text" class="form-control bg-dark text-light" aria-label="Comment" value="' . $comment['comment'] . '" readonly>';
                    foreach ($responses as $response){
                        if ($response['parent_id'] == $comment['comment_id']){
                            echo "<small class='form-text text-muted'>" . $response['username'] . " replied:</small>";
                            echo '<input type="text" class="form-control" aria-label="Comment" value="' . $response['comment'] . '" readonly>';
                        }
                    }
                    if(isset($_SESSION['username'])){
                        echo '<div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Reply to this thread" name="response">
                                <button class="btn btn-outline-secondary" type="submit">Submit your comment</button>
                                </div>';
                    }
                    echo '<div style="height: 20px"></div>';
                    echo Form::close();
                }
                ?>

                <?php
                    if(isset($_SESSION['username'])){
                        echo Form::open(array(
                                "action" => "/index.php/ourhospital/new_comment/hospital_details",
                                "method" => "post"
                        ));
                        echo "<input id='provider-id' name='provider-id' type='hidden' value='" . $hospital_data[0]['provider_id'] . "'>";
                        echo "<input id='id' name='id' type='hidden' value='" . $hospital_data[0]['provider_name'] . "'>";
                        echo '<label for="comment">Start a new discussion:</label>';
                        echo '<input type="text" class="form-control" name="comment" placeholder="Let the world know your thoughts" aria-label="Comment">';
                        echo '<div style="height: 20px"></div>';
                        echo '<button type="submit" class="btn btn-primary">Submit your comment</button>';
                        echo Form::close();

                    }
                ?>
            </div>

        </div>


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

