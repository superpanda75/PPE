function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("London");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();


//REPONSE
$('.check').click(function(){
    var id = $(this).attr('id');
    return id;
});
//Annulation demande
$(".del").click(function (e) {
    $id = ($(this).attr('id'));

    $(".check").click(function (e) {
        $reponse = ($(this).attr('id'));
        if ($reponse=="true") {

            $.post(
                "/AccountController",//url adresse
                {id: $id},
                function (data) {
                    console.log(data)
                })
            $.ajax({
                type: 'POST',
                url: '<?= BASE_URL ?>/AccountController',
                timeout: 4000,
                data: {
                    id: $id
                }
            }).done(function (data) {
                $('#' + $id).slideUp()
            }).fail(function (error) {

            });
        }
    })
})
//MODALS
var modal = document.getElementById('myModal');
// Get the button that opens the modal
var btn = document.getElementById("myBtn");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
var reponse = document.getElementsByClassName("check")[0];
var reponsen = document.getElementsByClassName("checkn")[0];
// When the user clicks on the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}
reponse.onclick = function() {
    modal.style.display = "none";
}
reponsen.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}