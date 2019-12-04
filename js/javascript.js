var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
}


function validate() {
    var Name = $(".name").val();
    var Ordernummer = $(".od").val();
    var Onderwerp = $(".onw").val();
    var Vraag = $('.uwVraag').val();
    var email = $('.email').val();
    if (Name == "" || Ordernummer == "" || Onderwerp == "" || email == "" || Vraag == "") //wanted to check for alphabets only.
        alert("Vul alle velden in");
    else {
        $.post("php/ajaxSendMail.php", {
            data: JSON.stringify({ "Naam": Name, "Ordernummer": Ordernummer, "Onderwerp": Onderwerp, "Vraag": Vraag, "email": email }),
        });
        alert("Uw vraag is doorgestuurd naar een van onze medewerkers");
        $(".name").val("");
        $(".od").val("");
        $(".onw").val("");
        $(".uwVraag").val("");
        $(".email").val("");
    }
}


