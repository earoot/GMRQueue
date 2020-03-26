<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>GMRQueue API</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">


    <style media="screen">
      body {
        font-family: 'Roboto', sans-serif;
      }

      #wrapper {
      padding:5%;
      margin:0 auto;
      }

      /* CSS Simple Pre Code */
      pre {
        background: #333;
        white-space: pre;
        word-wrap: break-word;
        overflow: auto;
      }

      pre.code {
        margin: 0px 25px;
        border-radius: 4px;
        border: 1px solid #292929;
        position: relative;
      }

      pre.code label {
        font-family: sans-serif;
        font-weight: bold;
        font-size: 13px;
        color: #ddd;
        position: absolute;
        left: 1px;
        top: 15px;
        text-align: center;
        width: 60px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        pointer-events: none;
      }

      pre.code code {
        font-family: "Inconsolata","Monaco","Consolas","Andale Mono","Bitstream Vera Sans Mono","Courier New",Courier,monospace;
        display: block;
        margin: 0 0 0 60px;
        padding: 15px 16px 14px;
        border-left: 1px solid #555;
        overflow-x: auto;
        font-size: 13px;
        line-height: 19px;
        color: #ddd;
      }

      pre::after {
        padding: 0;
        width: auto;
        height: auto;
        position: absolute;
        right: 18px;
        top: 14px;
        font-size: 12px;
        color: #ddd;
        line-height: 20px;
        overflow: hidden;
        -webkit-backface-visibility: hidden;
        transition: all 0.3s ease;
      }

      pre:hover::after {
        opacity: 0;
        visibility: visible;
      }

      pre.code-css code {
        color: #91a7ff;
      }

      pre.code-html code {
        color: #aed581;
      }

      pre.code-javascript code {
        color: #ffa726;
      }

      pre.code-jquery code {
        color: #4dd0e1;
      }

      .endpoint-text {
        width: 92%;
        margin: 0% 3%;
        padding: 1%;
        border-radius: 5px;
        background-color: #d2d2d2;
      }

      .description-text {
        width: 92%;
        margin: 0% 3%;
        padding: 1%;
        border-radius: 5px;
      }

      .title-text {
        width: 92%;
        margin: 0% 3%;
        padding: 1%;
      }

      .stronger {
        font-weight: 900;
        margin: 5px
      }

      .json-name {
        font-weight: 500;
        margin-left: 30px;
      }
    </style>

  </head>
  <body>

    <div class="title-text">
      <h1>GMRQueue Documentation REST API</h1>
      <p>The url of the project depends on the server where is installed, for this examples we could use: <a target="_blank" href="http://3.90.154.57/">http://3.90.154.57/</a> and to verify the jobs we could go to: <a href="http://3.90.154.57/horizon">http://3.90.154.57/horizon</a></p>
    </div>

    <div class="description-text">
      <ul>
        <li><a href="#register" name="register" class="scroll">Register new user</a></li>
        <li><a href="#login" name="login" class="scroll">Login</a></li>
        <li><a href="#schedule" name="schedule" class="scroll">Schedule Jobs</a></li>
        <li><a href="#list" name="list" class="scroll">List from group ID</a></li>
      </ul>
    </div>

    <hr>

    <div id="register">
      <div class="title-text">
        <h3>Registrate new user</h3>
        <p>The first step to use the api is to create a new user, this way we could have a token to validate and identify our requests into the server.</p>
      </div>

      <div class="endpoint-text">
        <span class="stronger">ENDPOINT:</span> <a target="_blank" href="http://3.90.154.57/api/v1/register">http://3.90.154.57/api/v1/register</a> <br>
        <span class="stronger">METHOD:</span> POST <br>
        <span class="stronger">PARAMETERS:</span> { <br>
          <span class="json-name">"name"</span>: "string", <br>
          <span class="json-name">"email"</span>: "string|email", <br>
          <span class="json-name">"password"</span>: "string|min:6" <br>
        }<br>
        <span class="stronger">HEADERS:</span> {} <br>
      </div>

      <div class="title-text">
        <h4>Example in cURL:</h4>
      </div>

      <pre class='code code-css'><label>cURL:</label><code>
