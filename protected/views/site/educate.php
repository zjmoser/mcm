<?php
/* @var $this SiteController */

$this->pageTitle= "Moser Capital | Educate";
?>

<div id="educate">
    <h1 id="edu-title">EDUCATION CENTER</h1>
    <h3 id="edu-subtitle">FEATURED VIDEO</h3>
    <a style="color:#333333;" target="_blank" href="http://www.khanacademy.org/video/risk-and-reward-introduction?utm_campaign=embed">
        <b>Risk and Reward Introduction:</b> Basic introduction to risk and reward
    </a>
    <br/>
    <iframe frameborder="0" scrolling="no" width="715" height="360" src="http://www.khanacademy.org/embed_video?v=mv5zucjq60k" allowfullscreen webkitallowfullscreen mozallowfullscreen></iframe>
    <div id="edu-text">
    <p>As Benjamin Franklin once said: <em>"An investment in knowledge pays the best interest"</em> - and that's exactly what we believe at Moser Capital Management. To promote the understanding of the workings of financial markets we have hand picked a selection of educational videos from <a href="http://www.khanacademy.org" target="_blank">Khan Academy</a> - an amazing online educational resource.
    </p>
    </div>

    <div id="bb-box">
        <div id="bb-selector">
            <h2>INTRODUCTORY</h2>
            <div class="options">
                <div id="vid-link-1" class="" >Present Value</div>
                <div id="vid-link-2" class="" >Buying Stock</div>
                <div id="vid-link-3" class="" >Shorting Stock</div>
                <div id="vid-link-4" class="" >Currency Exchange</div>
                <div id="vid-link-5" class="" >Mortgage Loans</div>
            </div>
            <h2>OUR PICKS</h2>
            <div class="options">
                <div id="vid-link-6">Arbitrage Basics</div>
                <div id="vid-link-7">Price-to-Earnings Ratio</div>
                <div id="vid-link-8">P/E Conundrum</div>
                <div id="vid-link-9">Renting vs Buying a Home</div>
                <div id="vid-link-10">What's Wrong With Greece</div>
            </div>
        </div>
        <div id="blackboard">
            <div id="bb-video">
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">

var videoLinks = {
    'vid-link-1': '<iframe class="vid" frameborder="0" scrolling="no" width="460" height="307" src="http://www.khanacademy.org/embed_video?v=ks33lMoxst0" allowfullscreen webkitallowfullscreen mozallowfullscreen></iframe>',
    'vid-link-2': '<iframe class="vid" frameborder="0" scrolling="no" width="460" height="307" src="http://www.khanacademy.org/embed_video?v=WvITkPn83gc" allowfullscreen webkitallowfullscreen mozallowfullscreen></iframe>',
    'vid-link-3': '<iframe class="vid" frameborder="0" scrolling="no" width="460" height="307" src="http://www.khanacademy.org/embed_video?v=-IDmLERenrU" allowfullscreen webkitallowfullscreen mozallowfullscreen></iframe>',
    'vid-link-4': '<iframe class="vid" frameborder="0" scrolling="no" width="460" height="307" src="http://www.khanacademy.org/embed_video?v=itoNb1lb5hY" allowfullscreen webkitallowfullscreen mozallowfullscreen></iframe>',
    'vid-link-5': '<iframe class="vid" frameborder="0" scrolling="no" width="460" height="307" src="http://www.khanacademy.org/embed_video?v=mhRL99LqxMc" allowfullscreen webkitallowfullscreen mozallowfullscreen></iframe>',
    'vid-link-6': '<iframe class="vid" frameborder="0" scrolling="no" width="460" height="307" src="http://www.khanacademy.org/embed_video?v=AuCH7fHZsZ4" allowfullscreen webkitallowfullscreen mozallowfullscreen></iframe>',
    'vid-link-7': '<iframe class="vid" frameborder="0" scrolling="no" width="460" height="307" src="http://www.khanacademy.org/embed_video?v=cppxO67e6eo" allowfullscreen webkitallowfullscreen mozallowfullscreen></iframe>',
    'vid-link-8': '<iframe class="vid" frameborder="0" scrolling="no" width="460" height="307" src="http://www.khanacademy.org/embed_video?v=VrFbXxk19JU" allowfullscreen webkitallowfullscreen mozallowfullscreen></iframe>',
    'vid-link-9': '<iframe class="vid" frameborder="0" scrolling="no" width="460" height="307" src="http://www.khanacademy.org/embed_video?v=YL10H_EcB-E" allowfullscreen webkitallowfullscreen mozallowfullscreen></iframe>',
    'vid-link-10': '<iframe class="vid" frameborder="0" scrolling="no" width="460" height="307" src="http://www.khanacademy.org/embed_video?v=xc-TSAQkqJO" allowfullscreen webkitallowfullscreen mozallowfullscreen></iframe>',
}

$('#bb-box #bb-selector .options div').click(function() {
    $('#bb-box #bb-selector .options div').removeClass('active');
    $(this).addClass('active');

    $('#bb-box #blackboard').addClass('loading');

    $('#blackboard #bb-video').html(videoLinks[$(this).attr('id')]);
});
</script>
