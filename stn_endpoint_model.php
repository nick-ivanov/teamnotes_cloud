<?php

require_once("stn_controller.php");

function hit_stn_endpoint($params) {
    $notes = get_note_list("host", "dbname", "dbuser", "dbpassword");
    // Do something
    print_r($params);
}