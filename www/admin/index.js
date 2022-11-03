//// ADDING SPECTACLE

var select_artist = document.getElementById('id_artist');
var add_spectacle_form = document.getElementById('add_spectacle_form');

// requesting the artists list
fetch('../accessDB/getArtistList.php')
.then(r => r.json())
.then(r => {
    r.forEach(artist => {
        // create option using DOM
        const newOption = document.createElement('option');
        newOption.value = artist.id;
        newOption.innerHTML = artist.firstname + " " + artist.lastname;
        select_artist.appendChild(newOption);
    });
})

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
});




//// ADDING SHOW

var select_spectacle = document.getElementById('id_spectacle'); 
var add_show_form = document.getElementById('add_show_form');

// requesting the spectacles list
fetch('../accessDB/getSpectacleList.php')
.then(r => r.json())
.then(r => {
    r.forEach(spectacle => {
        // create option using DOM
        const newOption = document.createElement('option');
        newOption.value = spectacle.id;
        newOption.innerHTML = spectacle.name;
        select_spectacle.appendChild(newOption);
    });
})


// adding an event when the form is submitted
add_show_form.addEventListener('submit', (evnt) => {
    evnt.preventDefault();

    // getting information
    var date = add_show_form.elements["date"];
    var time = add_show_form.elements["time"];
    var halfless = add_show_form.elements["halfless"];
    var id_spectacle = add_show_form.elements["id_spectacle"];

    // asking addShow.php
    var data = new FormData();
    data.append('date',date.value);
    data.append('time',time.value);
    data.append('halfless',halfless.checked);
    data.append('id_spectacle',id_spectacle.value);
    fetch('../accessDB/addShow.php', {
        method: 'post',
        body: data
    })
    .then(r => r.json())
    .then(r => {
        let message = document.getElementById('return_add_show');
        if (r.show_added) {
            message.innerText = "the show has been added, please refresh to update";
        } else {
            message.innerText = r.error;
        }
    })
});
