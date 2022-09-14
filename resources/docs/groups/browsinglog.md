# BrowsingLog


## 検索履歴 全件取得

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/browsing-logs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/browsing-logs"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-browsing-logs" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-browsing-logs"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-browsing-logs"></code></pre>
</div>
<div id="execution-error-GETapi-browsing-logs" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-browsing-logs"></code></pre>
</div>
<form id="form-GETapi-browsing-logs" data-method="GET" data-path="api/browsing-logs" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-browsing-logs', this);">
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
<p>
<label id="auth-GETapi-browsing-logs" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-browsing-logs" data-component="header"></label>
</p>
</form>


## 検索履歴 登録

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost:8080/api/browsing-logs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"client_user_id":13,"product_id":2}'

```

```javascript
const url = new URL(
    "http://localhost:8080/api/browsing-logs"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "client_user_id": 13,
    "product_id": 2
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-POSTapi-browsing-logs" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-browsing-logs"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-browsing-logs"></code></pre>
</div>
<div id="execution-error-POSTapi-browsing-logs" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-browsing-logs"></code></pre>
</div>
<form id="form-POSTapi-browsing-logs" data-method="POST" data-path="api/browsing-logs" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-browsing-logs', this);">
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
<p>
<label id="auth-POSTapi-browsing-logs" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-browsing-logs" data-component="header"></label>
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


## 検索履歴リスト 全権取得

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/browsing-logs/all/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/browsing-logs/all/list"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-browsing-logs-all-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-browsing-logs-all-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-browsing-logs-all-list"></code></pre>
</div>
<div id="execution-error-GETapi-browsing-logs-all-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-browsing-logs-all-list"></code></pre>
</div>
<form id="form-GETapi-browsing-logs-all-list" data-method="GET" data-path="api/browsing-logs/all/list" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-browsing-logs-all-list', this);">
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
<p>
<label id="auth-GETapi-browsing-logs-all-list" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-browsing-logs-all-list" data-component="header"></label>
</p>
</form>


## 検索履歴CSV出力

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/browsing-logs/output/csv" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/browsing-logs/output/csv"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-browsing-logs-output-csv" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-browsing-logs-output-csv"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-browsing-logs-output-csv"></code></pre>
</div>
<div id="execution-error-GETapi-browsing-logs-output-csv" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-browsing-logs-output-csv"></code></pre>
</div>
<form id="form-GETapi-browsing-logs-output-csv" data-method="GET" data-path="api/browsing-logs/output/csv" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-browsing-logs-output-csv', this);">
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
<p>
<label id="auth-GETapi-browsing-logs-output-csv" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-browsing-logs-output-csv" data-component="header"></label>
</p>
</form>



