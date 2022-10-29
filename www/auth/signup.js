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
  .then(r => r.json())
  .then(r => {
    if (r.signup_valid) {
      alert("user has been succesfully writen, please log in")
      window.location.href = "index.php";
    } else {
      signup_error.innerHTML = "<p class='message'>" + r.error + "</p>";
    }
  })
  .catch((error) => {
    console.log(error);
  });
});
