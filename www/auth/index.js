let login_form = document.getElementById('login-form');
let login_error = document.getElementById('login_error');


// Bouton de connexion
login_form.addEventListener('submit', (evnt) => {
  evnt.preventDefault();

  var name = login_form.elements["name"];


  var data = new FormData();
  data.append('name',name.value);
  data.append('password',password.value);
  fetch('../accessDB/login.php', {
    method: 'post',
    body: data
  })
  .then(r => r.json())
  .then(r => {
    if (r.login_valid) {
      console.log("yes");
      history.back();
    } else {
      console.log("no");
    }
    //console.log(r.erreur);
  })
  .catch((error) => {
    console.log(error);
  });
});
