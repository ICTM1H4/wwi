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
    var Name = document.getElementById('Name').value;
    var Ordernummer = document.getElementById('Od').value;
    var Onderwerp = document.getElementById('Onw').value;
    if (Name == "" || Ordernummer == "" || Onderwerp == "") //wanted to check for alphabets only.
        alert("Vul alle velden in");
    else {
        alert("Uw vraag is doorgestuurd naar een van onze medewerkers");
        location.reload();
    }
}


