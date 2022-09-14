# LoginLog


## ログイン履歴リスト取得

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/login-logs/all/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/login-logs/all/list"
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
<div id="execution-results-GETapi-login-logs-all-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-login-logs-all-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-login-logs-all-list"></code></pre>
</div>
<div id="execution-error-GETapi-login-logs-all-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-login-logs-all-list"></code></pre>
</div>
<form id="form-GETapi-login-logs-all-list" data-method="GET" data-path="api/login-logs/all/list" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-login-logs-all-list', this);">
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
<p>
<label id="auth-GETapi-login-logs-all-list" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-login-logs-all-list" data-component="header"></label>
</p>
</form>


## ログイン履歴CSV出力

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/login-logs/output/csv" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/login-logs/output/csv"
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
<div id="execution-results-GETapi-login-logs-output-csv" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-login-logs-output-csv"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-login-logs-output-csv"></code></pre>
</div>
<div id="execution-error-GETapi-login-logs-output-csv" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-login-logs-output-csv"></code></pre>
</div>
<form id="form-GETapi-login-logs-output-csv" data-method="GET" data-path="api/login-logs/output/csv" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-login-logs-output-csv', this);">
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
<p>
<label id="auth-GETapi-login-logs-output-csv" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-login-logs-output-csv" data-component="header"></label>
</p>
</form>



