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
  $choice = selectListChoice();
  require 'view/frontend/listUsersView.php';
}
