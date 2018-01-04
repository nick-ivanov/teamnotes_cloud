<?php

include_once('stn_config.php');

// mysql -u mfs_dbu -p -h cloud402.nickivanov.pro cloud402

if(isset($_GET['key'])) {
    if(!in_array(md5($_GET['key']), $keys_md5)) {
        print("{{[failure]}}");
        die();
    }
} else {
    print("{{[failure]}}");
    die();
}

$arr = Array();

$query = "SELECT body from notes";

try {
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll();

    foreach($result as $item) {
        array_push($arr, $item['body']);
    }

} catch(PDOException $e) {
    print "<div class='error_message'>Database ERROR: " . $e->getMessage() . "</div>";
    die();
}


print("{{");
foreach ($arr as $item) {
    print("[$item]");
}
print("}}");
