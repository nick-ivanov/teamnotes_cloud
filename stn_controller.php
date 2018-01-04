<?php


function sample_query($host, $dbname, $dbuser, $dbpassword, $query) {
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare($query);
        $stmt->execute();
    } catch(PDOException $e) {
        print "<div class='error_message'>Database ERROR: " . $e->getMessage() . "</div>";
        die();
    }
}

function get_note_list($host, $dbname, $dbuser, $dbpassword) {
    return Array();
}

function get_note($host, $dbname, $dbuser, $dbpassword, $id) {
    return Array();
}

function submit_note($host, $dbname, $dbuser, $dbpassword, $id, $note) {
    // Do something
}

