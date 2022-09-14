# Product


## 商品一覧取得 ページネーション

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/products" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/products"
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
<div id="execution-results-GETapi-products" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-products"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products"></code></pre>
</div>
<div id="execution-error-GETapi-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products"></code></pre>
</div>
<form id="form-GETapi-products" data-method="GET" data-path="api/products" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-products', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-products" onclick="tryItOut('GETapi-products');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-products" onclick="cancelTryOut('GETapi-products');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-products" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/products</code></b>
</p>
<p>
<label id="auth-GETapi-products" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-products" data-component="header"></label>
</p>
</form>


## 商品登録

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost:8080/api/products" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"code":"dolore","prescription_number":"et","name":"recusandae","point":"expedita","externally_point":"provident","image":{},"sales_status":14,"is_general_purpose_products":false,"created_user_id":20,"updated_user_id":18,"classifications":[{"id":19}],"flavors":[{"id":16}],"use_cases":[{"id":10}],"solubilities":[{"id":4}],"dangerous_grades":[{"id":5}]}'

```

```javascript
const url = new URL(
    "http://localhost:8080/api/products"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "code": "dolore",
    "prescription_number": "et",
    "name": "recusandae",
    "point": "expedita",
    "externally_point": "provident",
    "image": {},
    "sales_status": 14,
    "is_general_purpose_products": false,
    "created_user_id": 20,
    "updated_user_id": 18,
    "classifications": [
        {
            "id": 19
        }
    ],
    "flavors": [
        {
            "id": 16
        }
    ],
    "use_cases": [
        {
            "id": 10
        }
    ],
    "solubilities": [
        {
            "id": 4
        }
    ],
    "dangerous_grades": [
        {
            "id": 5
        }
    ]
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
<div id="execution-results-POSTapi-products" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-products"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-products"></code></pre>
</div>
<div id="execution-error-POSTapi-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-products"></code></pre>
</div>
<form id="form-POSTapi-products" data-method="POST" data-path="api/products" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-products', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-products" onclick="tryItOut('POSTapi-products');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-products" onclick="cancelTryOut('POSTapi-products');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-products" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/products</code></b>
</p>
<p>
<label id="auth-POSTapi-products" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-products" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="code" data-endpoint="POSTapi-products" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>prescription_number</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="prescription_number" data-endpoint="POSTapi-products" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-products" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>point</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="point" data-endpoint="POSTapi-products" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>externally_point</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="externally_point" data-endpoint="POSTapi-products" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>image</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="image" data-endpoint="POSTapi-products" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>sales_status</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="sales_status" data-endpoint="POSTapi-products" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>is_general_purpose_products</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTapi-products" hidden><input type="radio" name="is_general_purpose_products" value="true" data-endpoint="POSTapi-products" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTapi-products" hidden><input type="radio" name="is_general_purpose_products" value="false" data-endpoint="POSTapi-products" data-component="body" ><code>false</code></label>
<br>

</p>
<p>
<b><code>created_user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="created_user_id" data-endpoint="POSTapi-products" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>updated_user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="updated_user_id" data-endpoint="POSTapi-products" data-component="body"  hidden>
<br>

</p>
<p>
<details>
<summary>
<b><code>classifications</code></b>&nbsp;&nbsp;<small>object[]</small>     <i>optional</i> &nbsp;
<br>

</summary>
<br>
<p>
<b><code>classifications[].id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="classifications.0.id" data-endpoint="POSTapi-products" data-component="body" required  hidden>
<br>

</p>
</details>
</p>
<p>
<details>
<summary>
<b><code>flavors</code></b>&nbsp;&nbsp;<small>object[]</small>     <i>optional</i> &nbsp;
<br>

</summary>
<br>
<p>
<b><code>flavors[].id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="flavors.0.id" data-endpoint="POSTapi-products" data-component="body" required  hidden>
<br>

</p>
</details>
</p>
<p>
<details>
<summary>
<b><code>use_cases</code></b>&nbsp;&nbsp;<small>object[]</small>     <i>optional</i> &nbsp;
<br>

</summary>
<br>
<p>
<b><code>use_cases[].id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="use_cases.0.id" data-endpoint="POSTapi-products" data-component="body" required  hidden>
<br>

</p>
</details>
</p>
<p>
<details>
<summary>
<b><code>solubilities</code></b>&nbsp;&nbsp;<small>object[]</small>     <i>optional</i> &nbsp;
<br>

</summary>
<br>
<p>
<b><code>solubilities[].id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="solubilities.0.id" data-endpoint="POSTapi-products" data-component="body" required  hidden>
<br>

</p>
</details>
</p>
<p>
<details>
<summary>
<b><code>dangerous_grades</code></b>&nbsp;&nbsp;<small>object[]</small>     <i>optional</i> &nbsp;
<br>

</summary>
<br>
<p>
<b><code>dangerous_grades[].id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="dangerous_grades.0.id" data-endpoint="POSTapi-products" data-component="body" required  hidden>
<br>

</p>
</details>
</p>

</form>


## 商品1件取得

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/products/quo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/products/quo"
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
<div id="execution-results-GETapi-products--product-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-products--product-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products--product-"></code></pre>
</div>
<div id="execution-error-GETapi-products--product-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products--product-"></code></pre>
</div>
<form id="form-GETapi-products--product-" data-method="GET" data-path="api/products/{product}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-products--product-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-products--product-" onclick="tryItOut('GETapi-products--product-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-products--product-" onclick="cancelTryOut('GETapi-products--product-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-products--product-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/products/{product}</code></b>
</p>
<p>
<label id="auth-GETapi-products--product-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-products--product-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>product</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="product" data-endpoint="GETapi-products--product-" data-component="url" required  hidden>
<br>

</p>
</form>


## 商品更新

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PUT \
    "http://localhost:8080/api/products/blanditiis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"code":"enim","prescription_number":"sunt","name":"est","point":"non","externally_point":"nam","image":{},"sales_status":10,"is_general_purpose_products":false,"created_user_id":13,"updated_user_id":10,"classifications":[{"id":15}],"flavors":[{"id":3}],"use_cases":[{"id":9}],"solubilities":[{"id":18}],"dangerous_grades":[{"id":20}]}'

```

```javascript
const url = new URL(
    "http://localhost:8080/api/products/blanditiis"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "code": "enim",
    "prescription_number": "sunt",
    "name": "est",
    "point": "non",
    "externally_point": "nam",
    "image": {},
    "sales_status": 10,
    "is_general_purpose_products": false,
    "created_user_id": 13,
    "updated_user_id": 10,
    "classifications": [
        {
            "id": 15
        }
    ],
    "flavors": [
        {
            "id": 3
        }
    ],
    "use_cases": [
        {
            "id": 9
        }
    ],
    "solubilities": [
        {
            "id": 18
        }
    ],
    "dangerous_grades": [
        {
            "id": 20
        }
    ]
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
<div id="execution-results-PUTapi-products--product-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-products--product-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-products--product-"></code></pre>
</div>
<div id="execution-error-PUTapi-products--product-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-products--product-"></code></pre>
</div>
<form id="form-PUTapi-products--product-" data-method="PUT" data-path="api/products/{product}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-products--product-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-products--product-" onclick="tryItOut('PUTapi-products--product-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-products--product-" onclick="cancelTryOut('PUTapi-products--product-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-products--product-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/products/{product}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/products/{product}</code></b>
</p>
<p>
<label id="auth-PUTapi-products--product-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-products--product-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>product</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="product" data-endpoint="PUTapi-products--product-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>code</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="code" data-endpoint="PUTapi-products--product-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>prescription_number</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="prescription_number" data-endpoint="PUTapi-products--product-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="PUTapi-products--product-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>point</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="point" data-endpoint="PUTapi-products--product-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>externally_point</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="externally_point" data-endpoint="PUTapi-products--product-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>image</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="image" data-endpoint="PUTapi-products--product-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>sales_status</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="sales_status" data-endpoint="PUTapi-products--product-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>is_general_purpose_products</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="PUTapi-products--product-" hidden><input type="radio" name="is_general_purpose_products" value="true" data-endpoint="PUTapi-products--product-" data-component="body" ><code>true</code></label>
<label data-endpoint="PUTapi-products--product-" hidden><input type="radio" name="is_general_purpose_products" value="false" data-endpoint="PUTapi-products--product-" data-component="body" ><code>false</code></label>
<br>

</p>
<p>
<b><code>created_user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="created_user_id" data-endpoint="PUTapi-products--product-" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>updated_user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="updated_user_id" data-endpoint="PUTapi-products--product-" data-component="body"  hidden>
<br>

</p>
<p>
<details>
<summary>
<b><code>classifications</code></b>&nbsp;&nbsp;<small>object[]</small>     <i>optional</i> &nbsp;
<br>

</summary>
<br>
<p>
<b><code>classifications[].id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="classifications.0.id" data-endpoint="PUTapi-products--product-" data-component="body" required  hidden>
<br>

</p>
</details>
</p>
<p>
<details>
<summary>
<b><code>flavors</code></b>&nbsp;&nbsp;<small>object[]</small>     <i>optional</i> &nbsp;
<br>

</summary>
<br>
<p>
<b><code>flavors[].id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="flavors.0.id" data-endpoint="PUTapi-products--product-" data-component="body" required  hidden>
<br>

</p>
</details>
</p>
<p>
<details>
<summary>
<b><code>use_cases</code></b>&nbsp;&nbsp;<small>object[]</small>     <i>optional</i> &nbsp;
<br>

</summary>
<br>
<p>
<b><code>use_cases[].id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="use_cases.0.id" data-endpoint="PUTapi-products--product-" data-component="body" required  hidden>
<br>

</p>
</details>
</p>
<p>
<details>
<summary>
<b><code>solubilities</code></b>&nbsp;&nbsp;<small>object[]</small>     <i>optional</i> &nbsp;
<br>

</summary>
<br>
<p>
<b><code>solubilities[].id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="solubilities.0.id" data-endpoint="PUTapi-products--product-" data-component="body" required  hidden>
<br>

</p>
</details>
</p>
<p>
<details>
<summary>
<b><code>dangerous_grades</code></b>&nbsp;&nbsp;<small>object[]</small>     <i>optional</i> &nbsp;
<br>

</summary>
<br>
<p>
<b><code>dangerous_grades[].id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="dangerous_grades.0.id" data-endpoint="PUTapi-products--product-" data-component="body" required  hidden>
<br>

</p>
</details>
</p>

</form>


## 商品削除

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "http://localhost:8080/api/products/deleniti" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/products/deleniti"
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
<div id="execution-results-DELETEapi-products--product-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-products--product-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-products--product-"></code></pre>
</div>
<div id="execution-error-DELETEapi-products--product-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-products--product-"></code></pre>
</div>
<form id="form-DELETEapi-products--product-" data-method="DELETE" data-path="api/products/{product}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-products--product-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-products--product-" onclick="tryItOut('DELETEapi-products--product-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-products--product-" onclick="cancelTryOut('DELETEapi-products--product-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-products--product-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/products/{product}</code></b>
</p>
<p>
<label id="auth-DELETEapi-products--product-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-products--product-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>product</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="product" data-endpoint="DELETEapi-products--product-" data-component="url" required  hidden>
<br>

</p>
</form>


## 商品画像アップロード

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost:8080/api/products/image/upload" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/products/image/upload"
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
<div id="execution-results-POSTapi-products-image-upload" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-products-image-upload"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-products-image-upload"></code></pre>
</div>
<div id="execution-error-POSTapi-products-image-upload" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-products-image-upload"></code></pre>
</div>
<form id="form-POSTapi-products-image-upload" data-method="POST" data-path="api/products/image/upload" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-products-image-upload', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-products-image-upload" onclick="tryItOut('POSTapi-products-image-upload');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-products-image-upload" onclick="cancelTryOut('POSTapi-products-image-upload');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-products-image-upload" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/products/image/upload</code></b>
</p>
<p>
<label id="auth-POSTapi-products-image-upload" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-products-image-upload" data-component="header"></label>
</p>
</form>


## 商品画像削除

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PUT \
    "http://localhost:8080/api/products/image/delete" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/products/image/delete"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-PUTapi-products-image-delete" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-products-image-delete"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-products-image-delete"></code></pre>
</div>
<div id="execution-error-PUTapi-products-image-delete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-products-image-delete"></code></pre>
</div>
<form id="form-PUTapi-products-image-delete" data-method="PUT" data-path="api/products/image/delete" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-products-image-delete', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-products-image-delete" onclick="tryItOut('PUTapi-products-image-delete');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-products-image-delete" onclick="cancelTryOut('PUTapi-products-image-delete');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-products-image-delete" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/products/image/delete</code></b>
</p>
<p>
<label id="auth-PUTapi-products-image-delete" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-products-image-delete" data-component="header"></label>
</p>
</form>


## 商品一覧取得 検索結果

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/products/search/results?keyword=porro&use_case=facere&flavor=similique&dangerous_grade=qui&solubility=et&is_not_include_dangerous_grade=qui&is_category_keyword_to_use_case=nobis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/products/search/results"
);

let params = {
    "keyword": "porro",
    "use_case": "facere",
    "flavor": "similique",
    "dangerous_grade": "qui",
    "solubility": "et",
    "is_not_include_dangerous_grade": "qui",
    "is_category_keyword_to_use_case": "nobis",
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
<div id="execution-results-GETapi-products-search-results" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-products-search-results"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products-search-results"></code></pre>
</div>
<div id="execution-error-GETapi-products-search-results" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products-search-results"></code></pre>
</div>
<form id="form-GETapi-products-search-results" data-method="GET" data-path="api/products/search/results" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-products-search-results', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-products-search-results" onclick="tryItOut('GETapi-products-search-results');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-products-search-results" onclick="cancelTryOut('GETapi-products-search-results');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-products-search-results" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/products/search/results</code></b>
</p>
<p>
<label id="auth-GETapi-products-search-results" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-products-search-results" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>keyword</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="keyword" data-endpoint="GETapi-products-search-results" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>use_case</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="use_case" data-endpoint="GETapi-products-search-results" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>flavor</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="flavor" data-endpoint="GETapi-products-search-results" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>dangerous_grade</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="dangerous_grade" data-endpoint="GETapi-products-search-results" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>solubility</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="solubility" data-endpoint="GETapi-products-search-results" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>is_not_include_dangerous_grade</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="is_not_include_dangerous_grade" data-endpoint="GETapi-products-search-results" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>is_category_keyword_to_use_case</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="is_category_keyword_to_use_case" data-endpoint="GETapi-products-search-results" data-component="query"  hidden>
<br>

</p>
</form>


## 企業グループ別商品一覧取得

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/products/by/company-groups?keyword=consequatur&use_case=ex&flavor=similique&dangerous_grade=blanditiis&solubility=temporibus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/products/by/company-groups"
);

let params = {
    "keyword": "consequatur",
    "use_case": "ex",
    "flavor": "similique",
    "dangerous_grade": "blanditiis",
    "solubility": "temporibus",
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
<div id="execution-results-GETapi-products-by-company-groups" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-products-by-company-groups"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products-by-company-groups"></code></pre>
</div>
<div id="execution-error-GETapi-products-by-company-groups" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products-by-company-groups"></code></pre>
</div>
<form id="form-GETapi-products-by-company-groups" data-method="GET" data-path="api/products/by/company-groups" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-products-by-company-groups', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-products-by-company-groups" onclick="tryItOut('GETapi-products-by-company-groups');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-products-by-company-groups" onclick="cancelTryOut('GETapi-products-by-company-groups');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-products-by-company-groups" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/products/by/company-groups</code></b>
</p>
<p>
<label id="auth-GETapi-products-by-company-groups" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-products-by-company-groups" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>keyword</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="keyword" data-endpoint="GETapi-products-by-company-groups" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>use_case</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="use_case" data-endpoint="GETapi-products-by-company-groups" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>flavor</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="flavor" data-endpoint="GETapi-products-by-company-groups" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>dangerous_grade</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="dangerous_grade" data-endpoint="GETapi-products-by-company-groups" data-component="query"  hidden>
<br>

</p>
<p>
<b><code>solubility</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="solubility" data-endpoint="GETapi-products-by-company-groups" data-component="query"  hidden>
<br>

</p>
</form>


## コレスポンデンス分析結果取得

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://localhost:8080/api/products/correspondence-analysis-results" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/products/correspondence-analysis-results"
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
<div id="execution-results-POSTapi-products-correspondence-analysis-results" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-products-correspondence-analysis-results"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-products-correspondence-analysis-results"></code></pre>
</div>
<div id="execution-error-POSTapi-products-correspondence-analysis-results" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-products-correspondence-analysis-results"></code></pre>
</div>
<form id="form-POSTapi-products-correspondence-analysis-results" data-method="POST" data-path="api/products/correspondence-analysis-results" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-products-correspondence-analysis-results', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-products-correspondence-analysis-results" onclick="tryItOut('POSTapi-products-correspondence-analysis-results');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-products-correspondence-analysis-results" onclick="cancelTryOut('POSTapi-products-correspondence-analysis-results');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-products-correspondence-analysis-results" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/products/correspondence-analysis-results</code></b>
</p>
<p>
<label id="auth-POSTapi-products-correspondence-analysis-results" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-products-correspondence-analysis-results" data-component="header"></label>
</p>
</form>


## 商品コメント更新

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PUT \
    "http://localhost:8080/api/products/et/comments" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/products/et/comments"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-PUTapi-products--id--comments" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-products--id--comments"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-products--id--comments"></code></pre>
</div>
<div id="execution-error-PUTapi-products--id--comments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-products--id--comments"></code></pre>
</div>
<form id="form-PUTapi-products--id--comments" data-method="PUT" data-path="api/products/{id}/comments" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-products--id--comments', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-products--id--comments" onclick="tryItOut('PUTapi-products--id--comments');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-products--id--comments" onclick="cancelTryOut('PUTapi-products--id--comments');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-products--id--comments" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/products/{id}/comments</code></b>
</p>
<p>
<label id="auth-PUTapi-products--id--comments" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-products--id--comments" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="PUTapi-products--id--comments" data-component="url" required  hidden>
<br>

</p>
</form>



