// requesting the spectacle list
//var box_office = document.getElementById('box_office'); 
var cards_div = document.getElementById('cards');

fetch('../accessDB/getSpectacleList.php')
.then(r => r.json())
.then(r => {
    r.forEach(spectacle => {
        // creating a card
        var card_div = document.createElement('div');
        card_div.classList.add("card");
        //card_div.style.backgroundImage = "url('../img/spectacle_feu.jpg')"
        card_div.style.background = "radial-gradient(#76b2fe, #b69efe)"

        // creating the card icon
        var card_icon_div = document.createElement('div');
        card_icon_div.classList.add("card__icon");
        var text_i_card_icon = document.createElement('i');
        text_i_card_icon.classList.add("fas");
        text_i_card_icon.classList.add("fa-bolt");
        card_icon_div.appendChild(text_i_card_icon);
        card_div.appendChild(card_icon_div);

        // creating the card exit
        var card_exit_p = document.createElement('p');
        card_exit_p.classList.add("card__exit");
        var text_i_card_exit = document.createElement('i');
        text_i_card_exit.classList.add("fas");
        text_i_card_exit.classList.add("fa-times");
        card_exit_p.appendChild(text_i_card_exit);
        card_div.appendChild(card_exit_p);

        // creating the card title
        var card_title_h2 = document.createElement('h2');
        card_title_h2.classList.add("card__title");
        card_title_h2.innerText = spectacle.name;
        card_div.appendChild(card_title_h2);

        // creating the card link
        var card_link_p = document.createElement('p');
        card_link_p.classList.add("card__apply");
        var text_i_card_link = document.createElement('i');
        text_i_card_link.classList.add("fas");
        text_i_card_link.classList.add("fa-arrow-right");
        text_i_card_link.classList.add("card__link");
        text_i_card_link.innerText = "show more";
        card_link_p.appendChild(text_i_card_link);
        card_div.appendChild(card_link_p);
       
        // adding the card to the html document
        cards_div.appendChild(card_div);
        
        // addEventListener
        card_div.addEventListener('click', () => {
            document.location.href = "spectacle.php?spectacle_id=" + spectacle.id;
        });
    });
})
