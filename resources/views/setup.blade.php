<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<nav class="flex items-center justify-between flex-wrap bg-teal-500 p-6">
    <div class="flex items-center flex-shrink-0 text-white mr-6">
        <img class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54" src="https://laravel.com/img/logomark.min.svg"></img>
        <span class="font-semibold text-xl tracking-tight">LarSurvey + @lang('nav.install')</span>
    </div>
    <a href="https://larsurvey.com" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">@lang('nav.official')</a>
</nav>
<footer class="container mx-auto mt-6">
    <div class="fixed left-0 bottom-0 w-full bg-teal-500 text-align-middle text-center text-sm p-6 text-white">
        <p xmlns:dct="http://purl.org/dc/terms/" xmlns:cc="http://creativecommons.org/ns#" class="license-text"><a rel="cc:attributionURL" href="https://github.com/Dreaming-Codes/LarSurvey/"><span rel="dct:title">LarSurvey</span></a> by <a rel="cc:attributionURL" href="https://rizzotti.eu"><span rel="cc:attributionName">Lorenzo Rizzotti </span></a><a href="https://creativecommons.org/licenses/by-nc-sa/4.0">CC BY-NC-SA 4.0</a>
    </div>
</footer>
<?php
$EnvLang = getenv ('APP_LOCALE');
if (strlen($EnvLang) < 1) {
    langSelect();
} else {
    setup();
};

function langSelect () {
?>
<div class="max-w-sm rounded overflow-hidden shadow-lg m-auto">
    <div class="px-6 py-4">
<form action="<?php if (!empty($_POST)){file_put_contents("../.env",str_replace('APP_LOCALE=' . Lang::locale(),'APP_LOCALE=' . $_POST['lang'],file_get_contents("../.env"))); header("Refresh:0");} ?>" method="post">@csrf
    <label for="dbname">@lang('install.lang')</label><br>
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
        <input class="inline-block bg-gray-200 rounded-full px-4 py-2 text-sm font-semibold text-gray-700 mr-2" style="margin-left: 48%; margin-right: 2px;" type="submit">
    </div>
</form>
</div>
<?php };
function setup () {?>
Qui va il setup quando ho voglia di farlo
<?php };?>
</body>
</html>
