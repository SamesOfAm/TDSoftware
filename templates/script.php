<script>
    let width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
    let shareIconsShowing = false;
    const currentLanguage = document.children[0].lang;
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
    switch(currentLanguage) {
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
    if (document.getElementById('top').classList.contains('blog') && currentLanguage === 'de' || document.getElementById('top').classList.contains('blog-article') && currentLanguage === 'de') {
        emailField.labels[0].childNodes[2].data = "Nichts mehr verpassen!";
        document.getElementById('ctrl_submit').innerHTML = "Newsletter abonnieren";
    } else if (document.getElementById('top').classList.contains('blog') && currentLanguage === 'en' || document.getElementById('top').classList.contains('blog-article') && currentLanguage === 'en') {
        emailField.labels[0].childNodes[2].data = "Stay tuned in!";
        document.getElementById('ctrl_submit').innerHTML = "Subscribe to Newsletter";
    }
    let lastScrollTop = window.pageYOffset || document.documentElement.scrollTop;
    jQuery(document).ready(function() {
        if (document.querySelector('.scroll-to-end') !== null) {
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
        }

        if (document.querySelector('.scroll-to-contact') !== null) {
            let toContactLink = document.querySelector('.scroll-to-contact');
            toContactLink.addEventListener('click', function(e) {
                e.preventDefault();
                jQuery('html, body').animate({
                    scrollTop: document.getElementById('contact').offsetHeight
                }, 800);
            });
        }

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

        if(document.querySelector('.slider-menu') !== null) {
            const bubbles = document.querySelector('.slider-menu').querySelectorAll('b');
            for (let i = 0; i < bubbles.length; i++) {
                bubbles[i].innerHTML = '';
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
    });
    setTimeout(function(){
        let ccLink = document.querySelector('.cc-link');
        ccLink.addEventListener('click', function(e){
            e.preventDefault();
            document.getElementById('privacy-link').click();
        })
    }, 7000);
    if(document.getElementById('mailchimp-subscribe-2') !== null && document.getElementById('mailchimp-subscribe-2').children[0].children[0].classList.contains('error')) {
        document.querySelector('.social-media').classList.add('error-bump');
        jQuery("html, body").animate({ scrollTop: jQuery(document).height() }, "slow");
    }

    function toggleShareIcons() {
        if (shareIconsShowing === false) {
            document.querySelector('.sharebuttons').querySelector('ul').style.right = '15px';
            document.querySelector('.sharebuttons').querySelector('ul').style.opacity = '1';
            shareIconsShowing = true;
        } else {
            document.querySelector('.sharebuttons').querySelector('ul').style.right = '-190px';
            document.querySelector('.sharebuttons').querySelector('ul').style.opacity = '0';
            shareIconsShowing = false;
        }
    }

    if(window.location.href.indexOf('/category/') !== -1) {
        document.querySelector('.invisible-list').style.display = "flex";
        document.getElementById('article-detail').querySelector('.ce_headline').style.display = "none";
        document.querySelector('.mod_newscategories').style.margin = "100px auto";
    }

    function removeStyles(el) {
        el.removeAttribute('style');
        el.removeAttribute('width');

        if(el.childNodes.length > 0) {
            for(var child in el.childNodes) {
                if(el.childNodes[child].nodeType == 1)
                    removeStyles(el.childNodes[child]);
            }
        }
    }

    if(document.querySelector('.services') !== null) {
        removeStyles(document.querySelector('.services'));
    }


</script>


<script type="text/javascript" src="files/assets/js/fullpage.js"></script>
<script type="text/javascript">
    if(width >= 1025 && !document.getElementById('top').classList.contains('blog') && !document.getElementById('top').classList.contains('blog-article')) {
        var myFullpage = new fullpage('#fullpage', {
            licenseKey: 'F072EB1D-C39143F7-8FF38B6E-AD2F5BB4',
            verticalCentered: false,
            css3: false,
            anchors: ['section1', 'section2', 'section3', 'section4', 'section5', 'section6', 'section7', 'section8', 'section9']
        });
        setTimeout(function(){
            document.getElementById('footer').style.height = "100%;";
        }, 1000);
    }
</script>