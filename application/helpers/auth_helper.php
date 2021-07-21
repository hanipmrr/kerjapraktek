<?php

function logged_in()
{
    $ci = get_instance(); //karena diluar mvc ambil dengan get instance
    if ($ci->session->userdata('email')) {
        return true;
    } else {
        return false;
    }
}
