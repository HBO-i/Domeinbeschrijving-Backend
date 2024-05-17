<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost:8000";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-4.29.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-4.29.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-descriptions">
                                <a href="#endpoints-GETapi-descriptions">Display the descriptions.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-languages">
                                <a href="#endpoints-GETapi-languages">Display the supported languages.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-filters">
                                <a href="#endpoints-GETapi-filters">GET api/filters</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-professional-skills">
                                <a href="#endpoints-GETapi-professional-skills">Show the professional skills descriptions.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-export">
                                <a href="#endpoints-GETapi-export">Retrieve the JSON for the professional duties and professional skills.</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: February 28, 2024</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost:8000</code>
</aside>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETapi-descriptions">Display the descriptions.</h2>

<p>
</p>



<span id="example-requests-GETapi-descriptions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/descriptions?search=&amp;grouping=architecture_layers%2Cactivities%2Clevels&amp;language=1&amp;level[]=1&amp;activity[]=3&amp;architecture_layer[]=2" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/descriptions"
);

const params = {
    "search": "",
    "grouping": "architecture_layers,activities,levels",
    "language": "1",
    "level[0]": "1",
    "activity[0]": "3",
    "architecture_layer[0]": "2",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-descriptions">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 50
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 2,
        &quot;value&quot;: &quot;Organisatieprocessen&quot;,
        &quot;items&quot;: [
            {
                &quot;id&quot;: 3,
                &quot;value&quot;: &quot;Ontwerpen&quot;,
                &quot;items&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;value&quot;: &quot;1&quot;,
                        &quot;items&quot;: [
                            &quot;Ontwerpen van enkele organisatieprocessen, enkele gegevensstromen van gestructureerde data, de inrichting van een organisatieonderdeel en/of een deel van de informatievoorziening&quot;,
                            &quot;Opstellen van een eenvoudig datamanagementplan&quot;,
                            &quot;Opstellen van een eenvoudig implementatieplan&quot;
                        ]
                    }
                ]
            }
        ]
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-descriptions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-descriptions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-descriptions"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-descriptions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-descriptions">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-descriptions" data-method="GET"
      data-path="api/descriptions"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-descriptions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-descriptions"
                    onclick="tryItOut('GETapi-descriptions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-descriptions"
                    onclick="cancelTryOut('GETapi-descriptions');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-descriptions"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/descriptions</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-descriptions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-descriptions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-descriptions"
               value=""
               data-component="query">
    <br>
<p>The search term.</p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>grouping</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="grouping"                data-endpoint="GETapi-descriptions"
               value="architecture_layers,activities,levels"
               data-component="query">
    <br>
<p>A comma seperated order of the grouping. The order must and can only contain the following items: levels, activities, architecture_layers. Example: <code>architecture_layers,activities,levels</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>language</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="language"                data-endpoint="GETapi-descriptions"
               value="1"
               data-component="query">
    <br>
