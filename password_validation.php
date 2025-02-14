<?php

function checkLength($password)
{
    if (strlen($password) >= 8) {
        return true;
    } else {
        return false;
    }
}

function checkUpper($password)
{
    for ($i = 0; $i < strlen($password); $i++) {
        if (ctype_upper($password[$i])) {
            return true;
        }
    }
    return false;
}

function checkNumber($password)
{
    for ($i = 0; $i < strlen($password); $i++) {
        if (is_numeric($password[$i])) {
            return true;
        }
    }
    return false;
}


function checkChars($string)
{
    if (!ctype_alnum($string)) {
        return true;
    }
    return false;
}

function checkPasswordValidation($string)
{
    return checkLength($string) && checkUpper($string) && checkNumber($string) && checkChars($string);
}
