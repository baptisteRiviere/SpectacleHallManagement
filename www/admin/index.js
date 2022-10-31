// requesting the artists list
var select = document.getElementById('id_artist'); 
fetch('../accessDB/getArtistList.php')
.then(r => r.json())
.then(r => {
    r.forEach(artist => {
        // create option using DOM
        const newOption = document.createElement('option');
        newOption.value = artist.id;
        newOption.innerHTML = artist.firstname + artist.lastname;
        select.appendChild(newOption);
    });
})



// getting the form to add a spectacle
var login_form = document.getElementById('add_spectacle_form');

// adding an event when the form is submitted
login_form.addEventListener('submit', (evnt) => {
    evnt.preventDefault();

    // getting information
    var name = login_form.elements["name"];
    var description = login_form.elements["description"];
    var id_artist = login_form.elements["id_artist"];

    console.log(id_artist);

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
        console.log(r);
    })
});

