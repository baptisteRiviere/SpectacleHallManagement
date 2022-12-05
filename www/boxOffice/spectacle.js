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
    if (showdate.complete == 0) {
      // create option using DOM
      const newOption = document.createElement('option');
      newOption.value = showdate.id;
      newOption.innerHTML = showdate.datetime;
      select_showdate.appendChild(newOption);
    }
  });
})

