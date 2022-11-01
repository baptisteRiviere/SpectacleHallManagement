// requesting the spectacle list
var container = document.getElementById('spectacle_choice'); 
fetch('../accessDB/getSpectacleList.php')
.then(r => r.json())
.then(r => {
    r.forEach(spectacle => {
        var checkbox = document.createElement("input");
        checkbox.type = "checkbox";
        checkbox.value = spectacle.id;
        checkbox.id = "checkbox" + spectacle.id;

        var label = document.createElement('label')
        label.appendChild(document.createTextNode(spectacle.name));

        container.appendChild(checkbox);
        container.appendChild(label);
    });
})