<p>The id of the selected language. Defaults to Dutch. Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>level</code></b>&nbsp;&nbsp;
<small>integer[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="level[0]"                data-endpoint="GETapi-descriptions"
               data-component="query">
        <input type="number" style="display: none"
               name="level[1]"                data-endpoint="GETapi-descriptions"
               data-component="query">
    <br>
<p>Id of the level.</p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>activity</code></b>&nbsp;&nbsp;
<small>integer[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="activity[0]"                data-endpoint="GETapi-descriptions"
               data-component="query">
        <input type="number" style="display: none"
               name="activity[1]"                data-endpoint="GETapi-descriptions"
               data-component="query">
    <br>
<p>Id of the activity.</p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>architecture_layer</code></b>&nbsp;&nbsp;
<small>integer[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="architecture_layer[0]"                data-endpoint="GETapi-descriptions"
               data-component="query">
        <input type="number" style="display: none"
               name="architecture_layer[1]"                data-endpoint="GETapi-descriptions"
               data-component="query">
    <br>
<p>Id of the architecture layer.</p>
            </div>
                </form>

                    <h2 id="endpoints-GETapi-languages">Display the supported languages.</h2>

<p>
</p>



<span id="example-requests-GETapi-languages">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/languages" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/languages"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-languages">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 49
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;value&quot;: &quot;nl&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-languages" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-languages"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-languages"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-languages" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-languages">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-languages" data-method="GET"
      data-path="api/languages"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-languages', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-languages"
                    onclick="tryItOut('GETapi-languages');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-languages"
                    onclick="cancelTryOut('GETapi-languages');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-languages"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/languages</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-languages"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-languages"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-filters">GET api/filters</h2>

<p>
</p>



<span id="example-requests-GETapi-filters">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/filters?language=1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/filters"
);

const params = {
    "language": "1",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-filters">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 48
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;levels&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;value&quot;: &quot;1&quot;
            },
            {
                &quot;id&quot;: 2,
                &quot;value&quot;: &quot;2&quot;
            },
            {
                &quot;id&quot;: 3,
                &quot;value&quot;: &quot;3&quot;
            },
            {
                &quot;id&quot;: 4,
                &quot;value&quot;: &quot;4&quot;
            }
        ],
        &quot;activities&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;value&quot;: &quot;Analyseren&quot;
            },
            {
                &quot;id&quot;: 2,
                &quot;value&quot;: &quot;Adviseren&quot;
            },
            {
                &quot;id&quot;: 3,
                &quot;value&quot;: &quot;Ontwerpen&quot;
            },
            {
                &quot;id&quot;: 4,
                &quot;value&quot;: &quot;Realiseren&quot;
            },
            {
                &quot;id&quot;: 5,
                &quot;value&quot;: &quot;Manage &amp; Control&quot;
            }
        ],
        &quot;architecture_layers&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;value&quot;: &quot;Gebruikersinteractie&quot;
            },
            {
                &quot;id&quot;: 2,
                &quot;value&quot;: &quot;Organisatieprocessen&quot;
            },
            {
                &quot;id&quot;: 3,
                &quot;value&quot;: &quot;Infrastructuur&quot;
            },
            {
                &quot;id&quot;: 4,
                &quot;value&quot;: &quot;Software&quot;
            },
            {
                &quot;id&quot;: 5,
                &quot;value&quot;: &quot;Hardware-Interfacing&quot;
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-filters" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-filters"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-filters"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-filters" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-filters">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-filters" data-method="GET"
      data-path="api/filters"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-filters', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-filters"
                    onclick="tryItOut('GETapi-filters');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-filters"
                    onclick="cancelTryOut('GETapi-filters');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-filters"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/filters</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-filters"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-filters"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>language</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="language"                data-endpoint="GETapi-filters"
               value="1"
               data-component="query">
    <br>
<p>The id of the language. Example: <code>1</code></p>
            </div>
                </form>

                    <h2 id="endpoints-GETapi-professional-skills">Show the professional skills descriptions.</h2>

<p>
</p>



<span id="example-requests-GETapi-professional-skills">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/professional-skills?language=1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/professional-skills"
);

