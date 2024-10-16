<?php
function callErrorPage($errorMessage)
{
    $urlErrorPage = "/errorpage?message=$errorMessage";
    header('Location: ' . $urlErrorPage, true);
    exit();
}

function callLoginPage($errorMessage)
{
    $urlLoginPage = "/auth/userlogin?message=$errorMessage";
    header('Location: ' . $urlLoginPage, true);
    exit();
}

function callResetPasswordPage($id)
{
    $urlLoginPage = "/auth/changePasswordForm?id=$id";
    header('Location: ' . $urlLoginPage, true);
    exit();
}