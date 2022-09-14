<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset("vendor/scribe/css/style.css") }}" media="screen" />
        <link rel="stylesheet" href="{{ asset("vendor/scribe/css/print.css") }}" media="print" />
        <script src="{{ asset("vendor/scribe/js/all.js") }}"></script>

        <link rel="stylesheet" href="{{ asset("vendor/scribe/css/highlight-darcula.css") }}" media="" />
        <script src="{{ asset("vendor/scribe/js/highlight.pack.js") }}"></script>
    <script>hljs.initHighlightingOnLoad();</script>

</head>

<body class="" data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">
<a href="#" id="nav-button">
      <span>
        NAV
            <img src="{{ asset("vendor/scribe/images/navbar.png") }}" alt="-image" class=""/>
      </span>
</a>
<div class="tocify-wrapper">
                <div class="lang-selector">
                            <a href="#" data-language-name="bash">bash</a>
                            <a href="#" data-language-name="javascript">javascript</a>
                    </div>
        <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>
    <ul class="search-results"></ul>

    <ul id="toc">
    </ul>

            <ul class="toc-footer" id="toc-footer">
                            <li><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li><a href="{{ route("scribe.openapi") }}">View OpenAPI (Swagger) spec</a></li>
                            <li><a href='http://github.com/knuckleswtf/scribe'>Documentation powered by Scribe ✍</a></li>
                    </ul>
            <ul class="toc-footer" id="last-updated">
            <li>Last updated: May 20 2021</li>
        </ul>
</div>
<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1>Introduction</h1>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>
<script>
    var baseUrl = "http://localhost:8080";
</script>
<script src="{{ asset("vendor/scribe/js/tryitout-2.5.3.js") }}"></script>
<blockquote>
<p>Base URL</p>
</blockquote>
<pre><code class="language-yaml">http://localhost:8080</code></pre><h1>Authenticating requests</h1>
<p>This API is not authenticated.</p><h1>Auth</h1>
<h2>顧客担当者ログイン</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8080/api/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"rickey.schiller@example.com","password":"rem"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "rickey.schiller@example.com",
    "password": "rem"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "認証情報が正しくありません"
}</code></pre>
<div id="execution-results-POSTapi-login" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-login"></code></pre>
</div>
<div id="execution-error-POSTapi-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-login"></code></pre>
</div>
<form id="form-POSTapi-login" data-method="POST" data-path="api/login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-login" onclick="tryItOut('POSTapi-login');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-login" onclick="cancelTryOut('POSTapi-login');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-login" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/login</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-login" data-component="body" required  hidden>
<br>
valueは、有効なメールアドレス形式で指定してください。.
</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password" data-endpoint="POSTapi-login" data-component="body" required  hidden>
<br>

</p>

</form><h1>Endpoints</h1>
<h2>Return an empty response simply to trigger the storage of the CSRF cookie in the browser.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/sanctum/csrf-cookie" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/sanctum/csrf-cookie"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<div id="execution-results-GETsanctum-csrf-cookie" hidden>
    <blockquote>Received response<span id="execution-response-status-GETsanctum-csrf-cookie"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETsanctum-csrf-cookie"></code></pre>
</div>
<div id="execution-error-GETsanctum-csrf-cookie" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETsanctum-csrf-cookie"></code></pre>
</div>
<form id="form-GETsanctum-csrf-cookie" data-method="GET" data-path="sanctum/csrf-cookie" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETsanctum-csrf-cookie', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETsanctum-csrf-cookie" onclick="tryItOut('GETsanctum-csrf-cookie');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETsanctum-csrf-cookie" onclick="cancelTryOut('GETsanctum-csrf-cookie');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETsanctum-csrf-cookie" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>sanctum/csrf-cookie</code></b>
</p>
</form>
<h2>api/users/{user_id}/logout</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8080/api/users/architecto/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/users/architecto/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Argument 1 passed to App\\Http\\Controllers\\Api\\AuthController::logout() must be of the type int, string given, called in \/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Controller.php on line 54",
    "exception": "TypeError",
    "file": "\/var\/www\/hasegawa_koryo\/app\/Http\/Controllers\/Api\/AuthController.php",
    "line": 29,
    "trace": [
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Controller.php",
            "line": 54,
            "function": "logout",
            "class": "App\\Http\\Controllers\\Api\\AuthController",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/ControllerDispatcher.php",
            "line": 45,
            "function": "callAction",
            "class": "Illuminate\\Routing\\Controller",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Route.php",
            "line": 254,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\ControllerDispatcher",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Route.php",
            "line": 197,
            "function": "runController",
            "class": "Illuminate\\Routing\\Route",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 693,
            "function": "run",
            "class": "Illuminate\\Routing\\Route",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Router",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Middleware\/SubstituteBindings.php",
            "line": 50,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Middleware\/ThrottleRequests.php",
            "line": 127,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Middleware\/ThrottleRequests.php",
            "line": 103,
            "function": "handleRequest",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Middleware\/ThrottleRequests.php",
            "line": 55,
            "function": "handleRequestUsingNamedLimiter",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 695,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 670,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 636,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php",
            "line": 625,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/PreventRequestsDuringMaintenance.php",
            "line": 86,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/fruitcake\/laravel-cors\/src\/HandleCors.php",
            "line": 52,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fruitcake\\Cors\\HandleCors",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/fideloper\/proxy\/src\/TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 324,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 236,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 172,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/knuckleswtf\/scribe\/src\/Extracting\/Generator.php",
            "line": 127,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 119,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/knuckleswtf\/scribe\/src\/Commands\/GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 36,
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 93,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php",
            "line": 37,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php",
            "line": 610,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/symfony\/console\/Command\/Command.php",
            "line": 256,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/symfony\/console\/Application.php",
            "line": 971,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/symfony\/console\/Application.php",
            "line": 290,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/symfony\/console\/Application.php",
            "line": 166,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php",
            "line": 92,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "-&gt;"
        },
        {
            "file": "\/var\/www\/hasegawa_koryo\/artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "-&gt;"
        }
    ]
}</code></pre>
<div id="execution-results-POSTapi-users--user_id--logout" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-users--user_id--logout"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-users--user_id--logout"></code></pre>
</div>
<div id="execution-error-POSTapi-users--user_id--logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-users--user_id--logout"></code></pre>
</div>
<form id="form-POSTapi-users--user_id--logout" data-method="POST" data-path="api/users/{user_id}/logout" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-users--user_id--logout', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-users--user_id--logout" onclick="tryItOut('POSTapi-users--user_id--logout');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-users--user_id--logout" onclick="cancelTryOut('POSTapi-users--user_id--logout');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-users--user_id--logout" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/users/{user_id}/logout</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>user_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user_id" data-endpoint="POSTapi-users--user_id--logout" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/admin/login</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8080/api/admin/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"gorczany.meggie@example.org","password":"eos"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/admin/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "gorczany.meggie@example.org",
    "password": "eos"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "認証情報が正しくありません"
}</code></pre>
<div id="execution-results-POSTapi-admin-login" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-admin-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-admin-login"></code></pre>
</div>
<div id="execution-error-POSTapi-admin-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-admin-login"></code></pre>
</div>
<form id="form-POSTapi-admin-login" data-method="POST" data-path="api/admin/login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-admin-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-admin-login" onclick="tryItOut('POSTapi-admin-login');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-admin-login" onclick="cancelTryOut('POSTapi-admin-login');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-admin-login" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/admin/login</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-admin-login" data-component="body" required  hidden>
<br>
valueは、有効なメールアドレス形式で指定してください。.
</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password" data-endpoint="POSTapi-admin-login" data-component="body" required  hidden>
<br>

</p>

</form>
<h2>api/login/user</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/login/user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/login/user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
{
 "success": true,
}</code></pre>
<div id="execution-results-GETapi-login-user" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-login-user"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-login-user"></code></pre>
</div>
<div id="execution-error-GETapi-login-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-login-user"></code></pre>
</div>
<form id="form-GETapi-login-user" data-method="GET" data-path="api/login/user" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-login-user', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-login-user" onclick="tryItOut('GETapi-login-user');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-login-user" onclick="cancelTryOut('GETapi-login-user');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-login-user" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/login/user</code></b>
</p>
<p>
<label id="auth-GETapi-login-user" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-login-user" data-component="header"></label>
</p>
</form>
<h2>api/users/{id}/admin</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/users/at/admin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/users/at/admin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-users--id--admin" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-users--id--admin"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users--id--admin"></code></pre>
</div>
<div id="execution-error-GETapi-users--id--admin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users--id--admin"></code></pre>
</div>
<form id="form-GETapi-users--id--admin" data-method="GET" data-path="api/users/{id}/admin" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-users--id--admin', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-users--id--admin" onclick="tryItOut('GETapi-users--id--admin');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-users--id--admin" onclick="cancelTryOut('GETapi-users--id--admin');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-users--id--admin" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/users/{id}/admin</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-users--id--admin" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/users/admin</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8080/api/users/admin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"corrupti","email":"bethel95@example.org","role_type":18,"created_user_id":16,"updated_user_id":2}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/users/admin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "corrupti",
    "email": "bethel95@example.org",
    "role_type": 18,
    "created_user_id": 16,
    "updated_user_id": 2
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-POSTapi-users-admin" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-users-admin"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-users-admin"></code></pre>
</div>
<div id="execution-error-POSTapi-users-admin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-users-admin"></code></pre>
</div>
<form id="form-POSTapi-users-admin" data-method="POST" data-path="api/users/admin" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-users-admin', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-users-admin" onclick="tryItOut('POSTapi-users-admin');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-users-admin" onclick="cancelTryOut('POSTapi-users-admin');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-users-admin" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/users/admin</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-users-admin" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-users-admin" data-component="body" required  hidden>
<br>
valueは、有効なメールアドレス形式で指定してください。.
</p>
<p>
<b><code>role_type</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="role_type" data-endpoint="POSTapi-users-admin" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>created_user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="created_user_id" data-endpoint="POSTapi-users-admin" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>updated_user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="updated_user_id" data-endpoint="POSTapi-users-admin" data-component="body"  hidden>
<br>

</p>

</form>
<h2>api/users/{id}/admin/edit</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/users/illo/admin/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/users/illo/admin/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-users--id--admin-edit" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-users--id--admin-edit"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users--id--admin-edit"></code></pre>
</div>
<div id="execution-error-GETapi-users--id--admin-edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users--id--admin-edit"></code></pre>
</div>
<form id="form-GETapi-users--id--admin-edit" data-method="GET" data-path="api/users/{id}/admin/edit" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-users--id--admin-edit', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-users--id--admin-edit" onclick="tryItOut('GETapi-users--id--admin-edit');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-users--id--admin-edit" onclick="cancelTryOut('GETapi-users--id--admin-edit');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-users--id--admin-edit" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/users/{id}/admin/edit</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-users--id--admin-edit" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/users/{id}/admin</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PATCH \
    "http://localhost:8080/api/users/distinctio/admin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"rerum","email":"selena04@example.net","role_type":19,"created_user_id":10,"updated_user_id":9}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/users/distinctio/admin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "rerum",
    "email": "selena04@example.net",
    "role_type": 19,
    "created_user_id": 10,
    "updated_user_id": 9
}

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<div id="execution-results-PATCHapi-users--id--admin" hidden>
    <blockquote>Received response<span id="execution-response-status-PATCHapi-users--id--admin"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-users--id--admin"></code></pre>
