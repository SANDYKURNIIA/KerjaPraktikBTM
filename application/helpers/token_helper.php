<?php


function get_metadata_success()
{
    $metadata['message'] = "Ok";
    $metadata['code'] = "200";
    return $metadata;
}
function set_api_response($data)
{
    $data['metadata'] = get_metadata_success();
    return $data;
}

function get_token_1($username)
{
    $date = date('dmY');
    $p_token = $date . '--' . $username;
    $c_token = hash("ripemd320", $p_token);
    $c_token = hash("sha512", $c_token);
    $c_token = md5($c_token);
    return $c_token;
}

function hash_pass($plain_text)
{
    $c_token = hash("ripemd320", $plain_text);
    $c_token = hash("sha512", $c_token);
    $c_token = hash("ripemd320", $c_token);
    $c_token = md5($c_token);
    return $c_token;
}
function unhash_pass($plain_text)
{
    $c_token = hash("ripemd320", $plain_text);
    $c_token = hash("sha512", $c_token);
    $c_token = hash("ripemd320", $c_token);
    $c_token = md5($c_token);
    return $c_token;
}

function check_token($token)
{
    $CI = get_instance();
    $CI->load->model('m_Staff', 'sm');
    $user_data = $CI->sm->get_staffbyToken($token);
    if (count($user_data) > 0) {
        $user_data = $user_data[0];
        if ($token == get_token($user_data->username)) {
            return true;
        } else {
            echo "1$token";
            return false;
        }
    } else {
        echo "2$token";
        return false;
    }
}
