<?php
session_start();
require('dbcon.php');

function validate($inputData)
{
   global $conn;
   $validatedData =  mysqli_real_escape_string($conn, $inputData);
   return trim($validatedData);
}
function webSetting ($columnName) {
   $setting = getById('settings', 1);
   if($setting['status'] == 200) {
      return $setting['data'][$columnName];
   } else {
      return false;
   }
}
function logoutSession() {
   unset($_SESSION['auth']);
   unset($_SESSION['loggedInUser']);
   unset($_SESSION['loggedInUserRole']);
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
   if($result) {
      if (mysqli_num_rows($result) == 1) {
         $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
         $response = [
            'status' => 200,
            'message' => 'Fetch data successfully',
            'data' => $row
         ];
         return $response;
      } else {
         $response = [
            'status' => 404,
            'message' => 'No record found',
         ];
         return $response;
      }
   }
   else {
      $response = [
         'status' => 500,
         'message' => 'Something went wrong',
      ];
      return $response;
   }
}

function deleteQuery( $tableName, $id) {
   global $conn;
   $table = validate($tableName);
   $id = validate($id);

   $query = "DELETE FROM $table WHERE id='$id' LIMIT 1";
   $result = mysqli_query($conn, $query);
   return $result;
}


// Create function to limit words 
function limitWords($string, $limit = 50) {
   $words = explode("", strip_tags($string));
   if(count($words) > $limit) {
      $words = array_slice($words, 0, $limit);
      return implode(" ", $words) . "...";
   }
   return implode(" ", $words);
}