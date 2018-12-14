<?php

require 'model/userManager.php';

function listUsers() {
  $users = getUsers();
  require 'view/frontend/listUsersView.php';
}

function removeUser() {
  $remove = deleteUser();
  header('Location: index.php');
  exit;
}

function formAddUser() {
  require 'view/frontend/formAddUser.php';
}

function  addUser() {
  $add = addsUser($_POST);
  header('Location: index.php');
  exit;
}

function formUpdateUser() {
  $users = getUsers();
  require 'view/frontend/formUpdateUser.php';
}

function updateUser() {
  $update = updateeUser($_POST, $_GET);
  header('Location: index.php');
  exit;
}

function selectChoice() {
  if (isset($_POST['id'])) {
    listUsers();
  }
  if (isset($_POST['years'])) {
    $users = selectYearsChoice();
    require 'view/frontend/listUsersView.php';
  }
  if (isset($_POST['orderName'])) {
    $users = selectOrderNameChoice();
    require 'view/frontend/listUsersView.php';
  }
  if (isset($_POST['city'])) {
    $users = selectCityChoice();
    require 'view/frontend/listUsersView.php';
  }
  if (isset($_POST['availability'])) {
    $users = selectAvailabilityChoice();
    require 'view/frontend/listUsersView.php';
  }
}
