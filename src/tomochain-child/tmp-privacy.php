<?php
/* Template name: tmp privacy */

get_template_part('headerPrivacy');
$home_url = get_home_url();

if (function_exists('pll_home_url')) {
    $home_url = pll_home_url();
}
?>

<div id="fullpage">

    <div class="slogan-site bg-white hiddenSection">
        <div class="container-fluid d-flex flex-wrap justify-content-center align-items-center h-100">
            <div class="text-center">
                <div class="logo-tomo mb-3 py-5 my-lg-5 py-lg-5">
                    <a href="<?php echo esc_url($home_url); ?>">
                        <img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/privacy-logo-tomochain-green.svg'); ?>" alt="privacy-logo-tomochain-green">
                    </a>
                </div>
                <div class='mb-0 pb-5 mb-lg-5 pb-lg-5'>
                    <h2 class="tpl-title-big txt-black">
                        Do you believe in  what <span>so-called privacy</span><br>
                        in crypto transactions?
                    </h2>
                </div>
                <div class="tmc-button-widget">
                    <a class="button-link type-1 buttonYes" href="#0rdPage">Yes</a>
                    <a class="button-link type-2 buttonNo" href="#0rdPage">No</a>
                </div>
            </div>
        </div>
    </div>
    <div class="tmp-privacy d-none" >
        <div class="section" id="section0">
            <div class="container-fluid text-center fixed-content">
                <div class="fade-content type-1">
                    <p class="button-yes">
                        Think again! Fact is,<br>
                        From small protocols<br>
                        to high-profile coins,<br>
                        <span>cryptocurrency</span> is<br>
                        often not quite as<br>
                        private as it seems
                    </p>
                    <p class="button-no d-none">
                        Indeed! You can preserve<br>
                        your privacy only when<br>
                        your crypto address is<br>
                        <span>not linked to YOU</span>
                    </p>
                </div>
            </div>
            <a class="btn-scroll-down" href="#1rdPage">Scroll down</a>
        </div>
        <div class="section" id="section1">
            <div class="container-fluid text-center fixed-content">
                <div class="fade-content type-2">
                    <p>
                        As soon as you publish<br>
                        your crypto address, your<br>
                        transactions in the past,<br>
                        present & future<br>
                        <span>will be revealed</span>
                    </p>
                </div>
            </div>
            <a class="btn-scroll-down" href="#2rdPage">Scroll down</a>
        </div>
        <div class="section" id="section2">
            <div class="container-fluid text-center fixed-content">
                <div class="fade-content type-3">
                    <p>
                        That raises a serious concern about how to use cryptocurrency with a <span>completely anonymous experience</span>
                    </p>
                </div>
            </div>
            <a class="btn-scroll-down" href="#3rdPage">Scroll down</a>
        </div>
        <div class="section" id="section3">
            <div class="container-fluid text-center fixed-content">
                <div class="fade-content type-4">
                    <p>
                        TomoChain introduces TomoP - a solution to <span>protect your identity</span> from ever leaking through crypto transactions.
                    </p>
                </div>
            </div>
            <a class="btn-scroll-down" href="#4rdPage">Scroll down</a>
        </div>
        <div class="section" id="section4">
            <div class="main-site tmpr-bg-black">
                <div class="container d-flex flex-wrap justify-content-center align-items-center h-100">
                    <div class="text-center">
                        <div class="logo-tomo my-3 py-3 my-md-5 pb-md-3">
                            <a href="<?php echo esc_url($home_url); ?>">
                                <img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/privacy-logo-tomochain-white.svg'); ?>" alt="privacy-logo-tomochain-white">
                            </a>
                        </div>
                        <div class='pb-5'>
                            <h2 class="tpl-title-big">
                                We protect users’ basic right<br>
                                for <span>identity privacy</span>
                            </h2>
                            <p class="m-0 mt-3">
                                TomoP is designed to create  safe and untraceable transactions covered under<br>
                                a shadow where your identity is hidden. Get started by freely sending & exchanging<br>
                                tokens without anyone but yourself aware of your actions.
                            </p>
                            <p class="m-0 pt-3 tpl-title-hot">
                                Public Testnet: Coming FEBRUARY 2020
                            </p>
                        </div>
                        <div class="tmc-button-widget">
                            <a class="button-link type-1" target="_blank" href="https://docs.google.com/document/u/1/d/1FLaiUtEatJb9lzs79RoZHVrBx0RH8J9qqP1lR5Lg3zM/edit">Read TomoP Paper</a>
                            <!-- <a class="button-link type-3" href="#">Read TomoP Paper</a> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-break tmpr-bg-black py-5">
                <div class="container">
                    <div class="box-title text-right mb-5 py-5">
                        <h2 class="tpl-title-big">
                            Switch to <span class="underline_left">Privacy Mode</span>
                        </h2>
                        <p class="m-0">
                            Follow our step-by-step guide to preserve your<br>transaction privacy on Tomo Wallet
                        </p>
                    </div>
                    <div class="box-image mb-5">
                        <ul class="btn-next">
                            <li id="start"><img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/privacy-relayer-p1.png'); ?>" alt="privacy-img-relayer"></li>
                            <li><img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/privacy-relayer-p2.png'); ?>" alt="privacy-img-relayer"></li>
                            <li><img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/privacy-relayer-p3.png'); ?>" alt="privacy-img-relayer"></li>
                            <li><img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/privacy-relayer-p4.png'); ?>" alt="privacy-img-relayer"></li>
                            <li><img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/privacy-relayer-p5.png'); ?>" alt="privacy-img-relayer"></li>
                        </ul>
                        <div class="box-btn-n-b">
                            <span class="btn-back">BACK</span>
                            <span class="btn-next">NEXT</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-benefits tmpr-bg-black py-10">
                <div class="container">
                    <div class="box-title mb-5 pb-5">
                        <h2 class="tpl-title-big">
                            Highlight <span class="underline_left">Features</span>
                        </h2>
                    </div>
                    <div class="row">
                        <div class="col-md-5 text-center text-md-left">
                            <p class="privacy-benefits-icon-medium mb-5">
                                <img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/privacy-benefits-icon-1.svg'); ?>" alt="privacy-benefits-icon-1">
                            </p>
                            <p class="tpl-title-medium pb-5">
                                <strong>Fastest and User-friendly:</strong> Easy <span>one-click step</span> to switch from transparent to privacy mode. 2-4 second confirmation time
                            </p>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-5 text-center text-md-left">
                            <p class="privacy-benefits-icon-medium mb-5">
                                <img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/privacy-benefits-icon-2.svg'); ?>" alt="privacy-benefits-icon-2">
                            </p>
                            <p class="tpl-title-medium pb-5">
                                <strong>Confidential:</strong> <span>All transactions are hidden</span>, including senders, receivers & value information
                            </p>
                        </div>
                        <div class="col-md-5 text-center text-md-left">
                            <p class="privacy-benefits-icon-medium mb-5">
                                <img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/privacy-benefits-icon-3.svg'); ?>" alt="privacy-benefits-icon-3">
                            </p>
                            <p class="tpl-title-medium pb-5">
                                <strong>Multiple chain support:</strong> Both TomoChain’s token and tokens from other chains like <span>BTC, ETH, USDT,...</span>
                            </p>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-5 text-center text-md-left">
                            <p class="privacy-benefits-icon-medium mb-5">
                                <img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/privacy-benefits-icon-4.svg'); ?>" alt="privacy-benefits-icon-4">
                            </p>
                            <p class="tpl-title-medium pb-5">
                                <strong>Regulatory compliant:</strong> TomoP <span>allows authorized entities</span> to fulfill their obligations by acquiring necessary information.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-tectnology py-10">
                <div class="container">
                    <div class="box-title text-right py-5">
                        <h2 class="tpl-title-big underline_left txt-black">
                            Technology
                        </h2>
                    </div>
                    <div class="row">
                        <div class="col-md-4 text-center text-md-left">
                            <p class="privacy-technology-medium my-5">
                                <img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/privacy-technology-icon-1.svg'); ?>" alt="privacy-technology-icon-1">
                            </p>
                            <div class="tpl-title-medium text-black mb-5">
                                <h3 class="tpl-title-normal">TomoZ Integration</h3>
                                <p class="tpl-title-min m-0">Anonymize transaction sender<br>in an EVM environment</p>
                            </div>
                        </div>
                        <div class="col-md-4 text-center text-md-left">
                            <p class="privacy-technology-medium my-5">
                                <img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/privacy-technology-icon-2.svg'); ?>" alt="privacy-technology-icon-2">
                            </p>
                            <div class="tpl-title-medium text-black mb-5">
                                <h3 class="tpl-title-normal">Technology Stack</h3>
                                <p class="tpl-title-min m-0">Stealth Transactions,<br>RingCT, Bulletproofs</p>
                            </div>
                        </div>
                        <div class="col-md-4 text-center text-md-left">
                            <p class="privacy-technology-medium my-5">
                                <img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/privacy-technology-icon-3.svg'); ?>" alt="privacy-technology-icon-3">
                            </p>
                            <div class="tpl-title-medium text-black mb-5">
                                <h3 class="tpl-title-normal">Verification Process</h3>
                                <p class="tpl-title-min m-0">Precompiled contracts for intensive verification computations</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-roadmap tmpr-bg-black py-10">
                <div class="container">
                    <div class="box-title">
                        <div class="box-title text-center mb-5 pb-5">
                            <h2 class="tpl-title-big underline_right">
                                Roadmap
                            </h2>
                        </div>
                        <div class="ct-roadmap">
                            <div class="main-stage">
                                <ul>
                                    <li class="active">
                                        <div class="rm-t pb-3">R&D, Wallet integrating</div>
                                        <div class="rm-b">
                                            <div class="flex-center">
                                                <div>
                                                    <span class="rm-n">1</span>
                                                    <span class="rm-d">Stage</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rm-t pt-3">Support BTC, ETH and  ERC20 tokens. Exchange integration. Dapp</div>
                                        <div class="rm-b">
                                            <div class="flex-center">
                                                <div>
                                                    <span class="rm-n">2</span>
                                                    <span class="rm-d">Stage</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rm-t pb-3">Regulatory compliance</div>
                                        <div class="rm-b">
                                            <div class="flex-center">
                                                <div>
                                                    <span class="rm-n">3</span>
                                                    <span class="rm-d">Stage</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                            <img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/privacy-roadmap.svg'); ?>" alt="privacy-roadmap">
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-protect py-10">
                <div class="container">
                    <div class="box-title text-right">
                        <div class="box-title text-center mb-5">
                            <h2 class="tpl-title-big">
                                We protect the right<br>
                                to maintain user privacy
                            </h2>
                        </div>
                        <div class="tmc-button-widget">
                            <!-- <a class="button-link type-1" href="#">Try It Out</a> -->
                            <a class="button-link type-1" target="_blank" href="https://github.com/tomochain/privacyjs">SDK Documents</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-faq tmpr-bg-black py-10">
                <div class="container">
                    <div class="box-title">
                        <div class="box-title mb-5">
                            <h2 class="tpl-title-big underline_left text-white">
                                FAQs
                            </h2>
                            <p class="m-0">
                                Have not found the question that you are looking for? <a href="mailto:admin@tomochain.com">admin@tomochain.com</a>
                            </p>
                        </div>
                    </div>
                    <div class="faqs-items">
                        <div class="desc-item">
                            <button class="accordion not_bd">
                                What kind of information is hidden under a private transaction using TomoP?
                            </button>
                            <div class="panel">
                                <p>
                                    TomoP conceals  information about senders, receivers, and transaction amounts under Privacy Mode.
                                </p>
                            </div>
                        </div>
                        <div class="desc-item">
                            <button class="accordion">
                                Does TomoP only support TOMO token?
                            </button>
                            <div class="panel">
                                <p>
                                    TomoP supports anonymizing both TOMO token transactions and tokens issued following TRC21P - private token standard, including wrapped tokens from other chains (BTC, ETH, USDT etc.)
                                </p>
                            </div>
                        </div>
                        <div class="desc-item">
                            <button class="accordion">
                                Does TomoP have any means/mechanism to support regulatory compliance?
                            </button>
                            <div class="panel">
                                <p>
                                    Yes, TomoP supports a dual key system - view and spend key. Each user will be issued a pair of private keys. The user can optionally share her/his private view key to an authorized agency, i.e. tax agency, so that the agency can query all balance-related information for regulatory operations’ usage
                                </p>
                            </div>
                        </div>
                        <div class="desc-item">
                            <button class="accordion">
                                Will TomoP support  exchanges?
                            </button>
                            <div class="panel">
                                <p>
                                    Yes, TomoP development team will be providing SDK documents to integrate TomoP into different exchanges for the purpose of depositing TOMO token & other supported tokens.
                                </p>
                            </div>
                        </div>
                        <div class="desc-item">
                            <button class="accordion">
                                Can we track the private transactions following TomoP on TomoScan?
                            </button>
                            <div class="panel">
                                <p>
                                    Yes, TomoP transactions are fully public on TomoScan but the relevant information including sender, receiver, and amount, are hidden from third-parties’ perspective and only visible to you
                                </p>
                            </div>
                        </div>
                        <div class="desc-item">
                            <button class="accordion">
                                Is TomoP compatible with third-party wallets?
                            </button>
                            <div class="panel">
                                <p>
                                    TomoP team provides TomoP SDK that supports third-party wallets to send, receive, and decode TomoP transactions
                                </p>
                            </div>
                        </div>
                        <div class="pb-10"><div class="pb-10"></div><div class="pb-10"></div><div class="pb-10"></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/libs/scroll-fullpage/scrolloverflow.js'); ?>"></script>
