<?php

$conn = new PDO ("mysql:host=localhost;dbname=site_db", 'root', 'root');

$req = $conn->prepare("SELECT cards.id, cards.title, cards.content, cards.link,cards.user_id, users.login as user_login FROM cards JOIN users ON cards.user_id = users.id");
$req->execute();
print_r( $req->fetchAll(PDO::FETCH_ASSOC) );

?>