const params = {
    "language": "1",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-professional-skills">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 47
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;value&quot;: &quot;Toekomstgericht organiseren&nbsp;&quot;,
            &quot;competencies&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;value&quot;: &quot;Organisatorische context&nbsp;&quot;,
                    &quot;description&quot;: {
                        &quot;id&quot;: 1,
                        &quot;value&quot;: &quot;Je brengt verschillende omgevingsfactoren (bijvoorbeeld maatschappelijke ontwikkelingen zoals vraagstukken op het gebied van duurzaamheid en/of inclusie) die de uitwerking van de opdracht kunnen be&iuml;nvloeden in beeld en onderneemt op basis hiervan vervolgstappen&quot;
                    }
                },
                {
                    &quot;id&quot;: 2,
                    &quot;value&quot;: &quot;Ethiek&nbsp;&quot;,
                    &quot;description&quot;: {
                        &quot;id&quot;: 2,
                        &quot;value&quot;: &quot;Je weegt maatschappelijke en ethische aspecten (zoals duurzaamheid en inclusie) in de (toegepaste) technologische en professionele context en betrekt deze in het professioneel handelen&quot;
                    }
                },
                {
                    &quot;id&quot;: 3,
                    &quot;value&quot;: &quot;Procesmanagement&quot;,
                    &quot;description&quot;: {
                        &quot;id&quot;: 3,
                        &quot;value&quot;: &quot;Je organiseert en realiseert de opdracht (bijvoorbeeld een projectopdracht) op basis van gestelde randvoorwaarden en draagt zorg voor een duurzame inbedding van de oplevering in de organisatie&quot;
                    }
                }
            ]
        },
        {
            &quot;id&quot;: 2,
            &quot;value&quot;: &quot;Onderzoekend vermogen&nbsp;&quot;,
            &quot;competencies&quot;: [
                {
                    &quot;id&quot;: 4,
                    &quot;value&quot;: &quot;Methodische Probleemaanpak&nbsp;&quot;,
                    &quot;description&quot;: {
                        &quot;id&quot;: 4,
                        &quot;value&quot;: &quot;Je brengt relevante vraagstukken en/of mogelijkheden in beeld, identificeert welke kennis ontbreekt en plant vervolgstappen in het onderzoek op gestructureerde en kritische wijze, waarbij je kiest voor methoden die passen bij het voorliggende vraagstuk&quot;
                    }
                },
                {
                    &quot;id&quot;: 5,
                    &quot;value&quot;: &quot;Onderzoek&nbsp;&quot;,
                    &quot;description&quot;: {
                        &quot;id&quot;: 5,
                        &quot;value&quot;: &quot;Je voert onderzoek doorlopend met een open houding op onderbouwde,&nbsp; pragmatische, gestructureerde en kritische wijze uit&quot;
                    }
                },
                {
                    &quot;id&quot;: 6,
                    &quot;value&quot;: &quot;Oplossing&quot;,
                    &quot;description&quot;: {
                        &quot;id&quot;: 6,
                        &quot;value&quot;: &quot;Je past de uit onderzoek verkregen informatie toe binnen de context van het vraagstuk en doet voorstellen op basis van de verkregen informatie. Je blijft hierbij kritisch en open voor alternatieve idee&euml;n en werkwijzen&quot;
                    }
                }
            ]
        },
        {
            &quot;id&quot;: 3,
            &quot;value&quot;: &quot;Persoonlijk leiderschap&nbsp;&quot;,
            &quot;competencies&quot;: [
                {
                    &quot;id&quot;: 7,
                    &quot;value&quot;: &quot;Ondernemend zijn&nbsp;&quot;,
                    &quot;description&quot;: {
                        &quot;id&quot;: 7,
                        &quot;value&quot;: &quot;Je werkt doelgericht en acteert weloverwogen op nieuwe kansen/initiatieven, waarin je samenwerkingspartners betrekt (denk aan teamleden, opdrachtgevers, eindgebruikers, maatschappelijke organisaties en/of andere stakeholders)&quot;
                    }
                },
                {
                    &quot;id&quot;: 8,
                    &quot;value&quot;: &quot;Persoonlijke ontwikkeling&nbsp;&quot;,
                    &quot;description&quot;: {
                        &quot;id&quot;: 8,
                        &quot;value&quot;: &quot;Je onderbouwt studie- en loopbaankeuzes en stuurt je eigen leerontwikkeling beargumenteerd bij (bijvoorbeeld middels reflectie en/of feedback)&quot;
                    }
                },
                {
                    &quot;id&quot;: 9,
                    &quot;value&quot;: &quot;Persoonlijke profilering&nbsp;&quot;,
                    &quot;description&quot;: {
                        &quot;id&quot;: 9,
                        &quot;value&quot;: &quot;Je evalueert regelmatig persoonlijke ambities en kwaliteiten in relatie tot de gewenste positionering in het werkveld en onderneemt hier op passende wijze actie op&quot;
                    }
                }
            ]
        },
        {
            &quot;id&quot;: 4,
            &quot;value&quot;: &quot;Doelgericht interacteren&nbsp;&quot;,
            &quot;competencies&quot;: [
                {
                    &quot;id&quot;: 10,
                    &quot;value&quot;: &quot;Partners&nbsp;&quot;,
                    &quot;description&quot;: {
                        &quot;id&quot;: 10,
                        &quot;value&quot;: &quot;Je onderhoudt actief de relatie met relevante samenwerkingspartners (denk aan teamleden, opdrachtgevers, eindgebruikers, maatschappelijke organisaties en/of andere stakeholders)&quot;
                    }
                },
                {
                    &quot;id&quot;: 11,
                    &quot;value&quot;: &quot;Communicatie&quot;,
                    &quot;description&quot;: {
                        &quot;id&quot;: 11,
                        &quot;value&quot;: &quot;Je stemt je communicatie weloverwogen en doelgericht af op de doelgroep(en)&quot;
                    }
                },
                {
                    &quot;id&quot;: 12,
                    &quot;value&quot;: &quot;Samenwerking&quot;,
                    &quot;description&quot;: {
                        &quot;id&quot;: 12,
                        &quot;value&quot;: &quot;Je werkt bewust, op constructieve wijze en in de geschikte vorm samen, waarbij je verantwoordelijkheid neemt voor jouw deel in de samenwerking (bijvoorbeeld in interdisciplinaire en/of interculturele context) en het eindresultaat&quot;
                    }
                }
            ]
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-professional-skills" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-professional-skills"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-professional-skills"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-professional-skills" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-professional-skills">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-professional-skills" data-method="GET"
      data-path="api/professional-skills"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-professional-skills', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-professional-skills"
                    onclick="tryItOut('GETapi-professional-skills');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-professional-skills"
                    onclick="cancelTryOut('GETapi-professional-skills');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-professional-skills"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/professional-skills</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-professional-skills"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-professional-skills"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>language</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="language"                data-endpoint="GETapi-professional-skills"
               value="1"
               data-component="query">
    <br>
<p>The id of the language to use. Example: <code>1</code></p>
            </div>
                </form>

                    <h2 id="endpoints-GETapi-export">Retrieve the JSON for the professional duties and professional skills.</h2>

<p>
</p>



<span id="example-requests-GETapi-export">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/export?search=&amp;grouping=architecture_layers%2Cactivities%2Clevels&amp;language=1&amp;level[]=1&amp;activity[]=3&amp;architecture_layer[]=2" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/export"
);

