# Flavor


## カテゴリーとサブカテゴリーの一覧取得

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/flavors/category/nested/subcategory/list?company_group_id=repellat" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/flavors/category/nested/subcategory/list"
);

let params = {
    "company_group_id": "repellat",
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
<div id="execution-results-GETapi-flavors-category-nested-subcategory-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-flavors-category-nested-subcategory-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-flavors-category-nested-subcategory-list"></code></pre>
</div>
<div id="execution-error-GETapi-flavors-category-nested-subcategory-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-flavors-category-nested-subcategory-list"></code></pre>
</div>
<form id="form-GETapi-flavors-category-nested-subcategory-list" data-method="GET" data-path="api/flavors/category/nested/subcategory/list" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-flavors-category-nested-subcategory-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-flavors-category-nested-subcategory-list" onclick="tryItOut('GETapi-flavors-category-nested-subcategory-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-flavors-category-nested-subcategory-list" onclick="cancelTryOut('GETapi-flavors-category-nested-subcategory-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-flavors-category-nested-subcategory-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/flavors/category/nested/subcategory/list</code></b>
</p>
<p>
<label id="auth-GETapi-flavors-category-nested-subcategory-list" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-flavors-category-nested-subcategory-list" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>company_group_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="company_group_id" data-endpoint="GETapi-flavors-category-nested-subcategory-list" data-component="query"  hidden>
<br>

</p>
</form>


## カテゴリーリスト取得

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/flavors/category/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/flavors/category/list"
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
<div id="execution-results-GETapi-flavors-category-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-flavors-category-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-flavors-category-list"></code></pre>
</div>
<div id="execution-error-GETapi-flavors-category-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-flavors-category-list"></code></pre>
</div>
<form id="form-GETapi-flavors-category-list" data-method="GET" data-path="api/flavors/category/list" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-flavors-category-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-flavors-category-list" onclick="tryItOut('GETapi-flavors-category-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-flavors-category-list" onclick="cancelTryOut('GETapi-flavors-category-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-flavors-category-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/flavors/category/list</code></b>
</p>
<p>
<label id="auth-GETapi-flavors-category-list" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-flavors-category-list" data-component="header"></label>
</p>
</form>


## サブカテゴリーリスト取得

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/flavors/subcategory/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/flavors/subcategory/list"
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
<div id="execution-results-GETapi-flavors-subcategory-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-flavors-subcategory-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-flavors-subcategory-list"></code></pre>
</div>
<div id="execution-error-GETapi-flavors-subcategory-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-flavors-subcategory-list"></code></pre>
</div>
<form id="form-GETapi-flavors-subcategory-list" data-method="GET" data-path="api/flavors/subcategory/list" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-flavors-subcategory-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-flavors-subcategory-list" onclick="tryItOut('GETapi-flavors-subcategory-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-flavors-subcategory-list" onclick="cancelTryOut('GETapi-flavors-subcategory-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-flavors-subcategory-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/flavors/subcategory/list</code></b>
</p>
<p>
<label id="auth-GETapi-flavors-subcategory-list" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-flavors-subcategory-list" data-component="header"></label>
</p>
</form>



