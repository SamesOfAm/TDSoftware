<script>
    let entered = false;
    function scrollSmoothly(e) {
        e.preventDefault();
        jQuery('html, body').animate({
            scrollTop: jQuery(e.target.hash).offset().top
        }, 800);
        return !1;
    }
    if(document.querySelector('.ce_sliderStart') !== null) {
        document.querySelector('.ce_sliderStart').addEventListener('mouseenter', function () {
            entered = true;
        }, false);
    }
    let emailField = document.getElementById('ctrl_EMAIL');
    emailField.labels[0].childNodes[3].style.display = 'none';
    switch(document.children[0].lang) {
        case 'de':
            document.getElementById('ctrl_submit').innerHTML = "Abonnieren";
            emailField.labels[0].childNodes[2].data = "Newsletter abonnieren";
            emailField.placeholder = "Deine E-Mail-Adresse";
            break;
        case 'en':
            document.getElementById('ctrl_submit').innerHTML = "Subscribe";
            emailField.labels[0].childNodes[2].data = "Subscribe to newsletter";
            emailField.placeholder = "Your E-Mail Address";
            break;
        default:
            document.getElementById('ctrl_submit').innerHTML = "Subscribe";
            emailField.labels[0].childNodes[2].data = "Subscribe to newsletter";

    }
    let lastScrollTop = window.pageYOffset || document.documentElement.scrollTop;
    jQuery(document).ready(function() {
        let contactLink = document.querySelector('.scroll-to-end');
        contactLink.addEventListener('click', function(e) {
            e.preventDefault();
            let body = document.body,
                html = document.documentElement;
            let height = Math.max(body.scrollHeight, body.offsetHeight,
                html.clientHeight, html.scrollHeight, html.offsetHeight);
            jQuery('html, body').animate({
                scrollTop: height
            }, 800);
        });
        if (document.querySelector('.scroll-to-jobs') !== null) {
            let scrollToJobsLink = document.querySelector('.scroll-to-jobs');
            scrollToJobsLink.addEventListener('click', function(e) {
                e.preventDefault();
                jQuery('html, body').animate({
                    scrollTop: jQuery(e.target.hash).offset().top
                })
            })
        }
        if(document.querySelector('.slider-menu-top') !== null && document.body.classList.contains('homepage')) {
            let allReferences = document.querySelectorAll('.referenz');
            let sliderMenuTopButtons = document.querySelector('.slider-menu-top').children;
            for (let i = 0; i < (sliderMenuTopButtons.length); i++) {
                sliderMenuTopButtons[i].innerHTML = allReferences[i].dataset.customer;
            }
        } else if (document.querySelector('.slider-menu-top') !== null && document.body.classList.contains('career')) {
            let allGroups = document.querySelectorAll('.work-group');
            let sliderMenuTopButtons = document.querySelector('.slider-menu-top').children;
            for (let i = 0; i < (sliderMenuTopButtons.length); i++) {
                sliderMenuTopButtons[i].innerHTML = allGroups[i].dataset.group;
            }
        }
        let navigationOptions = document.getElementById('header-navigation').children;
        let careerButtons = document.querySelectorAll('.career-button');
        let moreBenefitsButtons = document.querySelectorAll('.more-benefits');
        for(let i = 0; i < navigationOptions.length; i++) {
            if(navigationOptions[i].children[0].classList.contains('prevent-default')) {
                navigationOptions[i].children[0].addEventListener('click', scrollSmoothly);
            }
        }
        let scrollEffectLinks = document.querySelectorAll('.scroll-effect');
        for(let i = 0; i < scrollEffectLinks.length; i++) {
            scrollEffectLinks[i].addEventListener('click', scrollSmoothly);
        }

        for(let i = 0; i < moreBenefitsButtons.length; i++) {
            if(moreBenefitsButtons[i].classList.contains('prevent-default')) {
                moreBenefitsButtons[i].addEventListener('click', scrollSmoothly);
            }
        }
        for(let i = 0; i < careerButtons.length; i++) {
            if(careerButtons[i].classList.contains('prevent-default')) {
                careerButtons[i].addEventListener('click', scrollSmoothly);
                careerButtons[i].firstChild.addEventListener('click', function (e) {
                    e.preventDefault();
                    jQuery('html, body').animate({
                        scrollTop: jQuery(e.target.parentNode.hash).offset().top
                    }, 800);
                    return !1;
                });
            }
        }
        let inFirstHalf = true;
        let inSecondHalf = false;
        jQuery(window).scroll(function(){
            let scrolltop = window.pageYOffset;
            let body = document.body,
                html = document.documentElement;
            let height = Math.max(body.scrollHeight, body.offsetHeight,
                html.clientHeight, html.scrollHeight, html.offsetHeight);
            if(scrolltop > height/2 && inFirstHalf) {
                document.getElementById('main-teaser').querySelector('img').style.position = "relative";
                inSecondHalf = true;
                inFirstHalf = false;
            } else if(scrolltop <= height/2 && inSecondHalf) {
                document.getElementById('main-teaser').querySelector('img').style.position = "fixed";
                inSecondHalf = false;
                inFirstHalf = true;
            }
        });
    });
    setTimeout(function(){
        let ccLink = document.querySelector('.cc-link');
        ccLink.addEventListener('click', function(e){
            e.preventDefault();
            document.getElementById('privacy-link').click();
        })
    }, 7000);
    if(document.getElementById('mailchimp-subscribe-2').children[0].children[0].classList.contains('error')) {
        document.querySelector('.social-media').classList.add('error-bump');
        jQuery("html, body").animate({ scrollTop: jQuery(document).height() }, "slow");
    }
</script>