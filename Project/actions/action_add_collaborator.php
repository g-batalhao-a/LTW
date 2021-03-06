<?php
    include_once('../includes/session.php');
    include_once('../database/db_user.php');

    $username = $_POST['username'];
    $shelter = $_SESSION['username'];

    if (isShelter($shelter) && !isShelter($username)) {
        addCollaborator($username, $shelter);
        $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Added collaborator successfully!');
    } else {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to add collaborator!');
    }

    die(header("Location: ../pages/collaborator_list.php"));
?>
