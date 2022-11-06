// getting html elements
var showdate_id = document.getElementById("showdate_id").value;
var places = document.getElementById("places");
var place_category = document.getElementById("place_category");
var place_price = document.getElementById("place_price");
var place_location = document.getElementById("place_location");
var book_number = document.getElementById("book_number");
var book_price = document.getElementById("book_price");
var book_button = document.getElementById("book_button");

/// about the map

// initialising data to send to getTicketList.php
var data = new FormData();
data.append('showdate_id',showdate_id);

// requesting spectacle information
fetch('../accessDB/getTicketList.php', {
  method: 'post',
  body: data
})
.then(r => r.json())
.then(r => {
  r.forEach(ticket => {
    // creating an image for each place
    const placeImage = document.createElement('img');
    // adding some attributes
    placeImage.selected = false;
    placeImage.style.height = '80px';
    placeImage.style.width = '80px';
    placeImage.id = ticket.id;
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
  });
})


function mouseOverPlace(placeImage,ticket) {
  if (! placeImage.selected) {
      placeImage.src = "/img/place_mouse_on.png"
      place_category.innerText = ticket.category;
      place_price.innerText = ticket.price;
      place_location.innerText = ticket.location; 
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
  if (placeImage.selected) {
    placeImage.src = "/img/place_mouse_on.png"
    placeImage.selected = false;
  } else {
    placeImage.src = "/img/place_selected.png"
    placeImage.selected = true;
  }
}