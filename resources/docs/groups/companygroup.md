# CompanyGroup


## 顧客グループ一覧取得 ページネーション

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/company-groups" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/company-groups"
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
<div id="execution-results-GETapi-company-groups" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-company-groups"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-company-groups"></code></pre>
</div>
<div id="execution-error-GETapi-company-groups" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-company-groups"></code></pre>
</div>
<form id="form-GETapi-company-groups" data-method="GET" data-path="api/company-groups" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-company-groups', this);">
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
<p>
<label id="auth-GETapi-company-groups" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-company-groups" data-component="header"></label>
</p>
</form>


## 顧客グループ登録

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost:8080/api/company-groups" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"code":"in","name":"est","externally_name":"aspernatur","created_user_id":15,"updated_user_id":15}'

```

```javascript
const url = new URL(
    "http://localhost:8080/api/company-groups"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "code": "in",
    "name": "est",
    "externally_name": "aspernatur",
    "created_user_id": 15,
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
<div id="execution-results-POSTapi-company-groups" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-company-groups"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-company-groups"></code></pre>
</div>
<div id="execution-error-POSTapi-company-groups" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-company-groups"></code></pre>
</div>
<form id="form-POSTapi-company-groups" data-method="POST" data-path="api/company-groups" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-company-groups', this);">
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
<p>
<label id="auth-POSTapi-company-groups" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-company-groups" data-component="header"></label>
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


## 顧客グループ1件取得

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/company-groups/ut" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/company-groups/ut"
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
<div id="execution-results-GETapi-company-groups--company_group-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-company-groups--company_group-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-company-groups--company_group-"></code></pre>
</div>
<div id="execution-error-GETapi-company-groups--company_group-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-company-groups--company_group-"></code></pre>
</div>
<form id="form-GETapi-company-groups--company_group-" data-method="GET" data-path="api/company-groups/{company_group}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-company-groups--company_group-', this);">
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
<p>
<label id="auth-GETapi-company-groups--company_group-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-company-groups--company_group-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>company_group</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company_group" data-endpoint="GETapi-company-groups--company_group-" data-component="url" required  hidden>
<br>

</p>
</form>


## 顧客グループ更新

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PUT \
    "http://localhost:8080/api/company-groups/qui" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"code":"similique","name":"necessitatibus","externally_name":"voluptatum","created_user_id":1,"updated_user_id":8}'

```

```javascript
const url = new URL(
    "http://localhost:8080/api/company-groups/qui"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "code": "similique",
    "name": "necessitatibus",
    "externally_name": "voluptatum",
    "created_user_id": 1,
    "updated_user_id": 8
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
<div id="execution-results-PUTapi-company-groups--company_group-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-company-groups--company_group-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-company-groups--company_group-"></code></pre>
</div>
<div id="execution-error-PUTapi-company-groups--company_group-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-company-groups--company_group-"></code></pre>
</div>
<form id="form-PUTapi-company-groups--company_group-" data-method="PUT" data-path="api/company-groups/{company_group}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-company-groups--company_group-', this);">
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
<p>
<label id="auth-PUTapi-company-groups--company_group-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-company-groups--company_group-" data-component="header"></label>
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


## 顧客グループ削除

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "http://localhost:8080/api/company-groups/assumenda" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/company-groups/assumenda"
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
<div id="execution-results-DELETEapi-company-groups--company_group-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-company-groups--company_group-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-company-groups--company_group-"></code></pre>
</div>
<div id="execution-error-DELETEapi-company-groups--company_group-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-company-groups--company_group-"></code></pre>
</div>
<form id="form-DELETEapi-company-groups--company_group-" data-method="DELETE" data-path="api/company-groups/{company_group}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-company-groups--company_group-', this);">
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
<p>
<label id="auth-DELETEapi-company-groups--company_group-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-company-groups--company_group-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>company_group</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="company_group" data-endpoint="DELETEapi-company-groups--company_group-" data-component="url" required  hidden>
<br>

</p>
</form>


## 顧客グループリスト取得

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/company-groups/name/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/company-groups/name/list"
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
<div id="execution-results-GETapi-company-groups-name-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-company-groups-name-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-company-groups-name-list"></code></pre>
</div>
<div id="execution-error-GETapi-company-groups-name-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-company-groups-name-list"></code></pre>
</div>
<form id="form-GETapi-company-groups-name-list" data-method="GET" data-path="api/company-groups/name/list" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-company-groups-name-list', this);">
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
<p>
<label id="auth-GETapi-company-groups-name-list" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-company-groups-name-list" data-component="header"></label>
</p>
</form>


## 顧客グループ別営業担当者一覧取得

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/company-groups/labore/sales-members" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/company-groups/labore/sales-members"
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
<div id="execution-results-GETapi-company-groups--id--sales-members" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-company-groups--id--sales-members"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-company-groups--id--sales-members"></code></pre>
</div>
<div id="execution-error-GETapi-company-groups--id--sales-members" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-company-groups--id--sales-members"></code></pre>
</div>
<form id="form-GETapi-company-groups--id--sales-members" data-method="GET" data-path="api/company-groups/{id}/sales-members" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-company-groups--id--sales-members', this);">
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
<p>
<label id="auth-GETapi-company-groups--id--sales-members" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-company-groups--id--sales-members" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-company-groups--id--sales-members" data-component="url" required  hidden>
<br>

</p>
</form>


## 顧客グループ別営業担当者作成

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost:8080/api/company-groups/ratione/sales-members" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/company-groups/ratione/sales-members"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-POSTapi-company-groups--id--sales-members" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-company-groups--id--sales-members"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-company-groups--id--sales-members"></code></pre>
</div>
<div id="execution-error-POSTapi-company-groups--id--sales-members" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-company-groups--id--sales-members"></code></pre>
</div>
<form id="form-POSTapi-company-groups--id--sales-members" data-method="POST" data-path="api/company-groups/{id}/sales-members" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-company-groups--id--sales-members', this);">
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
<p>
<label id="auth-POSTapi-company-groups--id--sales-members" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-company-groups--id--sales-members" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-company-groups--id--sales-members" data-component="url" required  hidden>
<br>

</p>
</form>


## 顧客グループ別営業担当者削除

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "http://localhost:8080/api/company-groups/hic/sales-members/assumenda" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/company-groups/hic/sales-members/assumenda"
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
<div id="execution-results-DELETEapi-company-groups--id--sales-members--salesMemberId-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-company-groups--id--sales-members--salesMemberId-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-company-groups--id--sales-members--salesMemberId-"></code></pre>
</div>
<div id="execution-error-DELETEapi-company-groups--id--sales-members--salesMemberId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-company-groups--id--sales-members--salesMemberId-"></code></pre>
</div>
<form id="form-DELETEapi-company-groups--id--sales-members--salesMemberId-" data-method="DELETE" data-path="api/company-groups/{id}/sales-members/{salesMemberId}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-company-groups--id--sales-members--salesMemberId-', this);">
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
<p>
<label id="auth-DELETEapi-company-groups--id--sales-members--salesMemberId-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-company-groups--id--sales-members--salesMemberId-" data-component="header"></label>
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


## 顧客グループ別商品一覧取得

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/company-groups/iure/products" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/company-groups/iure/products"
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
<div id="execution-results-GETapi-company-groups--id--products" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-company-groups--id--products"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-company-groups--id--products"></code></pre>
</div>
<div id="execution-error-GETapi-company-groups--id--products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-company-groups--id--products"></code></pre>
</div>
<form id="form-GETapi-company-groups--id--products" data-method="GET" data-path="api/company-groups/{id}/products" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-company-groups--id--products', this);">
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
<p>
<label id="auth-GETapi-company-groups--id--products" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-company-groups--id--products" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-company-groups--id--products" data-component="url" required  hidden>
<br>

</p>
</form>


## 顧客グループ別商品作成

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost:8080/api/company-groups/aspernatur/products" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/company-groups/aspernatur/products"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-POSTapi-company-groups--id--products" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-company-groups--id--products"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-company-groups--id--products"></code></pre>
</div>
<div id="execution-error-POSTapi-company-groups--id--products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-company-groups--id--products"></code></pre>
</div>
<form id="form-POSTapi-company-groups--id--products" data-method="POST" data-path="api/company-groups/{id}/products" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-company-groups--id--products', this);">
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
<p>
<label id="auth-POSTapi-company-groups--id--products" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-company-groups--id--products" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-company-groups--id--products" data-component="url" required  hidden>
<br>

</p>
</form>


## 顧客グループ別商品更新

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PATCH \
    "http://localhost:8080/api/company-groups/perspiciatis/products/molestiae" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"company_group_id":11,"product_id":10,"is_display":false}'

