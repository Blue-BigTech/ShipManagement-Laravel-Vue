# ShippingAddress


## 発送先登録

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost:8080/api/shipping-addresses" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"client_user_id":4,"address":"assumenda","postal_code":"deleniti","building":"molestiae","receiver_name":"molestiae","phone":{},"is_default":false,"created_user_id":7,"updated_user_id":2}'

```

```javascript
const url = new URL(
    "http://localhost:8080/api/shipping-addresses"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "client_user_id": 4,
    "address": "assumenda",
    "postal_code": "deleniti",
    "building": "molestiae",
    "receiver_name": "molestiae",
    "phone": {},
    "is_default": false,
    "created_user_id": 7,
    "updated_user_id": 2
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
<div id="execution-results-POSTapi-shipping-addresses" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-shipping-addresses"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-shipping-addresses"></code></pre>
</div>
<div id="execution-error-POSTapi-shipping-addresses" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-shipping-addresses"></code></pre>
</div>
<form id="form-POSTapi-shipping-addresses" data-method="POST" data-path="api/shipping-addresses" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-shipping-addresses', this);">
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
<p>
<label id="auth-POSTapi-shipping-addresses" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-shipping-addresses" data-component="header"></label>
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


## 発送先更新

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PUT \
    "http://localhost:8080/api/shipping-addresses/nihil" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"client_user_id":5,"address":"fuga","postal_code":"eos","building":"est","receiver_name":"molestias","phone":{},"is_default":false,"created_user_id":18,"updated_user_id":2}'

```

```javascript
const url = new URL(
    "http://localhost:8080/api/shipping-addresses/nihil"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "client_user_id": 5,
    "address": "fuga",
    "postal_code": "eos",
    "building": "est",
    "receiver_name": "molestias",
    "phone": {},
    "is_default": false,
    "created_user_id": 18,
    "updated_user_id": 2
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
<div id="execution-results-PUTapi-shipping-addresses--shipping_address-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-shipping-addresses--shipping_address-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-shipping-addresses--shipping_address-"></code></pre>
</div>
<div id="execution-error-PUTapi-shipping-addresses--shipping_address-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-shipping-addresses--shipping_address-"></code></pre>
</div>
<form id="form-PUTapi-shipping-addresses--shipping_address-" data-method="PUT" data-path="api/shipping-addresses/{shipping_address}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-shipping-addresses--shipping_address-', this);">
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
<p>
<label id="auth-PUTapi-shipping-addresses--shipping_address-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-shipping-addresses--shipping_address-" data-component="header"></label>
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


## 発送先削除

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "http://localhost:8080/api/shipping-addresses/dolor" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/shipping-addresses/dolor"
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
<div id="execution-results-DELETEapi-shipping-addresses--shipping_address-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-shipping-addresses--shipping_address-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-shipping-addresses--shipping_address-"></code></pre>
</div>
<div id="execution-error-DELETEapi-shipping-addresses--shipping_address-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-shipping-addresses--shipping_address-"></code></pre>
</div>
<form id="form-DELETEapi-shipping-addresses--shipping_address-" data-method="DELETE" data-path="api/shipping-addresses/{shipping_address}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-shipping-addresses--shipping_address-', this);">
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
<p>
<label id="auth-DELETEapi-shipping-addresses--shipping_address-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-shipping-addresses--shipping_address-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>shipping_address</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="shipping_address" data-endpoint="DELETEapi-shipping-addresses--shipping_address-" data-component="url" required  hidden>
<br>

</p>
</form>



