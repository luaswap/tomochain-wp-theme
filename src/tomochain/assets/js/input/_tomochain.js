'use strict'

import mobileMenu from '../input/mobile-menu'

let tomoChain = {
    init () {
        mobileMenu.mobileMenuInit()
    }
}

export default tomoChain

jQuery (document).ready(function() {
    tomoChain.init()
})
