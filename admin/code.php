<?php 
 require('../config/function.php');
 if(isset($_POST['saveUser'])){
    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $is_ban = validate($_POST['is_ban']) ==  true ? 1 : 0;
    $role = validate($_POST['role']);
  

 if($name != "" && $phone != "" && $email != "" && $password != "" && $role != "")
    {
        $query = "INSERT INTO users ( name, phone, email, password, is_ban, role) 
        VALUES ('$name', '$phone', '$email', '$password', '$is_ban', '$role')";
        $result = mysqli_query($conn, $query);
        if($result){
            redirect('users.php', 'User/Admin Added Successfully');

        } else {
            redirect('users-create.php', 'Something went wrong');

        }   
} else {
    redirect('users-create.php', 'Please fill all the fields');
   }
}

if(isset($_POST['updateUser'])) {
 $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $is_ban = validate($_POST['is_ban']) ==  true ? 1 : 0;
    $role = validate($_POST['role']);
    $userId = validate($_POST['userId']);

    $user = getById('users', $userId);
    if($user['status'] != 200) {
        redirect('users-edit.php?id='.$userId, 'No such id user/admin found');
    }

 if($name != "" && $phone != "" && $email != "" && $password != "" && $role != "")
    {
        $query = "UPDATE users SET name='$name', phone='$phone', email='$email', password='$password', is_ban='$is_ban', role='$role' WHERE id='$userId'";
        $result = mysqli_query($conn, $query);
        if($result){
            redirect('users-edit.php?id='.$userId, 'User/Admin Updated Successfully');

        } else {
            redirect('users-create.php', 'Something went wrong');

        }   
} else {
    redirect('users-create.php', 'Please fill all the fields');
   }
}
?>