const params = {
    "search": "",
    "grouping": "architecture_layers,activities,levels",
    "language": "1",
    "level[0]": "1",
    "activity[0]": "3",
    "architecture_layer[0]": "2",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-export">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 46
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;professional_skills&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;value&quot;: &quot;Toekomstgericht organiseren&nbsp;&quot;,
                &quot;competencies&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;value&quot;: &quot;Organisatorische context&nbsp;&quot;,
                        &quot;description&quot;: {
                            &quot;id&quot;: 1,
                            &quot;value&quot;: &quot;Je brengt verschillende omgevingsfactoren (bijvoorbeeld maatschappelijke ontwikkelingen zoals vraagstukken op het gebied van duurzaamheid en/of inclusie) die de uitwerking van de opdracht kunnen be&iuml;nvloeden in beeld en onderneemt op basis hiervan vervolgstappen&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 2,
                        &quot;value&quot;: &quot;Ethiek&nbsp;&quot;,
                        &quot;description&quot;: {
                            &quot;id&quot;: 2,
                            &quot;value&quot;: &quot;Je weegt maatschappelijke en ethische aspecten (zoals duurzaamheid en inclusie) in de (toegepaste) technologische en professionele context en betrekt deze in het professioneel handelen&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 3,
                        &quot;value&quot;: &quot;Procesmanagement&quot;,
                        &quot;description&quot;: {
                            &quot;id&quot;: 3,
                            &quot;value&quot;: &quot;Je organiseert en realiseert de opdracht (bijvoorbeeld een projectopdracht) op basis van gestelde randvoorwaarden en draagt zorg voor een duurzame inbedding van de oplevering in de organisatie&quot;
                        }
                    }
                ]
            },
            {
                &quot;id&quot;: 2,
                &quot;value&quot;: &quot;Onderzoekend vermogen&nbsp;&quot;,
                &quot;competencies&quot;: [
                    {
                        &quot;id&quot;: 4,
                        &quot;value&quot;: &quot;Methodische Probleemaanpak&nbsp;&quot;,
                        &quot;description&quot;: {
                            &quot;id&quot;: 4,
                            &quot;value&quot;: &quot;Je brengt relevante vraagstukken en/of mogelijkheden in beeld, identificeert welke kennis ontbreekt en plant vervolgstappen in het onderzoek op gestructureerde en kritische wijze, waarbij je kiest voor methoden die passen bij het voorliggende vraagstuk&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 5,
                        &quot;value&quot;: &quot;Onderzoek&nbsp;&quot;,
                        &quot;description&quot;: {
                            &quot;id&quot;: 5,
                            &quot;value&quot;: &quot;Je voert onderzoek doorlopend met een open houding op onderbouwde,&nbsp; pragmatische, gestructureerde en kritische wijze uit&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 6,
                        &quot;value&quot;: &quot;Oplossing&quot;,
                        &quot;description&quot;: {
                            &quot;id&quot;: 6,
                            &quot;value&quot;: &quot;Je past de uit onderzoek verkregen informatie toe binnen de context van het vraagstuk en doet voorstellen op basis van de verkregen informatie. Je blijft hierbij kritisch en open voor alternatieve idee&euml;n en werkwijzen&quot;
                        }
                    }
                ]
            },
            {
                &quot;id&quot;: 3,
                &quot;value&quot;: &quot;Persoonlijk leiderschap&nbsp;&quot;,
                &quot;competencies&quot;: [
                    {
                        &quot;id&quot;: 7,
                        &quot;value&quot;: &quot;Ondernemend zijn&nbsp;&quot;,
                        &quot;description&quot;: {
                            &quot;id&quot;: 7,
                            &quot;value&quot;: &quot;Je werkt doelgericht en acteert weloverwogen op nieuwe kansen/initiatieven, waarin je samenwerkingspartners betrekt (denk aan teamleden, opdrachtgevers, eindgebruikers, maatschappelijke organisaties en/of andere stakeholders)&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 8,
                        &quot;value&quot;: &quot;Persoonlijke ontwikkeling&nbsp;&quot;,
                        &quot;description&quot;: {
                            &quot;id&quot;: 8,
                            &quot;value&quot;: &quot;Je onderbouwt studie- en loopbaankeuzes en stuurt je eigen leerontwikkeling beargumenteerd bij (bijvoorbeeld middels reflectie en/of feedback)&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 9,
                        &quot;value&quot;: &quot;Persoonlijke profilering&nbsp;&quot;,
                        &quot;description&quot;: {
                            &quot;id&quot;: 9,
                            &quot;value&quot;: &quot;Je evalueert regelmatig persoonlijke ambities en kwaliteiten in relatie tot de gewenste positionering in het werkveld en onderneemt hier op passende wijze actie op&quot;
                        }
                    }
                ]
            },
            {
                &quot;id&quot;: 4,
                &quot;value&quot;: &quot;Doelgericht interacteren&nbsp;&quot;,
                &quot;competencies&quot;: [
                    {
                        &quot;id&quot;: 10,
                        &quot;value&quot;: &quot;Partners&nbsp;&quot;,
                        &quot;description&quot;: {
                            &quot;id&quot;: 10,
                            &quot;value&quot;: &quot;Je onderhoudt actief de relatie met relevante samenwerkingspartners (denk aan teamleden, opdrachtgevers, eindgebruikers, maatschappelijke organisaties en/of andere stakeholders)&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 11,
                        &quot;value&quot;: &quot;Communicatie&quot;,
                        &quot;description&quot;: {
                            &quot;id&quot;: 11,
                            &quot;value&quot;: &quot;Je stemt je communicatie weloverwogen en doelgericht af op de doelgroep(en)&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 12,
                        &quot;value&quot;: &quot;Samenwerking&quot;,
                        &quot;description&quot;: {
                            &quot;id&quot;: 12,
                            &quot;value&quot;: &quot;Je werkt bewust, op constructieve wijze en in de geschikte vorm samen, waarbij je verantwoordelijkheid neemt voor jouw deel in de samenwerking (bijvoorbeeld in interdisciplinaire en/of interculturele context) en het eindresultaat&quot;
                        }
                    }
                ]
            }
        ],
        &quot;professional_duties&quot;: [
            {
                &quot;id&quot;: 2,
                &quot;value&quot;: &quot;Organisatieprocessen&quot;,
                &quot;items&quot;: [
                    {
                        &quot;id&quot;: 3,
                        &quot;value&quot;: &quot;Ontwerpen&quot;,
                        &quot;items&quot;: [
                            {
                                &quot;id&quot;: 1,
                                &quot;value&quot;: &quot;1&quot;,
                                &quot;items&quot;: [
                                    &quot;Ontwerpen van enkele organisatieprocessen, enkele gegevensstromen van gestructureerde data, de inrichting van een organisatieonderdeel en/of een deel van de informatievoorziening&quot;,
                                    &quot;Opstellen van een eenvoudig datamanagementplan&quot;,
                                    &quot;Opstellen van een eenvoudig implementatieplan&quot;
                                ]
                            }
                        ]
                    }
                ]
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-export" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-export"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-export"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-export" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-export">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-export" data-method="GET"
      data-path="api/export"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-export', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-export"
                    onclick="tryItOut('GETapi-export');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-export"
                    onclick="cancelTryOut('GETapi-export');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-export"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/export</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-export"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-export"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="GETapi-export"
               value=""
               data-component="query">
    <br>
<p>The search term.</p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>grouping</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="grouping"                data-endpoint="GETapi-export"
               value="architecture_layers,activities,levels"
               data-component="query">
    <br>
<p>A comma seperated order of the grouping. The order must and can only contain the following items: levels, activities, architecture_layers. Example: <code>architecture_layers,activities,levels</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>language</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="language"                data-endpoint="GETapi-export"
               value="1"
               data-component="query">
    <br>
<p>The id of the selected language. Defaults to Dutch. Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>level</code></b>&nbsp;&nbsp;
<small>integer[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="level[0]"                data-endpoint="GETapi-export"
               data-component="query">
        <input type="number" style="display: none"
               name="level[1]"                data-endpoint="GETapi-export"
               data-component="query">
    <br>
<p>Id of the level.</p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>activity</code></b>&nbsp;&nbsp;
<small>integer[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="activity[0]"                data-endpoint="GETapi-export"
               data-component="query">
        <input type="number" style="display: none"
               name="activity[1]"                data-endpoint="GETapi-export"
               data-component="query">
    <br>
<p>Id of the activity.</p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>architecture_layer</code></b>&nbsp;&nbsp;
<small>integer[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="architecture_layer[0]"                data-endpoint="GETapi-export"
               data-component="query">
        <input type="number" style="display: none"
               name="architecture_layer[1]"                data-endpoint="GETapi-export"
               data-component="query">
    <br>
<p>Id of the architecture layer.</p>
            </div>
                </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
