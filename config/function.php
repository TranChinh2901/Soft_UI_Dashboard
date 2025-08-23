<?php
session_start();
require('dbcon.php');

function validate($inputData)
{
   global $conn;
   return mysqli_real_escape_string($conn, $inputData);
}

function redirect($url, $status)
{
   $_SESSION["status"] = $status;
   header("Location: " . $url);
   exit();
}

function alertMessage()
{
   if (isset($_SESSION['status'])) {
      $status = $_SESSION['status'];
      unset($_SESSION['status']);
      return '<div class="alert alert-info alert-dismissible fade show" role="alert">
        ' . $status . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
   }
}

function checkParamId($paramType) {
    if (isset($_GET[$paramType])) {
        if ($_GET[$paramType] != null) {
            return $_GET[$paramType];
        } else {
            return 'No id found';
        }
    } else {
        return 'No id given';
    }
}


function getAll($tableName)
{
   global $conn;
   $table = validate($tableName);
   $query = "SELECT * FROM $table";
   $result = mysqli_query($conn, $query);
   return $result;
}

function getById($tableName, $id)
{
   global $conn;
   $table = validate($tableName);
   $id = validate($id);
   $query = "SELECT * FROM $table WHERE id='$id' LIMIT 1";
   $result = mysqli_query($conn, $query);
   if (mysqli_num_rows($result) > 0) {
      return mysqli_fetch_assoc($result);
   } else {
      return null;
   }
}