<script src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/libs/scroll-fullpage/fullpage.js'); ?>"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        var $currDiv = $( "#start" );
            $currDiv.css( "opacity", "1" );
        var count = 1;
        if (count === 1) {
            $( ".btn-back" ).css( "background-color", "#444444" );
        }
        $( ".btn-next" ).click(function() {
            if (count < 5) {
                $currDiv  = $currDiv.next();
                $( ".btn-back" ).css( "background-color", "#ffffff");
                $( ".section-break ul li" ).css( "opacity", "0" );
                $currDiv.css( "opacity", "1" );
                count++;
                if (count === 5) {
                    $( ".btn-next" ).css(  {"background-color": "#1A4038", "color": "#666"} );
                }
            }
        });
        $( ".btn-back" ).click(function() {
            if (count > 1) {
                $currDiv  = $currDiv .prev();
                $( ".btn-next" ).css( "background-color", "#00e8b4" );
                $( ".section-break ul li" ).css( "opacity", "0" );
                $currDiv .css( "opacity", "1" );
                count--;
                if (count === 1) {
                    $( ".btn-back" ).css( "background-color", "#444444" );
                }
            }
        });


        // COOKIES
        // if the cookie is true, hide the initial message and show the other one
        if ($.cookie('hide-section-click') == 'yes' ) {//yes
            jQuery('.hiddenSection').addClass('d-none');
            jQuery('.button-yes').removeClass('d-none');
            jQuery('.button-no').addClass('d-none');
            jQuery('.tmp-privacy').removeClass('d-none');
            jQuery('.page-template-tmp-privacy').addClass('scaleDown');

            jQuery('.hiddenSection').remove();
            jQuery('#section0').remove();
            jQuery('#section1').remove();
            jQuery('#section2').remove();
            jQuery('#section3').remove();

            var myFullpage = new fullpage('#fullpage', {
                scrollOverflow: true,
                menu: '#menu',
                scrollingSpeed: 1200,
                anchors: [
                    '0rdPage',
                    '1rdPage',
                    '2rdPage',
                    '3rdPage',
                    '4rdPage',
                    '5rdPage',
                    '6rdPage',
                    '7rdPage',
                    '8rdPage',
                    '9rdPage',
                    '10rdPage'
                ],
                onLeave: function(origin, destination, direction){
                    var params = {
                        origin: origin,
                        destination:destination,
                        direction: direction
                    };
                    if(direction=='up'){
                        jQuery('.page-template-tmp-privacy').addClass('scaleUp');
                        jQuery('.page-template-tmp-privacy').removeClass('scaleDown');
                        jQuery('.fp-viewing-3rdPage').removeClass('bd-bg-black');
                    }else{
                        jQuery('.page-template-tmp-privacy').addClass('scaleDown');
                        jQuery('.page-template-tmp-privacy').removeClass('scaleUp');
                        jQuery('.fp-viewing-2rdPage').addClass('bd-bg-black');
                    }
                }
            });
        }

        if ($.cookie('hide-section-click') == 'no' ) {//no
            jQuery('.hiddenSection').addClass('d-none');
            jQuery(".button-no").removeClass("d-none");
            jQuery('.button-yes').addClass('d-none');
            jQuery('.tmp-privacy').removeClass('d-none');
            jQuery('.page-template-tmp-privacy').addClass('scaleDown');

            jQuery('.hiddenSection').remove();
            jQuery('#section0').remove();
            jQuery('#section1').remove();
            jQuery('#section2').remove();
            jQuery('#section3').remove();

            var myFullpage = new fullpage('#fullpage', {
                scrollOverflow: true,
                menu: '#menu',
                scrollingSpeed: 1200,
                anchors: [
                    '0rdPage',
                    '1rdPage',
                    '2rdPage',
                    '3rdPage',
                    '4rdPage',
                    '5rdPage',
                    '6rdPage',
                    '7rdPage',
                    '8rdPage',
                    '9rdPage',
                    '10rdPage'
                ],
                onLeave: function(origin, destination, direction){
                    var params = {
                        origin: origin,
                        destination:destination,
                        direction: direction
                    };
                    if(direction=='up'){
                        jQuery('.page-template-tmp-privacy').addClass('scaleUp');
                        jQuery('.page-template-tmp-privacy').removeClass('scaleDown');
                        jQuery('.fp-viewing-3rdPage').removeClass('bd-bg-black');
                    }else{
                        jQuery('.page-template-tmp-privacy').addClass('scaleDown');
                        jQuery('.page-template-tmp-privacy').removeClass('scaleUp');
                        jQuery('.fp-viewing-2rdPage').addClass('bd-bg-black');
                    }
                }
            });
        }

        jQuery('.buttonYes').click(function(){
            if (!$('.hiddenSection').is('out-section')) {
                jQuery('.hiddenSection').addClass('out-section');
                jQuery('.button-yes').removeClass('d-none');
                jQuery('.button-no').addClass('d-none');
                jQuery('.tmp-privacy').removeClass('d-none');
                jQuery('.page-template-tmp-privacy').addClass('scaleDown');

                var myFullpage = new fullpage('#fullpage', {
                    scrollOverflow: true,
                    menu: '#menu',
                    scrollingSpeed: 1200,
                    anchors: [
                        '0rdPage',
                        '1rdPage',
                        '2rdPage',
                        '3rdPage',
                        '4rdPage',
                        '5rdPage',
                        '6rdPage',
                        '7rdPage',
                        '8rdPage',
                        '9rdPage',
                        '10rdPage'
                    ],
                    onLeave: function(origin, destination, direction){
                        var params = {
                            origin: origin,
                            destination:destination,
                            direction: direction
                        };
                        if(direction=='up'){
                            jQuery('.page-template-tmp-privacy').addClass('scaleUp');
                            jQuery('.page-template-tmp-privacy').removeClass('scaleDown');
                            jQuery('.fp-viewing-3rdPage').removeClass('bd-bg-black');
                        }else{
                            jQuery('.page-template-tmp-privacy').addClass('scaleDown');
                            jQuery('.page-template-tmp-privacy').removeClass('scaleUp');
                            jQuery('.fp-viewing-2rdPage').addClass('bd-bg-black');
                        }
                    }
                });
                // add cookie setting that user has clicked
                $.cookie('hide-section-click', 'yes', {expires: 30 });
            }

        });
        jQuery(".buttonNo").click(function(){
            if (!$('.hiddenSection').is('out-section')) {
                jQuery('.hiddenSection').addClass('out-section');
                jQuery(".button-no").removeClass("d-none");
                jQuery('.button-yes').addClass('d-none');
                jQuery('.tmp-privacy').removeClass('d-none');
                jQuery('.page-template-tmp-privacy').addClass('scaleDown');


                var myFullpage = new fullpage('#fullpage', {
                    scrollOverflow: true,
                    menu: '#menu',
                    scrollingSpeed: 1200,
                    anchors: [
                        '0rdPage',
                        '1rdPage',
                        '2rdPage',
                        '3rdPage',
                        '4rdPage',
                        '5rdPage',
                        '6rdPage',
                        '7rdPage',
                        '8rdPage',
                        '9rdPage',
                        '10rdPage'
                    ],
                    onLeave: function(origin, destination, direction){
                        var params = {
                            origin: origin,
                            destination:destination,
                            direction: direction
                        };
                        if(direction=='up'){
                            jQuery('.page-template-tmp-privacy').addClass('scaleUp');
                            jQuery('.page-template-tmp-privacy').removeClass('scaleDown');
                            jQuery('.fp-viewing-3rdPage').removeClass('bd-bg-black');
                        }else{
                            jQuery('.page-template-tmp-privacy').addClass('scaleDown');
                            jQuery('.page-template-tmp-privacy').removeClass('scaleUp');
                            jQuery('.fp-viewing-2rdPage').addClass('bd-bg-black');
                        }
                    }
                });
                // add cookie setting that user has clicked
                $.cookie('hide-section-click', 'no', {expires: 30 });
            }
        });
        //fullpage



        //accordion
        var acc = document.getElementsByClassName("accordion");
        var i;
        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight){
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        }
    });
</script>
<?php
