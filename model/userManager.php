<?php

function dbConnect() {
  $db = new PDO('mysql:host=localhost;dbname=slp;charset=utf8', 'phpmyadmin', 'adepsimplon05');
  return $db;
}

function getUsers() {
  $db = dbConnect();
  $req = $db->query('SELECT id_user, last_name, first_name, years, comments, availability, avenue, city FROM users');
  $result = $req->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function deleteUser() {
  $id = intval(htmlspecialchars($_GET["id_user"]));
  $db = dbConnect();
  $req = $db->prepare('DELETE FROM users WHERE id_user = ?');
  $result = $req->execute([$id]);
  return $result;
}

function addsUser($user) {
  $db = dbConnect();
  $requete = $db->prepare('INSERT INTO users(last_name, first_name, years, comments, availability, avenue, city) VALUES (:last_name, :first_name, :years, :comments, :availability, :avenue, :city)');
  $requete->execute([
    "last_name" => $user["last_name"],
    "first_name" => $user["first_name"],
    "years" => $user["years"],
    "comments" => $user["comments"],
    "availability" => $user["avai"],
    "avenue" => $user["avenue"],
    "city" => $user["city"]
  ]);
}

function updateeUser($user, $url) {
  $db = dbConnect();
  $req = $db->prepare('UPDATE users SET last_name= :last_name, first_name= :first_name, years= :years, comments= :comments, availability= :availability, avenue= :avenue, city= :city WHERE id_user = :id_user');
  $result = $req->execute([
    "last_name" => $user["last_name"],
    "first_name" => $user["first_name"],
    "years" => $user["years"],
    "comments" => $user["comments"],
    "availability" => $user["availability"],
    "avenue" => $user["avenue"],
    "city" => $user["city"],
    "id_user" => $url["id_user"]
  ]);
  $req->closeCursor();
  return $result;
}

function selectYearsChoice() {
  $db = dbConnect();
  $req = $db->query('SELECT id_user, last_name, first_name, years, comments, availability, avenue, city FROM users ORDER BY years');
  $result = $req->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function selectOrderNameChoice() {
  $db = dbConnect();
  $req = $db->query('SELECT id_user, last_name, first_name, years, comments, availability, avenue, city FROM users ORDER BY last_name');
  $result = $req->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function selectCityChoice() {
  $db = dbConnect();
  $req = $db->query('SELECT id_user, last_name, first_name, years, comments, availability, avenue, city FROM users ORDER BY city');
  $result = $req->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function selectAvailabilityChoice() {
  $db = dbConnect();
  $req = $db->query('SELECT id_user, last_name, first_name, years, comments, availability, avenue, city FROM users ORDER BY availability DESC');
  $result = $req->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}
