<?php
session_start();
include "../../config.php";
$message = "";
if(isset($_SESSION['admin'])){
  header("Location: ../index.php");
  die();
}

if(isset($_POST['user']) && isset($_POST['pass'])){
  $user = mysqli_real_escape_string($conn , $_POST['user']);
  $pass = mysqli_real_escape_string($conn , $_POST['pass']);
  $pass = md5($pass);

  $sql = "SELECT * FROM admins WHERE username = '$user' AND password = '$pass'";
  $run = mysqli_query($conn , $sql);
  if(mysqli_num_rows($run) > 0){
    $_SESSION['admin'] = $user;
    header("Location: ../index.php");
    die();
  }
  else $message = "Username or password is wrong!";

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login V1</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" type="image/png" href="images/icons/favicon.ico" />

  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">

  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">

  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">

  <meta name="robots" content="noindex, follow">
  <script nonce="f54e2405-bb45-40b5-ab49-f0f9e91dfd37">
    (function(w, d) {
      ! function(a, b, c, d) {
        a[c] = a[c] || {};
        a[c].executed = [];
        a.zaraz = {
          deferred: [],
          listeners: []
        };
        a.zaraz.q = [];
        a.zaraz._f = function(e) {
          return function() {
            var f = Array.prototype.slice.call(arguments);
            a.zaraz.q.push({
              m: e,
              a: f
            })
          }
        };
        for (const g of ["track", "set", "debug"]) a.zaraz[g] = a.zaraz._f(g);
        a.zaraz.init = () => {
          var h = b.getElementsByTagName(d)[0],
            i = b.createElement(d),
            j = b.getElementsByTagName("title")[0];
          j && (a[c].t = b.getElementsByTagName("title")[0].text);
          a[c].x = Math.random();
          a[c].w = a.screen.width;
          a[c].h = a.screen.height;
          a[c].j = a.innerHeight;
          a[c].e = a.innerWidth;
          a[c].l = a.location.href;
          a[c].r = b.referrer;
          a[c].k = a.screen.colorDepth;
          a[c].n = b.characterSet;
          a[c].o = (new Date).getTimezoneOffset();
          if (a.dataLayer)
            for (const n of Object.entries(Object.entries(dataLayer).reduce(((o, p) => ({
                ...o[1],
                ...p[1]
              })), {}))) zaraz.set(n[0], n[1], {
              scope: "page"
            });
          a[c].q = [];
          for (; a.zaraz.q.length;) {
            const q = a.zaraz.q.shift();
            a[c].q.push(q)
          }
          i.defer = !0;
          for (const r of [localStorage, sessionStorage]) Object.keys(r || {}).filter((t => t.startsWith("_zaraz_"))).forEach((s => {
            try {
              a[c]["z_" + s.slice(7)] = JSON.parse(r.getItem(s))
            } catch {
              a[c]["z_" + s.slice(7)] = r.getItem(s)
            }
          }));
          i.referrerPolicy = "origin";
          i.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(a[c])));
          h.parentNode.insertBefore(i, h)
        };
        ["complete", "interactive"].includes(b.readyState) ? zaraz.init() : a.addEventListener("DOMContentLoaded", zaraz.init)
      }(w, d, "zarazData", "script");
    })(window, document);
  </script>
</head>

<body>
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="images/img-01.png" alt="IMG">
        </div>
        <form action="#" method="POST" class="login100-form validate-form">
          <span class="login100-form-title">
            Admin Login
          </span>
          <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" name="user" placeholder="Username">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>
          <div class="wrap-input100 validate-input" data-validate="Password is required">
            <input class="input100" type="password" name="pass" placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
          <?=$message?>
          <div class="container-login100-form-btn">
            
            <button class="login100-form-btn">
              Login
            </button>
          </div>

          <div class="text-center p-t-136">

          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>

  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="vendor/select2/select2.min.js"></script>

  <script src="vendor/tilt/tilt.jquery.min.js"></script>
  <script>
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>

  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
  </script>

  <script src="js/main.js"></script>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816" integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw==" data-cf-beacon='{"rayId":"7ceca4f588948ec8","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.4.0","si":100}' crossorigin="anonymous"></script>
</body>

</html>