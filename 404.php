<?php
    header("HTTP/1.0 404 Not Found");

    $extra_css = '<style>
        header nav.navbar{
            background: #1a1a1a !important;
            position: relative !important;
        }
        header nav.navbar .navbar-nav .nav-link{
            color: #ffffff !important;
        }
        header nav.navbar .navbar-nav .nav-link:hover{
            color: #f28322 !important;
        }
    </style>';

    require_once('include/header.php');
?>

<style>
.error-404-section{
    padding: 50px 0 140px;
    text-align: center;
    background: #f7f7f7;
}
.error-404-section .error-code{
    font-size: 140px;
    font-weight: 800;
    line-height: 1;
    color: #f28322;
    letter-spacing: 4px;
    font-family: inherit;
}
.error-404-section .error-title{
    font-size: 28px;
    font-weight: 700;
    color: #222222;
    margin: 10px 0 15px;
}
.error-404-section .error-text{
    font-size: 16px;
    color: #666666;
    max-width: 520px;
    margin: 0 auto 40px;
    line-height: 1.6;
}
.error-404-section .error-links{
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 15px;
}
.error-404-section .error-links a{
    display: inline-block;
    padding: 13px 32px;
    border-radius: 4px;
    font-weight: 600;
    font-size: 15px;
    text-decoration: none;
    letter-spacing: 0.3px;
    transition: all 0.25s ease;
}
.error-404-section .btn-primary-404{
    background: #f28322;
    color: #ffffff;
    border: 1px solid #f28322;
}
.error-404-section .btn-primary-404:hover{
    background: #d9701a;
    border-color: #d9701a;
    color: #ffffff;
}
.error-404-section .btn-outline-404{
    background: transparent;
    color: #222222;
    border: 1px solid #cccccc;
}
.error-404-section .btn-outline-404:hover{
    background: #222222;
    border-color: #222222;
    color: #ffffff;
}
@media (max-width: 575px){
    .error-404-section{ padding: 110px 0 90px; }
    .error-404-section .error-code{ font-size: 90px; }
    .error-404-section .error-title{ font-size: 22px; }
    .error-404-section .error-links{ flex-direction: column; align-items: center; }
    .error-404-section .error-links a{ width: 220px; }
}
</style>

<section class="error-404-section">
    <div class="container">
        <div class="error-code">404</div>
        <div class="error-title">Page Not Found</div>
        <p class="error-text">
            Sorry, the page you are looking for doesn't exist or may have been moved.
            Use the links below to get back on track.
        </p>
        <div class="error-links">
            <a href="<?php echo BASEURL; ?>" class="btn-primary-404">Back to Home</a>
            <a href="<?php echo BASEURL; ?>products.php" class="btn-outline-404">View Products</a>
            <a href="<?php echo BASEURL; ?>contact.php" class="btn-outline-404">Contact Us</a>
        </div>
    </div>
</section>

<?php require_once('include/footer.php'); ?>