curl --location --request POST 'http://3.90.154.57/api/v1/register?name=NameToBeReplaced&email=test@prueba.cl&password=123456'
      </code></pre>

      <div class="title-text">
        <h4>Response example:</h4>
      </div>

      <pre class='code code-css'><label>JSON:</label><code>
{
"success": true,
"data": {
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYTYwZjZlODQxOTljYTQwNWNjNGNkNTg3MjkyZjI4OGFjYzdkNDM3MTZmMzQzZjkwZDk2MTY2NmU1ZjRlOWVmMzcyN2Y3ZDAwOTM4Mzk3OGIiLCJpYXQiOjE1ODUyNDAwOTMsIm5iZiI6MTU4NTI0MDA5MywiZXhwIjoxNjE2Nzc2MDkzLCJzdWIiOiI0Iiwic2NvcGVzIjpbXX0.RWfNDR49sRp9eZ6u-FYBbF93REIdKUNFUuljxi0gyN8kNkx2OQCgW11Qs0ePy9nXRJGvQYhiXU48xcg4Dk0XjJEZX_9VCe6GBcm2dhy8no1lw_rhhxEfetZS6iDM8ufg7pyKNLHaQHuu0fOulT-fA3t9TD0kAWhU24WocWUShjU_7nCYrBSl3R__f_WMaGMcvbE16b_V9u2wC1BA50xkPTt06xayZ4bRE3NU1z5aO2j4shRIgvhFUdaKSVKNSz3LSQgB7IJgZZbhUBJfXQKJv02iMh1xZEABCESOSH2bdxMtnh7Ssy0anQje-HbbvHtBQ01rD8nKSnCtCE4gHAXobaRMQByGorsGe2Ym8tWd57qCKKBtQ5py1UXcQqbXtoaZjm8hHSqwkp2I9GsXJnsqg2ZCHyJfrTI2hUTR5rLgLQr7LjtVUEd9SNbP1r2iv7zO_8DiHt00VfJA26rWmuSnw1f9MJRlTJ_hx0pCoUHEbRM8V-AFYqd_sKeaqUtu3eG8H28COGibFxTz3XH2jav8cdbG2P0jijKKZAXNyVarywiIrms6dM_irwIMwOv4eqljZhL0eFNJFG7O_a9XjaYBCPFckdBBBgfacKPR_uoqvlEZrHUgaJ8f5FZtB478ChTR7gm-451bEjDlfKL1aJh-7QobXpL6s3X9M26Sp1g4uCE",
    "user": {
  "name": "NAME LASTNAME",
  "email": "test@prueba.cl",
  "updated_at": "2020-03-26T16:28:13.000000Z",
  "created_at": "2020-03-26T16:28:13.000000Z",
  "id": 4
    }
},
"message": "User register successfully."
      </code></pre>

      <ul>
        <li>The <strong>token</strong> represents the token that needs to be send in the requests as header </p></li>
      </ul>

    </div>

    <br>
    <hr>

    <div id="login">
      <div class="title-text">
        <h3>Login</h3>
        <p>In case the you have already created an account, you just need to log in to create a new token, this could be done by the following endpoint</p>
      </div>

      <div class="endpoint-text">
        <span class="stronger">ENDPOINT:</span> <a target="_blank" href="http://3.90.154.57/api/v1/login">http://3.90.154.57/api/v1/login</a> <br>
        <span class="stronger">METHOD:</span> POST <br>
        <span class="stronger">PARAMETERS:</span> { <br>
          <span class="json-name">"email"</span>: "string|email", <br>
          <span class="json-name">"password"</span>: "string|min:6" <br>
        }<br>
        <span class="stronger">HEADERS:</span> {} <br>
      </div>

      <div class="title-text">
        <h4>Example in cURL:</h4>
      </div>

      <pre class='code code-css'><label>cURL:</label><code>
curl --location --request POST 'http://3.90.154.57/api/v1/login?email=test@prueba.cl&password=123456' --header 'Content-Type: application/json'
      </code></pre>

      <div class="title-text">
        <h4>Response example:</h4>
      </div>

      <pre class='code code-css'><label>JSON:</label><code>
{
    "success": true,
    "data": {
      "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiN2RkMWE4MGM3NjE1M2MwYjEzMzAzNWU5N2Q0YmE1NjA4NTRmMzNmODQ4OGUzY2M0MDkwNmM0NjQ4YzUyMjdkZjA3MGEwNjMxMGVkZjIyZjAiLCJpYXQiOjE1ODUyNDE0MDYsIm5iZiI6MTU4NTI0MTQwNiwiZXhwIjoxNjE2Nzc3NDA2LCJzdWIiOiI0Iiwic2NvcGVzIjpbXX0.viDJj-bUG9iDdSqkm9sjJjk0OLhK263RqwklOqgz9y5wQ87LDkHWNLOUFf5h5t784xsE5ilf8dpm8MladC0R_7pOJvmrHrHrVRfr5yebN6cC3QM1x8lcxoyIMn5xFJBa8BRBbkgWB3gPbUSXDUz8V_r5LrxG2drifaPlfPy-s1G1ElnWTwFvIiwfGFBBJwX0qcEUWJ4ibXpwMtt9zbsjOsz_-XJMJbU-veq1wxoVlm1SfXmQlppWT4JUZ16dPgVVBOvfYriwAiBEq5TBu5s1FKq_lSgiJw-pibPbqtIOS7SVRH0uXtv-t8pNcrjpoP-vRKQKLAby9iOdsDhQzzzYRn2-fy_Fl998C2bWfDUn1Adw5QUW0JE5fmksTsqKcoEnJOQCGCEVpm6gvmNNRLDsBwVkuvNm8-zYtoK2EjZgkkW8v14wSfHulFl3Jy0jFZdYPC631Ft0sjT34aD14IJ5JSMDsxqc06nNtsw6IZZNxi2kPmjfznOaPBet2yofHbZVBmDwYMdM2ct6UMfY7yFkVFicw5repiLlDq18BiV8Rrjt77c0s4Cp338OgAd50yTRJ0vLr2KUXS4vg-7qDkoGqEPZOGKgtZuUsDFZxakkQ1x3tdmdfM5puoRcjwY7UmRw4VZPwB2zIQWqkuKlxxjspH0L6b-QBbdjHs0UNJBjfss",
      "user": {
          "id": 4,
          "name": "NAME LASTNAME",
          "email": "test@prueba.cl",
          "email_verified_at": null,
          "created_at": "2020-03-26T16:28:13.000000Z",
          "updated_at": "2020-03-26T16:28:13.000000Z"
      }
    },
    "message": "User login successfully."
}
      </code></pre>

      <ul>
        <li>The <strong>token</strong> represents the token that needs to be send in the requests as header </p></li>
      </ul>

    </div>

    <br>
    <hr>

    <div id="schedule">
      <div class="title-text">
        <h3>Schedule Jobs</h3>
        <p>This endpoint is used to scheduled the jobs, to request this endpoint it is necessary to send a token in the header previously obtained by making a login or registration.</p>

        <ul>
          <li>The <strong>total</strong> parameter refers to the quantity of jobs that you want to schedule with this request.</p></li>
          <li>The <strong>delay</strong> parameter refers to the time in minutes that you want to add to the current time and send to the request to schedule the job, so each job would be executed with delay.</p></li>
          <li>The <strong>priority</strong> parameter refers to the way the queue would select the jobs, high would be executed first than low.</p></li>
        </ul>
      </div>

      <div class="endpoint-text">
        <span class="stronger">ENDPOINT:</span> <a target="_blank" href="http://3.90.154.57/api/v1/schedule">http://3.90.154.57/api/v1/schedule</a> <br>
        <span class="stronger">METHOD:</span> POST <br>
        <span class="stronger">PARAMETERS:</span> { <br>
          <span class="json-name">"total"</span>: "unsigned integer", <br>
          <span class="json-name">"delay"</span>: "unsigned integer" <br>
          <span class="json-name">"priority"</span>: "string|values:low,high" <br>
        }<br>
        <span class="stronger">HEADERS:</span> { <br>
          <span class="json-name">"Authorization"</span>: "Bearer + TOKEN", <br>
        } <br>
      </div>

      <div class="title-text">
        <h4>Example in cURL:</h4>
      </div>

      <pre class='code code-css'><label>cURL:</label><code>
curl --location --request POST 'http://3.90.154.57/api/v1/schedule?total=10&delay=0&priority=low' --header 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiN2RkMWE4MGM3NjE1M2MwYjEzMzAzNWU5N2Q0YmE1NjA4NTRmMzNmODQ4OGUzY2M0MDkwNmM0NjQ4YzUyMjdkZjA3MGEwNjMxMGVkZjIyZjAiLCJpYXQiOjE1ODUyNDE0MDYsIm5iZiI6MTU4NTI0MTQwNiwiZXhwIjoxNjE2Nzc3NDA2LCJzdWIiOiI0Iiwic2NvcGVzIjpbXX0.viDJj-bUG9iDdSqkm9sjJjk0OLhK263RqwklOqgz9y5wQ87LDkHWNLOUFf5h5t784xsE5ilf8dpm8MladC0R_7pOJvmrHrHrVRfr5yebN6cC3QM1x8lcxoyIMn5xFJBa8BRBbkgWB3gPbUSXDUz8V_r5LrxG2drifaPlfPy-s1G1ElnWTwFvIiwfGFBBJwX0qcEUWJ4ibXpwMtt9zbsjOsz_-XJMJbU-veq1wxoVlm1SfXmQlppWT4JUZ16dPgVVBOvfYriwAiBEq5TBu5s1FKq_lSgiJw-pibPbqtIOS7SVRH0uXtv-t8pNcrjpoP-vRKQKLAby9iOdsDhQzzzYRn2-fy_Fl998C2bWfDUn1Adw5QUW0JE5fmksTsqKcoEnJOQCGCEVpm6gvmNNRLDsBwVkuvNm8-zYtoK2EjZgkkW8v14wSfHulFl3Jy0jFZdYPC631Ft0sjT34aD14IJ5JSMDsxqc06nNtsw6IZZNxi2kPmjfznOaPBet2yofHbZVBmDwYMdM2ct6UMfY7yFkVFicw5repiLlDq18BiV8Rrjt77c0s4Cp338OgAd50yTRJ0vLr2KUXS4vg-7qDkoGqEPZOGKgtZuUsDFZxakkQ1x3tdmdfM5puoRcjwY7UmRw4VZPwB2zIQWqkuKlxxjspH0L6b-QBbdjHs0UNJBjfss'
      </code></pre>

      <div class="title-text">
        <h4>Response example:</h4>
      </div>

      <pre class='code code-css'><label>JSON:</label><code>
{
    "success": true,
    "total_tasks_to_be_schedule": 10,
    "total_tasks_scheduled": 10,
    "group_id": "3d02194a3f9bac515341d269f48be1cc",
    "list_jobs_url": "http://3.90.154.57/api/v1/jobs/3d02194a3f9bac515341d269f48be1cc"
}
      </code></pre>

      <ul>
        <li>The <strong>total_tasks_to_be_schedule</strong> refers to the quantity of jobs that where requested by the user to be schedule </p></li>
        <li>The <strong>total_tasks_scheduled</strong> refers to the quantity of jobs that where successfully schedule in the queue </p></li>
        <li>The <strong>group_id</strong> is the identifier of the request and it would allow to get the information of the jobs with another request </p></li>
        <li>The <strong>list_jobs_url</strong> refers to the following endpoint, it is the url where it could be requested the information of the jobs processed </p></li>
      </ul>

    </div>


    <br>
    <hr>

    <div id="list">
      <div class="title-text">
        <h3>List from group ID</h3>
        <p>This endpoint returns the list of the jobs processed by the queue related to a group_id,  to request this endpoint it is necessary to send a token in the header previously obtained by making a login or registration. </p>
      </div>

      <div class="endpoint-text">
        <span class="stronger">ENDPOINT:</span> <a >http://3.90.154.57/api/v1/jobs/{group_id}</a> <br>
        <span class="stronger">METHOD:</span> POST <br>
        <span class="stronger">PARAMETERS:</span> {}<br>
        <span class="stronger">HEADERS:</span> { <br>
          <span class="json-name">"Authorization"</span>: "Bearer + TOKEN", <br>
        } <br>
      </div>

      <div class="title-text">
        <h4>Example in cURL:</h4>
      </div>

      <pre class='code code-css'><label>cURL:</label><code>
curl --location --request GET 'http://3.90.154.57/api/v1/jobs/3d02194a3f9bac515341d269f48be1cc' --header 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiN2RkMWE4MGM3NjE1M2MwYjEzMzAzNWU5N2Q0YmE1NjA4NTRmMzNmODQ4OGUzY2M0MDkwNmM0NjQ4YzUyMjdkZjA3MGEwNjMxMGVkZjIyZjAiLCJpYXQiOjE1ODUyNDE0MDYsIm5iZiI6MTU4NTI0MTQwNiwiZXhwIjoxNjE2Nzc3NDA2LCJzdWIiOiI0Iiwic2NvcGVzIjpbXX0.viDJj-bUG9iDdSqkm9sjJjk0OLhK263RqwklOqgz9y5wQ87LDkHWNLOUFf5h5t784xsE5ilf8dpm8MladC0R_7pOJvmrHrHrVRfr5yebN6cC3QM1x8lcxoyIMn5xFJBa8BRBbkgWB3gPbUSXDUz8V_r5LrxG2drifaPlfPy-s1G1ElnWTwFvIiwfGFBBJwX0qcEUWJ4ibXpwMtt9zbsjOsz_-XJMJbU-veq1wxoVlm1SfXmQlppWT4JUZ16dPgVVBOvfYriwAiBEq5TBu5s1FKq_lSgiJw-pibPbqtIOS7SVRH0uXtv-t8pNcrjpoP-vRKQKLAby9iOdsDhQzzzYRn2-fy_Fl998C2bWfDUn1Adw5QUW0JE5fmksTsqKcoEnJOQCGCEVpm6gvmNNRLDsBwVkuvNm8-zYtoK2EjZgkkW8v14wSfHulFl3Jy0jFZdYPC631Ft0sjT34aD14IJ5JSMDsxqc06nNtsw6IZZNxi2kPmjfznOaPBet2yofHbZVBmDwYMdM2ct6UMfY7yFkVFicw5repiLlDq18BiV8Rrjt77c0s4Cp338OgAd50yTRJ0vLr2KUXS4vg-7qDkoGqEPZOGKgtZuUsDFZxakkQ1x3tdmdfM5puoRcjwY7UmRw4VZPwB2zIQWqkuKlxxjspH0L6b-QBbdjHs0UNJBjfss'
      </code></pre>

      <div class="title-text">
        <h4>Response example:</h4>
      </div>

      <pre class='code code-css'><label>JSON:</label><code>
{
    "total_jobs_processed": 1,
    "jobs": [
      {
          "id": 1038,
          "job_id": 1038,
          "group_id": "3d02194a3f9bac515341d269f48be1cc",
          "user_id": 4,
          "queue": "low",
          "payload":"{\"uuid\":\"9aad3b28-735b-4543-879f-db9ee6071469\",\"displayName\":\"App\\\\Jobs\\\\ProcessRequest\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ProcessRequest\",\"command\":\"O:23:\\\"App\\\\Jobs\\\\ProcessRequest\\\":11:{s:11:\\\"\ *\ priority\\\";s:3:\\\"low\\\";s:8:\\\"\ *\ group\\\";s:32:\\\"3d02194a3f9bac515341d269f48be1cc\\\";s:10:\\\"\ *\ user_id\\\";i:4;s:6:\\\"\ *\ job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";s:3:\\\"low\\\";s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"},\"id\":\"1038\",\"attempts\":0,\"type\":\"job\",\"tags\":[],\"pushedAt\":\"1585242332.0093\"}",
          "attempts": 1,
          "start_execution_datetime": "2020-03-26 17:05:32",
          "end_execution_datetime": "2020-03-26 17:05:35",
          "created_at": "2020-03-26T17:05:32.000000Z",
          "updated_at": "2020-03-26T17:05:35.000000Z"
      }
    ]
}
      </code></pre>

      <ul>
        <li>The <strong>total_jobs_processed</strong> refers to the quantity of jobs that where processed by the queue at the requesting moment</p></li>
        <li>The <strong>jobs</strong> array shows the information of the jobs that has been processed by the queue</p></li>
      </ul>

    </div>


    <br><br><br><br>
    <br><br><br><br>
    <br><br><br><br>


    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <script type="text/javascript">
      $(".scroll").click(function(event) {
        event.preventDefault();
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#"+this.name).offset().top
        }, 800);
      });
    </script>
  </body>
</html>