</div>
<div id="execution-error-PATCHapi-users--id--admin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-users--id--admin"></code></pre>
</div>
<form id="form-PATCHapi-users--id--admin" data-method="PATCH" data-path="api/users/{id}/admin" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PATCHapi-users--id--admin', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PATCHapi-users--id--admin" onclick="tryItOut('PATCHapi-users--id--admin');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PATCHapi-users--id--admin" onclick="cancelTryOut('PATCHapi-users--id--admin');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PATCHapi-users--id--admin" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/users/{id}/admin</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="PATCHapi-users--id--admin" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="PATCHapi-users--id--admin" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="PATCHapi-users--id--admin" data-component="body" required  hidden>
<br>
valueは、有効なメールアドレス形式で指定してください。.
</p>
<p>
<b><code>role_type</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="role_type" data-endpoint="PATCHapi-users--id--admin" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>created_user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="created_user_id" data-endpoint="PATCHapi-users--id--admin" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>updated_user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="updated_user_id" data-endpoint="PATCHapi-users--id--admin" data-component="body"  hidden>
<br>

</p>

</form>
<h2>api/users/{id}/admin</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://localhost:8080/api/users/dolorem/admin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/users/dolorem/admin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-DELETEapi-users--id--admin" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-users--id--admin"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-users--id--admin"></code></pre>
</div>
<div id="execution-error-DELETEapi-users--id--admin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-users--id--admin"></code></pre>
</div>
<form id="form-DELETEapi-users--id--admin" data-method="DELETE" data-path="api/users/{id}/admin" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-users--id--admin', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-users--id--admin" onclick="tryItOut('DELETEapi-users--id--admin');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-users--id--admin" onclick="cancelTryOut('DELETEapi-users--id--admin');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-users--id--admin" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/users/{id}/admin</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="DELETEapi-users--id--admin" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/users</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-users" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-users"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users"></code></pre>
</div>
<div id="execution-error-GETapi-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users"></code></pre>
</div>
<form id="form-GETapi-users" data-method="GET" data-path="api/users" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-users', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-users" onclick="tryItOut('GETapi-users');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-users" onclick="cancelTryOut('GETapi-users');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-users" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/users</code></b>
</p>
</form>
<h2>api/users/{user}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/users/qui" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/users/qui"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-users--user-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-users--user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users--user-"></code></pre>
</div>
<div id="execution-error-GETapi-users--user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users--user-"></code></pre>
</div>
<form id="form-GETapi-users--user-" data-method="GET" data-path="api/users/{user}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-users--user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-users--user-" onclick="tryItOut('GETapi-users--user-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-users--user-" onclick="cancelTryOut('GETapi-users--user-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-users--user-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/users/{user}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user" data-endpoint="GETapi-users--user-" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/users/{id}/change/password</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PATCH \
    "http://localhost:8080/api/users/veniam/change/password" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"password":"exercitationem"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/users/veniam/change/password"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "password": "exercitationem"
}

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<div id="execution-results-PATCHapi-users--id--change-password" hidden>
    <blockquote>Received response<span id="execution-response-status-PATCHapi-users--id--change-password"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-users--id--change-password"></code></pre>
</div>
<div id="execution-error-PATCHapi-users--id--change-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-users--id--change-password"></code></pre>
</div>
<form id="form-PATCHapi-users--id--change-password" data-method="PATCH" data-path="api/users/{id}/change/password" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PATCHapi-users--id--change-password', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PATCHapi-users--id--change-password" onclick="tryItOut('PATCHapi-users--id--change-password');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PATCHapi-users--id--change-password" onclick="cancelTryOut('PATCHapi-users--id--change-password');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PATCHapi-users--id--change-password" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/users/{id}/change/password</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="PATCHapi-users--id--change-password" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password" data-endpoint="PATCHapi-users--id--change-password" data-component="body" required  hidden>
<br>

</p>

</form>
<h2>api/contacts</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8080/api/contacts" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"content":"consequuntur"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/contacts"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "content": "consequuntur"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-POSTapi-contacts" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-contacts"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-contacts"></code></pre>
</div>
<div id="execution-error-POSTapi-contacts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-contacts"></code></pre>
</div>
<form id="form-POSTapi-contacts" data-method="POST" data-path="api/contacts" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-contacts', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-contacts" onclick="tryItOut('POSTapi-contacts');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-contacts" onclick="cancelTryOut('POSTapi-contacts');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-contacts" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/contacts</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>content</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="content" data-endpoint="POSTapi-contacts" data-component="body" required  hidden>
<br>

</p>

</form>
<h2>api/shipping-addresses</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8080/api/shipping-addresses" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"client_user_id":11,"address":"ipsam","postal_code":"non","building":"enim","receiver_name":"quos","phone":{},"is_default":false,"created_user_id":8,"updated_user_id":5}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/shipping-addresses"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "client_user_id": 11,
    "address": "ipsam",
    "postal_code": "non",
    "building": "enim",
    "receiver_name": "quos",
    "phone": {},
    "is_default": false,
    "created_user_id": 8,
    "updated_user_id": 5
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-POSTapi-shipping-addresses" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-shipping-addresses"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-shipping-addresses"></code></pre>
</div>
<div id="execution-error-POSTapi-shipping-addresses" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-shipping-addresses"></code></pre>
</div>
<form id="form-POSTapi-shipping-addresses" data-method="POST" data-path="api/shipping-addresses" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-shipping-addresses', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-shipping-addresses" onclick="tryItOut('POSTapi-shipping-addresses');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-shipping-addresses" onclick="cancelTryOut('POSTapi-shipping-addresses');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-shipping-addresses" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/shipping-addresses</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>client_user_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="client_user_id" data-endpoint="POSTapi-shipping-addresses" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>address</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="address" data-endpoint="POSTapi-shipping-addresses" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>postal_code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="postal_code" data-endpoint="POSTapi-shipping-addresses" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>building</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="building" data-endpoint="POSTapi-shipping-addresses" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>receiver_name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="receiver_name" data-endpoint="POSTapi-shipping-addresses" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="phone" data-endpoint="POSTapi-shipping-addresses" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>is_default</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTapi-shipping-addresses" hidden><input type="radio" name="is_default" value="true" data-endpoint="POSTapi-shipping-addresses" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTapi-shipping-addresses" hidden><input type="radio" name="is_default" value="false" data-endpoint="POSTapi-shipping-addresses" data-component="body" ><code>false</code></label>
<br>

</p>
<p>
<b><code>created_user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="created_user_id" data-endpoint="POSTapi-shipping-addresses" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>updated_user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="updated_user_id" data-endpoint="POSTapi-shipping-addresses" data-component="body"  hidden>
<br>

</p>

</form>
<h2>api/shipping-addresses/{shipping_address}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost:8080/api/shipping-addresses/assumenda" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"client_user_id":20,"address":"quia","postal_code":"ratione","building":"odit","receiver_name":"doloremque","phone":{},"is_default":false,"created_user_id":15,"updated_user_id":3}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/shipping-addresses/assumenda"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "client_user_id": 20,
    "address": "quia",
    "postal_code": "ratione",
    "building": "odit",
    "receiver_name": "doloremque",
    "phone": {},
    "is_default": false,
    "created_user_id": 15,
    "updated_user_id": 3
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-PUTapi-shipping-addresses--shipping_address-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-shipping-addresses--shipping_address-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-shipping-addresses--shipping_address-"></code></pre>
</div>
<div id="execution-error-PUTapi-shipping-addresses--shipping_address-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-shipping-addresses--shipping_address-"></code></pre>
</div>
<form id="form-PUTapi-shipping-addresses--shipping_address-" data-method="PUT" data-path="api/shipping-addresses/{shipping_address}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-shipping-addresses--shipping_address-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-shipping-addresses--shipping_address-" onclick="tryItOut('PUTapi-shipping-addresses--shipping_address-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-shipping-addresses--shipping_address-" onclick="cancelTryOut('PUTapi-shipping-addresses--shipping_address-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-shipping-addresses--shipping_address-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/shipping-addresses/{shipping_address}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/shipping-addresses/{shipping_address}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipping_address</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipping_address" data-endpoint="PUTapi-shipping-addresses--shipping_address-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>client_user_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="client_user_id" data-endpoint="PUTapi-shipping-addresses--shipping_address-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>address</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="address" data-endpoint="PUTapi-shipping-addresses--shipping_address-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>postal_code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="postal_code" data-endpoint="PUTapi-shipping-addresses--shipping_address-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>building</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="building" data-endpoint="PUTapi-shipping-addresses--shipping_address-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>receiver_name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="receiver_name" data-endpoint="PUTapi-shipping-addresses--shipping_address-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="phone" data-endpoint="PUTapi-shipping-addresses--shipping_address-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>is_default</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="PUTapi-shipping-addresses--shipping_address-" hidden><input type="radio" name="is_default" value="true" data-endpoint="PUTapi-shipping-addresses--shipping_address-" data-component="body" ><code>true</code></label>
<label data-endpoint="PUTapi-shipping-addresses--shipping_address-" hidden><input type="radio" name="is_default" value="false" data-endpoint="PUTapi-shipping-addresses--shipping_address-" data-component="body" ><code>false</code></label>
<br>

</p>
<p>
<b><code>created_user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="created_user_id" data-endpoint="PUTapi-shipping-addresses--shipping_address-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>updated_user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="updated_user_id" data-endpoint="PUTapi-shipping-addresses--shipping_address-" data-component="body"  hidden>
<br>

</p>

