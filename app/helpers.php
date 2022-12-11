<?php


function redirect($url): void
{
    header('Location: ' . $url);
    exit();
}

function cleanInput($data): string
{
    $data = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $data);
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

function isCurrentUrl($url = ''): string
{
    if ($_SERVER['REQUEST_URI'] == $url) {
        return true;
    }

    return false;
}

function getUsernameById($id): string
{
    global $db;
    $user = $db->select('users', ['username'], ['id' => $id])[0];

    return $user['username'];
}

function getTradeName($trade): string
{
    switch ($trade) {
        case '1':
            return 'Nạp thẻ';
        case '2':
            return 'Chuyển tiền';
        case '3':
            return 'Nhận tiền';
        case '4':
            return 'Rút tiền';
        case '5':
            return 'Cộng tiền';
        case '6':
            return 'Trừ tiền';
        case '7':
            return 'Hoàn tiền';
        case '8':
            return 'Mua tài khoản game';
        default:
            return 'Không xác định';
    }
}

function getTradeType($trade): ?string
{
    switch ($trade) {
        case '1':
        case '3':
        case '5':
        case '7':
            return 'plus';
        case '2':
        case '4':
        case '6':
        case '8':
            return 'minus';
        default:
            return null;
    }
}

function emailValidate($email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function phoneValidate($phone): bool
{
    return preg_match('/^0\d{9}$/', $phone);
}

function redirectIfNotLoggedIn(): void
{
    global $userClass;

    if (!$userClass->isLoggedIn()) {
        redirect(site_url('login'));
    }
}

function bcrypt($password): string
{
    return password_hash($password, PASSWORD_BCRYPT);
}



function now(): string
{
    return date('Y-m-d H:i:s');
}


function responseJson($data): void
{
    header('Content-Type: application/json');
    echo json_encode($data);
    exit();
}

function asset($path): string
{
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    $path = $protocol . $host . '/' . $path;

    return $path;
}

function categoryName($category_id): string
{
    global $db;

    return $db->select('categories', ['name'], ['id' => $category_id])[0]['name'];
}

function str_limit(string $string, int $limit): string
{
    if (strlen($string) > $limit) {
        $string = substr($string, 0, $limit);
        $string .= '...';
    }

    return $string;
}

function str_random($length = 10): string
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
}

function site_url($path = ''): string
{
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    $path = $protocol . $host . '/' . $path;

    return $path;
}

function selected($value, $selected): string
{
    if ($value == $selected) {
        return 'selected';
    }

    return '';
}
