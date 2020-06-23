<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
                <?php
                function url_get_contents($url, $useragent='cURL', $headers=false, $follow_redirects=true, $debug=false) {
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL,$url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
                    curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    if ($headers==true){
                        curl_setopt($ch, CURLOPT_HEADER,1);
                    }
                    if ($headers=='headers only') {
                        curl_setopt($ch, CURLOPT_NOBODY ,1);
                    }
                    if ($follow_redirects==true) {
                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                    }
                    if ($debug==true) {
                        $result['contents']=curl_exec($ch);
                        $result['info']=curl_getinfo($ch);
                    }
                    else $result=curl_exec($ch);
                    curl_close($ch);
                    return $result;
                }

                $surveyjsreleaseslink = url_get_contents("https://api.github.com/repos/surveyjs/survey-creator/tags");
                $surveyjsreleasesjson = json_decode($surveyjsreleaseslink);
                $version = str_replace('v', '', $surveyjsreleasesjson[0]->name);
                ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.4.0/knockout-min.js"></script>

    <link href="https://surveyjs.azureedge.net/<?=$version ?>/survey-creator.css" type="text/css" rel="stylesheet" />
    <script src="https://surveyjs.azureedge.net/<?=$version ?>/survey.ko.min.js"></script>
    <script src="https://surveyjs.azureedge.net/<?=$version ?>/survey-creator.min.js"></script>

</head>
<body>
<nav class="flex items-center justify-between flex-wrap bg-teal-500 p-6">
    <div class="flex items-center flex-shrink-0 text-white mr-6">
        <img class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54" src="https://laravel.com/img/logomark.min.svg"></img>
        <span class="font-semibold text-xl tracking-tight">LarSurvey - @lang('nav.formbuilder')</span>
    </div>
    <a href="https://larsurvey.com" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">@lang('nav.official')</a>
</nav>
<div role="alert">
    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2 text-center">
        @lang('formcreator.attention')
    </div>
    <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
        <p>@lang('formcreator.attentiondesc')</p> <a href="https://paypal.me/pools/c/8q8qGDVlOB" target="_blank">https://www.paypal.com/pools/c/8q8qGDVlOB</a>
    </div>
</div>
<div id="surveyCreatorContainer"></div>
<script>
    var options = {
        showEmbededSurveyTab : false,
        showTestSurveyTab : true,
        showJSONEditorTab : false,
        showTranslationEditorTab : false,
        showOptions: false
    };
    var surveyCreator = new SurveyCreator.SurveyCreator("surveyCreatorContainer", options);
    surveyCreator.saveSurveyFunc = saveMySurvey;
    function saveMySurvey(){
        var yourNewSurveyJSON = surveyCreator.text;
    };
    var elements = document.getElementsByClassName('svd_commercial_container');
    while(elements.length > 0){
        elements[0].parentNode.removeChild(elements[0]);
    };
</script>
<footer class="container mx-auto mt-6">
    <div class="fixed left-0 bottom-0 w-full bg-teal-500 text-align-middle text-center text-sm p-6 text-white">
        <p xmlns:dct="http://purl.org/dc/terms/" xmlns:cc="http://creativecommons.org/ns#" class="license-text"><a rel="cc:attributionURL" href="https://github.com/Dreaming-Codes/LarSurvey/"><span rel="dct:title">LarSurvey</span></a> by <a rel="cc:attributionURL" href="https://rizzotti.eu"><span rel="cc:attributionName">Lorenzo Rizzotti </span></a><a href="https://creativecommons.org/licenses/by-nc-sa/4.0">CC BY-NC-SA 4.0</a>
    </div>
</footer>
</body>
</html>
