# Solubility


## 溶解性リスト取得

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/solubilities/category/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/solubilities/category/list"
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
<div id="execution-results-GETapi-solubilities-category-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-solubilities-category-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-solubilities-category-list"></code></pre>
</div>
<div id="execution-error-GETapi-solubilities-category-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-solubilities-category-list"></code></pre>
</div>
<form id="form-GETapi-solubilities-category-list" data-method="GET" data-path="api/solubilities/category/list" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-solubilities-category-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-solubilities-category-list" onclick="tryItOut('GETapi-solubilities-category-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-solubilities-category-list" onclick="cancelTryOut('GETapi-solubilities-category-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-solubilities-category-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/solubilities/category/list</code></b>
</p>
<p>
<label id="auth-GETapi-solubilities-category-list" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-solubilities-category-list" data-component="header"></label>
</p>
</form>


## 企業グループ別溶解性リスト取得

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://localhost:8080/api/solubilities/category/list/by/company-group?company_group_id=porro" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8080/api/solubilities/category/list/by/company-group"
);

let params = {
    "company_group_id": "porro",
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
<div id="execution-results-GETapi-solubilities-category-list-by-company-group" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-solubilities-category-list-by-company-group"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-solubilities-category-list-by-company-group"></code></pre>
</div>
<div id="execution-error-GETapi-solubilities-category-list-by-company-group" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-solubilities-category-list-by-company-group"></code></pre>
</div>
<form id="form-GETapi-solubilities-category-list-by-company-group" data-method="GET" data-path="api/solubilities/category/list/by/company-group" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-solubilities-category-list-by-company-group', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-solubilities-category-list-by-company-group" onclick="tryItOut('GETapi-solubilities-category-list-by-company-group');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-solubilities-category-list-by-company-group" onclick="cancelTryOut('GETapi-solubilities-category-list-by-company-group');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-solubilities-category-list-by-company-group" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/solubilities/category/list/by/company-group</code></b>
</p>
<p>
<label id="auth-GETapi-solubilities-category-list-by-company-group" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-solubilities-category-list-by-company-group" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>company_group_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="company_group_id" data-endpoint="GETapi-solubilities-category-list-by-company-group" data-component="query"  hidden>
<br>

</p>
</form>



