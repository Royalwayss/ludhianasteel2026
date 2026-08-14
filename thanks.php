<?php
    $extra_css = '<style>
    .thanks-section{
        padding: 140px 0 120px;
        text-align: center;
        background: #f7f7f7;
    }
    .thanks-section .thanks-icon{
        width: 90px;
        height: 90px;
        border-radius: 50%;
        background: #f28322;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 28px;
        font-size: 42px;
    }
    .thanks-section .thanks-title{
        font-size: 30px;
        font-weight: 700;
        color: #222222;
        margin: 0 0 15px;
    }
    .thanks-section .thanks-text{
        font-size: 16px;
        color: #666666;
        max-width: 520px;
        margin: 0 auto 40px;
        line-height: 1.6;
    }
    .thanks-section .thanks-links{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 15px;
    }
    .thanks-section .thanks-links a{
        display: inline-block;
        padding: 13px 32px;
        border-radius: 4px;
        font-weight: 600;
        font-size: 15px;
        text-decoration: none;
        letter-spacing: 0.3px;
        transition: all 0.25s ease;
    }
    .thanks-section .btn-primary-thanks{
        background: #f28322;
        color: #ffffff;
        border: 1px solid #f28322;
    }
    .thanks-section .btn-primary-thanks:hover{
        background: #d9701a;
        border-color: #d9701a;
        color: #ffffff;
    }
    .thanks-section .btn-outline-thanks{
        background: transparent;
        color: #222222;
        border: 1px solid #cccccc;
    }
    .thanks-section .btn-outline-thanks:hover{
        background: #222222;
        border-color: #222222;
        color: #ffffff;
    }
    @media (max-width: 575px){
        .thanks-section{ padding: 100px 0 80px; }
        .thanks-section .thanks-title{ font-size: 24px; }
        .thanks-section .thanks-links{ flex-direction: column; align-items: center; }
        .thanks-section .thanks-links a{ width: 220px; }
    }
    </style>';

    require_once('include/header.php');
?>

<section class="thanks-section">
    <div class="container">
        <div class="thanks-icon"><i class="fa-solid fa-check"></i></div>
        <div class="thanks-title">Thank You for Your Enquiry</div>
        <p class="thanks-text">
            We've received your enquiry and our team will get back to you shortly with
            grade availability, pricing and delivery details.
        </p>
        <div class="thanks-links">
            <a href="<?php echo BASEURL; ?>" class="btn-primary-thanks">Back to Home</a>
            <a href="<?php echo BASEURL; ?>products.php" class="btn-outline-thanks">View Products</a>
        </div>
    </div>
</section>

<?php require_once('include/footer.php'); ?>