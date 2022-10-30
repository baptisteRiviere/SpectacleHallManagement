var login_form = document.getElementById('login-form');
var login_error = document.getElementById('login_error');

login_form.addEventListener('submit', (evnt) => {
  evnt.preventDefault();

  var username = login_form.elements["username"];
  var password = login_form.elements["password"];

  var data = new FormData();
  data.append('username',username.value);
  data.append('password',password.value);
  fetch('../accessDB/login.php', {
    method: 'post',
    body: data
  })
  .then(r => r.json())
  .then(r => {
    if (r.login_valid) {
      window.location.href = "../account/index.php";
    } else {
      login_error.innerHTML = "<p class='message'>username or password invalid</p>";
    }
  })
  .catch((error) => {
    console.log(error);
  });
});

