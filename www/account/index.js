// calling php script to get pieces of information about the user
fetch('../accessDB/getUserInformation.php')
.then(r => r.json())
.then(r => {
    var keywords = ["username","firstname","lastname","mail","address","birthdate"]
    keywords.forEach(function(key) 
    { 
      let element = document.getElementById(key);
      element.innerText = key + " : " + r[key];
    }
    );
})

// showing tickets booked by the user

var booked_tickets_div = document.getElementById("booked_tickets");
// calling php script to ask database
fetch('../accessDB/getUserBookedTickets.php')
.then(r => r.json())
.then(r => {
  r.forEach(ticket => {
    var newDiv = document.createElement("div");
    newDiv.id = "booked_ticket" + ticket.id;
    var spectacle_name = document.createTextNode(ticket.spectacle_name);
    var show_datetime = document.createTextNode(ticket.show_datetime);
    newDiv.appendChild(spectacle_name);
    newDiv.appendChild(show_datetime);

    var btn = document.createElement("button");
    btn.innerHTML = "cancel booking";
    btn.value = ticket.id;
    btn.addEventListener('click',(evnt) => { cancel_ticket(ticket.id)})
    newDiv.appendChild(btn);


    booked_tickets_div.append(newDiv);
  })
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

// canceling ticket
function cancel_ticket(ticket_id) {
  var data = new FormData();
  data.append('ticket_id',ticket_id);
  fetch('../accessDB/CancelTicket.php', {
    method: 'post',
    body: data
  })
  .then(r => r.json())
  .then(r => {
    if (r.ticket_canceled) {
      window.alert("ticket has been canceled");
      location.reload();
    }
  })
}