```

```javascript
const url = new URL(
    "http://localhost:8080/api/company-groups/perspiciatis/products/molestiae"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "company_group_id": 11,
    "product_id": 10,
    "is_display": false
}

fetch(url, {
    method: "PATCH",
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
<div id="execution-results-PATCHapi-company-groups--id--products--productId-" hidden>
    <blockquote>Received response<span id="execution-response-status-PATCHapi-company-groups--id--products--productId-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-company-groups--id--products--productId-"></code></pre>
</div>
<div id="execution-error-PATCHapi-company-groups--id--products--productId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-company-groups--id--products--productId-"></code></pre>
</div>
<form id="form-PATCHapi-company-groups--id--products--productId-" data-method="PATCH" data-path="api/company-groups/{id}/products/{productId}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PATCHapi-company-groups--id--products--productId-', this);">
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
<p>
<label id="auth-PATCHapi-company-groups--id--products--productId-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PATCHapi-company-groups--id--products--productId-" data-component="header"></label>
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


## 顧客グループ別商品削除

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "http://localhost:8080/api/company-groups/quas/products/fugit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/company-groups/quas/products/fugit"
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
<div id="execution-results-DELETEapi-company-groups--id--products--salesMemberId-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-company-groups--id--products--salesMemberId-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-company-groups--id--products--salesMemberId-"></code></pre>
</div>
<div id="execution-error-DELETEapi-company-groups--id--products--salesMemberId-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-company-groups--id--products--salesMemberId-"></code></pre>
</div>
<form id="form-DELETEapi-company-groups--id--products--salesMemberId-" data-method="DELETE" data-path="api/company-groups/{id}/products/{salesMemberId}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-company-groups--id--products--salesMemberId-', this);">
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
<p>
<label id="auth-DELETEapi-company-groups--id--products--salesMemberId-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-company-groups--id--products--salesMemberId-" data-component="header"></label>
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


## 顧客グループ別商品CSV出力

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/company-groups/placeat/products/output/csv" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/company-groups/placeat/products/output/csv"
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
<div id="execution-results-GETapi-company-groups--id--products-output-csv" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-company-groups--id--products-output-csv"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-company-groups--id--products-output-csv"></code></pre>
</div>
<div id="execution-error-GETapi-company-groups--id--products-output-csv" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-company-groups--id--products-output-csv"></code></pre>
</div>
<form id="form-GETapi-company-groups--id--products-output-csv" data-method="GET" data-path="api/company-groups/{id}/products/output/csv" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-company-groups--id--products-output-csv', this);">
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
<p>
<label id="auth-GETapi-company-groups--id--products-output-csv" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-company-groups--id--products-output-csv" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-company-groups--id--products-output-csv" data-component="url" required  hidden>
<br>

</p>
</form>



