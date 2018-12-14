<?php
require 'controller/frontend.php';

try {
  if (isset($_GET['action'])) {
    if ($_GET['action'] === 'listUsers') {
      listUsers();
    }
    if ($_GET['action'] === 'removeUser') {
      removeUser();
    }
    if ($_GET['action'] === 'formUpdateUser') {
      formUpdateUser();
    }
    if ($_GET['action'] === 'formAddUser') {
      formAddUser();
    }
    if ($_GET['action'] === 'addUser') {
      addUser();
    }
    if ($_GET['action'] === 'updateUser') {
      updateUser();
    }
  }
  else {
    listUsers();
  }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
