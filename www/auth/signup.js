let signup_form = document.getElementById('signup-form');
let signup_error = document.getElementById('signup_error');


// Bouton de connexion
signup_form.addEventListener('submit', (evnt) => {
  evnt.preventDefault();

  var data = new FormData();
  data.append('username',signup_form.elements["username"].value);
  data.append('password',password.value);
  fetch('../accessDB/signup.php', {
    method: 'post',
    body: data
  })
  .then(r => r.json())
  .then(r => {
    if (r.signup_valid) {
      history.back();
    } else {
      signup_error.innerHTML = "<p>username or password invalid</p>";
    }
    //console.log(r.erreur);
  })
  .catch((error) => {
    console.log(error);
  });
});
