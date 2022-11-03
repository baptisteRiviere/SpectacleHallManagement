// requesting the spectacle list
var box_office_form = document.getElementById('box_office_form'); 

fetch('../accessDB/getSpectacleList.php')
.then(r => r.json())
.then(r => {
    r.forEach(spectacle => {
        var checkbox = document.createElement("input");
        checkbox.type = "checkbox";
        checkbox.value = spectacle.id;
        checkbox.id = "checkbox" + spectacle.id;
        checkbox.name = "spectacle_id";

        // adding an event to access spectacle page if clicked
        checkbox.addEventListener('click',function() { 
            box_office_form.submit();
         })

        var label = document.createElement('label')
        label.appendChild(document.createTextNode(spectacle.name));

        box_office_form.appendChild(checkbox);
        box_office_form.appendChild(label);
    });
})
