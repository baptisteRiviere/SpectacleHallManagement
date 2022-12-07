// getting html elements

var id_showdate = document.getElementById("showdate_id").value;
var user_id = document.getElementById("user_id").value;
var places = document.getElementById("places");
var place_category = document.getElementById("place_category");
var place_price = document.getElementById("place_price");
var place_location = document.getElementById("place_location");
var message = document.getElementById("message");
var book_button = document.getElementById("book_button");

var selected_tickets = [];
var nb_selected_places = 0;
var price_selected_places = 0;


/// about the user
if (user_id=="") {
  window.alert("not registered, you will be redirected to the log-in page");
  window.location.href = "../auth/index.php";
}


/// about the map

// initialising data to send to getTicketList.php
var data = new FormData();
data.append('id_showdate',id_showdate);

// requesting spectacle information
fetch('../accessDB/getTicketList.php', {
  method: 'post',
  body: data
})
.then(r_ticket => r_ticket.json())
.then(r_ticket => {
  console.log(r_ticket);
  r_ticket.forEach(ticket => {
    // creating an image for each place
    const placeImage = document.createElement('img');
    // adding some attributes
    placeImage.classList.add("place");
    placeImage.selected = false;
    placeImage.style.gridRow = ticket.location_x;
    placeImage.style.gridColumn = ticket.location_y;
    placeImage.id = ticket.id;
    placeImage.price = ticket.price
    // adding some actions if the ticket hasn't been booked yet
    if (ticket.id_spectator == null) { 
      placeImage.src = "/img/place_available.png"
      placeImage.addEventListener("mouseover", (evnt) => { mouseOverPlace(placeImage,ticket) })
      placeImage.addEventListener("mouseout", (evnt) => { mouseOutPlace(placeImage) })
      placeImage.addEventListener("click", (evnt) => { clickPlace(placeImage,ticket) })
    } else { // showing booked tickets by a special image
      placeImage.src = "/img/place_booked.png"
    }
    // finally append the image in the html
    places.appendChild(placeImage);
  })
})


function mouseOverPlace(placeImage,ticket) {
  if (! placeImage.selected) {
      placeImage.src = "/img/place_mouse_on.png"
      place_category.innerText = ticket.category;
      place_price.innerText = ticket.price;
      place_location.innerText = ticket.location_x.toString() + "-" + ticket.location_y.toString(); 
  }
}

function mouseOutPlace(placeImage) {
  if (! placeImage.selected) {
    placeImage.src = "/img/place_available.png"
  }
  place_category.innerText = "";
  place_price.innerText = "";
  place_location.innerText = ""; 
}

function clickPlace(placeImage,ticket) {
  if (placeImage.selected) { // deselecting a place
    placeImage.src = "/img/place_mouse_on.png"
    const index_ticket = selected_tickets.indexOf(ticket); // getting index of ticket in ticket list to remove it
    if (index_ticket > -1) { // only splice array when item is found
      selected_tickets.splice(index_ticket, 1); // 2nd parameter means remove one item only
    }
    placeImage.selected = false;
    nb_selected_places -= 1;
    price_selected_places -= ticket.price;
  } else { // selecting a place
    placeImage.src = "/img/place_selected.png"; // replacing the image
    selected_tickets.push(ticket);
    placeImage.selected = true;
    nb_selected_places += 1;
    price_selected_places += ticket.price;
  }
  message.innerText = "places selected : " + selected_tickets.length + "\ntotalcost : " + price_selected_places + "€";
}


// places booked
book_button.addEventListener('click', function(evnt) {
  // initialising data to send to getTicketList.php
  var data = new FormData();
  data.append('selected_tickets',JSON.stringify(selected_tickets));
  data.append('user_id',user_id);
  data.append('id_showdate',id_showdate);

  // requesting spectacle information
  fetch('../accessDB/bookTickets.php', {
    method: 'post',
    body: data
  })
  .then(r => r.json())
  .then(r => {
    if (r.ticket_booked) {
      window.alert("places have been booked, you can find your tickets in your personal space");
      window.location.href = "../account/index.php";
    }
  })
});