</form>
<h2>api/shipping-addresses/{shipping_address}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://localhost:8080/api/shipping-addresses/ad" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/shipping-addresses/ad"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-DELETEapi-shipping-addresses--shipping_address-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-shipping-addresses--shipping_address-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-shipping-addresses--shipping_address-"></code></pre>
</div>
<div id="execution-error-DELETEapi-shipping-addresses--shipping_address-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-shipping-addresses--shipping_address-"></code></pre>
</div>
<form id="form-DELETEapi-shipping-addresses--shipping_address-" data-method="DELETE" data-path="api/shipping-addresses/{shipping_address}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-shipping-addresses--shipping_address-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-shipping-addresses--shipping_address-" onclick="tryItOut('DELETEapi-shipping-addresses--shipping_address-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-shipping-addresses--shipping_address-" onclick="cancelTryOut('DELETEapi-shipping-addresses--shipping_address-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-shipping-addresses--shipping_address-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/shipping-addresses/{shipping_address}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipping_address</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipping_address" data-endpoint="DELETEapi-shipping-addresses--shipping_address-" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/flavors/category/nested/subcategory/list</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/flavors/category/nested/subcategory/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/flavors/category/nested/subcategory/list"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-flavors-category-nested-subcategory-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-flavors-category-nested-subcategory-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-flavors-category-nested-subcategory-list"></code></pre>
</div>
<div id="execution-error-GETapi-flavors-category-nested-subcategory-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-flavors-category-nested-subcategory-list"></code></pre>
</div>
<form id="form-GETapi-flavors-category-nested-subcategory-list" data-method="GET" data-path="api/flavors/category/nested/subcategory/list" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-flavors-category-nested-subcategory-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-flavors-category-nested-subcategory-list" onclick="tryItOut('GETapi-flavors-category-nested-subcategory-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-flavors-category-nested-subcategory-list" onclick="cancelTryOut('GETapi-flavors-category-nested-subcategory-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-flavors-category-nested-subcategory-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/flavors/category/nested/subcategory/list</code></b>
</p>
</form>
<h2>api/flavors/category/list</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/flavors/category/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/flavors/category/list"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-flavors-category-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-flavors-category-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-flavors-category-list"></code></pre>
</div>
<div id="execution-error-GETapi-flavors-category-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-flavors-category-list"></code></pre>
</div>
<form id="form-GETapi-flavors-category-list" data-method="GET" data-path="api/flavors/category/list" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-flavors-category-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-flavors-category-list" onclick="tryItOut('GETapi-flavors-category-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-flavors-category-list" onclick="cancelTryOut('GETapi-flavors-category-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-flavors-category-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/flavors/category/list</code></b>
</p>
</form>
<h2>api/flavors/subcategory/list</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/flavors/subcategory/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/flavors/subcategory/list"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-flavors-subcategory-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-flavors-subcategory-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-flavors-subcategory-list"></code></pre>
</div>
<div id="execution-error-GETapi-flavors-subcategory-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-flavors-subcategory-list"></code></pre>
</div>
<form id="form-GETapi-flavors-subcategory-list" data-method="GET" data-path="api/flavors/subcategory/list" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-flavors-subcategory-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-flavors-subcategory-list" onclick="tryItOut('GETapi-flavors-subcategory-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-flavors-subcategory-list" onclick="cancelTryOut('GETapi-flavors-subcategory-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-flavors-subcategory-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/flavors/subcategory/list</code></b>
</p>
</form>
<h2>api/dangerous-grades/category/list</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/dangerous-grades/category/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/dangerous-grades/category/list"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-dangerous-grades-category-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-dangerous-grades-category-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dangerous-grades-category-list"></code></pre>
</div>
<div id="execution-error-GETapi-dangerous-grades-category-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dangerous-grades-category-list"></code></pre>
</div>
<form id="form-GETapi-dangerous-grades-category-list" data-method="GET" data-path="api/dangerous-grades/category/list" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-dangerous-grades-category-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-dangerous-grades-category-list" onclick="tryItOut('GETapi-dangerous-grades-category-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-dangerous-grades-category-list" onclick="cancelTryOut('GETapi-dangerous-grades-category-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-dangerous-grades-category-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/dangerous-grades/category/list</code></b>
</p>
</form>
<h2>api/solubilities/category/list</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/solubilities/category/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/solubilities/category/list"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-solubilities-category-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-solubilities-category-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-solubilities-category-list"></code></pre>
</div>
<div id="execution-error-GETapi-solubilities-category-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-solubilities-category-list"></code></pre>
</div>
<form id="form-GETapi-solubilities-category-list" data-method="GET" data-path="api/solubilities/category/list" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-solubilities-category-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-solubilities-category-list" onclick="tryItOut('GETapi-solubilities-category-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-solubilities-category-list" onclick="cancelTryOut('GETapi-solubilities-category-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-solubilities-category-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/solubilities/category/list</code></b>
</p>
</form>
<h2>api/solubilities/category/list/by/company-group</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/solubilities/category/list/by/company-group" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/solubilities/category/list/by/company-group"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-solubilities-category-list-by-company-group" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-solubilities-category-list-by-company-group"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-solubilities-category-list-by-company-group"></code></pre>
</div>
<div id="execution-error-GETapi-solubilities-category-list-by-company-group" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-solubilities-category-list-by-company-group"></code></pre>
</div>
<form id="form-GETapi-solubilities-category-list-by-company-group" data-method="GET" data-path="api/solubilities/category/list/by/company-group" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-solubilities-category-list-by-company-group', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-solubilities-category-list-by-company-group" onclick="tryItOut('GETapi-solubilities-category-list-by-company-group');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-solubilities-category-list-by-company-group" onclick="cancelTryOut('GETapi-solubilities-category-list-by-company-group');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-solubilities-category-list-by-company-group" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/solubilities/category/list/by/company-group</code></b>
</p>
</form>
<h2>api/use-cases/category/list</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/use-cases/category/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/use-cases/category/list"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-use-cases-category-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-use-cases-category-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-use-cases-category-list"></code></pre>
</div>
<div id="execution-error-GETapi-use-cases-category-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-use-cases-category-list"></code></pre>
</div>
<form id="form-GETapi-use-cases-category-list" data-method="GET" data-path="api/use-cases/category/list" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-use-cases-category-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-use-cases-category-list" onclick="tryItOut('GETapi-use-cases-category-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-use-cases-category-list" onclick="cancelTryOut('GETapi-use-cases-category-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-use-cases-category-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/use-cases/category/list</code></b>
</p>
</form>
<h2>api/use-cases/subcategory/list</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/use-cases/subcategory/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/use-cases/subcategory/list"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-use-cases-subcategory-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-use-cases-subcategory-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-use-cases-subcategory-list"></code></pre>
</div>
<div id="execution-error-GETapi-use-cases-subcategory-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-use-cases-subcategory-list"></code></pre>
</div>
<form id="form-GETapi-use-cases-subcategory-list" data-method="GET" data-path="api/use-cases/subcategory/list" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-use-cases-subcategory-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-use-cases-subcategory-list" onclick="tryItOut('GETapi-use-cases-subcategory-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-use-cases-subcategory-list" onclick="cancelTryOut('GETapi-use-cases-subcategory-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-use-cases-subcategory-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/use-cases/subcategory/list</code></b>
</p>
</form>
<h2>api/use-cases/category/with/subcategory/list</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/use-cases/category/with/subcategory/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/use-cases/category/with/subcategory/list"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-use-cases-category-with-subcategory-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-use-cases-category-with-subcategory-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-use-cases-category-with-subcategory-list"></code></pre>
</div>
<div id="execution-error-GETapi-use-cases-category-with-subcategory-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-use-cases-category-with-subcategory-list"></code></pre>
</div>
<form id="form-GETapi-use-cases-category-with-subcategory-list" data-method="GET" data-path="api/use-cases/category/with/subcategory/list" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-use-cases-category-with-subcategory-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-use-cases-category-with-subcategory-list" onclick="tryItOut('GETapi-use-cases-category-with-subcategory-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-use-cases-category-with-subcategory-list" onclick="cancelTryOut('GETapi-use-cases-category-with-subcategory-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-use-cases-category-with-subcategory-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/use-cases/category/with/subcategory/list</code></b>
</p>
</form>
<h2>api/products</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/products" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/products"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-products" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-products"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products"></code></pre>
</div>
<div id="execution-error-GETapi-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products"></code></pre>
</div>
<form id="form-GETapi-products" data-method="GET" data-path="api/products" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-products', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-products" onclick="tryItOut('GETapi-products');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-products" onclick="cancelTryOut('GETapi-products');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-products" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/products</code></b>
</p>
</form>
<h2>api/products</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8080/api/products" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"code":"commodi","prescription_number":"quia","name":"inventore","point":"quia","externally_point":"blanditiis","image":{},"sales_status":17,"is_general_purpose_products":false,"created_user_id":2,"updated_user_id":20,"classifications":[{"id":19}],"flavors":[{"id":14}],"use_cases":[{"id":13}],"solubilities":[{"id":6}],"dangerous_grades":[{"id":8}]}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/products"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "code": "commodi",
    "prescription_number": "quia",
    "name": "inventore",
    "point": "quia",
    "externally_point": "blanditiis",
    "image": {},
    "sales_status": 17,
    "is_general_purpose_products": false,
    "created_user_id": 2,
    "updated_user_id": 20,
    "classifications": [
        {
            "id": 19
        }
    ],
    "flavors": [
        {
            "id": 14
        }
    ],
    "use_cases": [
        {
            "id": 13
        }
    ],
    "solubilities": [
        {
            "id": 6
        }
    ],
    "dangerous_grades": [
        {
            "id": 8
        }
    ]
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-POSTapi-products" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-products"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-products"></code></pre>
</div>
<div id="execution-error-POSTapi-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-products"></code></pre>
</div>
<form id="form-POSTapi-products" data-method="POST" data-path="api/products" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-products', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-products" onclick="tryItOut('POSTapi-products');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-products" onclick="cancelTryOut('POSTapi-products');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-products" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/products</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="code" data-endpoint="POSTapi-products" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>prescription_number</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="prescription_number" data-endpoint="POSTapi-products" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-products" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>point</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="point" data-endpoint="POSTapi-products" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>externally_point</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="externally_point" data-endpoint="POSTapi-products" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>image</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="image" data-endpoint="POSTapi-products" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>sales_status</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="sales_status" data-endpoint="POSTapi-products" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>is_general_purpose_products</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTapi-products" hidden><input type="radio" name="is_general_purpose_products" value="true" data-endpoint="POSTapi-products" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTapi-products" hidden><input type="radio" name="is_general_purpose_products" value="false" data-endpoint="POSTapi-products" data-component="body" ><code>false</code></label>
<br>

</p>
<p>
<b><code>created_user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="created_user_id" data-endpoint="POSTapi-products" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>updated_user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="updated_user_id" data-endpoint="POSTapi-products" data-component="body"  hidden>
<br>

</p>
<p>
<details>
<summary>
<b><code>classifications</code></b>&nbsp;&nbsp;<small>object[]</small>     <i>optional</i> &nbsp;
<br>

</summary>
<br>
<p>
<b><code>classifications[].id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="classifications.0.id" data-endpoint="POSTapi-products" data-component="body" required  hidden>
<br>

</p>
</details>
</p>
<p>
<details>
<summary>
<b><code>flavors</code></b>&nbsp;&nbsp;<small>object[]</small>     <i>optional</i> &nbsp;
<br>

</summary>
<br>
<p>
<b><code>flavors[].id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="flavors.0.id" data-endpoint="POSTapi-products" data-component="body" required  hidden>
<br>

</p>
</details>
</p>
<p>
<details>
<summary>
<b><code>use_cases</code></b>&nbsp;&nbsp;<small>object[]</small>     <i>optional</i> &nbsp;
<br>

</summary>
<br>
<p>
<b><code>use_cases[].id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="use_cases.0.id" data-endpoint="POSTapi-products" data-component="body" required  hidden>
<br>

</p>
</details>
</p>
<p>
<details>
<summary>
<b><code>solubilities</code></b>&nbsp;&nbsp;<small>object[]</small>     <i>optional</i> &nbsp;
<br>

</summary>
<br>
<p>
<b><code>solubilities[].id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="solubilities.0.id" data-endpoint="POSTapi-products" data-component="body" required  hidden>
<br>

</p>
</details>
</p>
<p>
<details>
<summary>
<b><code>dangerous_grades</code></b>&nbsp;&nbsp;<small>object[]</small>     <i>optional</i> &nbsp;
<br>

</summary>
<br>
<p>
<b><code>dangerous_grades[].id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="dangerous_grades.0.id" data-endpoint="POSTapi-products" data-component="body" required  hidden>
<br>

</p>
</details>
</p>

</form>
<h2>api/products/{product}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/products/iusto" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/products/iusto"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-products--product-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-products--product-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products--product-"></code></pre>
</div>
<div id="execution-error-GETapi-products--product-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products--product-"></code></pre>
</div>
<form id="form-GETapi-products--product-" data-method="GET" data-path="api/products/{product}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-products--product-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-products--product-" onclick="tryItOut('GETapi-products--product-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-products--product-" onclick="cancelTryOut('GETapi-products--product-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-products--product-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/products/{product}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>product</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="product" data-endpoint="GETapi-products--product-" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/products/{product}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost:8080/api/products/cumque" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"code":"voluptate","prescription_number":"laudantium","name":"deserunt","point":"deserunt","externally_point":"modi","image":{},"sales_status":5,"is_general_purpose_products":false,"created_user_id":10,"updated_user_id":3,"classifications":[{"id":9}],"flavors":[{"id":7}],"use_cases":[{"id":13}],"solubilities":[{"id":6}],"dangerous_grades":[{"id":1}]}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/products/cumque"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "code": "voluptate",
    "prescription_number": "laudantium",
    "name": "deserunt",
    "point": "deserunt",
    "externally_point": "modi",
    "image": {},
    "sales_status": 5,
    "is_general_purpose_products": false,
    "created_user_id": 10,
    "updated_user_id": 3,
    "classifications": [
        {
            "id": 9
        }
    ],
    "flavors": [
        {
            "id": 7
        }
    ],
    "use_cases": [
        {
            "id": 13
        }
    ],
    "solubilities": [
        {
            "id": 6
        }
    ],
    "dangerous_grades": [
        {
            "id": 1
        }
    ]
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-PUTapi-products--product-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-products--product-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-products--product-"></code></pre>
</div>
<div id="execution-error-PUTapi-products--product-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-products--product-"></code></pre>
</div>
<form id="form-PUTapi-products--product-" data-method="PUT" data-path="api/products/{product}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-products--product-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-products--product-" onclick="tryItOut('PUTapi-products--product-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-products--product-" onclick="cancelTryOut('PUTapi-products--product-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-products--product-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/products/{product}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/products/{product}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>product</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="product" data-endpoint="PUTapi-products--product-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="code" data-endpoint="PUTapi-products--product-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>prescription_number</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="prescription_number" data-endpoint="PUTapi-products--product-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="PUTapi-products--product-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>point</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="point" data-endpoint="PUTapi-products--product-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>externally_point</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="externally_point" data-endpoint="PUTapi-products--product-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>image</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="image" data-endpoint="PUTapi-products--product-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>sales_status</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="sales_status" data-endpoint="PUTapi-products--product-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>is_general_purpose_products</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="PUTapi-products--product-" hidden><input type="radio" name="is_general_purpose_products" value="true" data-endpoint="PUTapi-products--product-" data-component="body" ><code>true</code></label>
<label data-endpoint="PUTapi-products--product-" hidden><input type="radio" name="is_general_purpose_products" value="false" data-endpoint="PUTapi-products--product-" data-component="body" ><code>false</code></label>
<br>

</p>
<p>
<b><code>created_user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="created_user_id" data-endpoint="PUTapi-products--product-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>updated_user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="updated_user_id" data-endpoint="PUTapi-products--product-" data-component="body"  hidden>
<br>

</p>
<p>
<details>
<summary>
<b><code>classifications</code></b>&nbsp;&nbsp;<small>object[]</small>     <i>optional</i> &nbsp;
<br>

</summary>
<br>
<p>
<b><code>classifications[].id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="classifications.0.id" data-endpoint="PUTapi-products--product-" data-component="body" required  hidden>
<br>

</p>
</details>
</p>
<p>
<details>
<summary>
<b><code>flavors</code></b>&nbsp;&nbsp;<small>object[]</small>     <i>optional</i> &nbsp;
<br>

</summary>
<br>
<p>
<b><code>flavors[].id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="flavors.0.id" data-endpoint="PUTapi-products--product-" data-component="body" required  hidden>
<br>

</p>
</details>
</p>
<p>
<details>
<summary>
<b><code>use_cases</code></b>&nbsp;&nbsp;<small>object[]</small>     <i>optional</i> &nbsp;
<br>

</summary>
<br>
<p>
<b><code>use_cases[].id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="use_cases.0.id" data-endpoint="PUTapi-products--product-" data-component="body" required  hidden>
<br>

</p>
</details>
</p>
<p>
<details>
<summary>
<b><code>solubilities</code></b>&nbsp;&nbsp;<small>object[]</small>     <i>optional</i> &nbsp;
<br>

</summary>
<br>
<p>
<b><code>solubilities[].id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="solubilities.0.id" data-endpoint="PUTapi-products--product-" data-component="body" required  hidden>
<br>

</p>
</details>
</p>
<p>
<details>
<summary>
<b><code>dangerous_grades</code></b>&nbsp;&nbsp;<small>object[]</small>     <i>optional</i> &nbsp;
<br>

</summary>
<br>
<p>
<b><code>dangerous_grades[].id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="dangerous_grades.0.id" data-endpoint="PUTapi-products--product-" data-component="body" required  hidden>
<br>

</p>
</details>
</p>

</form>
<h2>api/products/{product}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://localhost:8080/api/products/autem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/products/autem"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-DELETEapi-products--product-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-products--product-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-products--product-"></code></pre>
</div>
<div id="execution-error-DELETEapi-products--product-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-products--product-"></code></pre>
</div>
<form id="form-DELETEapi-products--product-" data-method="DELETE" data-path="api/products/{product}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-products--product-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-products--product-" onclick="tryItOut('DELETEapi-products--product-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-products--product-" onclick="cancelTryOut('DELETEapi-products--product-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-products--product-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/products/{product}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>product</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="product" data-endpoint="DELETEapi-products--product-" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/products/image/upload</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8080/api/products/image/upload" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/products/image/upload"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-POSTapi-products-image-upload" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-products-image-upload"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-products-image-upload"></code></pre>
</div>
<div id="execution-error-POSTapi-products-image-upload" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-products-image-upload"></code></pre>
</div>
<form id="form-POSTapi-products-image-upload" data-method="POST" data-path="api/products/image/upload" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-products-image-upload', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-products-image-upload" onclick="tryItOut('POSTapi-products-image-upload');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-products-image-upload" onclick="cancelTryOut('POSTapi-products-image-upload');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-products-image-upload" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/products/image/upload</code></b>
</p>
</form>
<h2>api/products/image/delete</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost:8080/api/products/image/delete" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/products/image/delete"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-PUTapi-products-image-delete" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-products-image-delete"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-products-image-delete"></code></pre>
</div>
<div id="execution-error-PUTapi-products-image-delete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-products-image-delete"></code></pre>
</div>
<form id="form-PUTapi-products-image-delete" data-method="PUT" data-path="api/products/image/delete" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-products-image-delete', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-products-image-delete" onclick="tryItOut('PUTapi-products-image-delete');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-products-image-delete" onclick="cancelTryOut('PUTapi-products-image-delete');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-products-image-delete" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/products/image/delete</code></b>
</p>
</form>
<h2>api/products/search/results</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/products/search/results" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/products/search/results"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-products-search-results" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-products-search-results"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products-search-results"></code></pre>
</div>
<div id="execution-error-GETapi-products-search-results" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products-search-results"></code></pre>
</div>
<form id="form-GETapi-products-search-results" data-method="GET" data-path="api/products/search/results" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-products-search-results', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-products-search-results" onclick="tryItOut('GETapi-products-search-results');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-products-search-results" onclick="cancelTryOut('GETapi-products-search-results');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-products-search-results" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/products/search/results</code></b>
</p>
</form>
<h2>api/products/by/company-groups</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/products/by/company-groups" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/products/by/company-groups"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-products-by-company-groups" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-products-by-company-groups"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products-by-company-groups"></code></pre>
</div>
<div id="execution-error-GETapi-products-by-company-groups" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products-by-company-groups"></code></pre>
</div>
<form id="form-GETapi-products-by-company-groups" data-method="GET" data-path="api/products/by/company-groups" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-products-by-company-groups', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-products-by-company-groups" onclick="tryItOut('GETapi-products-by-company-groups');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-products-by-company-groups" onclick="cancelTryOut('GETapi-products-by-company-groups');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-products-by-company-groups" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/products/by/company-groups</code></b>
</p>
</form>
<h2>api/products/correspondence-analysis-results</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8080/api/products/correspondence-analysis-results" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/products/correspondence-analysis-results"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-POSTapi-products-correspondence-analysis-results" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-products-correspondence-analysis-results"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-products-correspondence-analysis-results"></code></pre>
</div>
<div id="execution-error-POSTapi-products-correspondence-analysis-results" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-products-correspondence-analysis-results"></code></pre>
</div>
<form id="form-POSTapi-products-correspondence-analysis-results" data-method="POST" data-path="api/products/correspondence-analysis-results" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-products-correspondence-analysis-results', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-products-correspondence-analysis-results" onclick="tryItOut('POSTapi-products-correspondence-analysis-results');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-products-correspondence-analysis-results" onclick="cancelTryOut('POSTapi-products-correspondence-analysis-results');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-products-correspondence-analysis-results" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/products/correspondence-analysis-results</code></b>
</p>
</form>
<h2>api/products/{id}/comments</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost:8080/api/products/aut/comments" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/products/aut/comments"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-PUTapi-products--id--comments" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-products--id--comments"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-products--id--comments"></code></pre>
</div>
<div id="execution-error-PUTapi-products--id--comments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-products--id--comments"></code></pre>
</div>
<form id="form-PUTapi-products--id--comments" data-method="PUT" data-path="api/products/{id}/comments" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-products--id--comments', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-products--id--comments" onclick="tryItOut('PUTapi-products--id--comments');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-products--id--comments" onclick="cancelTryOut('PUTapi-products--id--comments');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-products--id--comments" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/products/{id}/comments</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="PUTapi-products--id--comments" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/orders</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/orders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/orders"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-orders" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-orders"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-orders"></code></pre>
</div>
<div id="execution-error-GETapi-orders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-orders"></code></pre>
</div>
<form id="form-GETapi-orders" data-method="GET" data-path="api/orders" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-orders', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-orders" onclick="tryItOut('GETapi-orders');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-orders" onclick="cancelTryOut('GETapi-orders');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-orders" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/orders</code></b>
</p>
</form>
<h2>api/orders</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8080/api/orders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"client_user_id":3,"shipping_address_id":18,"desired_arrival_date":"2021-05-20T17:27:31+0900","comment":"ab","created_user_id":15,"updated_user_id":14}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/orders"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "client_user_id": 3,
    "shipping_address_id": 18,
    "desired_arrival_date": "2021-05-20T17:27:31+0900",
    "comment": "ab",
    "created_user_id": 15,
    "updated_user_id": 14
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-POSTapi-orders" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-orders"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-orders"></code></pre>
</div>
<div id="execution-error-POSTapi-orders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-orders"></code></pre>
</div>
<form id="form-POSTapi-orders" data-method="POST" data-path="api/orders" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-orders', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-orders" onclick="tryItOut('POSTapi-orders');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-orders" onclick="cancelTryOut('POSTapi-orders');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-orders" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/orders</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>client_user_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="client_user_id" data-endpoint="POSTapi-orders" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>shipping_address_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="shipping_address_id" data-endpoint="POSTapi-orders" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>desired_arrival_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="desired_arrival_date" data-endpoint="POSTapi-orders" data-component="body" required  hidden>
<br>
valueは、正しい日付ではありません。.
</p>
<p>
<b><code>comment</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="comment" data-endpoint="POSTapi-orders" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>created_user_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="created_user_id" data-endpoint="POSTapi-orders" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>updated_user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="updated_user_id" data-endpoint="POSTapi-orders" data-component="body"  hidden>
<br>

</p>

</form>
<h2>api/orders/{order}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/orders/libero" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/orders/libero"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-orders--order-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-orders--order-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-orders--order-"></code></pre>
</div>
<div id="execution-error-GETapi-orders--order-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-orders--order-"></code></pre>
</div>
<form id="form-GETapi-orders--order-" data-method="GET" data-path="api/orders/{order}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-orders--order-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-orders--order-" onclick="tryItOut('GETapi-orders--order-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-orders--order-" onclick="cancelTryOut('GETapi-orders--order-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-orders--order-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/orders/{order}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>order</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="order" data-endpoint="GETapi-orders--order-" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/orders/client-users/{clientUserId}/histories</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/orders/client-users/ipsa/histories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/orders/client-users/ipsa/histories"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-orders-client-users--clientUserId--histories" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-orders-client-users--clientUserId--histories"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-orders-client-users--clientUserId--histories"></code></pre>
</div>
<div id="execution-error-GETapi-orders-client-users--clientUserId--histories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-orders-client-users--clientUserId--histories"></code></pre>
</div>
<form id="form-GETapi-orders-client-users--clientUserId--histories" data-method="GET" data-path="api/orders/client-users/{clientUserId}/histories" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-orders-client-users--clientUserId--histories', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-orders-client-users--clientUserId--histories" onclick="tryItOut('GETapi-orders-client-users--clientUserId--histories');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-orders-client-users--clientUserId--histories" onclick="cancelTryOut('GETapi-orders-client-users--clientUserId--histories');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-orders-client-users--clientUserId--histories" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/orders/client-users/{clientUserId}/histories</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>clientUserId</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="clientUserId" data-endpoint="GETapi-orders-client-users--clientUserId--histories" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/orders/all/list</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/orders/all/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/orders/all/list"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-orders-all-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-orders-all-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-orders-all-list"></code></pre>
</div>
<div id="execution-error-GETapi-orders-all-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-orders-all-list"></code></pre>
</div>
<form id="form-GETapi-orders-all-list" data-method="GET" data-path="api/orders/all/list" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-orders-all-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-orders-all-list" onclick="tryItOut('GETapi-orders-all-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-orders-all-list" onclick="cancelTryOut('GETapi-orders-all-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-orders-all-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/orders/all/list</code></b>
</p>
</form>
<h2>api/orders/output/csv</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/orders/output/csv" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/orders/output/csv"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-orders-output-csv" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-orders-output-csv"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-orders-output-csv"></code></pre>
</div>
<div id="execution-error-GETapi-orders-output-csv" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-orders-output-csv"></code></pre>
</div>
<form id="form-GETapi-orders-output-csv" data-method="GET" data-path="api/orders/output/csv" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-orders-output-csv', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-orders-output-csv" onclick="tryItOut('GETapi-orders-output-csv');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-orders-output-csv" onclick="cancelTryOut('GETapi-orders-output-csv');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-orders-output-csv" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/orders/output/csv</code></b>
</p>
</form>
<h2>api/order-carts</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/order-carts" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/order-carts"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-order-carts" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-order-carts"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-order-carts"></code></pre>
</div>
<div id="execution-error-GETapi-order-carts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-order-carts"></code></pre>
</div>
<form id="form-GETapi-order-carts" data-method="GET" data-path="api/order-carts" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-order-carts', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-order-carts" onclick="tryItOut('GETapi-order-carts');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-order-carts" onclick="cancelTryOut('GETapi-order-carts');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-order-carts" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/order-carts</code></b>
</p>
</form>
<h2>api/order-carts</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8080/api/order-carts" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"client_user_id":17,"product_id":11,"created_user_id":16,"updated_user_id":6}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/order-carts"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "client_user_id": 17,
    "product_id": 11,
    "created_user_id": 16,
    "updated_user_id": 6
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-POSTapi-order-carts" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-order-carts"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-order-carts"></code></pre>
</div>
<div id="execution-error-POSTapi-order-carts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-order-carts"></code></pre>
</div>
<form id="form-POSTapi-order-carts" data-method="POST" data-path="api/order-carts" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-order-carts', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-order-carts" onclick="tryItOut('POSTapi-order-carts');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-order-carts" onclick="cancelTryOut('POSTapi-order-carts');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-order-carts" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/order-carts</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>client_user_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="client_user_id" data-endpoint="POSTapi-order-carts" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>product_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="product_id" data-endpoint="POSTapi-order-carts" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>created_user_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="created_user_id" data-endpoint="POSTapi-order-carts" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>updated_user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="updated_user_id" data-endpoint="POSTapi-order-carts" data-component="body"  hidden>
<br>

</p>

</form>
<h2>api/order-carts/{order_cart}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://localhost:8080/api/order-carts/error" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/order-carts/error"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-DELETEapi-order-carts--order_cart-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-order-carts--order_cart-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-order-carts--order_cart-"></code></pre>
</div>
<div id="execution-error-DELETEapi-order-carts--order_cart-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-order-carts--order_cart-"></code></pre>
</div>
<form id="form-DELETEapi-order-carts--order_cart-" data-method="DELETE" data-path="api/order-carts/{order_cart}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-order-carts--order_cart-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-order-carts--order_cart-" onclick="tryItOut('DELETEapi-order-carts--order_cart-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-order-carts--order_cart-" onclick="cancelTryOut('DELETEapi-order-carts--order_cart-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-order-carts--order_cart-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/order-carts/{order_cart}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>order_cart</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="order_cart" data-endpoint="DELETEapi-order-carts--order_cart-" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/order-units/unit/list</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/order-units/unit/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/order-units/unit/list"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-order-units-unit-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-order-units-unit-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-order-units-unit-list"></code></pre>
</div>
<div id="execution-error-GETapi-order-units-unit-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-order-units-unit-list"></code></pre>
</div>
<form id="form-GETapi-order-units-unit-list" data-method="GET" data-path="api/order-units/unit/list" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-order-units-unit-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-order-units-unit-list" onclick="tryItOut('GETapi-order-units-unit-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-order-units-unit-list" onclick="cancelTryOut('GETapi-order-units-unit-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-order-units-unit-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/order-units/unit/list</code></b>
</p>
</form>
<h2>api/company-groups</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/company-groups" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/company-groups"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-company-groups" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-company-groups"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-company-groups"></code></pre>
</div>
<div id="execution-error-GETapi-company-groups" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-company-groups"></code></pre>
</div>
<form id="form-GETapi-company-groups" data-method="GET" data-path="api/company-groups" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-company-groups', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-company-groups" onclick="tryItOut('GETapi-company-groups');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-company-groups" onclick="cancelTryOut('GETapi-company-groups');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-company-groups" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/company-groups</code></b>
</p>
</form>
<h2>api/company-groups</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8080/api/company-groups" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"code":"voluptatem","name":"quia","externally_name":"dolor","created_user_id":1,"updated_user_id":17}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/company-groups"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "code": "voluptatem",
    "name": "quia",
    "externally_name": "dolor",
    "created_user_id": 1,
    "updated_user_id": 17
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-POSTapi-company-groups" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-company-groups"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-company-groups"></code></pre>
</div>
<div id="execution-error-POSTapi-company-groups" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-company-groups"></code></pre>
</div>
<form id="form-POSTapi-company-groups" data-method="POST" data-path="api/company-groups" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-company-groups', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-company-groups" onclick="tryItOut('POSTapi-company-groups');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-company-groups" onclick="cancelTryOut('POSTapi-company-groups');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-company-groups" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/company-groups</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="code" data-endpoint="POSTapi-company-groups" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-company-groups" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>externally_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="externally_name" data-endpoint="POSTapi-company-groups" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>created_user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="created_user_id" data-endpoint="POSTapi-company-groups" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>updated_user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="updated_user_id" data-endpoint="POSTapi-company-groups" data-component="body"  hidden>
<br>

</p>

</form>
<h2>api/company-groups/{company_group}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/company-groups/molestias" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/company-groups/molestias"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-company-groups--company_group-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-company-groups--company_group-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-company-groups--company_group-"></code></pre>
</div>
<div id="execution-error-GETapi-company-groups--company_group-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-company-groups--company_group-"></code></pre>
</div>
<form id="form-GETapi-company-groups--company_group-" data-method="GET" data-path="api/company-groups/{company_group}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-company-groups--company_group-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-company-groups--company_group-" onclick="tryItOut('GETapi-company-groups--company_group-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-company-groups--company_group-" onclick="cancelTryOut('GETapi-company-groups--company_group-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-company-groups--company_group-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/company-groups/{company_group}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>company_group</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company_group" data-endpoint="GETapi-company-groups--company_group-" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/company-groups/{company_group}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost:8080/api/company-groups/et" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"code":"quod","name":"expedita","externally_name":"non","created_user_id":7,"updated_user_id":14}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/company-groups/et"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "code": "quod",
    "name": "expedita",
    "externally_name": "non",
    "created_user_id": 7,
    "updated_user_id": 14
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-PUTapi-company-groups--company_group-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-company-groups--company_group-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-company-groups--company_group-"></code></pre>
</div>
<div id="execution-error-PUTapi-company-groups--company_group-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-company-groups--company_group-"></code></pre>
</div>
<form id="form-PUTapi-company-groups--company_group-" data-method="PUT" data-path="api/company-groups/{company_group}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-company-groups--company_group-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-company-groups--company_group-" onclick="tryItOut('PUTapi-company-groups--company_group-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-company-groups--company_group-" onclick="cancelTryOut('PUTapi-company-groups--company_group-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-company-groups--company_group-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/company-groups/{company_group}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/company-groups/{company_group}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>company_group</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company_group" data-endpoint="PUTapi-company-groups--company_group-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="code" data-endpoint="PUTapi-company-groups--company_group-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="PUTapi-company-groups--company_group-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>externally_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="externally_name" data-endpoint="PUTapi-company-groups--company_group-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>created_user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="created_user_id" data-endpoint="PUTapi-company-groups--company_group-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>updated_user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="updated_user_id" data-endpoint="PUTapi-company-groups--company_group-" data-component="body"  hidden>
<br>

</p>

</form>
<h2>api/company-groups/{company_group}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://localhost:8080/api/company-groups/qui" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/company-groups/qui"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-DELETEapi-company-groups--company_group-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-company-groups--company_group-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-company-groups--company_group-"></code></pre>
</div>
<div id="execution-error-DELETEapi-company-groups--company_group-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-company-groups--company_group-"></code></pre>
</div>
<form id="form-DELETEapi-company-groups--company_group-" data-method="DELETE" data-path="api/company-groups/{company_group}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-company-groups--company_group-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-company-groups--company_group-" onclick="tryItOut('DELETEapi-company-groups--company_group-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-company-groups--company_group-" onclick="cancelTryOut('DELETEapi-company-groups--company_group-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-company-groups--company_group-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/company-groups/{company_group}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>company_group</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company_group" data-endpoint="DELETEapi-company-groups--company_group-" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/company-groups/name/list</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/company-groups/name/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/company-groups/name/list"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-company-groups-name-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-company-groups-name-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-company-groups-name-list"></code></pre>
</div>
<div id="execution-error-GETapi-company-groups-name-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-company-groups-name-list"></code></pre>
</div>
<form id="form-GETapi-company-groups-name-list" data-method="GET" data-path="api/company-groups/name/list" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-company-groups-name-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-company-groups-name-list" onclick="tryItOut('GETapi-company-groups-name-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-company-groups-name-list" onclick="cancelTryOut('GETapi-company-groups-name-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-company-groups-name-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/company-groups/name/list</code></b>
</p>
</form>
<h2>api/company-groups/{id}/sales-members</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/company-groups/voluptatem/sales-members" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/company-groups/voluptatem/sales-members"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-company-groups--id--sales-members" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-company-groups--id--sales-members"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-company-groups--id--sales-members"></code></pre>
</div>
<div id="execution-error-GETapi-company-groups--id--sales-members" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-company-groups--id--sales-members"></code></pre>
</div>
<form id="form-GETapi-company-groups--id--sales-members" data-method="GET" data-path="api/company-groups/{id}/sales-members" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-company-groups--id--sales-members', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-company-groups--id--sales-members" onclick="tryItOut('GETapi-company-groups--id--sales-members');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-company-groups--id--sales-members" onclick="cancelTryOut('GETapi-company-groups--id--sales-members');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-company-groups--id--sales-members" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/company-groups/{id}/sales-members</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-company-groups--id--sales-members" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/company-groups/{id}/sales-members</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8080/api/company-groups/alias/sales-members" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/company-groups/alias/sales-members"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-POSTapi-company-groups--id--sales-members" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-company-groups--id--sales-members"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-company-groups--id--sales-members"></code></pre>
</div>
<div id="execution-error-POSTapi-company-groups--id--sales-members" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-company-groups--id--sales-members"></code></pre>
</div>
<form id="form-POSTapi-company-groups--id--sales-members" data-method="POST" data-path="api/company-groups/{id}/sales-members" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-company-groups--id--sales-members', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-company-groups--id--sales-members" onclick="tryItOut('POSTapi-company-groups--id--sales-members');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-company-groups--id--sales-members" onclick="cancelTryOut('POSTapi-company-groups--id--sales-members');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-company-groups--id--sales-members" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/company-groups/{id}/sales-members</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-company-groups--id--sales-members" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/company-groups/{id}/sales-members/{salesMemberId}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://localhost:8080/api/company-groups/ipsa/sales-members/id" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/company-groups/ipsa/sales-members/id"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-DELETEapi-company-groups--id--sales-members--salesMemberId-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-company-groups--id--sales-members--salesMemberId-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-company-groups--id--sales-members--salesMemberId-"></code></pre>
</div>
<div id="execution-error-DELETEapi-company-groups--id--sales-members--salesMemberId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-company-groups--id--sales-members--salesMemberId-"></code></pre>
</div>
<form id="form-DELETEapi-company-groups--id--sales-members--salesMemberId-" data-method="DELETE" data-path="api/company-groups/{id}/sales-members/{salesMemberId}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-company-groups--id--sales-members--salesMemberId-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-company-groups--id--sales-members--salesMemberId-" onclick="tryItOut('DELETEapi-company-groups--id--sales-members--salesMemberId-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-company-groups--id--sales-members--salesMemberId-" onclick="cancelTryOut('DELETEapi-company-groups--id--sales-members--salesMemberId-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-company-groups--id--sales-members--salesMemberId-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/company-groups/{id}/sales-members/{salesMemberId}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="DELETEapi-company-groups--id--sales-members--salesMemberId-" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>salesMemberId</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="salesMemberId" data-endpoint="DELETEapi-company-groups--id--sales-members--salesMemberId-" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/company-groups/{id}/products</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/company-groups/expedita/products" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/company-groups/expedita/products"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-company-groups--id--products" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-company-groups--id--products"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-company-groups--id--products"></code></pre>
</div>
<div id="execution-error-GETapi-company-groups--id--products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-company-groups--id--products"></code></pre>
</div>
<form id="form-GETapi-company-groups--id--products" data-method="GET" data-path="api/company-groups/{id}/products" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-company-groups--id--products', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-company-groups--id--products" onclick="tryItOut('GETapi-company-groups--id--products');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-company-groups--id--products" onclick="cancelTryOut('GETapi-company-groups--id--products');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-company-groups--id--products" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/company-groups/{id}/products</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-company-groups--id--products" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/company-groups/{id}/products</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8080/api/company-groups/illum/products" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/company-groups/illum/products"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-POSTapi-company-groups--id--products" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-company-groups--id--products"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-company-groups--id--products"></code></pre>
</div>
<div id="execution-error-POSTapi-company-groups--id--products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-company-groups--id--products"></code></pre>
</div>
<form id="form-POSTapi-company-groups--id--products" data-method="POST" data-path="api/company-groups/{id}/products" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-company-groups--id--products', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-company-groups--id--products" onclick="tryItOut('POSTapi-company-groups--id--products');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-company-groups--id--products" onclick="cancelTryOut('POSTapi-company-groups--id--products');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-company-groups--id--products" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/company-groups/{id}/products</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-company-groups--id--products" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/company-groups/{id}/products/{productId}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PATCH \
    "http://localhost:8080/api/company-groups/sit/products/voluptas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"company_group_id":8,"product_id":8,"is_display":false}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/company-groups/sit/products/voluptas"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "company_group_id": 8,
    "product_id": 8,
    "is_display": false
}

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<div id="execution-results-PATCHapi-company-groups--id--products--productId-" hidden>
    <blockquote>Received response<span id="execution-response-status-PATCHapi-company-groups--id--products--productId-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-company-groups--id--products--productId-"></code></pre>
</div>
<div id="execution-error-PATCHapi-company-groups--id--products--productId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-company-groups--id--products--productId-"></code></pre>
</div>
<form id="form-PATCHapi-company-groups--id--products--productId-" data-method="PATCH" data-path="api/company-groups/{id}/products/{productId}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PATCHapi-company-groups--id--products--productId-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PATCHapi-company-groups--id--products--productId-" onclick="tryItOut('PATCHapi-company-groups--id--products--productId-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PATCHapi-company-groups--id--products--productId-" onclick="cancelTryOut('PATCHapi-company-groups--id--products--productId-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PATCHapi-company-groups--id--products--productId-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/company-groups/{id}/products/{productId}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="PATCHapi-company-groups--id--products--productId-" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>productId</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="productId" data-endpoint="PATCHapi-company-groups--id--products--productId-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>company_group_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="company_group_id" data-endpoint="PATCHapi-company-groups--id--products--productId-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>product_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="product_id" data-endpoint="PATCHapi-company-groups--id--products--productId-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>is_display</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="PATCHapi-company-groups--id--products--productId-" hidden><input type="radio" name="is_display" value="true" data-endpoint="PATCHapi-company-groups--id--products--productId-" data-component="body" ><code>true</code></label>
<label data-endpoint="PATCHapi-company-groups--id--products--productId-" hidden><input type="radio" name="is_display" value="false" data-endpoint="PATCHapi-company-groups--id--products--productId-" data-component="body" ><code>false</code></label>
<br>

</p>

</form>
<h2>api/company-groups/{id}/products/{salesMemberId}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://localhost:8080/api/company-groups/illo/products/explicabo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/company-groups/illo/products/explicabo"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-DELETEapi-company-groups--id--products--salesMemberId-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-company-groups--id--products--salesMemberId-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-company-groups--id--products--salesMemberId-"></code></pre>
</div>
<div id="execution-error-DELETEapi-company-groups--id--products--salesMemberId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-company-groups--id--products--salesMemberId-"></code></pre>
</div>
<form id="form-DELETEapi-company-groups--id--products--salesMemberId-" data-method="DELETE" data-path="api/company-groups/{id}/products/{salesMemberId}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-company-groups--id--products--salesMemberId-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-company-groups--id--products--salesMemberId-" onclick="tryItOut('DELETEapi-company-groups--id--products--salesMemberId-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-company-groups--id--products--salesMemberId-" onclick="cancelTryOut('DELETEapi-company-groups--id--products--salesMemberId-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-company-groups--id--products--salesMemberId-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/company-groups/{id}/products/{salesMemberId}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="DELETEapi-company-groups--id--products--salesMemberId-" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>salesMemberId</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="salesMemberId" data-endpoint="DELETEapi-company-groups--id--products--salesMemberId-" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/company-groups/{id}/products/output/csv</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/company-groups/facere/products/output/csv" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/company-groups/facere/products/output/csv"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-company-groups--id--products-output-csv" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-company-groups--id--products-output-csv"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-company-groups--id--products-output-csv"></code></pre>
</div>
<div id="execution-error-GETapi-company-groups--id--products-output-csv" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-company-groups--id--products-output-csv"></code></pre>
</div>
<form id="form-GETapi-company-groups--id--products-output-csv" data-method="GET" data-path="api/company-groups/{id}/products/output/csv" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-company-groups--id--products-output-csv', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-company-groups--id--products-output-csv" onclick="tryItOut('GETapi-company-groups--id--products-output-csv');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-company-groups--id--products-output-csv" onclick="cancelTryOut('GETapi-company-groups--id--products-output-csv');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-company-groups--id--products-output-csv" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/company-groups/{id}/products/output/csv</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-company-groups--id--products-output-csv" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/companies</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/companies" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/companies"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-companies" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-companies"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-companies"></code></pre>
</div>
<div id="execution-error-GETapi-companies" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-companies"></code></pre>
</div>
<form id="form-GETapi-companies" data-method="GET" data-path="api/companies" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-companies', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-companies" onclick="tryItOut('GETapi-companies');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-companies" onclick="cancelTryOut('GETapi-companies');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-companies" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/companies</code></b>
</p>
</form>
<h2>api/companies</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8080/api/companies" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"company_group_id":17,"code":"libero","name":"nihil","created_user_id":11,"updated_user_id":10}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/companies"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "company_group_id": 17,
    "code": "libero",
    "name": "nihil",
    "created_user_id": 11,
    "updated_user_id": 10
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-POSTapi-companies" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-companies"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-companies"></code></pre>
</div>
<div id="execution-error-POSTapi-companies" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-companies"></code></pre>
</div>
<form id="form-POSTapi-companies" data-method="POST" data-path="api/companies" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-companies', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-companies" onclick="tryItOut('POSTapi-companies');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-companies" onclick="cancelTryOut('POSTapi-companies');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-companies" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/companies</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>company_group_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="company_group_id" data-endpoint="POSTapi-companies" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="code" data-endpoint="POSTapi-companies" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-companies" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>created_user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="created_user_id" data-endpoint="POSTapi-companies" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>updated_user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="updated_user_id" data-endpoint="POSTapi-companies" data-component="body"  hidden>
<br>

</p>

</form>
<h2>api/companies/{company}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/companies/nemo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/companies/nemo"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-companies--company-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-companies--company-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-companies--company-"></code></pre>
</div>
<div id="execution-error-GETapi-companies--company-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-companies--company-"></code></pre>
</div>
<form id="form-GETapi-companies--company-" data-method="GET" data-path="api/companies/{company}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-companies--company-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-companies--company-" onclick="tryItOut('GETapi-companies--company-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-companies--company-" onclick="cancelTryOut('GETapi-companies--company-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-companies--company-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/companies/{company}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>company</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company" data-endpoint="GETapi-companies--company-" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/companies/{company}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost:8080/api/companies/sit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"company_group_id":6,"code":"accusantium","name":"dignissimos","created_user_id":3,"updated_user_id":16}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/companies/sit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "company_group_id": 6,
    "code": "accusantium",
    "name": "dignissimos",
    "created_user_id": 3,
    "updated_user_id": 16
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-PUTapi-companies--company-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-companies--company-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-companies--company-"></code></pre>
</div>
<div id="execution-error-PUTapi-companies--company-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-companies--company-"></code></pre>
</div>
<form id="form-PUTapi-companies--company-" data-method="PUT" data-path="api/companies/{company}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-companies--company-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-companies--company-" onclick="tryItOut('PUTapi-companies--company-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-companies--company-" onclick="cancelTryOut('PUTapi-companies--company-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-companies--company-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/companies/{company}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/companies/{company}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>company</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company" data-endpoint="PUTapi-companies--company-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>company_group_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="company_group_id" data-endpoint="PUTapi-companies--company-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="code" data-endpoint="PUTapi-companies--company-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="PUTapi-companies--company-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>created_user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="created_user_id" data-endpoint="PUTapi-companies--company-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>updated_user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="updated_user_id" data-endpoint="PUTapi-companies--company-" data-component="body"  hidden>
<br>

</p>

</form>
<h2>api/companies/{company}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://localhost:8080/api/companies/quis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/companies/quis"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-DELETEapi-companies--company-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-companies--company-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-companies--company-"></code></pre>
</div>
<div id="execution-error-DELETEapi-companies--company-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-companies--company-"></code></pre>
</div>
<form id="form-DELETEapi-companies--company-" data-method="DELETE" data-path="api/companies/{company}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-companies--company-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-companies--company-" onclick="tryItOut('DELETEapi-companies--company-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-companies--company-" onclick="cancelTryOut('DELETEapi-companies--company-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-companies--company-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/companies/{company}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>company</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company" data-endpoint="DELETEapi-companies--company-" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/client-users</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/client-users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/client-users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-client-users" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-client-users"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-client-users"></code></pre>
</div>
<div id="execution-error-GETapi-client-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-client-users"></code></pre>
</div>
<form id="form-GETapi-client-users" data-method="GET" data-path="api/client-users" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-client-users', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-client-users" onclick="tryItOut('GETapi-client-users');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-client-users" onclick="cancelTryOut('GETapi-client-users');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-client-users" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/client-users</code></b>
</p>
</form>
<h2>api/client-users</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8080/api/client-users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"company_id":13,"user":{"name":"corrupti"},"ip_address":"5.254.10.28","start_date":"2021-05-20T17:27:31+0900","end_date":"2021-05-20T17:27:31+0900","phone":{},"created_user_id":11,"updated_user_id":16}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/client-users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "company_id": 13,
    "user": {
        "name": "corrupti"
    },
    "ip_address": "5.254.10.28",
    "start_date": "2021-05-20T17:27:31+0900",
    "end_date": "2021-05-20T17:27:31+0900",
    "phone": {},
    "created_user_id": 11,
    "updated_user_id": 16
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-POSTapi-client-users" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-client-users"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-client-users"></code></pre>
</div>
<div id="execution-error-POSTapi-client-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-client-users"></code></pre>
</div>
<form id="form-POSTapi-client-users" data-method="POST" data-path="api/client-users" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-client-users', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-client-users" onclick="tryItOut('POSTapi-client-users');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-client-users" onclick="cancelTryOut('POSTapi-client-users');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-client-users" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/client-users</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>company_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="company_id" data-endpoint="POSTapi-client-users" data-component="body" required  hidden>
<br>

</p>
<p>
<details>
<summary>
<b><code>user</code></b>&nbsp;&nbsp;<small>object</small>     <i>optional</i> &nbsp;
<br>

</summary>
<br>
<p>
<b><code>user.name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user.name" data-endpoint="POSTapi-client-users" data-component="body" required  hidden>
<br>

</p>
</details>
</p>
<p>
<b><code>ip_address</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="ip_address" data-endpoint="POSTapi-client-users" data-component="body" required  hidden>
<br>
valueには、有効なIPアドレスを指定してください。.
</p>
<p>
<b><code>start_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="start_date" data-endpoint="POSTapi-client-users" data-component="body" required  hidden>
<br>
valueは、正しい日付ではありません。.
</p>
<p>
<b><code>end_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="end_date" data-endpoint="POSTapi-client-users" data-component="body" required  hidden>
<br>
valueは、正しい日付ではありません。.
</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="phone" data-endpoint="POSTapi-client-users" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>created_user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="created_user_id" data-endpoint="POSTapi-client-users" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>updated_user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="updated_user_id" data-endpoint="POSTapi-client-users" data-component="body"  hidden>
<br>

</p>

</form>
<h2>api/client-users/{client_user}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/client-users/omnis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/client-users/omnis"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-client-users--client_user-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-client-users--client_user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-client-users--client_user-"></code></pre>
</div>
<div id="execution-error-GETapi-client-users--client_user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-client-users--client_user-"></code></pre>
</div>
<form id="form-GETapi-client-users--client_user-" data-method="GET" data-path="api/client-users/{client_user}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-client-users--client_user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-client-users--client_user-" onclick="tryItOut('GETapi-client-users--client_user-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-client-users--client_user-" onclick="cancelTryOut('GETapi-client-users--client_user-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-client-users--client_user-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/client-users/{client_user}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>client_user</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="client_user" data-endpoint="GETapi-client-users--client_user-" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/client-users/{client_user}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost:8080/api/client-users/nihil" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"company_id":7,"user":{"name":"quis"},"ip_address":"59.158.9.9","start_date":"2021-05-20T17:27:31+0900","end_date":"2021-05-20T17:27:31+0900","phone":{},"created_user_id":10,"updated_user_id":17}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/client-users/nihil"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "company_id": 7,
    "user": {
        "name": "quis"
    },
    "ip_address": "59.158.9.9",
    "start_date": "2021-05-20T17:27:31+0900",
    "end_date": "2021-05-20T17:27:31+0900",
    "phone": {},
    "created_user_id": 10,
    "updated_user_id": 17
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-PUTapi-client-users--client_user-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-client-users--client_user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-client-users--client_user-"></code></pre>
</div>
<div id="execution-error-PUTapi-client-users--client_user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-client-users--client_user-"></code></pre>
</div>
<form id="form-PUTapi-client-users--client_user-" data-method="PUT" data-path="api/client-users/{client_user}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-client-users--client_user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-client-users--client_user-" onclick="tryItOut('PUTapi-client-users--client_user-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-client-users--client_user-" onclick="cancelTryOut('PUTapi-client-users--client_user-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-client-users--client_user-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/client-users/{client_user}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/client-users/{client_user}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>client_user</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="client_user" data-endpoint="PUTapi-client-users--client_user-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>company_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="company_id" data-endpoint="PUTapi-client-users--client_user-" data-component="body" required  hidden>
<br>

</p>
<p>
<details>
<summary>
<b><code>user</code></b>&nbsp;&nbsp;<small>object</small>     <i>optional</i> &nbsp;
<br>

</summary>
<br>
<p>
<b><code>user.name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user.name" data-endpoint="PUTapi-client-users--client_user-" data-component="body" required  hidden>
<br>

</p>
</details>
</p>
<p>
<b><code>ip_address</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="ip_address" data-endpoint="PUTapi-client-users--client_user-" data-component="body" required  hidden>
<br>
valueには、有効なIPアドレスを指定してください。.
</p>
<p>
<b><code>start_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="start_date" data-endpoint="PUTapi-client-users--client_user-" data-component="body" required  hidden>
<br>
valueは、正しい日付ではありません。.
</p>
<p>
<b><code>end_date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="end_date" data-endpoint="PUTapi-client-users--client_user-" data-component="body" required  hidden>
<br>
valueは、正しい日付ではありません。.
</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="phone" data-endpoint="PUTapi-client-users--client_user-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>created_user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="created_user_id" data-endpoint="PUTapi-client-users--client_user-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>updated_user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="updated_user_id" data-endpoint="PUTapi-client-users--client_user-" data-component="body"  hidden>
<br>

</p>

</form>
<h2>api/client-users/{client_user}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://localhost:8080/api/client-users/amet" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/client-users/amet"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-DELETEapi-client-users--client_user-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-client-users--client_user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-client-users--client_user-"></code></pre>
</div>
<div id="execution-error-DELETEapi-client-users--client_user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-client-users--client_user-"></code></pre>
</div>
<form id="form-DELETEapi-client-users--client_user-" data-method="DELETE" data-path="api/client-users/{client_user}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-client-users--client_user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-client-users--client_user-" onclick="tryItOut('DELETEapi-client-users--client_user-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-client-users--client_user-" onclick="cancelTryOut('DELETEapi-client-users--client_user-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-client-users--client_user-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/client-users/{client_user}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>client_user</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="client_user" data-endpoint="DELETEapi-client-users--client_user-" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/client-users/{id}/tos-agreed-date-time</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PATCH \
    "http://localhost:8080/api/client-users/nostrum/tos-agreed-date-time" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/client-users/nostrum/tos-agreed-date-time"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PATCH",
    headers,
}).then(response =&gt; response.json());</code></pre>
<div id="execution-results-PATCHapi-client-users--id--tos-agreed-date-time" hidden>
    <blockquote>Received response<span id="execution-response-status-PATCHapi-client-users--id--tos-agreed-date-time"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-client-users--id--tos-agreed-date-time"></code></pre>
</div>
<div id="execution-error-PATCHapi-client-users--id--tos-agreed-date-time" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-client-users--id--tos-agreed-date-time"></code></pre>
</div>
<form id="form-PATCHapi-client-users--id--tos-agreed-date-time" data-method="PATCH" data-path="api/client-users/{id}/tos-agreed-date-time" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PATCHapi-client-users--id--tos-agreed-date-time', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PATCHapi-client-users--id--tos-agreed-date-time" onclick="tryItOut('PATCHapi-client-users--id--tos-agreed-date-time');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PATCHapi-client-users--id--tos-agreed-date-time" onclick="cancelTryOut('PATCHapi-client-users--id--tos-agreed-date-time');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PATCHapi-client-users--id--tos-agreed-date-time" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/client-users/{id}/tos-agreed-date-time</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="PATCHapi-client-users--id--tos-agreed-date-time" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/sales-members</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/sales-members" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/sales-members"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-sales-members" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-sales-members"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-sales-members"></code></pre>
</div>
<div id="execution-error-GETapi-sales-members" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-sales-members"></code></pre>
</div>
<form id="form-GETapi-sales-members" data-method="GET" data-path="api/sales-members" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-sales-members', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-sales-members" onclick="tryItOut('GETapi-sales-members');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-sales-members" onclick="cancelTryOut('GETapi-sales-members');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-sales-members" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/sales-members</code></b>
</p>
</form>
<h2>api/sales-members</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8080/api/sales-members" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"sequi","email":"yhoeger@example.org","department":"cupiditate"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/sales-members"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "sequi",
    "email": "yhoeger@example.org",
    "department": "cupiditate"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-POSTapi-sales-members" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-sales-members"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-sales-members"></code></pre>
</div>
<div id="execution-error-POSTapi-sales-members" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-sales-members"></code></pre>
</div>
<form id="form-POSTapi-sales-members" data-method="POST" data-path="api/sales-members" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-sales-members', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-sales-members" onclick="tryItOut('POSTapi-sales-members');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-sales-members" onclick="cancelTryOut('POSTapi-sales-members');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-sales-members" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/sales-members</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-sales-members" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-sales-members" data-component="body" required  hidden>
<br>
valueは、有効なメールアドレス形式で指定してください。.
</p>
<p>
<b><code>department</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="department" data-endpoint="POSTapi-sales-members" data-component="body" required  hidden>
<br>

</p>

</form>
<h2>api/sales-members/{sales_member}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/sales-members/similique" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/sales-members/similique"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-sales-members--sales_member-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-sales-members--sales_member-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-sales-members--sales_member-"></code></pre>
</div>
<div id="execution-error-GETapi-sales-members--sales_member-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-sales-members--sales_member-"></code></pre>
</div>
<form id="form-GETapi-sales-members--sales_member-" data-method="GET" data-path="api/sales-members/{sales_member}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-sales-members--sales_member-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-sales-members--sales_member-" onclick="tryItOut('GETapi-sales-members--sales_member-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-sales-members--sales_member-" onclick="cancelTryOut('GETapi-sales-members--sales_member-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-sales-members--sales_member-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/sales-members/{sales_member}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>sales_member</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="sales_member" data-endpoint="GETapi-sales-members--sales_member-" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/sales-members/{sales_member}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost:8080/api/sales-members/alias" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"dolor","email":"mckenzie43@example.com","department":"dolorum"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/sales-members/alias"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "dolor",
    "email": "mckenzie43@example.com",
    "department": "dolorum"
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-PUTapi-sales-members--sales_member-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-sales-members--sales_member-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-sales-members--sales_member-"></code></pre>
</div>
<div id="execution-error-PUTapi-sales-members--sales_member-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-sales-members--sales_member-"></code></pre>
</div>
<form id="form-PUTapi-sales-members--sales_member-" data-method="PUT" data-path="api/sales-members/{sales_member}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-sales-members--sales_member-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-sales-members--sales_member-" onclick="tryItOut('PUTapi-sales-members--sales_member-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-sales-members--sales_member-" onclick="cancelTryOut('PUTapi-sales-members--sales_member-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-sales-members--sales_member-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/sales-members/{sales_member}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/sales-members/{sales_member}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>sales_member</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="sales_member" data-endpoint="PUTapi-sales-members--sales_member-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="PUTapi-sales-members--sales_member-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="PUTapi-sales-members--sales_member-" data-component="body" required  hidden>
<br>
valueは、有効なメールアドレス形式で指定してください。.
</p>
<p>
<b><code>department</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="department" data-endpoint="PUTapi-sales-members--sales_member-" data-component="body" required  hidden>
<br>

</p>

</form>
<h2>api/sales-members/{sales_member}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://localhost:8080/api/sales-members/quibusdam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/sales-members/quibusdam"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-DELETEapi-sales-members--sales_member-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-sales-members--sales_member-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-sales-members--sales_member-"></code></pre>
</div>
<div id="execution-error-DELETEapi-sales-members--sales_member-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-sales-members--sales_member-"></code></pre>
</div>
<form id="form-DELETEapi-sales-members--sales_member-" data-method="DELETE" data-path="api/sales-members/{sales_member}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-sales-members--sales_member-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-sales-members--sales_member-" onclick="tryItOut('DELETEapi-sales-members--sales_member-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-sales-members--sales_member-" onclick="cancelTryOut('DELETEapi-sales-members--sales_member-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-sales-members--sales_member-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/sales-members/{sales_member}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>sales_member</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="sales_member" data-endpoint="DELETEapi-sales-members--sales_member-" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/sales-members/name/list</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/sales-members/name/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/sales-members/name/list"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-sales-members-name-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-sales-members-name-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-sales-members-name-list"></code></pre>
</div>
<div id="execution-error-GETapi-sales-members-name-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-sales-members-name-list"></code></pre>
</div>
<form id="form-GETapi-sales-members-name-list" data-method="GET" data-path="api/sales-members/name/list" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-sales-members-name-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-sales-members-name-list" onclick="tryItOut('GETapi-sales-members-name-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-sales-members-name-list" onclick="cancelTryOut('GETapi-sales-members-name-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-sales-members-name-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/sales-members/name/list</code></b>
</p>
</form>
<h2>api/sales-members/{id}/company_groups</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/sales-members/ea/company_groups" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/sales-members/ea/company_groups"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-sales-members--id--company_groups" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-sales-members--id--company_groups"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-sales-members--id--company_groups"></code></pre>
</div>
<div id="execution-error-GETapi-sales-members--id--company_groups" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-sales-members--id--company_groups"></code></pre>
</div>
<form id="form-GETapi-sales-members--id--company_groups" data-method="GET" data-path="api/sales-members/{id}/company_groups" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-sales-members--id--company_groups', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-sales-members--id--company_groups" onclick="tryItOut('GETapi-sales-members--id--company_groups');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-sales-members--id--company_groups" onclick="cancelTryOut('GETapi-sales-members--id--company_groups');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-sales-members--id--company_groups" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/sales-members/{id}/company_groups</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-sales-members--id--company_groups" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/classifications/name/list</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/classifications/name/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/classifications/name/list"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-classifications-name-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-classifications-name-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-classifications-name-list"></code></pre>
</div>
<div id="execution-error-GETapi-classifications-name-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-classifications-name-list"></code></pre>
</div>
<form id="form-GETapi-classifications-name-list" data-method="GET" data-path="api/classifications/name/list" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-classifications-name-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-classifications-name-list" onclick="tryItOut('GETapi-classifications-name-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-classifications-name-list" onclick="cancelTryOut('GETapi-classifications-name-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-classifications-name-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/classifications/name/list</code></b>
</p>
</form>
<h2>api/allergies/name/list</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/allergies/name/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/allergies/name/list"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-allergies-name-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-allergies-name-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-allergies-name-list"></code></pre>
</div>
<div id="execution-error-GETapi-allergies-name-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-allergies-name-list"></code></pre>
</div>
<form id="form-GETapi-allergies-name-list" data-method="GET" data-path="api/allergies/name/list" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-allergies-name-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-allergies-name-list" onclick="tryItOut('GETapi-allergies-name-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-allergies-name-list" onclick="cancelTryOut('GETapi-allergies-name-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-allergies-name-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/allergies/name/list</code></b>
</p>
</form>
<h2>api/browsing-logs</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/browsing-logs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/browsing-logs"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-browsing-logs" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-browsing-logs"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-browsing-logs"></code></pre>
</div>
<div id="execution-error-GETapi-browsing-logs" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-browsing-logs"></code></pre>
</div>
<form id="form-GETapi-browsing-logs" data-method="GET" data-path="api/browsing-logs" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-browsing-logs', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-browsing-logs" onclick="tryItOut('GETapi-browsing-logs');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-browsing-logs" onclick="cancelTryOut('GETapi-browsing-logs');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-browsing-logs" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/browsing-logs</code></b>
</p>
</form>
<h2>api/browsing-logs</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost:8080/api/browsing-logs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"client_user_id":12,"product_id":5}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/browsing-logs"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "client_user_id": 12,
    "product_id": 5
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-POSTapi-browsing-logs" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-browsing-logs"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-browsing-logs"></code></pre>
</div>
<div id="execution-error-POSTapi-browsing-logs" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-browsing-logs"></code></pre>
</div>
<form id="form-POSTapi-browsing-logs" data-method="POST" data-path="api/browsing-logs" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-browsing-logs', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-browsing-logs" onclick="tryItOut('POSTapi-browsing-logs');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-browsing-logs" onclick="cancelTryOut('POSTapi-browsing-logs');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-browsing-logs" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/browsing-logs</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>client_user_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="client_user_id" data-endpoint="POSTapi-browsing-logs" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>product_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="product_id" data-endpoint="POSTapi-browsing-logs" data-component="body" required  hidden>
<br>

</p>

</form>
<h2>api/browsing-logs/all/list</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/browsing-logs/all/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/browsing-logs/all/list"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-browsing-logs-all-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-browsing-logs-all-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-browsing-logs-all-list"></code></pre>
</div>
<div id="execution-error-GETapi-browsing-logs-all-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-browsing-logs-all-list"></code></pre>
</div>
<form id="form-GETapi-browsing-logs-all-list" data-method="GET" data-path="api/browsing-logs/all/list" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-browsing-logs-all-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-browsing-logs-all-list" onclick="tryItOut('GETapi-browsing-logs-all-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-browsing-logs-all-list" onclick="cancelTryOut('GETapi-browsing-logs-all-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-browsing-logs-all-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/browsing-logs/all/list</code></b>
</p>
</form>
<h2>api/browsing-logs/output/csv</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/browsing-logs/output/csv" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/browsing-logs/output/csv"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-browsing-logs-output-csv" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-browsing-logs-output-csv"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-browsing-logs-output-csv"></code></pre>
</div>
<div id="execution-error-GETapi-browsing-logs-output-csv" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-browsing-logs-output-csv"></code></pre>
</div>
<form id="form-GETapi-browsing-logs-output-csv" data-method="GET" data-path="api/browsing-logs/output/csv" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-browsing-logs-output-csv', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-browsing-logs-output-csv" onclick="tryItOut('GETapi-browsing-logs-output-csv');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-browsing-logs-output-csv" onclick="cancelTryOut('GETapi-browsing-logs-output-csv');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-browsing-logs-output-csv" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/browsing-logs/output/csv</code></b>
</p>
</form>
<h2>api/login-logs/all/list</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/login-logs/all/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/login-logs/all/list"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-login-logs-all-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-login-logs-all-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-login-logs-all-list"></code></pre>
</div>
<div id="execution-error-GETapi-login-logs-all-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-login-logs-all-list"></code></pre>
</div>
<form id="form-GETapi-login-logs-all-list" data-method="GET" data-path="api/login-logs/all/list" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-login-logs-all-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-login-logs-all-list" onclick="tryItOut('GETapi-login-logs-all-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-login-logs-all-list" onclick="cancelTryOut('GETapi-login-logs-all-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-login-logs-all-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/login-logs/all/list</code></b>
</p>
</form>
<h2>api/login-logs/output/csv</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/login-logs/output/csv" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/login-logs/output/csv"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-login-logs-output-csv" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-login-logs-output-csv"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-login-logs-output-csv"></code></pre>
</div>
<div id="execution-error-GETapi-login-logs-output-csv" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-login-logs-output-csv"></code></pre>
</div>
<form id="form-GETapi-login-logs-output-csv" data-method="GET" data-path="api/login-logs/output/csv" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-login-logs-output-csv', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-login-logs-output-csv" onclick="tryItOut('GETapi-login-logs-output-csv');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-login-logs-output-csv" onclick="cancelTryOut('GETapi-login-logs-output-csv');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-login-logs-output-csv" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/login-logs/output/csv</code></b>
</p>
</form>
<h2>api/searching-logs/all/list</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/searching-logs/all/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/searching-logs/all/list"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-searching-logs-all-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-searching-logs-all-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-searching-logs-all-list"></code></pre>
</div>
<div id="execution-error-GETapi-searching-logs-all-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-searching-logs-all-list"></code></pre>
</div>
<form id="form-GETapi-searching-logs-all-list" data-method="GET" data-path="api/searching-logs/all/list" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-searching-logs-all-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-searching-logs-all-list" onclick="tryItOut('GETapi-searching-logs-all-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-searching-logs-all-list" onclick="cancelTryOut('GETapi-searching-logs-all-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-searching-logs-all-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/searching-logs/all/list</code></b>
</p>
</form>
<h2>api/searching-logs/output/csv</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/searching-logs/output/csv" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/searching-logs/output/csv"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-searching-logs-output-csv" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-searching-logs-output-csv"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-searching-logs-output-csv"></code></pre>
</div>
<div id="execution-error-GETapi-searching-logs-output-csv" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-searching-logs-output-csv"></code></pre>
</div>
<form id="form-GETapi-searching-logs-output-csv" data-method="GET" data-path="api/searching-logs/output/csv" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-searching-logs-output-csv', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-searching-logs-output-csv" onclick="tryItOut('GETapi-searching-logs-output-csv');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-searching-logs-output-csv" onclick="cancelTryOut('GETapi-searching-logs-output-csv');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-searching-logs-output-csv" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/searching-logs/output/csv</code></b>
</p>
</form>
<h2>api/zipaddress</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/zipaddress" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/zipaddress"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-zipaddress" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-zipaddress"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-zipaddress"></code></pre>
</div>
<div id="execution-error-GETapi-zipaddress" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-zipaddress"></code></pre>
</div>
<form id="form-GETapi-zipaddress" data-method="GET" data-path="api/zipaddress" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-zipaddress', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-zipaddress" onclick="tryItOut('GETapi-zipaddress');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-zipaddress" onclick="cancelTryOut('GETapi-zipaddress');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-zipaddress" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/zipaddress</code></b>
</p>
</form>
<h2>api/ip-addresses</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/api/ip-addresses" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/ip-addresses"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "result": true
}</code></pre>
<div id="execution-results-GETapi-ip-addresses" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-ip-addresses"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-ip-addresses"></code></pre>
</div>
<div id="execution-error-GETapi-ip-addresses" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-ip-addresses"></code></pre>
</div>
<form id="form-GETapi-ip-addresses" data-method="GET" data-path="api/ip-addresses" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-ip-addresses', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-ip-addresses" onclick="tryItOut('GETapi-ip-addresses');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-ip-addresses" onclick="cancelTryOut('GETapi-ip-addresses');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-ip-addresses" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/ip-addresses</code></b>
</p>
</form>
<h2>{any?}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost:8080/enim" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/enim"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
&lt;!DOCTYPE html&gt;
&lt;html lang="ja"&gt;
  &lt;head&gt;
    &lt;meta charset="utf-8"&gt;
    &lt;meta http-equiv="X-UA-Compatible" content="IE=edge"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1"&gt;
    &lt;meta name="csrf-token" content="V1OMKROKH92DtNwaOLCsPxIpXF5alSQBc7NePbf0"&gt;
    &lt;meta name="robots" content="noindex,nofollow"&gt;
    &lt;title&gt;Laravel&lt;/title&gt;
    &lt;link rel="stylesheet" href="/css/app.css?id=5bf19eede7fc31ed6552"&gt;
    &lt;link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      rel="stylesheet"
    /&gt;
    &lt;link
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap"
      rel="stylesheet"
    /&gt;
    &lt;link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"&gt;
    &lt;link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet"&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;div id="app"&gt;&lt;/div&gt;
  &lt;/body&gt;
  &lt;script src="/js/app.js?id=a040cb69eb40d2d62b45"&gt;&lt;/script&gt;
  &lt;script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"&gt;&lt;/script&gt;
  &lt;script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"&gt;&lt;/script&gt;
  &lt;script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"&gt;&lt;/script&gt;
  &lt;script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"&gt;&lt;/script&gt;
&lt;/html&gt;</code></pre>
<div id="execution-results-GET-any--" hidden>
    <blockquote>Received response<span id="execution-response-status-GET-any--"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GET-any--"></code></pre>
</div>
<div id="execution-error-GET-any--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GET-any--"></code></pre>
</div>
<form id="form-GET-any--" data-method="GET" data-path="{any?}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GET-any--', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GET-any--" onclick="tryItOut('GET-any--');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GET-any--" onclick="cancelTryOut('GET-any--');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GET-any--" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>{any?}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>any</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="any" data-endpoint="GET-any--" data-component="url"  hidden>
<br>

</p>
</form>
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                    <a href="#" data-language-name="bash">bash</a>
                                    <a href="#" data-language-name="javascript">javascript</a>
                            </div>
            </div>
</div>
<script>
    $(function () {
        var languages = ["bash","javascript"];
        setupLanguages(languages);
    });
</script>
</body>
</html>