var logout_form = document.getElementById('logout_form');

logout_form.addEventListener('submit', (evnt) => {
  evnt.preventDefault();

  var data = new FormData();
  fetch('../auth/logout.php', {
    method: 'post',
    body: data
  })
  .then(r => r.json())
  .then(r => {
    if (r.logout_valid) {
      window.location.href = "../index.php";
    } else {
      console.log("logout failed");
    }
  })
});

