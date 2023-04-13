<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <title>Document</title>
</head>

<body>

</body>
<footer>
    <div class="social-media">
        <a href="#" class="icon facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="icon twitter"><i class="fab fa-twitter"></i></a>
        <a href="#" class="icon instagram"><i class="fab fa-instagram"></i></a>
        <a href="#" class="icon linkedin"><i class="fab fa-linkedin-in"></i></a>
        <a href="#" class="icon youtube"><i class="fab fa-youtube"></i></a>
    </div>
    <div class="animated-text animate-on-scroll">
        <h4>Suivez moi sur les réseaux</h4>
        <div class="line"></div>
        <div class="rating">
            <form id="rating-form">
                <span class="star" data-rating="1"></span>
                <span class="star" data-rating="2"></span>
                <span class="star" data-rating="3"></span>
                <span class="star" data-rating="4"></span>
                <span class="star" data-rating="5"></span>
                <input type="hidden" name="rating" id="rating-value" />
            </form>
        </div>

        <div class="average-rating">
            <span class="stars"></span>
            <span class="rating-value"></span>
        </div>


    </div>




</footer>

<style>
    footer {
        background-color: #333;
        color: #fff;
        padding: 50px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
    }

    .icon {
        display: inline-block;
        color: #fff;
        background-color: transparent;
        margin-right: 10px;
        font-size: 24px;
        border-radius: 50%;
        height: 40px;
        width: 40px;
        text-align: center;
        line-height: 40px;
        transition: all 0.3s ease;
    }



    .icon:hover {
        transform: scale(1.1);
        background-color: white;
    }

    .animated-text h4 {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.5s ease-out, transform 0.5s ease-out;
    }

    .animated-text.animate h4 {
        opacity: 1;
        transform: translateY(0);
    }

    .animated-text {
        position: relative;
    }

    .line {
        position: absolute;
        bottom: 0;
        left: 0;
        height: 3px;
        background-color: red;
        width: 0;
        animation: type 2s forwards;
    }

    @keyframes type {
        from {
            width: 0;
        }

        to {
            width: 100%;
        }
    }
</style>
<script>

    function isElementInViewport(element) {
        var rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }


    function animateText(element) {
        var text = element.innerHTML;
        element.innerHTML = '';
        for (var i = 0; i < text.length; i++) {
            (function (i) {
                setTimeout(function () {
                    element.innerHTML += text.charAt(i);
                }, 50 * i);
            })(i);
        }
    }


    var elements = document.querySelectorAll('.animate-on-scroll');


    for (var i = 0; i < elements.length; i++) {
        (function (i) {
            if (isElementInViewport(elements[i])) {
                elements[i].classList.add('animate');
                animateText(elements[i].querySelector('h4'));
            }
            else {
                elements[i].classList.remove('animate');
            }
        })(i);
    }


    window.addEventListener('scroll', function () {
        for (var i = 0; i < elements.length; i++) {
            (function (i) {
                if (isElementInViewport(elements[i])) {
                    elements[i].classList.add('animate');
                    animateText(elements[i].querySelector('h4'));
                }
                else {
                    elements[i].classList.remove('animate');
                }
            })(i);
        }
    });
</script>

</html>