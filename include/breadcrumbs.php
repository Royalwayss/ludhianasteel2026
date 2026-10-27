<?php
    // Short labels for the visible breadcrumb (matches main nav wording).
    // $current_page is already set in header.php - no need to recompute it.
    $breadcrumb_labels = array(
        'about.php'          => 'About Us',
        'products.php'       => 'Products',
        'infrastructure.php' => 'Infrastructure',
        'csr.php'             => 'Sustainability',
        'contact.php'         => 'Contact Us',
        'career.php'          => 'Career',
        'enquiry.php'          => 'Enquiry',
		'alloy-steel-manufacturer.php' => 'Alloy Steel',
		'mn-mo-steel-manufacturer.php' => 'Mn-Mo Steel',
		'chromium-manganese-steel-manufacturer.php' => 'Chromium-Manganese Steel',
		'carbon-steel-manufacturer.php' => 'Carbon Steel',
		'carbon-manganese-steel-manufacturer.php' => 'Carbon Manganese Steel',
    );

    $breadcrumb_current = isset($breadcrumb_labels[$current_page]) ? $breadcrumb_labels[$current_page] : '';
?>
<?php if ($breadcrumb_current): ?>
<section class="breadcrumb-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb-list">
                <li><a href="<?php echo BASEURL; ?>">Home</a></li>
                <li class="active" aria-current="page"><?php echo $breadcrumb_current; ?></li>
            </ol>
        </nav>
    </div>
</section>
<?php endif; ?>