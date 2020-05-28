<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<nav class="flex items-center justify-between flex-wrap bg-teal-500 p-6">
    <div class="flex items-center flex-shrink-0 text-white mr-6">
        <img class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54" src="https://laravel.com/img/logomark.min.svg"></img>
        <span class="font-semibold text-xl tracking-tight">LarSurvey</span>
    </div>
    <div class="block lg:hidden">
        <button class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
        </button>
    </div>
    <a href="https://larsurvey.com" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">Official website</a>
    </div>
    </div>
</nav>
<footer class="container mx-auto mt-6">
    <div class="fixed left-0 bottom-0 w-full bg-teal-500 text-align-middle text-center text-sm p-6 text-white">
        <p xmlns:dct="http://purl.org/dc/terms/" xmlns:cc="http://creativecommons.org/ns#" class="license-text"><a rel="cc:attributionURL" href="https://github.com/Dreaming-Codes/LarSurvey/"><span rel="dct:title">LarSurvey</span></a> by <a rel="cc:attributionURL" href="https://rizzotti.eu"><span rel="cc:attributionName">Lorenzo Rizzotti </span></a>CC BY-NC-SA 4.0<a href="https://creativecommons.org/licenses/by-nc-sa/4.0">
    </div>
</footer>


</body>
</html>
