# SalesMember


## 営業担当者一覧取得 ページネーション

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/sales-members" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/sales-members"
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
<div id="execution-results-GETapi-sales-members" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-sales-members"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-sales-members"></code></pre>
</div>
<div id="execution-error-GETapi-sales-members" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-sales-members"></code></pre>
</div>
<form id="form-GETapi-sales-members" data-method="GET" data-path="api/sales-members" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-sales-members', this);">
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
<p>
<label id="auth-GETapi-sales-members" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-sales-members" data-component="header"></label>
</p>
</form>


## 営業担当者登録

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost:8080/api/sales-members" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"sit","email":"smarvin@example.com","department":"dolor"}'

```

```javascript
const url = new URL(
    "http://localhost:8080/api/sales-members"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "sit",
    "email": "smarvin@example.com",
    "department": "dolor"
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
<div id="execution-results-POSTapi-sales-members" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-sales-members"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-sales-members"></code></pre>
</div>
<div id="execution-error-POSTapi-sales-members" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-sales-members"></code></pre>
</div>
<form id="form-POSTapi-sales-members" data-method="POST" data-path="api/sales-members" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-sales-members', this);">
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
<p>
<label id="auth-POSTapi-sales-members" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-sales-members" data-component="header"></label>
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


## 営業担当者取得

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/sales-members/aliquid" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/sales-members/aliquid"
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
<div id="execution-results-GETapi-sales-members--sales_member-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-sales-members--sales_member-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-sales-members--sales_member-"></code></pre>
</div>
<div id="execution-error-GETapi-sales-members--sales_member-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-sales-members--sales_member-"></code></pre>
</div>
<form id="form-GETapi-sales-members--sales_member-" data-method="GET" data-path="api/sales-members/{sales_member}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-sales-members--sales_member-', this);">
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
<p>
<label id="auth-GETapi-sales-members--sales_member-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-sales-members--sales_member-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>sales_member</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="sales_member" data-endpoint="GETapi-sales-members--sales_member-" data-component="url" required  hidden>
<br>

</p>
</form>


## 営業担当者更新

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PUT \
    "http://localhost:8080/api/sales-members/et" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"dignissimos","email":"kweissnat@example.com","department":"voluptate"}'

```

```javascript
const url = new URL(
    "http://localhost:8080/api/sales-members/et"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "dignissimos",
    "email": "kweissnat@example.com",
    "department": "voluptate"
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
<div id="execution-results-PUTapi-sales-members--sales_member-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-sales-members--sales_member-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-sales-members--sales_member-"></code></pre>
</div>
<div id="execution-error-PUTapi-sales-members--sales_member-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-sales-members--sales_member-"></code></pre>
</div>
<form id="form-PUTapi-sales-members--sales_member-" data-method="PUT" data-path="api/sales-members/{sales_member}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-sales-members--sales_member-', this);">
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
<p>
<label id="auth-PUTapi-sales-members--sales_member-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-sales-members--sales_member-" data-component="header"></label>
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


## 営業担当者削除

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "http://localhost:8080/api/sales-members/expedita" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/sales-members/expedita"
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
<div id="execution-results-DELETEapi-sales-members--sales_member-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-sales-members--sales_member-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-sales-members--sales_member-"></code></pre>
</div>
<div id="execution-error-DELETEapi-sales-members--sales_member-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-sales-members--sales_member-"></code></pre>
</div>
<form id="form-DELETEapi-sales-members--sales_member-" data-method="DELETE" data-path="api/sales-members/{sales_member}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-sales-members--sales_member-', this);">
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
<p>
<label id="auth-DELETEapi-sales-members--sales_member-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-sales-members--sales_member-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>sales_member</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="sales_member" data-endpoint="DELETEapi-sales-members--sales_member-" data-component="url" required  hidden>
<br>

</p>
</form>


## 営業担当者リスト取得

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/sales-members/name/list?company_group_id=voluptas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/sales-members/name/list"
);

let params = {
    "company_group_id": "voluptas",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

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
<div id="execution-results-GETapi-sales-members-name-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-sales-members-name-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-sales-members-name-list"></code></pre>
</div>
<div id="execution-error-GETapi-sales-members-name-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-sales-members-name-list"></code></pre>
</div>
<form id="form-GETapi-sales-members-name-list" data-method="GET" data-path="api/sales-members/name/list" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-sales-members-name-list', this);">
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
<p>
<label id="auth-GETapi-sales-members-name-list" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-sales-members-name-list" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>company_group_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="company_group_id" data-endpoint="GETapi-sales-members-name-list" data-component="query"  hidden>
<br>

</p>
</form>


## 企業グループ取得

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/sales-members/natus/company_groups" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/sales-members/natus/company_groups"
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
<div id="execution-results-GETapi-sales-members--id--company_groups" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-sales-members--id--company_groups"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-sales-members--id--company_groups"></code></pre>
</div>
<div id="execution-error-GETapi-sales-members--id--company_groups" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-sales-members--id--company_groups"></code></pre>
</div>
<form id="form-GETapi-sales-members--id--company_groups" data-method="GET" data-path="api/sales-members/{id}/company_groups" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-sales-members--id--company_groups', this);">
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
<p>
<label id="auth-GETapi-sales-members--id--company_groups" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-sales-members--id--company_groups" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-sales-members--id--company_groups" data-component="url" required  hidden>
<br>

</p>
</form>



