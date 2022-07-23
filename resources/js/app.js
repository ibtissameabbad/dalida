/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
window.Swal = require('sweetalert2/dist/sweetalert2.js');

import 'sweetalert2/src/sweetalert2.scss'

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('product-gallery', require('./components/ProductGallery.vue').default);
Vue.component('product-add-to-cart-wishlist', require('./components/ProductAddToCartWishlist.vue').default);
Vue.component('category-add-to-cart-wishlist', require('./components/CategoryAddToCartWishlist.vue').default);
Vue.component('cart-quantity-count', require('./components/CartQuantityCount.vue').default);
Vue.component('cart-category-quantity-count', require('./components/CartCategoryQuantityCount.vue').default);
Vue.component('checkout', require('./components/Checkout.vue').default);
Vue.component('category-gallery', require('./components/CategoryGallery.vue').default);
Vue.component('image-category', require('./components/ImageCategory.vue').default);
Vue.component('add-to-cart', require('./components/AddToCart.vue').default);
Vue.component('add-to-category-cart', require('./components/AddToCategoryCart.vue').default);
Vue.component('contact-us', require('./components/ContactUs.vue').default);
Vue.component('lead-footer', require('./components/LeadFooter.vue').default);
Vue.component('footer-image-two-women', require('./components/FooterTwoWomens.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});




// // most efficient way to add HTML, faster than innerHTML
// const parseHTML = htmlStr => {
//     const range = document.createRange()
//     range.selectNode(document.body) // required in Safari
//     return range.createContextualFragment(htmlStr)
// }
//
// // pass this function any image element to add magnifying functionality
// const makeImgMagnifiable = img => {
//     const magnifierFragment = parseHTML(`
//     <div class="magnifier-container">
//       <div class="magnifier">
//         <img class="magnifier__img" src="${img.src}"/>
//       </div>
//     </div>
//   `)
//
//     // This preserves the original element reference instead of cloning it.
//     img.parentElement.insertBefore(magnifierFragment, img)
//     const magnifierContainerEl = document.querySelector('.magnifier-container')
//     img.remove()
//     magnifierContainerEl.appendChild(img)
//
//     // query the DOM for the newly added elements
//     const magnifierEl = magnifierContainerEl.querySelector('.magnifier')
//     const magnifierImg = magnifierEl.querySelector('.magnifier__img')
//
//     // set up the transform object to be mutated as mouse events occur
//     const transform = {
//         translate: [0, 0],
//         scale: 1,
//     }
//
//     // shortcut function to set the transform css property
//     const setTransformStyle = (el, {translate, scale}) => {
//         const [xPercent, yRawPercent] = translate
//         const yPercent = yRawPercent < 0 ? 0 : yRawPercent
//
//         // make manual pixel adjustments to better center
//         // the magnified area over the cursor.
//         const [xOffset, yOffset] = [
//             `calc(-${xPercent}% + 250px)`,
//             `calc(-${yPercent}% + 70px)`,
//         ]
//
//         el.style = `
//       transform: scale(${scale}) translate(${xOffset}, ${yOffset});
//     `
//     }
//
//     // show magnified thumbnail on hover
//     img.addEventListener('mousemove', event => {
//         const [mouseX, mouseY] = [event.pageX + 40, event.pageY - 20]
//         const {top, left, bottom, right} = img.getBoundingClientRect()
//         transform.translate = [
//             ((mouseX - left) / right) * 100,
//             ((mouseY - top) / bottom) * 100,
//         ]
//         magnifierEl.style = `
//       display: block;
//       top: ${mouseY}px;
//       left: ${mouseX}px;
//     `
//         setTransformStyle(magnifierImg, transform)
//     })
//
//     // zoom in/out with mouse wheel
//     img.addEventListener('wheel', event => {
//         event.preventDefault()
//         const scrollingUp = event.deltaY < 0
//         const {scale} = transform
//         transform.scale = scrollingUp && scale < 3
//             ? scale + 0.1
//             : !scrollingUp && scale > 1
//                 ? scale - 0.1
//                 : scale
//         setTransformStyle(magnifierImg, transform)
//     })
//
//     // reset after mouse leaves
//     img.addEventListener('mouseleave', () => {
//         magnifierEl.style = ''
//         magnifierImg.style = ''
//     })
//
//
// }
// const img = document.querySelector('.image-preview-js')
// makeImgMagnifiable(img)
var $loupe = $(".loupe"),
    loupeWidth = $loupe.width(),
    loupeHeight = $loupe.height();

$(document).on("mouseenter", ".image", function (e) {
    console.log($(this))
    var $currImage = $(this),
        $img = $('<img/>')
            .attr('src', $('img', this).attr("src"))
            .css({ 'width': $currImage.width() * 2, 'height': $currImage.height() * 2, 'scale': 1.2 })
    ;

    $loupe.html($img).fadeIn(100);

    $(document).on("mousemove",moveHandler);

    function moveHandler(e) {
        var imageOffset = $currImage.offset(),
            fx = imageOffset.left - loupeWidth / 2,
            fy = imageOffset.top - loupeHeight / 2,
            fh = imageOffset.top + $currImage.height() + loupeHeight / 2,
            fw = imageOffset.left + $currImage.width() + loupeWidth / 2;

        $loupe.css({
            'left': e.pageX - 75,
            'top': e.pageY - 75
        });

        var loupeOffset = $loupe.offset(),
            lx = loupeOffset.left,
            ly = loupeOffset.top,
            lw = lx + loupeWidth,
            lh = ly + loupeHeight,
            bigy = (ly - loupeHeight / 4 - fy) * 2,
            bigx = (lx - loupeWidth / 4 - fx) * 2;

        $img.css({ 'left': -bigx, 'top': -bigy });

        if (lx < fx || lh > fh || ly < fy || lw > fw) {
            $img.remove();
            $(document).off("mousemove",moveHandler);
            $loupe.fadeOut(100);
        }
    }
});

/*
Credits:
https://github.com/marcaube/bootstrap-magnify
*/


!function ($) {

    "use strict"; // jshint ;_;


    /* MAGNIFY PUBLIC CLASS DEFINITION
     * =============================== */

    var Magnify = function (element, options) {
        this.init('magnify', element, options)
    }

    Magnify.prototype = {

        constructor: Magnify

        , init: function (type, element, options) {
            var event = 'mousemove'
                , eventOut = 'mouseleave';

            this.type = type
            this.$element = $(element)
            this.options = this.getOptions(options)
            this.nativeWidth = 0
            this.nativeHeight = 0

            this.$element.wrap('<div class="magnify" \>');
            this.$element.parent('.magnify').append('<div class="magnify-large" \>');
            this.$element.siblings(".magnify-large").css("background","url('" + this.$element.attr("src") + "') no-repeat");

            this.$element.parent('.magnify').on(event + '.' + this.type, $.proxy(this.check, this));
            this.$element.parent('.magnify').on(eventOut + '.' + this.type, $.proxy(this.check, this));
        }

        , getOptions: function (options) {
            options = $.extend({}, $.fn[this.type].defaults, options, this.$element.data())

            if (options.delay && typeof options.delay == 'number') {
                options.delay = {
                    show: options.delay
                    , hide: options.delay
                }
            }

            return options
        }

        , check: function (e) {
            var container = $(e.currentTarget);
            var self = container.children('img');
            var mag = container.children(".magnify-large");

            // Get the native dimensions of the image
            if(!this.nativeWidth && !this.nativeHeight) {
                var image = new Image();
                image.src = self.attr("src");

                this.nativeWidth = image.width;
                this.nativeHeight = image.height;

            } else {

                var magnifyOffset = container.offset();
                var mx = e.pageX - magnifyOffset.left;
                var my = e.pageY - magnifyOffset.top;

                if (mx < container.width() && my < container.height() && mx > 0 && my > 0) {
                    mag.fadeIn(100);
                } else {
                    mag.fadeOut(100);
                }

                if(mag.is(":visible"))
                {
                    var rx = Math.round(mx/container.width()*this.nativeWidth - mag.width()/2)*-1;
                    var ry = Math.round(my/container.height()*this.nativeHeight - mag.height()/2)*-1;
                    var bgp = rx + "px " + ry + "px";

                    var px = mx - mag.width()/2;
                    var py = my - mag.height()/2;

                    mag.css({left: px, top: py, backgroundPosition: bgp});
                }
            }

        }
    }


    /* MAGNIFY PLUGIN DEFINITION
     * ========================= */

    $.fn.magnify = function ( option ) {
        return this.each(function () {
            var $this = $(this)
                , data = $this.data('magnify')
                , options = typeof option == 'object' && option
            if (!data) $this.data('tooltip', (data = new Magnify(this, options)))
            if (typeof option == 'string') data[option]()
        })
    }

    $.fn.magnify.Constructor = Magnify

    $.fn.magnify.defaults = {
        delay: 0
    }


    /* MAGNIFY DATA-API
     * ================ */

    $(window).on('load', function () {
        $('[data-toggle="magnify"]').each(function () {
            var $mag = $(this);
            $mag.magnify()
        })
    })

} ( window.jQuery );
// Change lang
var url = "/lang/change";
$(".changeLang").change(function(){
    console.log('here')
    window.location.href = url + "?lang="+ $(this).val();
});
//
