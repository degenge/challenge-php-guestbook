<?php

declare(strict_types=1);

$nameFirst = $nameLast = $title = $message = "";

$nameFirstError = $nameLastError = $titleError = $messageError = "";

$errorPrefix       = '<p class="text-red-500 text-xs italic" >';
$errorSuffix       = '</p >';
$errorRequiredText = 'Please fill out this field.';
$isFormValid       = true;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //var_dump($_POST);

    if (!empty($_POST['name-first'])) {
        $nameFirst = sanitizeData($_POST['name-first']);
    } else {
        $isFormValid    = false;
        $nameFirstError = $errorPrefix . $errorRequiredText . $errorSuffix;
    }

    if (!empty($_POST['name-last'])) {
        $nameLast = sanitizeData($_POST['name-last']);
    } else {
        $isFormValid   = false;
        $nameLastError = $errorPrefix . $errorRequiredText . $errorSuffix;
    }

    if (!empty($_POST['title'])) {
        $title = sanitizeData($_POST['title']);
    } else {
        $isFormValid = false;
        $titleError  = $errorPrefix . $errorRequiredText . $errorSuffix;
    }

    if (!empty($_POST['message'])) {
        $message = sanitizeData($_POST['message']);
    } else {
        $isFormValid  = false;
        $messageError = $errorPrefix . $errorRequiredText . $errorSuffix;
    }

    if ($isFormValid) {
        //echo 'Name first: ' . $nameFirst . '<br />';
        //echo 'Name last: ' . $nameLast . '<br />';
        //echo 'Title: ' . $title . '<br />';
        //echo 'Message: ' . $message . '<br />';

        $currentDate = new DateTime("now", new DateTimeZone('Europe/Brussels'));
        //echo $currentDate->format('d-m-Y H:i');

        // TODO: save post to file
        $guestbook = new Guestbook($nameFirst . ' ' . $nameLast, $title, $message, $currentDate->format('d-m-Y H:i'));
        $guestbook->savePost();
        // $guestbook->loadPosts();

        // RESET FORM FIELDS
        $nameFirst = $nameLast = $title = $message = "";
    }

}



$test = Guestbook::getPosts();
foreach ($test as $item){
    var_dump($item);

    echo '<br /><br />';
}

function sanitizeData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
