// getting spectacle id
var spectacle_id = document.getElementById("spectacle_id").value;

// initialising data 
var data = new FormData();
data.append('spectacle_id',spectacle_id);

// requesting spectacle information
fetch('../accessDB/getSpectacleInformation.php', {
  method: 'post',
  body: data
})
.then(r => r.json())
.then(r => {
  var title = document.getElementById("title");
  var description = document.getElementById("description");
  var artist = document.getElementById("artist");

  title.innerText = r.name;
  description.innerText = r.description;
  artist.innerText = r.firstname + " " + r.lastname;
})

//// GETTING shows and chosing one

var select_showdate = document.getElementById('select_showdate'); 
var showdate_form = document.getElementById('showdate_form');

// requesting shows list
fetch('../accessDB/getShowList.php', {
  method: 'post',
  body: data
})
.then(r => r.json())
.then(r => {
  r.forEach(showdate => {
    console.log(showdate.id);
    // create option using DOM
    const newOption = document.createElement('option');
    newOption.value = showdate.id;
    newOption.innerHTML = showdate.datetime;
    select_showdate.appendChild(newOption);
  });
})

/*
// adding an event when the form is submitted
add_spectacle_form.addEventListener('submit', (evnt) => {
  evnt.preventDefault();

  // getting information
  var name = add_spectacle_form.elements["name"];
  var description = add_spectacle_form.elements["description"];
  var id_artist = add_spectacle_form.elements["id_artist"];

  // asking addSpectacle.php
  var data = new FormData();
  data.append('name',name.value);
  data.append('description',description.value);
  data.append('id_artist',id_artist.value);
  fetch('../accessDB/addSpectacle.php', {
      method: 'post',
      body: data
  })
  .then(r => r.json())
  .then(r => {
      let message = document.getElementById('return_add_spectacle');
      if (r.spectacle_added) {
          message.innerText = "the spectacle has been added, please refresh to update";
          document.getElementById('name').value = "";
          document.getElementById('description').value = "";
      } else {
          message.innerText = r.error;
      }
  })
});*/