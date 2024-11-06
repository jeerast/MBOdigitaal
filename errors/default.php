<?php
function callErrorPage($errorMessage)
{
    $urlErrorPage = "/errorpage?message=$errorMessage";
    header('Location: ' . $urlErrorPage, true);
    exit();
}

function callLoginPage($errorMessage)
{
    // go back to previous page
    $urlLoginPage = "http://localhost:8000/";
    // $urlLoginPage = "/admin/auth/login?message=$errorMessage";
    header('Location: ' . $urlLoginPage, true);
    exit();
}

function callResetPasswordPage($id)
{
    $urlLoginPage = "/auth/changePasswordForm?id=$id";
    header('Location: ' . $urlLoginPage, true);
    exit();
}