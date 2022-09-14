# OrderUnit


## 注文単位リスト取得

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/order-units/unit/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/order-units/unit/list"
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
<div id="execution-results-GETapi-order-units-unit-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-order-units-unit-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-order-units-unit-list"></code></pre>
</div>
<div id="execution-error-GETapi-order-units-unit-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-order-units-unit-list"></code></pre>
</div>
<form id="form-GETapi-order-units-unit-list" data-method="GET" data-path="api/order-units/unit/list" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-order-units-unit-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-order-units-unit-list" onclick="tryItOut('GETapi-order-units-unit-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-order-units-unit-list" onclick="cancelTryOut('GETapi-order-units-unit-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-order-units-unit-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/order-units/unit/list</code></b>
</p>
<p>
<label id="auth-GETapi-order-units-unit-list" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-order-units-unit-list" data-component="header"></label>
</p>
</form>



