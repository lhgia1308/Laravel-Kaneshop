//Fix error font dompdf
php load_font.php "Times New Roman" G:/Sources/Laravel/fonts/times.ttf G:/Sources/Laravel/fonts/timesbd.ttf G:/Sources/Laravel/fonts/timesi.ttf G:/Sources/Laravel/fonts/timesbi.ttf
// INITIALIZATION OF SELECT2
// =======================================================
$('.js-select2-custom').each(function () {
    var select2 = $.HSCore.components.HSSelect2.init($(this));
});

<select class="form-control 1111" name="code">
    @foreach(\Illuminate\Support\Facades\File::files(base_path('public/assets/front-end/img/flags')) as $path)
        @if(pathinfo($path)['filename'] !='en')
            <option value="{{ pathinfo($path)['filename'] }}"
                    data-flag="{{ asset('public/assets/front-end/img/flags/'.pathinfo($path)['filename'].'.png') }}">
                {{ strtoupper(pathinfo($path)['filename']) }}
            </option>
        @endif
    @endforeach
</select>

<select name="language[]" id="language" onchange="$('#alert_box').show();"
        data-maximum-selection-length="3" class="form-control js-select2-custom"
        required multiple=true>
    <option value="en" {{in_array('en',$language)?'selected':''}}>English (en)(default)</option>
    <option value="af" {{in_array('af',$language)?'selected':''}}>Afrikaans (af)</option>
    <option value="sq" {{in_array('sq',$language)?'selected':''}}>Albanian (sq) - shqip</option>
    <option value="am" {{in_array('am',$language)?'selected':''}}>Amharic (am) - አማርኛ</option>
    <option value="ar" {{in_array('ar',$language)?'selected':''}}>Arabic (ar) - العربية</option>
    <option value="an" {{in_array('an',$language)?'selected':''}}>Aragonese (an) - aragonés</option>
    <option value="hy" {{in_array('hy',$language)?'selected':''}}>Armenian (hy) - հայերեն</option>
    <option value="ast" {{in_array('ast',$language)?'selected':''}}>Asturian (ast) - asturianu</option>
    <option value="az" {{in_array('az',$language)?'selected':''}}>Azerbaijani (az) - azərbaycan dili</option>
    <option value="eu" {{in_array('eu',$language)?'selected':''}}>Basque (eu) - euskara</option>
    <option value="be" {{in_array('be',$language)?'selected':''}}>Belarusian (be) - беларуская</option>
    <option value="bn" {{in_array('bn',$language)?'selected':''}}>Bengali (bn) - বাংলা</option>
    <option value="bs" {{in_array('bs',$language)?'selected':''}}>Bosnian (bs) - bosanski</option>
    <option value="br" {{in_array('br',$language)?'selected':''}}>Breton (br) - brezhoneg</option>
    <option value="bg" {{in_array('bg',$language)?'selected':''}}>Bulgarian (bg) - български</option>
    <option value="ca" {{in_array('ca',$language)?'selected':''}}>Catalan (ca) - català</option>
    <option value="ckb" {{in_array('ckb',$language)?'selected':''}}>Central Kurdish (ckb) - کوردی (دەستنوسی عەرەبی)</option>
    <option value="zh" {{in_array('zh',$language)?'selected':''}}>Chinese (zh) - 中文</option>
    <option value="zh-HK" {{in_array('zh-HK',$language)?'selected':''}}>Chinese (Hong Kong) (zh-HK) - 中文（香港）</option>
    <option value="zh-CN" {{in_array('zh-CN',$language)?'selected':''}}>Chinese (Simplified) (zh-CN) - 中文（简体）</option>
    <option value="zh-TW" {{in_array('zh-TW',$language)?'selected':''}}>Chinese (Traditional) (zh-TW) - 中文（繁體）</option>
    <option value="co" {{in_array('co',$language)?'selected':''}}>Corsican (co)</option>
    <option value="hr" {{in_array('hr',$language)?'selected':''}}>Croatian (hr) - hrvatski</option>
    <option value="cs" {{in_array('cs',$language)?'selected':''}}>Czech (cs) - čeština</option>
    <option value="da" {{in_array('da',$language)?'selected':''}}>Danish (da)- dansk</option>
    <option value="nl" {{in_array('nl',$language)?'selected':''}}>Dutch (nl) - Nederlands</option>
    <option value="en-AU" {{in_array('en-AU',$language)?'selected':''}}>English (en-AU) (Australia)</option>
    <option value="en-CA" {{in_array('en-CA',$language)?'selected':''}}>English (en-CA) (Canada)</option>
    <option value="en-IN" {{in_array('en-IN',$language)?'selected':''}}>English (en-IN) (India)</option>
    <option value="en-NZ" {{in_array('en-NZ',$language)?'selected':''}}>English (en-NZ) (New Zealand)</option>
    <option value="en-ZA" {{in_array('en-ZA',$language)?'selected':''}}>English (en-ZA) (South Africa)</option>
    <option value="en-GB" {{in_array('en-GB',$language)?'selected':''}}>English (en-GB) (United Kingdom)</option>
    <option value="en-US" {{in_array('en-US',$language)?'selected':''}}>English (en-US) (United States)</option>
    <option value="eo" {{in_array('eo',$language)?'selected':''}}>Esperanto (eo) - esperanto</option>
    <option value="et" {{in_array('et',$language)?'selected':''}}>Estonian (et) - eesti</option>
    <option value="fo" {{in_array('fo',$language)?'selected':''}}>Faroese (fo) - føroyskt</option>
    <option value="fil" {{in_array('fil',$language)?'selected':''}}>Filipino (fil)</option>
    <option value="fi" {{in_array('fi',$language)?'selected':''}}>Finnish (fi) - suomi</option>
    <option value="fr" {{in_array('fr',$language)?'selected':''}}>French (fr) - français</option>
    <option value="fr-CA" {{in_array('fr-CA',$language)?'selected':''}}>French (Canada) (fr-CA) - français (Canada)</option>
    <option value="fr-FR" {{in_array('fr-FR',$language)?'selected':''}}>French (France) (fr-FR) - français (France)</option>
    <option value="fr-CH" {{in_array('fr-CH',$language)?'selected':''}}>French (Switzerland) (fr-CH) - français (Suisse)</option>
    <option value="gl" {{in_array('gl',$language)?'selected':''}}>Galician (gl) - galego</option>
    <option value="ka" {{in_array('ka',$language)?'selected':''}}>Georgian (ka) - ქართული</option>
    <option value="de" {{in_array('de',$language)?'selected':''}}>German (de) - Deutsch</option>
    <option value="de-AT" {{in_array('de-AT',$language)?'selected':''}}>German (Austria) (de-AT) - Deutsch (Österreich)</option>
    <option value="de-DE" {{in_array('de-DE',$language)?'selected':''}}>German (Germany) (de-DE) - Deutsch (Deutschland)</option>
    <option value="de-LI" {{in_array('de-LI',$language)?'selected':''}}>German (Liechtenstein) (de-LI)- Deutsch (Liechtenstein)</option>
    <option value="de-CH" {{in_array('de-CH',$language)?'selected':''}}>German (Switzerland) (de-CH) - Deutsch (Schweiz)</option>
    <option value="el" {{in_array('el',$language)?'selected':''}}>Greek (el) - Ελληνικά</option>
    <option value="gn" {{in_array('gn',$language)?'selected':''}}>Guarani (gn)</option>
    <option value="gu" {{in_array('gu',$language)?'selected':''}}>Gujarati (gu) - ગુજરાતી</option>
    <option value="ha" {{in_array('ha',$language)?'selected':''}}>Hausa (ha)</option>
    <option value="haw" {{in_array('haw',$language)?'selected':''}}>Hawaiian (haw) - ʻŌlelo Hawaiʻi</option>
    <option value="he" {{in_array('he',$language)?'selected':''}}>Hebrew (he) - עברית</option>
    <option value="hi" {{in_array('hi',$language)?'selected':''}}>Hindi (hi) - हिन्दी</option>
    <option value="hu" {{in_array('hu',$language)?'selected':''}}>Hungarian (hu) - magyar</option>
    <option value="is" {{in_array('is',$language)?'selected':''}}>Icelandic (is) - íslenska</option>
    <option value="id" {{in_array('id',$language)?'selected':''}}>Indonesian (id) - Indonesia</option>
    <option value="ia" {{in_array('ia',$language)?'selected':''}}>Interlingua (ia)</option>
    <option value="ga" {{in_array('ga',$language)?'selected':''}}>Irish (ga) - Gaeilge</option>
    <option value="it" {{in_array('it',$language)?'selected':''}}>Italian - italiano</option>
    <option value="it-IT" {{in_array('it-IT',$language)?'selected':''}}>Italian (Italy) - italiano (Italia)</option>
    <option value="it-CH" {{in_array('it-CH',$language)?'selected':''}}>Italian (Switzerland) - italiano (Svizzera)</option>
    <option value="ja" {{in_array('ja',$language)?'selected':''}}>Japanese - 日本語</option>
    <option value="kn" {{in_array('kn',$language)?'selected':''}}>Kannada - ಕನ್ನಡ</option>
    <option value="kk" {{in_array('kk',$language)?'selected':''}}>Kazakh - қазақ тілі</option>
    <option value="km" {{in_array('km',$language)?'selected':''}}>Khmer - ខ្មែរ</option>
    <option value="ko" {{in_array('ko',$language)?'selected':''}}>Korean - 한국어</option>
    <option value="ku" {{in_array('ku',$language)?'selected':''}}>Kurdish - Kurdî</option>
    <option value="ky" {{in_array('ky',$language)?'selected':''}}>Kyrgyz - кыргызча</option>
    <option value="lo" {{in_array('lo',$language)?'selected':''}}>Lao - ລາວ</option>
    <option value="la" {{in_array('la',$language)?'selected':''}}>Latin</option>
    <option value="lv" {{in_array('lv',$language)?'selected':''}}>Latvian - latviešu</option>
    <option value="ln" {{in_array('ln',$language)?'selected':''}}>Lingala - lingála</option>
    <option value="lt" {{in_array('lt',$language)?'selected':''}}>Lithuanian - lietuvių</option>
    <option value="mk" {{in_array('mk',$language)?'selected':''}}>Macedonian - македонски</option>
    <option value="ms" {{in_array('ms',$language)?'selected':''}}>Malay - Bahasa Melayu</option>
    <option value="ml" {{in_array('ml',$language)?'selected':''}}>Malayalam - മലയാളം</option>
    <option value="mt" {{in_array('mt',$language)?'selected':''}}>Maltese - Malti</option>
    <option value="mr" {{in_array('mr',$language)?'selected':''}}>Marathi - मराठी</option>
    <option value="mn" {{in_array('mn',$language)?'selected':''}}>Mongolian - монгол</option>
    <option value="ne" {{in_array('ne',$language)?'selected':''}}>Nepali - नेपाली</option>
    <option value="no" {{in_array('no',$language)?'selected':''}}>Norwegian - norsk</option>
    <option value="nb" {{in_array('nb',$language)?'selected':''}}>Norwegian Bokmål - norsk bokmål</option>
    <option value="nn" {{in_array('nn',$language)?'selected':''}}>Norwegian Nynorsk - nynorsk</option>
    <option value="oc" {{in_array('oc',$language)?'selected':''}}>Occitan</option>
    <option value="or" {{in_array('or',$language)?'selected':''}}>Oriya - ଓଡ଼ିଆ</option>
    <option value="om" {{in_array('om',$language)?'selected':''}}>Oromo - Oromoo</option>
    <option value="ps" {{in_array('ps',$language)?'selected':''}}>Pashto - پښتو</option>
    <option value="fa" {{in_array('fa',$language)?'selected':''}}>Persian - فارسی</option>
    <option value="pl" {{in_array('pl',$language)?'selected':''}}>Polish - polski</option>
    <option value="pt" {{in_array('pt',$language)?'selected':''}}>Portuguese - português</option>
    <option value="pt-BR" {{in_array('pt-BR',$language)?'selected':''}}>Portuguese (Brazil) - português (Brasil)</option>
    <option value="pt-PT" {{in_array('pt-PT',$language)?'selected':''}}>Portuguese (Portugal) - português (Portugal)</option>
    <option value="pa" {{in_array('pa',$language)?'selected':''}}>Punjabi - ਪੰਜਾਬੀ</option>
    <option value="qu" {{in_array('qu',$language)?'selected':''}}>Quechua</option>
    <option value="ro" {{in_array('ro',$language)?'selected':''}}>Romanian - română</option>
    <option value="mo" {{in_array('mo',$language)?'selected':''}}>Romanian (Moldova) - română (Moldova)</option>
    <option value="rm" {{in_array('rm',$language)?'selected':''}}>Romansh - rumantsch</option>
    <option value="ru" {{in_array('ru',$language)?'selected':''}}>Russian - русский</option>
    <option value="gd" {{in_array('gd',$language)?'selected':''}}>Scottish Gaelic</option>
    <option value="sr" {{in_array('sr',$language)?'selected':''}}>Serbian - српски</option>
    <option value="sh" {{in_array('sh',$language)?'selected':''}}>Serbo-Croatian - Srpskohrvatski</option>
    <option value="sn" {{in_array('sn',$language)?'selected':''}}>Shona - chiShona</option>
    <option value="sd" {{in_array('sd',$language)?'selected':''}}>Sindhi</option>
    <option value="si" {{in_array('si',$language)?'selected':''}}>Sinhala - සිංහල</option>
    <option value="sk" {{in_array('sk',$language)?'selected':''}}>Slovak - slovenčina</option>
    <option value="sl" {{in_array('sl',$language)?'selected':''}}>Slovenian - slovenščina</option>
    <option value="so" {{in_array('so',$language)?'selected':''}}>Somali - Soomaali</option>
    <option value="st" {{in_array('st',$language)?'selected':''}}>Southern Sotho</option>
    <option value="es"{{in_array('es',$language)?'selected':''}}>Spanish - español</option>
    <option value="es-AR" {{in_array('en-AR',$language)?'selected':''}}>Spanish (Argentina) - español (Argentina)</option>
    <option value="es-419" {{in_array('en-419',$language)?'selected':''}}>Spanish (Latin America) - español (Latinoamérica)</option>
    <option value="es-MX" {{in_array('en-MX',$language)?'selected':''}}>Spanish (Mexico) - español (México)</option>
    <option value="es-ES" {{in_array('en-ES',$language)?'selected':''}}>Spanish (Spain) - español (España)</option>
    <option value="es-US" {{in_array('en-US',$language)?'selected':''}}>Spanish (United States) - español (Estados Unidos)</option>
    <option value="su" {{in_array('su',$language)?'selected':''}}>Sundanese</option>
    <option value="sw" {{in_array('sw',$language)?'selected':''}}>Swahili - Kiswahili</option>
    <option value="sv" {{in_array('sv',$language)?'selected':''}}>Swedish - svenska</option>
    <option value="tg" {{in_array('tg',$language)?'selected':''}}>Tajik - тоҷикӣ</option>
    <option value="ta" {{in_array('ta',$language)?'selected':''}}>Tamil - தமிழ்</option>
    <option value="tt" {{in_array('tt',$language)?'selected':''}}>Tatar</option>
    <option value="te" {{in_array('te',$language)?'selected':''}}>Telugu - తెలుగు</option>
    <option value="th" {{in_array('th',$language)?'selected':''}}>Thai - ไทย</option>
    <option value="ti" {{in_array('ti',$language)?'selected':''}}>Tigrinya - ትግርኛ</option>
    <option value="to" {{in_array('to',$language)?'selected':''}}>Tongan - lea fakatonga</option>
    <option value="tr" {{in_array('tr',$language)?'selected':''}}>Turkish - Türkçe</option>
    <option value="tk" {{in_array('tk',$language)?'selected':''}}>Turkmen</option>
    <option value="tw" {{in_array('tw',$language)?'selected':''}}>Twi</option>
    <option value="uk" {{in_array('uk',$language)?'selected':''}}>Ukrainian - українська</option>
    <option value="ur" {{in_array('ur',$language)?'selected':''}}>Urdu - اردو</option>
    <option value="ug" {{in_array('ug',$language)?'selected':''}}>Uyghur</option>
    <option value="uz" {{in_array('uz',$language)?'selected':''}}>Uzbek - o‘zbek</option>
    <option value="vn" {{in_array('vn',$language)?'selected':''}}>Vietnamese - Tiếng Việt</option>
    <option value="wa" {{in_array('wa',$language)?'selected':''}}>Walloon - wa</option>
    <option value="cy" {{in_array('cy',$language)?'selected':''}}>Welsh - Cymraeg</option>
    <option value="fy" {{in_array('fy',$language)?'selected':''}}>Western Frisian</option>
    <option value="xh" {{in_array('xh',$language)?'selected':''}}>Xhosa</option>
    <option value="yi" {{in_array('yi',$language)?'selected':''}}>Yiddish</option>
    <option value="yo" {{in_array('yo',$language)?'selected':''}}>Yoruba - Èdè Yorùbá</option>
    <option value="zu" {{in_array('zu',$language)?'selected':''}}>Zulu - isiZulu</option>
</select>

