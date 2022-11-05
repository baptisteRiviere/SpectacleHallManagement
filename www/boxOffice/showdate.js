// getting spectacle id
var showdate_id = document.getElementById("showdate_id").value;

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
    console.log(ticket);
  });
})
