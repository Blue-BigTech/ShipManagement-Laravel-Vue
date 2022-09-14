# UseCase


## 用途カテゴリーリスト取得

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/use-cases/category/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/use-cases/category/list"
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
<div id="execution-results-GETapi-use-cases-category-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-use-cases-category-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-use-cases-category-list"></code></pre>
</div>
<div id="execution-error-GETapi-use-cases-category-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-use-cases-category-list"></code></pre>
</div>
<form id="form-GETapi-use-cases-category-list" data-method="GET" data-path="api/use-cases/category/list" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-use-cases-category-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-use-cases-category-list" onclick="tryItOut('GETapi-use-cases-category-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-use-cases-category-list" onclick="cancelTryOut('GETapi-use-cases-category-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-use-cases-category-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/use-cases/category/list</code></b>
</p>
<p>
<label id="auth-GETapi-use-cases-category-list" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-use-cases-category-list" data-component="header"></label>
</p>
</form>


## 用途サブカテゴリーリスト取得

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/use-cases/subcategory/list?is_need_duplicate=est" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/use-cases/subcategory/list"
);

let params = {
    "is_need_duplicate": "est",
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
<div id="execution-results-GETapi-use-cases-subcategory-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-use-cases-subcategory-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-use-cases-subcategory-list"></code></pre>
</div>
<div id="execution-error-GETapi-use-cases-subcategory-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-use-cases-subcategory-list"></code></pre>
</div>
<form id="form-GETapi-use-cases-subcategory-list" data-method="GET" data-path="api/use-cases/subcategory/list" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-use-cases-subcategory-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-use-cases-subcategory-list" onclick="tryItOut('GETapi-use-cases-subcategory-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-use-cases-subcategory-list" onclick="cancelTryOut('GETapi-use-cases-subcategory-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-use-cases-subcategory-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/use-cases/subcategory/list</code></b>
</p>
<p>
<label id="auth-GETapi-use-cases-subcategory-list" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-use-cases-subcategory-list" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>is_need_duplicate</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="is_need_duplicate" data-endpoint="GETapi-use-cases-subcategory-list" data-component="query"  hidden>
<br>

</p>
</form>


## 用途カテゴリーとサブカテゴリーのリスト取得

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/use-cases/category/with/subcategory/list?company_group_id=distinctio" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/use-cases/category/with/subcategory/list"
);

let params = {
    "company_group_id": "distinctio",
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
<div id="execution-results-GETapi-use-cases-category-with-subcategory-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-use-cases-category-with-subcategory-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-use-cases-category-with-subcategory-list"></code></pre>
</div>
<div id="execution-error-GETapi-use-cases-category-with-subcategory-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-use-cases-category-with-subcategory-list"></code></pre>
</div>
<form id="form-GETapi-use-cases-category-with-subcategory-list" data-method="GET" data-path="api/use-cases/category/with/subcategory/list" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-use-cases-category-with-subcategory-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-use-cases-category-with-subcategory-list" onclick="tryItOut('GETapi-use-cases-category-with-subcategory-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-use-cases-category-with-subcategory-list" onclick="cancelTryOut('GETapi-use-cases-category-with-subcategory-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-use-cases-category-with-subcategory-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/use-cases/category/with/subcategory/list</code></b>
</p>
<p>
<label id="auth-GETapi-use-cases-category-with-subcategory-list" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-use-cases-category-with-subcategory-list" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>company_group_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="company_group_id" data-endpoint="GETapi-use-cases-category-with-subcategory-list" data-component="query"  hidden>
<br>

</p>
</form>



