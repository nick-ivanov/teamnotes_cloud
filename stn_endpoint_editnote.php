<?php

include_once('stn_config.php');

// mysql -u mfs_dbu -p -h cloud402.nickivanov.pro cloud402

/*
$arr = Array();

$query = "SELECT id from notes";

try {
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll();

    foreach($result as $item) {
        array_push($arr, $item['id']);
    }

} catch(PDOException $e) {
    print "<div class='error_message'>Database ERROR: " . $e->getMessage() . "</div>";
    die();
}


print("abc\{{cda\}}{{");
foreach ($arr as $item) {
    print("[$item]");
}
print("}}");

*/

if(isset($_GET['id']) && isset($_GET['subject']) && isset($_GET['body']) && isset($_GET['key']) ) {
    if(!in_array(md5($_GET['key']), $keys_md5)) {
        print("{{[failure]}}");
        die();
    }

    $query = "UPDATE notes SET subject='" . $_GET['subject'] . "', body='" . $_GET['body'] . "' WHERE id='" . $_GET['id'] . "'";
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