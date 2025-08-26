<?php
require('../config/function.php');
if (isset($_POST['saveUser'])) {
    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $is_ban = validate($_POST['is_ban']) ==  true ? 1 : 0;
    $role = validate($_POST['role']);


    if ($name != "" && $phone != "" && $email != "" && $password != "" && $role != "") {
        $query = "INSERT INTO users ( name, phone, email, password, is_ban, role) 
        VALUES ('$name', '$phone', '$email', '$password', '$is_ban', '$role')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            redirect('users.php', 'User/Admin Added Successfully');
        } else {
            redirect('users-create.php', 'Something went wrong');
        }
    } else {
        redirect('users-create.php', 'Please fill all the fields');
    }
}

if (isset($_POST['updateUser'])) {
    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $is_ban = validate($_POST['is_ban']) ==  true ? 1 : 0;
    $role = validate($_POST['role']);
    $userId = validate($_POST['userId']);

    $user = getById('users', $userId);
    if ($user['status'] != 200) {
        redirect('users-edit.php?id=' . $userId, 'No such id user/admin found');
    }

    if ($name != "" && $phone != "" && $email != "" && $password != "" && $role != "") {
        $query = "UPDATE users SET name='$name', phone='$phone', email='$email', password='$password', is_ban='$is_ban', role='$role' WHERE id='$userId'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            redirect('users-edit.php?id=' . $userId, 'User/Admin Updated Successfully');
        } else {
            redirect('users-create.php', 'Something went wrong');
        }
    } else {
        redirect('users-create.php', 'Please fill all the fields');
    }
}


if (isset($_POST['saveSetting'])) {
    $title = validate($_POST['title']);
    $slug = validate($_POST['slug']);
    $small_description = validate($_POST['small_description']);
    $meta_description = validate($_POST['meta_description']);
    $meta_keyword = validate($_POST['meta_keyword']);
    $email1 = validate($_POST['email1']);
    $email2 = validate($_POST['email2']);
    $phone1 = validate($_POST['phone1']);
    $phone2 = validate($_POST['phone2']);
    $address = validate($_POST['address']);

    $settingId = validate($_POST['settingId']);

    if ($settingId == 'insert') {
        $query = "INSERT INTO settings ( title, slug, small_description, meta_description, meta_keyword, email1, email2, phone1, phone2, address)
    VALUES ('$title', '$slug', '$small_description', '$meta_description', '$meta_keyword', '$email1', '$email2', '$phone1', '$phone2', '$address')";
        $result = mysqli_query($conn, $query);
    }
    if (is_numeric($settingId)) {
        $query = "UPDATE settings SET title='$title', 
                slug='$slug', 
                small_description='$small_description', 
                meta_description='$meta_description', 
                meta_keyword='$meta_keyword', 
                email1='$email1', 
                email2='$email2', 
                phone1='$phone1', 
                phone2='$phone2', 
                address='$address' 
                WHERE id='$settingId' LIMIT 1";
        $result = mysqli_query($conn, $query);
    }
    if ($result) {
        redirect('settings.php', 'Settings saved ');
    } else {
        redirect('settings.php', 'Something went wrong');
    }
}




if (isset($_POST['saveSocialMedia'])) {
    $name = validate($_POST['name']);
    $url = validate($_POST['url']);
    $status = validate($_POST['status']) ==  true ? 1 : 0;

    if ($name != "" && $url != "") {
        $query = "INSERT INTO social_medias (name, url, status) VALUES ('$name', '$url', '$status')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            redirect('social-media.php', 'Social Media Added Successfully');
        } else {
            redirect('social-media-create.php', 'Something went wrong');
        }
    } else {
        redirect('users-create.php', 'Please fill all the fields');
    }
}


if (isset($_POST['updateSocialMedia'])) {
    $name = validate($_POST['name']);
    $url = validate($_POST['url']);
    $status = validate($_POST['status']) ==  true ? 1 : 0;
    $socialMediaId = validate($_POST['socialMediaId']);

    if ($name != "" && $url != "") {
        $query = "UPDATE social_medias SET name='$name', url='$url', status='$status' WHERE id='$socialMediaId' LIMIT 1";
        $result = mysqli_query($conn, $query);
        if ($result) {
            redirect('social-media.php', 'Social Media Updated Successfully');
        } else {
            redirect('social-media-edit.php?id=' . $socialMediaId, 'Something went wrong');
        }
    } else {
        redirect('social-media-edit.php?id=' . $socialMediaId, 'Please fill all the fields');
    }
}


if (isset($_POST['saveService'])) {
    $name = validate($_POST['name']);
    $slug = str_replace(' ', '-', strtolower($name));
    $small_description = validate($_POST['small_description']);
    $long_description = validate($_POST['long_description']);

    if ($_FILES['image']['size'] > 0) {
        $image = $_FILES['image']['name'];
        $imgFileTypes = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        if($imgFileTypes != 'jpg' && $imgFileTypes != 'png' && $imgFileTypes != 'jpeg'  ) {
            redirect('services-create.php', 'Sorry, only JPG, JPEG, PNG files are allowed.');
        }
        $path = "../assets/uploads/services/";
        $imgExt = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time() . '.' . $imgExt;

        $finalImage = 'assets/uploads/services/' . $filename;
    } else {
        $finalImage = NULL;
    }


    $meta_title = validate($_POST['meta_title']);
    $meta_description = validate($_POST['meta_description']);
    $meta_keyword = validate($_POST['meta_keyword']);
    $status = validate($_POST['status']) ==  true ? 1 : 0;

    $query = "INSERT INTO services (name, slug, small_description, long_description, image, meta_title, meta_description, meta_keyword, status) 
    VALUES ('$name', '$slug', '$small_description', '$long_description', '$finalImage', '$meta_title', '$meta_description', '$meta_keyword', '$status')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        if ($_FILES['image']['size'] > 0) {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . $filename);
        }

        redirect('services.php', 'Service Added Successfully');
    } else {
        redirect('services.php?id=' , 'Something went wrong');
    }
}
