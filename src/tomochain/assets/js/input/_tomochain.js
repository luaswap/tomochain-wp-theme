'use strict'

import mobileMenu from '../input/mobile-menu'

// var tomochain

// (
//     function() {
//         tomochain = (
//             function () {
//                 return {
//                     init: function () {
//                         this.mobileMenu();
//                     }
//                 }
//             }()
//         )
//     }
// )(jQuery);
//@include('mobile-menu.js')

let tomoChain = {
    init () {
        mobileMenu.mobileMenuInit()
    }
}

export default tomoChain

jQuery (document).ready(function() {
    tomoChain.init()
})
