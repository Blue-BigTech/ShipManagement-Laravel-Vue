# OrderCart


## カート内一覧取得

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/order-carts" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/order-carts"
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
<div id="execution-results-GETapi-order-carts" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-order-carts"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-order-carts"></code></pre>
</div>
<div id="execution-error-GETapi-order-carts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-order-carts"></code></pre>
</div>
<form id="form-GETapi-order-carts" data-method="GET" data-path="api/order-carts" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-order-carts', this);">
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
<p>
<label id="auth-GETapi-order-carts" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-order-carts" data-component="header"></label>
</p>
</form>


## カートへ登録

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost:8080/api/order-carts" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"client_user_id":14,"product_id":9,"created_user_id":13,"updated_user_id":17}'

```

```javascript
const url = new URL(
    "http://localhost:8080/api/order-carts"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "client_user_id": 14,
    "product_id": 9,
    "created_user_id": 13,
    "updated_user_id": 17
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
<div id="execution-results-POSTapi-order-carts" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-order-carts"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-order-carts"></code></pre>
</div>
<div id="execution-error-POSTapi-order-carts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-order-carts"></code></pre>
</div>
<form id="form-POSTapi-order-carts" data-method="POST" data-path="api/order-carts" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-order-carts', this);">
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
<p>
<label id="auth-POSTapi-order-carts" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-order-carts" data-component="header"></label>
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


## カートから削除

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "http://localhost:8080/api/order-carts/et" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/order-carts/et"
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
<div id="execution-results-DELETEapi-order-carts--order_cart-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-order-carts--order_cart-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-order-carts--order_cart-"></code></pre>
</div>
<div id="execution-error-DELETEapi-order-carts--order_cart-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-order-carts--order_cart-"></code></pre>
</div>
<form id="form-DELETEapi-order-carts--order_cart-" data-method="DELETE" data-path="api/order-carts/{order_cart}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-order-carts--order_cart-', this);">
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
<p>
<label id="auth-DELETEapi-order-carts--order_cart-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-order-carts--order_cart-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>order_cart</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="order_cart" data-endpoint="DELETEapi-order-carts--order_cart-" data-component="url" required  hidden>
<br>

</p>
</form>



