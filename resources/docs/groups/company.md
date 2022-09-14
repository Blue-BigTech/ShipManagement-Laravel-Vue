# Company


## 顧客企業一覧取得 ページネーション

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/companies" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/companies"
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
<div id="execution-results-GETapi-companies" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-companies"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-companies"></code></pre>
</div>
<div id="execution-error-GETapi-companies" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-companies"></code></pre>
</div>
<form id="form-GETapi-companies" data-method="GET" data-path="api/companies" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-companies', this);">
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
<p>
<label id="auth-GETapi-companies" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-companies" data-component="header"></label>
</p>
</form>


## 顧客企業登録

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost:8080/api/companies" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"company_group_id":7,"code":"eos","name":"eligendi","created_user_id":6,"updated_user_id":15}'

```

```javascript
const url = new URL(
    "http://localhost:8080/api/companies"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "company_group_id": 7,
    "code": "eos",
    "name": "eligendi",
    "created_user_id": 6,
    "updated_user_id": 15
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
<div id="execution-results-POSTapi-companies" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-companies"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-companies"></code></pre>
</div>
<div id="execution-error-POSTapi-companies" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-companies"></code></pre>
</div>
<form id="form-POSTapi-companies" data-method="POST" data-path="api/companies" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-companies', this);">
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
<p>
<label id="auth-POSTapi-companies" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-companies" data-component="header"></label>
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


## 顧客企業1件取得

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/companies/sunt" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/companies/sunt"
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
<div id="execution-results-GETapi-companies--company-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-companies--company-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-companies--company-"></code></pre>
</div>
<div id="execution-error-GETapi-companies--company-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-companies--company-"></code></pre>
</div>
<form id="form-GETapi-companies--company-" data-method="GET" data-path="api/companies/{company}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-companies--company-', this);">
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
<p>
<label id="auth-GETapi-companies--company-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-companies--company-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>company</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company" data-endpoint="GETapi-companies--company-" data-component="url" required  hidden>
<br>

</p>
</form>


## 顧客企業更新

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PUT \
    "http://localhost:8080/api/companies/ut" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"company_group_id":15,"code":"iusto","name":"in","created_user_id":9,"updated_user_id":6}'

```

```javascript
const url = new URL(
    "http://localhost:8080/api/companies/ut"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "company_group_id": 15,
    "code": "iusto",
    "name": "in",
    "created_user_id": 9,
    "updated_user_id": 6
}

fetch(url, {
    method: "PUT",
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
<div id="execution-results-PUTapi-companies--company-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-companies--company-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-companies--company-"></code></pre>
</div>
<div id="execution-error-PUTapi-companies--company-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-companies--company-"></code></pre>
</div>
<form id="form-PUTapi-companies--company-" data-method="PUT" data-path="api/companies/{company}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-companies--company-', this);">
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
<p>
<label id="auth-PUTapi-companies--company-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-companies--company-" data-component="header"></label>
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


## 顧客企業削除

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "http://localhost:8080/api/companies/molestiae" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/companies/molestiae"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-DELETEapi-companies--company-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-companies--company-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-companies--company-"></code></pre>
</div>
<div id="execution-error-DELETEapi-companies--company-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-companies--company-"></code></pre>
</div>
<form id="form-DELETEapi-companies--company-" data-method="DELETE" data-path="api/companies/{company}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-companies--company-', this);">
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
<p>
<label id="auth-DELETEapi-companies--company-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-companies--company-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>company</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company" data-endpoint="DELETEapi-companies--company-" data-component="url" required  hidden>
<br>

</p>
</form>



