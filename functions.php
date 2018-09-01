<?php
// sessions are like cookies but on servers

function session_start_safe()
{
    if (!isset($_SESSION)) {
        session_start();
    }
}

function currentUser()
{
    session_start_safe();
    if (!isset($_SESSION['user_id'])) {
        return null;
    }

    return \UserQuery::create()->findOneByUserId($_SESSION['user_id']);
}


function signUserIn($id)
{
    session_start_safe();
    $_SESSION['user_id'] = $id;
}

function signUserOut()
{
    session_start_safe();
    unset($_SESSION['user_id']);
}

// To get whole url and not just the path
function url()
{
    if (isset($_SERVER['HTTPS'])) {
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    } else {
        $protocol = 'http';
    }
    return $protocol . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}
