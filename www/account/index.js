
// calling php script to get pieces of information about the user
fetch('../accessDB/getUserInformation.php')
.then(r => r.json())
.then(r => {
    console.log(r);
})





// get the form to log out when submitted
var logout_form = document.getElementById('logout_form');

// if the form is submitted
logout_form.addEventListener('submit', (evnt) => {
  evnt.preventDefault();

  // calling php script to logout
  fetch('../auth/logout.php')
  .then(r => r.json())
  .then(r => {
    // checking logout is valid
    if (r.logout_valid) {
      window.location.href = "../index.php";
    } else {
      console.log("logout failed");
    }
  })
});
