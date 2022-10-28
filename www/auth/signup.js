var signup_form = document.getElementById('signup-form');
var signup_error = document.getElementById('signup_error');


signup_form.addEventListener('submit', (evnt) => {
  evnt.preventDefault();
  
  // data will be send to signup.php
  var data = new FormData();

  // defining an array containing every keywords the user has to pass
  var keywords = ["username","firstname","lastname","mail","address","birthdate","password","password_conf"];
  data.append("keywords",keywords)

  // for each array, adding the couple (key,value) to the array data
  for (var i = 0; i < keywords.length; i++) {
    var value = signup_form.elements[keywords[i]].value;
    data.append(keywords[i],value);
  }

  // calling file signup.php from the directory accessDB
  fetch('../accessDB/signup.php', {
    method: 'post',
    body: data
  })
  .then(r => r.text())
  .then(r => {
    console.log(r);
    if (r.signup_valid) {
      history.back();
    } else {
      signup_error.innerHTML = "<p class='message'>please fill every field</p>";
    }
  })
  .catch((error) => {
    console.log(error);
  });
});
