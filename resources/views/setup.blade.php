<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<nav class="flex items-center justify-between flex-wrap bg-teal-500 p-6">
    <div class="flex items-center flex-shrink-0 text-white mr-6">
        <img class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54" src="https://laravel.com/img/logomark.min.svg"></img>
        <span class="font-semibold text-xl tracking-tight">LarSurvey - @lang('nav.install')</span>
    </div>
    <a href="https://larsurvey.com" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">@lang('nav.official')</a>
</nav>
<footer class="container mx-auto mt-6">
    <div class="fixed left-0 bottom-0 w-full bg-teal-500 text-align-middle text-center text-sm p-6 text-white">
        <p xmlns:dct="http://purl.org/dc/terms/" xmlns:cc="http://creativecommons.org/ns#" class="license-text"><a rel="cc:attributionURL" href="https://github.com/Dreaming-Codes/LarSurvey/"><span rel="dct:title">LarSurvey</span></a> by <a rel="cc:attributionURL" href="https://rizzotti.eu"><span rel="cc:attributionName">Lorenzo Rizzotti </span></a><a href="https://creativecommons.org/licenses/by-nc-sa/4.0">CC BY-NC-SA 4.0</a>
    </div>
</footer>
<?php
if (strlen(getenv('APP_LOCALE')) < 1) {
    langSelect();
} else if (strlen(getenv('LAR_SESSION_ID')) < 1) {
    setup_Session();
} else {
    setup_General();
}

function langSelect () {
?>
<div class="max-w-sm rounded overflow-hidden shadow-lg m-auto">
    <div class="px-6 py-4">
<form action="<?php if (!empty($_POST)){file_put_contents("../.env",str_replace('APP_LOCALE=' . Lang::locale(),'APP_LOCALE=' . $_POST['lang'],file_get_contents("../.env"))); header("Refresh:0");} ?>" method="post">@csrf
    <label>@lang('install.lang')</label><br>
    <select name="lang" id="lang">
        <?php $languages = scandir("../resources/lang/"); unset($languages[0]); unset($languages[1]); $languages = array_values($languages); foreach($languages as $lang):?>
            <option value="<?= $lang ?>"><?= $lang ?></option>
        <?php endforeach; ?>
    </select>

    <br>
    <a>@lang('install.translationhelp')</a>
    </div>
    <div class="px-6 py-4">
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#LarSurvey</span>
        <input value="@lang('install.continue')" class="inline-block bg-gray-200 rounded-full px-4 py-2 text-sm font-semibold text-gray-700 mr-2" style="margin-left: 45%; margin-right: 2px;" type="submit">
    </div>
</form>
</div>
<?php };
function setup_Session () {?>
<div role="alert">
    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2 text-center">
        @lang('install.attention')
    </div>
    <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
        <p>@lang('install.attentiondesc')</p>
    </div>
</div>
<div class="max-w-sm rounded overflow-hidden shadow-lg m-auto">
    <div class="px-6 py-4">
        <form action="<?php if (!empty($_POST)){
            file_put_contents("../.env",str_replace('LAR_SESSION_ID=' . getenv('LAR_SESSION_ID'),'LAR_SESSION_ID=' . $_POST['sessionidname'],file_get_contents("../.env"))); header("Refresh:0");
            file_put_contents("../.env",str_replace('LAR_SESSION_NAME=' . getenv('LAR_SESSION_NAME'),'LAR_SESSION_NAME=' . $_POST['sessionnamename'],file_get_contents("../.env"))); header("Refresh:0");
            file_put_contents("../.env",str_replace('LAR_SESSION_MAIL=' . getenv('LAR_SESSION_MAIL'),'LAR_SESSION_MAIL=' . $_POST['sessionmailname'],file_get_contents("../.env"))); header("Refresh:0");
            file_put_contents("../.env",str_replace('LAR_SESSION_USERGRADE=' . getenv('LAR_SESSION_USERGRADE'),'LAR_SESSION_USERGRADE=' . $_POST['sessionusergradename'],file_get_contents("../.env"))); header("Refresh:0");
        } ?>" method="post">@csrf
            <label>@lang('install.session')</label><br><br>
            <label>@lang('install.sessionidname')</label>
            <input name="sessionidname" id="sessionidname" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
            <label>@lang('install.sessionnamename')</label>
            <input name="sessionnamename" id="sessionnamename" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
            <label>@lang('install.sessionmailname')</label>
            <input name="sessionmailname" id="sessionmailname" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
            <label>@lang('install.sessionusergradename')</label>
            <input name="sessionusergradename" id="sessionusergradename" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
    </div>
    <div class="px-6 py-4">
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#LarSurvey</span>
        <input value="@lang('install.continue')" class="inline-block bg-gray-200 rounded-full px-4 py-2 text-sm font-semibold text-gray-700 mr-2" style="margin-left: 45%; margin-right: 2px;" type="submit">
    </div>
    </form>
</div>
<?php };
function setup_General () { ?>
<div class="max-w-sm rounded overflow-hidden shadow-lg m-auto">
    <div class="px-6 py-4">
        <form action="<?php if (!empty($_POST)){
            file_put_contents("../.env",str_replace('LAR_HOME=' . getenv('LAR_HOME'),'LAR_HOME=' . $_POST['homewebsite'],file_get_contents("../.env"))); header("Refresh:0");
        } ?>" method="post">@csrf
            <label>@lang('install.homewebsite')</label><br><br>
            <label>@lang('install.homewebsitelabel')</label>
            <input value="<?= 'https://' . $_SERVER['HTTP_HOST'] ?>" name="homewebsite" id="homewebsite" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
    </div>
    <div class="px-6 py-4">
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#LarSurvey</span>
        <input value="@lang('install.end')" class="inline-block bg-gray-200 rounded-full px-4 py-2 text-sm font-semibold text-gray-700 mr-2" style="margin-left: 45%; margin-right: 2px;" type="submit">
    </div>
    </form>
</div>
<?php }; ?>
</body>
</html>
