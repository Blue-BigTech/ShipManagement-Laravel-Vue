# DangerousGrade


## 危険物一覧取得

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/dangerous-grades/category/list?is_need_duplicate=odio" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/dangerous-grades/category/list"
);

let params = {
    "is_need_duplicate": "odio",
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
<div id="execution-results-GETapi-dangerous-grades-category-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-dangerous-grades-category-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-dangerous-grades-category-list"></code></pre>
</div>
<div id="execution-error-GETapi-dangerous-grades-category-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-dangerous-grades-category-list"></code></pre>
</div>
<form id="form-GETapi-dangerous-grades-category-list" data-method="GET" data-path="api/dangerous-grades/category/list" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-dangerous-grades-category-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-dangerous-grades-category-list" onclick="tryItOut('GETapi-dangerous-grades-category-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-dangerous-grades-category-list" onclick="cancelTryOut('GETapi-dangerous-grades-category-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-dangerous-grades-category-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/dangerous-grades/category/list</code></b>
</p>
<p>
<label id="auth-GETapi-dangerous-grades-category-list" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-dangerous-grades-category-list" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>is_need_duplicate</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="is_need_duplicate" data-endpoint="GETapi-dangerous-grades-category-list" data-component="query"  hidden>
<br>

</p>
</form>



