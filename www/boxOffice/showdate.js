// getting spectacle id
var showdate_id = document.getElementById("showdate_id").value;
var places = document.getElementById("places");
var place_category = document.getElementById("place_category");
var place_price = document.getElementById("place_price");
var place_location = document.getElementById("place_location");

console.log(showdate_id);

// initialising data 
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
    const newImage = document.createElement('img');
    if (ticket.id_spectator == null) {
      newImage.src = "/img/place_available.png"
      newImage.addEventListener("mouseover", (evnt) => { 
        place_category.innerText = ticket.category;
        place_price.innerText = ticket.price;
        place_location.innerText = ticket.location;
      })
    } else {
      newImage.src = "/img/place_booked.png"
    }
    newImage.style.height = '80px';
    newImage.style.width = '80px';
    newImage.id = ticket.id;
    places.appendChild(newImage);
    console.log(ticket);
  });
})
