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

// requesting shows list
fetch('../accessDB/getShowList.php', {
  method: 'post',
  body: data
})
.then(r => r.json())
.then(r => {
  console.log(r);
})