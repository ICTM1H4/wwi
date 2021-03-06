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
    var Onderwerp = $(".onw").val();
    var Vraag = $('.uwVraag').val();
    var Ordernummer = $('.Odernummer').val();
    var email = $('.email').val();
    if (Name == "" || Onderwerp == "" || email == "" || Vraag == "") //wanted to check for alphabets only.
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

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
    return pattern.test(emailAddress);
}

function check() {
    if (!isValidEmailAddress($('.email').val())) {
        $('.email').css("border-color", "#fc0356");
        $('.email').css("color", "#721c24");
        $('.email').css("background-color", "#f8d7da");
        $('.knopVerzenden').prop('disabled', true)
        if ($('.email').val() == "") {
            $('.email').css("border-color", "#CCC");
            $('.email').css("color", "black");
            $('.email').css("background-color", "#FFF");
            $('.knopVerzenden').prop('disabled', false);
        }
    }
    else {
        $('.email').css("border-color", "#CCC");
        $('.email').css("color", "black");
        $('.email').css("background-color", "#FFF");
        $('.knopVerzenden').prop('disabled', false);
    }
}

function check2() {
    if (!isValidEmailAddress($('.emailcheck').val())) {
        $('.emailcheck').css("border-color", "#fc0356");
        $('.emailcheck').css("color", "#721c24");
        $('.emailcheck').css("background-color", "#f8d7da");
        $('.buttonPro').prop('disabled', true)
        if ($('.emailcheck').val() == "") {
            $('.emailcheck').css("border-color", "#CCC");
            $('.emailcheck').css("color", "black");
            $('.emailcheck').css("background-color", "#FFF");
            $('.buttonPro').prop('disabled', false);
        }
    }
    else {
        $('.emailcheck').css("border-color", "#CCC");
        $('.emailcheck').css("color", "black");
        $('.emailcheck').css("background-color", "#FFF");
        $('.buttonPro').prop('disabled', false);
    }
}

