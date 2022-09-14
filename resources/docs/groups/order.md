# Order


## 注文履歴一覧取得

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/orders?keyword=eos&sort_key=sint&order_by=voluptatem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/orders"
);

let params = {
    "keyword": "eos",
    "sort_key": "sint",
    "order_by": "voluptatem",
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
<div id="execution-results-GETapi-orders" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-orders"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-orders"></code></pre>
</div>
<div id="execution-error-GETapi-orders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-orders"></code></pre>
</div>
<form id="form-GETapi-orders" data-method="GET" data-path="api/orders" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-orders', this);">
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
<p>
<label id="auth-GETapi-orders" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-orders" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>keyword</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="keyword" data-endpoint="GETapi-orders" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>sort_key</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="sort_key" data-endpoint="GETapi-orders" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>order_by</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="order_by" data-endpoint="GETapi-orders" data-component="query"  hidden>
<br>

</p>
</form>


## 注文履歴登録

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost:8080/api/orders" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"client_user_id":12,"shipping_address_id":18,"desired_arrival_date":"2021-05-21T13:56:10+0900","comment":"nulla","created_user_id":7,"updated_user_id":7}'

```

```javascript
const url = new URL(
    "http://localhost:8080/api/orders"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "client_user_id": 12,
    "shipping_address_id": 18,
    "desired_arrival_date": "2021-05-21T13:56:10+0900",
    "comment": "nulla",
    "created_user_id": 7,
    "updated_user_id": 7
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
<div id="execution-results-POSTapi-orders" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-orders"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-orders"></code></pre>
</div>
<div id="execution-error-POSTapi-orders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-orders"></code></pre>
</div>
<form id="form-POSTapi-orders" data-method="POST" data-path="api/orders" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-orders', this);">
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
<p>
<label id="auth-POSTapi-orders" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-orders" data-component="header"></label>
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


## 注文履歴1件取得

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/orders/voluptatum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/orders/voluptatum"
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
<div id="execution-results-GETapi-orders--order-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-orders--order-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-orders--order-"></code></pre>
</div>
<div id="execution-error-GETapi-orders--order-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-orders--order-"></code></pre>
</div>
<form id="form-GETapi-orders--order-" data-method="GET" data-path="api/orders/{order}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-orders--order-', this);">
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
<p>
<label id="auth-GETapi-orders--order-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-orders--order-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>order</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="order" data-endpoint="GETapi-orders--order-" data-component="url" required  hidden>
<br>

</p>
</form>


## 顧客別注文履歴リスト取得

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/orders/client-users/dignissimos/histories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/orders/client-users/dignissimos/histories"
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
<div id="execution-results-GETapi-orders-client-users--clientUserId--histories" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-orders-client-users--clientUserId--histories"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-orders-client-users--clientUserId--histories"></code></pre>
</div>
<div id="execution-error-GETapi-orders-client-users--clientUserId--histories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-orders-client-users--clientUserId--histories"></code></pre>
</div>
<form id="form-GETapi-orders-client-users--clientUserId--histories" data-method="GET" data-path="api/orders/client-users/{clientUserId}/histories" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-orders-client-users--clientUserId--histories', this);">
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
<p>
<label id="auth-GETapi-orders-client-users--clientUserId--histories" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-orders-client-users--clientUserId--histories" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>clientUserId</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="clientUserId" data-endpoint="GETapi-orders-client-users--clientUserId--histories" data-component="url" required  hidden>
<br>

</p>
</form>


## 注文履歴全リスト取得

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/orders/all/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/orders/all/list"
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
<div id="execution-results-GETapi-orders-all-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-orders-all-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-orders-all-list"></code></pre>
</div>
<div id="execution-error-GETapi-orders-all-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-orders-all-list"></code></pre>
</div>
<form id="form-GETapi-orders-all-list" data-method="GET" data-path="api/orders/all/list" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-orders-all-list', this);">
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
<p>
<label id="auth-GETapi-orders-all-list" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-orders-all-list" data-component="header"></label>
</p>
</form>


## 注文履歴CSV出力

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/orders/output/csv" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/orders/output/csv"
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
<div id="execution-results-GETapi-orders-output-csv" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-orders-output-csv"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-orders-output-csv"></code></pre>
</div>
<div id="execution-error-GETapi-orders-output-csv" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-orders-output-csv"></code></pre>
</div>
<form id="form-GETapi-orders-output-csv" data-method="GET" data-path="api/orders/output/csv" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-orders-output-csv', this);">
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
<p>
<label id="auth-GETapi-orders-output-csv" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-orders-output-csv" data-component="header"></label>
</p>
</form>



