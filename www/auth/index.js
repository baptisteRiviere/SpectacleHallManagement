let login_form = document.getElementById('login-form');
let login_error = document.getElementById('login_error');


// Bouton de connexion
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
    console.log(r);
    if (r.login_valid) {
      history.back();
    } else {
      login_error.innerHTML = "<p class='message'>username or password invalid</p>";
    }
    //console.log(r.erreur);
  })
  .catch((error) => {
    console.log(error);
  });
});
