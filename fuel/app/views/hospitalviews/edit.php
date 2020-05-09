<div class="container">

        <div style="height: 40px"></div>
        <div class="row">
            <div class="col-md-6">
                <?php
                foreach($comments as $comment){
                    echo Form::open(array(
                        "action" => "/index.php/ourhospital/edit_comment/edit/",
                        "method" => "post"
                    ));
                    echo "<input id='provider-id' name='provider-id' type='hidden' value='" . $hospital_data[0]['provider_id'] . "'>";

                    echo "<input id='id' name='id' type='hidden' value='" . $hospital_data[0]['provider_name'] . "'>";
                    if($comment['comment_id'] == $comment_id){
                        echo "<input id='comment_id' name='comment_id' type='hidden' value='" . $comment['comment_id'] . "'>";
                        if($comment['edited'] != NULL) {
                            echo "<small class='form-text text-muted'>" . $comment['username'] . " said:&ensp;&ensp;&ensp;score: " . $comment['score'] . "&ensp;&ensp;at " . $comment['created'] . "&ensp;&ensp;edited on: " . $comment['edited'] . "</small>";
                        }

                        else{
                            echo "<small class='form-text text-muted'>" . $comment['username'] . " said:&ensp;&ensp;&ensp;score: " . $comment['score'] . "&ensp;&ensp;at " . $comment['created'] . "</small>";
                        }

                    if(!isset($_SESSION['username'])) {
                        echo '<input type="text" class="form-control bg-dark text-light" aria-label="Comment" value="' . $comment['comment'] . '" readonly>';
                    }

                    elseif($_SESSION['username'] == 'ct310admin' || $_SESSION['username'] == $comment['username']){
                        if($comment['username'] == 'deleted'){
                            echo '<input type="text" class="form-control bg-dark text-light" aria-label="Comment" value="' . $comment['comment'] . '" readonly>';
                        }else {

                           echo '<div class="input-group input-group-sm mb-3">
                                   <input type="text" name="edited" class="form-control bg-warning text-dark" aria-label="Comment" value="' . $comment['comment'] . '">
                                   <div class="input-group-append">
                                        <button type="submit" class="btn btn-outline-secondary">Submit your changes</button>
                                        
                                        </div>
                                        </div>';
                        }
                    }

                    else{
                        echo '<input type="text" class="form-control bg-dark text-light" aria-label="Comment" value="' . $comment['comment'] . '" readonly>';
                    }

                    }

                    else{
                        if($comment['edited'] != NULL) {
                            echo "<small class='form-text text-muted'>" . $comment['username'] . " said:&ensp;&ensp;&ensp;score: " . $comment['score'] . "&ensp;&ensp;at " . $comment['created'] . "&ensp;&ensp;edited on: " . $comment['edited'] . "</small>";
                        }

                        else{
                            echo "<small class='form-text text-muted'>" . $comment['username'] . " said:&ensp;&ensp;&ensp;score: " . $comment['score'] . "&ensp;&ensp;at " . $comment['created'] . "</small>";
                        }
                        if(!isset($_SESSION['username'])) {
                            echo '<input type="text" class="form-control bg-dark text-light" aria-label="Comment" value="' . $comment['comment'] . '" readonly>';
                        }

                        elseif($_SESSION['username'] == 'ct310admin' || $_SESSION['username'] == $comment['username']){
                            if($comment['username'] == 'deleted'){
                                echo '<input type="text" class="form-control bg-dark text-light" aria-label="Comment" value="' . $comment['comment'] . '" readonly>';
                            }else {
                                echo '<div class="input-group input-group-sm mb-3">
                                   <input type="text" class="form-control bg-dark text-light" aria-label="Comment" value="' . $comment['comment'] . '"readonly>
                                   
                                        </div>';
                            }
                        }

                        else{
                            echo '<input type="text" class="form-control bg-dark text-light" aria-label="Comment" value="' . $comment['comment'] . '" readonly>';
                        }
                    }


                    foreach ($responses as $response){
                        if ($response['parent_id'] == $comment['comment_id']){
                            if($response['comment_id'] == $comment_id) {
                                echo "<input id='comment_id' name='comment_id' type='hidden' value='" . $response['comment_id'] . "'>";
                                if($response['edited'] != NULL) {
                                    echo "<small class='form-text text-muted'>" . $response['username'] . " replied:&ensp;&ensp;&ensp;score: " . $response['score'] . "&ensp;&ensp; at: " . $response['created'] . "&ensp;&ensp; edited on: " . $response['edited'] . "</small>";
                                }

                                else{
                                    echo "<small class='form-text text-muted'>" . $response['username'] . " replied:&ensp;&ensp;&ensp;score: " . $response['score'] . "&ensp;&ensp; at: " . $response['created'] . "</small>";
                                }
                                if (!isset($_SESSION['username'])) {
                                    echo '<input type="text" class="form-control" aria-label="Comment" value="' . $response['comment'] . '" readonly>';
                                } elseif ($_SESSION['username'] == 'ct310admin' || $_SESSION['username'] == $response['username']) {
                                    if ($response['username'] == 'deleted') {
                                        echo '<input type="text" class="form-control" aria-label="Comment" value="' . $response['comment'] . '" readonly>';
                                    } else {
                                         echo '<div class="input-group input-group-sm mb-3">
                                   <input type="text" id="edited" name="edited" class="form-control bg-warning text-dark" aria-label="Comment" value="' . $response['comment'] . '">
                                   <div class="input-group-append">
                                        <button type="submit" class="btn btn-outline-secondary">Submit your changes</button>
                                        
                                        </div>
                                        </div>';
                                    }
                                } else {
                                    echo '<input type="text" class="form-control" aria-label="Comment" value="' . $response['comment'] . '" readonly>';
                                }

                            }
                            else{
                                if($response['edited'] != NULL) {
                                    echo "<small class='form-text text-muted'>" . $response['username'] . " replied:&ensp;&ensp;&ensp;score: " . $response['score'] . "&ensp;&ensp; at: " . $response['created'] . "&ensp;&ensp; edited on: " . $response['edited'] . "</small>";
                                }

                                else{
                                    echo "<small class='form-text text-muted'>" . $response['username'] . " replied:&ensp;&ensp;&ensp;score: " . $response['score'] . "&ensp;&ensp; at: " . $response['created'] . "</small>";
                                }
                                if (!isset($_SESSION['username'])) {
                                    echo '<input type="text" class="form-control" aria-label="Comment" value="' . $response['comment'] . '" readonly>';
                                } elseif ($_SESSION['username'] == 'ct310admin' || $_SESSION['username'] == $response['username']) {
                                    if ($response['username'] == 'deleted') {
                                        echo '<input type="text" class="form-control" aria-label="Comment" value="' . $response['comment'] . '" readonly>';
                                    } else {
                                        echo '<div class="input-group input-group-sm mb-3">
                                   <input type="text" class="form-control" aria-label="Comment" value="' . $response['comment'] . '" readonly>
                                   
                                        </div>';
                                    }
                                } else {
                                    echo '<input type="text" class="form-control" aria-label="Comment" value="' . $response['comment'] . '" readonly>';
                                }
                            }

                        }


                    }





                    echo '<div style="height: 20px"></div>';
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