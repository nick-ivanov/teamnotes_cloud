<?php

include_once('stn_config.php');

// mysql -u mfs_dbu -p -h cloud402.nickivanov.pro cloud402

if(isset($_GET['id']) && isset($_GET['key']) ) {
    if(!in_array(md5($_GET['key']), $keys_md5)) {
        print("{{[failure]}}");
        die();
    }

    $query = "DELETE FROM notes WHERE id='" . $_GET['id'] . "'";
} else {
    print("{{[failure]}}");
}

try {
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($query);
    $stmt->execute();
} catch(PDOException $e) {
    print "<div class='error_message'>Database ERROR: " . $e->getMessage() . "</div>";
    print("{{[failure]}}");
    die();
}

print("{{[success]}}");