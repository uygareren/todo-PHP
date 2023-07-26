<?php

if ($process == 'login') {

    if (empty($data['email'])) {
        return [
            'success' => false,
            'message' => "Please Enter E-Mail!",
            'type' => 'danger'
        ];
    }

    if (empty($data['password'])) {
        return [
            'success' => false,
            'message' => "Please Enter Password!",
            'type' => 'danger'
        ];
    }

    // Assuming $data is correctly populated with email and password data
    $q = $db->prepare("SELECT *, CONCAT(name, ' ', surname) AS fullname FROM user WHERE email = ? AND password = ?");
    $q->execute([$data['email'], $data['password']]); // Pass parameters as an array

    if ($q->rowCount()) {

        $user = $q->fetch(PDO::FETCH_ASSOC);

        add_session("id", $user['id']);
        add_session("name", $user['name']);
        add_session("surname", $user['surname']);
        add_session("email", $user['email']);
        add_session("fullname", $user['fullname']);
        add_session("login", true);

        return [
            'success' => true,
            'data' => $user,
            'message' => 'Log in Successful',
            'type' => 'success',
            'redirect' => '/home'
        ];

    } else {
        return [
            'success' => false,
            'message' => 'Error',
            'type' => 'danger'
        ];
    }

}
