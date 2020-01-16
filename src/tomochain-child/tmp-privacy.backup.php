<?php
/* Template name: tmp privacy */

get_template_part('headerPrivacy');
$home_url = get_home_url();

if (function_exists('pll_home_url')) {
    $home_url = pll_home_url();
}
?>
<div id="fullpage" class="tmp-privacy">
    <div class="section top-site bg-white" id="section0">
        <div class="container-fluid d-flex flex-wrap justify-content-center align-items-center h-100">
            <div class="text-center">
                <div class="logo-tomo mb-5 pb-5">
                    <a href="<?php echo esc_url($home_url); ?>">
                        <img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/privacy-logo-tomochain-green.svg'); ?>" alt="privacy-logo-tomochain-green">
                    </a>
                </div>
                <div class='mb-5 pb-5'>
                    <h2 class="tpl-title-big txt-black">
                        Do you believe in  what so-called privacy<br>
                        in crypto transactions?
                    </h2>
                </div>
                <div class="tmc-button-widget">
                    <a class="button-link type-1" href="#">Yes</a>
                    <a class="button-link type-2" href="#">No</a>
                </div>
            </div>
        </div>
    </div>
    <div class="section" id="section1">
        <div class="container-fluid text-center">
            <div class="fade-content type-1">
                <p class="yes">
                    Think again! Fact is,<br>
                    From small protocols<br>
                    to high-profile coins,<br>
                    <span>cryptocurrency</span> is<br>
                    often not quite as<br>
                    private as it seems
                </p>
                <p class="no d-none">
                    Indeed! Transactions<br>
                    are anonymous when<br>
                    real-world <span>identities</span> are<br>
                    not linked to<br>
                    individual’s crypto<br>
                    addresses
                </p>
            </div>
        </div>
    </div>
    <div class="section" id="section2">
        <div class="container-fluid text-center">
            <div class="fade-content type-2">
                <p>
                    In many cases identities can<br>
                    be linked to crypto addresses.<br>
                    <span>Any transaction</span> with a party<br>
                    that knows your identity<br>
                    leaks information that can be<br>
                    used to identify your activity,<br>
                    past, and future, on the<br>
                    blockchain.
                </p>
            </div>
        </div>
    </div>
    <div class="section" id="section3">
        <div class="container-fluid text-center">
            <div class="fade-content type-3">
                <p>So its may not that <span>safe</span> as<br>you think…</p>
            </div>
        </div>
    </div>
    <div class="section" id="section4">
        <div class="container-fluid text-center">
            <div class="fade-content type-4">
                <p>What if you can send crypto<br><span>transactions</span> that can’t be traced?</p>
            </div>
        </div>
    </div>
	<div class="section top-site" id="section5">
        <div class="container d-flex flex-wrap justify-content-center align-items-center h-100">
            <div class="text-center">
                <div class="logo-tomo my-5 pb-5">
                    <a href="<?php echo esc_url($home_url); ?>">
                        <img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/privacy-logo-tomochain-white.svg'); ?>" alt="privacy-logo-tomochain-white">
                    </a>
                </div>
                <div class='mb-5 pb-5'>
                    <h2 class="tpl-title-big">
                        We protect the right to<br>
                        maintain user <span>privacy</span>
                    </h2>
                    <p class="m-0 mt-3">
                        If you are in the market for a computer, there are a number of factors to<br>
                        consider. Will it be used for your home, your office or perhaps even your<br>
                        home office combo? First off, you will need to set
                    </p>
                </div>
                <div class="tmc-button-widget">
                    <a class="button-link type-1" href="#">Try It Out</a>
                    <a class="button-link type-3" href="#">Read TomoP Paper</a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="box-title text-right mb-5 pb-5">
                <h2 class="tpl-title-big">
                    Break out of the inbox
                </h2>
                <p class="m-0">
                    Working in channels gives everyone on your team<br>a shared view of progress and purpose.
                </p>
            </div>
            <div class="box-image">
                <img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/privacy-img-relayer.png'); ?>" alt="privacy-img-relayer">
            </div>
        </div>
        <div class="container">
            <div class="box-title my-5 py-5">
                <h2 class="tpl-title-big">
                    Benefits
                </h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p class="privacy-benefits-icon-medium mb-5">
                        <img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/privacy-benefits-icon-1.svg'); ?>" alt="privacy-benefits-icon-1">
                    </p>
                    <p class="tpl-title-medium mb-5 pb-5">
                        Protect user financial privacy for Tomo users by <span>hiding ALL</span>
                        (value, sender, receiver) for TOMO and private tokens
                    </p>
                </div>
                <div class="col-md-6">
                    <p class="privacy-benefits-icon-medium mb-5">
                        <img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/privacy-benefits-icon-2.svg'); ?>" alt="privacy-benefits-icon-2">
                    </p>
                    <p class="tpl-title-medium mb-5 pb-5">
                        Support for TomoChain tokens<br>
                        and <span>wrap tokens</span> from other chain
                    </p>
                </div>
                <div class="col-md-6">
                    <p class="privacy-benefits-icon-medium mb-5">
                        <img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/privacy-benefits-icon-3.svg'); ?>" alt="privacy-benefits-icon-3">
                    </p>
                    <p class="tpl-title-medium mb-5 pb-5">
                        Regulatory compliance:<br>
                        TomoP does not prevent<br>
                        <span>regulated entities</span> from fulfilling<br>
                        their regulatory obligations
                    </p>
                </div>
                <div class="col-md-6">
                    <p class="privacy-benefits-icon-medium mb-5">
                        <img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/privacy-benefits-icon-4.svg'); ?>" alt="privacy-benefits-icon-4">
                    </p>
                    <p class="tpl-title-medium mb-5 pb-5">
                        Fastest and user friendly privacy
                        solution (<span>Easy to switch</span> between
                        privacy and transparent mode on
                        TomoWallet)
                    </p>
                </div>
            </div>
        </div>
        <div class="section-tectnology py-10">
            <div class="container">
                <div class="box-title text-right mb-5">
                    <h2 class="tpl-title-big txt-black">
                        Technology
                    </h2>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p class="privacy-technology-medium my-5">
                            <img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/privacy-technology-icon-1.svg'); ?>" alt="privacy-technology-icon-1">
                        </p>
                        <div class="tpl-title-medium text-black">
                            <h3 class="tpl-title-normal">TomoZ Integration</h3>
                            <p class="tpl-title-min m-0">Anonymize transaction sender<br>in an EVM environment</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p class="privacy-technology-medium my-5">
                            <img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/privacy-technology-icon-2.svg'); ?>" alt="privacy-technology-icon-2">
                        </p>
                        <div class="text-black">
                            <h3 class="tpl-title-normal">Monero technology stack</h3>
                            <p class="tpl-title-min m-0">Tealth Transactions,<br>RingCT, Bulletproofs</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p class="privacy-technology-medium my-5">
                            <img src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/images/privacy-technology-icon-3.svg'); ?>" alt="privacy-technology-icon-3">
                        </p>
                        <div class="tpl-title-medium text-black">
                            <h3 class="tpl-title-normal m-0">Precompiled contracts<br>for intensive verification<br>computatione</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-roadmap py-10">
            <div class="container">
                <div class="box-title text-right">
                    <div class="box-title text-center mb-5 pb-5">
                        <h2 class="tpl-title-big">
                            Roadmap
                        </h2>
                    </div>
                    <div class="box-image">
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
                        <a class="button-link type-1" href="#">Try It Out</a>
                        <a class="button-link type-1" href="#">SDK Documents</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-faq py-10">
            <div class="container">
                <div class="box-title">
                    <div class="box-title text-center mb-5">
                        <h2 class="tpl-title-big text-white">
                            FAQs
                        </h2>
                        <p class="m-0">
                            Have not found the question that you are looking for? <a href="#">See More…</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../tomochain/assets/libs/scroll-fullpage/scrolloverflow.js"></script>
<script src="../tomochain/assets/libs/scroll-fullpage/fullpage.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        var myFullpage = new fullpage('#fullpage', {
            scrollOverflow: true,
            // anchors: ['firstPage', 'secondPage', '3rdPage', '4thpage', 'lastPage'],
            onLeave: function(origin, destination, direction){
                // console.log('onLeave========================')
                var params = {
                    origin: origin,
                    destination:destination,
                    direction: direction
                };
                if(direction=='up'){
                    // console.log("tao day");
                    jQuery('.page-template-tmp-privacy').addClass('scaleUp');
                    jQuery('.page-template-tmp-privacy').removeClass('scaleDown');
                    jQuery('.fp-viewing-4').removeClass('bd-bg-black');
                }else{
                    jQuery('.page-template-tmp-privacy').addClass('scaleDown');
                    jQuery('.page-template-tmp-privacy').removeClass('scaleUp');
                    jQuery('.fp-viewing-3').addClass('bd-bg-black');
                }
                // console.log("--- onLeave ---");
                // console.log(params);
            },
        });
    });
</script>
<?php
