# ClientUser


## 顧客一覧取得 ページネーション

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/client-users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/client-users"
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
<div id="execution-results-GETapi-client-users" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-client-users"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-client-users"></code></pre>
</div>
<div id="execution-error-GETapi-client-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-client-users"></code></pre>
</div>
<form id="form-GETapi-client-users" data-method="GET" data-path="api/client-users" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-client-users', this);">
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
<p>
<label id="auth-GETapi-client-users" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-client-users" data-component="header"></label>
</p>
</form>


## 顧客登録

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost:8080/api/client-users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"company_id":5,"user":{"name":"dolore","email":"altenwerth.karianne@example.com"},"ip_address":"117.98.255.176","start_date":"2021-05-21T13:56:11+0900","end_date":"2021-05-21T13:56:11+0900","phone":{},"created_user_id":8,"updated_user_id":10}'

```

```javascript
const url = new URL(
    "http://localhost:8080/api/client-users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "company_id": 5,
    "user": {
        "name": "dolore",
        "email": "altenwerth.karianne@example.com"
    },
    "ip_address": "117.98.255.176",
    "start_date": "2021-05-21T13:56:11+0900",
    "end_date": "2021-05-21T13:56:11+0900",
    "phone": {},
    "created_user_id": 8,
    "updated_user_id": 10
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
<div id="execution-results-POSTapi-client-users" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-client-users"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-client-users"></code></pre>
</div>
<div id="execution-error-POSTapi-client-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-client-users"></code></pre>
</div>
<form id="form-POSTapi-client-users" data-method="POST" data-path="api/client-users" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-client-users', this);">
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
<p>
<label id="auth-POSTapi-client-users" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-client-users" data-component="header"></label>
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
<p>
<b><code>user.email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user.email" data-endpoint="POSTapi-client-users" data-component="body" required  hidden>
<br>
valueは、有効なメールアドレス形式で指定してください。.
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


## 顧客1件取得

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/client-users/itaque" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/client-users/itaque"
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
<div id="execution-results-GETapi-client-users--client_user-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-client-users--client_user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-client-users--client_user-"></code></pre>
</div>
<div id="execution-error-GETapi-client-users--client_user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-client-users--client_user-"></code></pre>
</div>
<form id="form-GETapi-client-users--client_user-" data-method="GET" data-path="api/client-users/{client_user}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-client-users--client_user-', this);">
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
<p>
<label id="auth-GETapi-client-users--client_user-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-client-users--client_user-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>client_user</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="client_user" data-endpoint="GETapi-client-users--client_user-" data-component="url" required  hidden>
<br>

</p>
</form>


## 顧客更新

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PUT \
    "http://localhost:8080/api/client-users/tenetur" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"company_id":17,"user":{"name":"vero","email":"walker.walter@example.net"},"ip_address":"185.105.2.170","start_date":"2021-05-21T13:56:11+0900","end_date":"2021-05-21T13:56:11+0900","phone":{},"created_user_id":6,"updated_user_id":17}'

```

```javascript
const url = new URL(
    "http://localhost:8080/api/client-users/tenetur"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "company_id": 17,
    "user": {
        "name": "vero",
        "email": "walker.walter@example.net"
    },
    "ip_address": "185.105.2.170",
    "start_date": "2021-05-21T13:56:11+0900",
    "end_date": "2021-05-21T13:56:11+0900",
    "phone": {},
    "created_user_id": 6,
    "updated_user_id": 17
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
<div id="execution-results-PUTapi-client-users--client_user-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-client-users--client_user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-client-users--client_user-"></code></pre>
</div>
<div id="execution-error-PUTapi-client-users--client_user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-client-users--client_user-"></code></pre>
</div>
<form id="form-PUTapi-client-users--client_user-" data-method="PUT" data-path="api/client-users/{client_user}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-client-users--client_user-', this);">
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
<p>
<label id="auth-PUTapi-client-users--client_user-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-client-users--client_user-" data-component="header"></label>
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
<p>
<b><code>user.email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user.email" data-endpoint="PUTapi-client-users--client_user-" data-component="body" required  hidden>
<br>
valueは、有効なメールアドレス形式で指定してください。.
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


## 顧客削除

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "http://localhost:8080/api/client-users/eveniet" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/client-users/eveniet"
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
<div id="execution-results-DELETEapi-client-users--client_user-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-client-users--client_user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-client-users--client_user-"></code></pre>
</div>
<div id="execution-error-DELETEapi-client-users--client_user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-client-users--client_user-"></code></pre>
</div>
<form id="form-DELETEapi-client-users--client_user-" data-method="DELETE" data-path="api/client-users/{client_user}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-client-users--client_user-', this);">
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
<p>
<label id="auth-DELETEapi-client-users--client_user-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-client-users--client_user-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>client_user</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="client_user" data-endpoint="DELETEapi-client-users--client_user-" data-component="url" required  hidden>
<br>

</p>
</form>


## 利用規約確認日時更新

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PATCH \
    "http://localhost:8080/api/client-users/perferendis/tos-agreed-date-time" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/client-users/perferendis/tos-agreed-date-time"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PATCH",
    headers,
}).then(response => response.json());
```


<div id="execution-results-PATCHapi-client-users--id--tos-agreed-date-time" hidden>
    <blockquote>Received response<span id="execution-response-status-PATCHapi-client-users--id--tos-agreed-date-time"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-client-users--id--tos-agreed-date-time"></code></pre>
</div>
<div id="execution-error-PATCHapi-client-users--id--tos-agreed-date-time" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-client-users--id--tos-agreed-date-time"></code></pre>
</div>
<form id="form-PATCHapi-client-users--id--tos-agreed-date-time" data-method="PATCH" data-path="api/client-users/{id}/tos-agreed-date-time" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PATCHapi-client-users--id--tos-agreed-date-time', this);">
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
<p>
<label id="auth-PATCHapi-client-users--id--tos-agreed-date-time" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PATCHapi-client-users--id--tos-agreed-date-time" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="PATCHapi-client-users--id--tos-agreed-date-time" data-component="url" required  hidden>
<br>

</p>
</form>



