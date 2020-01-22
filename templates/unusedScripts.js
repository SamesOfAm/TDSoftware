
/* let restArguments = function(func, startIndex) {
    startIndex = startIndex == null ? func.length - 1 : +startIndex;
    return function() {
        let length = Math.max(arguments.length - startIndex, 0),
            rest = Array(length),
            index = 0;
        for (; index < length; index++) {
            rest[index] = arguments[index + startIndex];
        }
        switch (startIndex) {
            case 0: return func.call(this, rest);
            case 1: return func.call(this, arguments[0], rest);
            case 2: return func.call(this, arguments[0], arguments[1], rest);
        }
        let args = Array(startIndex + 1);
        for (index = 0; index < startIndex; index++) {
            args[index] = arguments[index];
        }
        args[startIndex] = rest;
        return func.apply(this, args);
    };
};
delay = restArguments(function(func, wait, args) {
    return setTimeout(function() {
        return func.apply(null, args);
    }, wait);
});

let nowFunction = Date.now || function() {
    return new Date().getTime();
};

debounce = function(func, wait, immediate) {
    let timeout, result;

    let later = function(context, args) {
        timeout = null;
        if (args) result = func.apply(context, args);
    };

    let debounced = restArguments(function(args) {
        if (timeout) clearTimeout(timeout);
        if (immediate) {
            let callNow = !timeout;
            timeout = setTimeout(later, wait);
            if (callNow) result = func.apply(this, args);
        } else {
            timeout = delay(later, wait, this, args);
        }

        return result;
    });

    debounced.cancel = function() {
        clearTimeout(timeout);
        timeout = null;
    };

    return debounced;
};

throttle = function(func, wait, options) {
    scrolltop = window.pageYOffset;
    let timeout, context, args, result;
    let previous = 0;
    if (!options) options = {};

    let later = function() {
        previous = options.leading === false ? 0 : nowFunction();
        timeout = null;
        result = func.apply(context, args);
        if (!timeout) context = args = null;
    };

    let throttled = function() {
        let now = nowFunction();
        if (!previous && options.leading === false) previous = now;
        let remaining = wait - (now - previous);
        context = this;
        args = arguments;
        if (remaining <= 0 || remaining > wait) {
            if (timeout) {
                clearTimeout(timeout);
                timeout = null;
            }
            previous = now;
            result = func.apply(context, args);
            if (!timeout) context = args = null;
        } else if (!timeout && options.trailing !== false) {
            timeout = setTimeout(later, remaining);
        }
        return result;
    };

    throttled.cancel = function() {
        clearTimeout(timeout);
        previous = 0;
        timeout = context = args = null;
    };

    return throttled;
};

let currentSectionVH = 0;

let toBeThrottled = function() {
    scrolltop = window.pageYOffset;
    if (scrolltop > lastScrollTop) {
        document.getElementById('wrapper').style.marginTop = currentSectionVH - 100 + 'vh';
        currentSectionVH -= 100;
    } else {
        document.getElementById('wrapper').style.marginTop = currentSectionVH + 100 + 'vh';
        currentSectionVH += 100;
    }
    setTimeout(function(){
        console.log('window offset after 1000ms: ' + window.pageYOffset);
        lastScrollTop = window.pageYOffset;
    }, 1000);
    return  direction;
};

handleScrolling = function() {
    throttle(toBeThrottled, 1000, {trailing: false});
};



    scrolltop,
    direction;
$(window).on('scroll', throttle(toBeThrottled, 1000, {trailing: false})); */

// OTHER SCRIPTS

/* let currentlyScrolling = false;
        setTimeout(function(){
            jQuery(window).scroll(function(){
                if(!clickedAScrollingLink && !currentlyScrolling) {
                    console.log('Fired scrolling handler');
                    currentlyScrolling = true;
                    let scrolltop = window.pageYOffset || document.documentElement.scrollTop;
                    let body = document.body,
                        html = document.documentElement;
                    let height = Math.max(body.scrollHeight, body.offsetHeight,
                        html.clientHeight, html.scrollHeight, html.offsetHeight);
                    let currentWindowHeight = jQuery(window.top).height();
                    console.log('lastScrollTop: ');
                    console.log(lastScrollTop);
                    console.log('ScrollTop: ');
                    console.log(scrolltop);
                    if (scrolltop === lastScrollTop) {
                        console.log('Do nothing');
                        currentlyScrolling = false;
                        lastScrollTop = scrolltop <= 0 ? 0 : scrolltop;
                        console.log('lastScrollTop after scrolling: ');
                        console.log(lastScrollTop);
                    } else if (scrolltop > lastScrollTop && (scrolltop + currentWindowHeight * 2 <= height)) {
                        jQuery('html, body').animate({
                            scrollTop: scrolltop + currentWindowHeight
                        }, 1200, function () {
                            currentlyScrolling = false;
                            scrolltop = window.pageYOffset || document.documentElement.scrollTop;
                            lastScrollTop = scrolltop <= 0 ? 0 : scrolltop;
                            console.log('lastScrollTop after scrolling: ');
                            console.log(lastScrollTop);
                        });
                    } else if (scrolltop > lastScrollTop && (scrolltop + currentWindowHeight * 2 > height)) {
                        jQuery('html, body').animate({
                            scrollTop: height - currentWindowHeight
                        }, 800, function() {
                            currentlyScrolling = false;
                            scrolltop = window.pageYOffset || document.documentElement.scrollTop;
                            lastScrollTop = scrolltop <= 0 ? 0 : scrolltop;
                            console.log('lastScrollTop after scrolling: ');
                            console.log(lastScrollTop);
                        });
                    } else if (scrolltop < lastScrollTop && (height - currentWindowHeight) - scrolltop <= 10 ) {
                        jQuery('html, body').animate({
                            scrollTop: height - currentWindowHeight - 450
                        }, 1200, function() {
                            currentlyScrolling = false;
                            scrolltop = window.pageYOffset || document.documentElement.scrollTop;
                            lastScrollTop = scrolltop <= 0 ? 0 : scrolltop;
                            console.log('lastScrollTop after scrolling: ');
                            console.log(lastScrollTop);
                        });
                    } else if (scrolltop < lastScrollTop) {
                        jQuery('html, body').animate({
                            scrollTop: scrolltop - currentWindowHeight
                        }, 1200, function () {
                            currentlyScrolling = false;
                            scrolltop = window.pageYOffset || document.documentElement.scrollTop;
                            lastScrollTop = scrolltop <= 0 ? 0 : scrolltop;
                            console.log('lastScrollTop after scrolling: ');
                            console.log(lastScrollTop);
                        });
                    }
                }
            });
        }, 500); */



function preventDefaultForScrollKeys(e) {
    if (keys[e.keyCode]) {
        preventDefault(e);
        return false;
    }
}

let keys = {37: 1, 38: 1, 39: 1, 40: 1};

function preventDefault(e) {
    e = e || window.event;
    if (e.preventDefault)
        e.preventDefault();
    e.returnValue = false;
}

let clickedAScrollingLink = false;
let allScrollingLinks = document.querySelectorAll('.scrolling-link');

for(let i = 0; i < allScrollingLinks.length; i++) {
    allScrollingLinks[i].addEventListener('click', function() {
        clickedAScrollingLink = true;
        setTimeout(function() {
            clickedAScrollingLink = false;
            let scrolltop = window.pageYOffset || document.documentElement.scrollTop;
            lastScrollTop = scrolltop <= 0 ? 0 : window.pageYOffset || document.documentElement.scrollTop;
        }, 840);
    });
}