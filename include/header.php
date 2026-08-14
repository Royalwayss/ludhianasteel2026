<!doctype html>
<html class="no-js" lang="en">
<?php 

    require_once('config.php'); 

    $page_meta = array(
        'index.php' => array(
            'title' => 'Alloy & Carbon Steel Manufacturer - Round Bars, Carbon Steel Billets, RCS Bars, Peeled Bars, Non Alloy Steel, Ball Bearing Steel Suppliers & Exporters in India | Ludhiana Steel Rolling Mills',
            'description' => 'Ludhiana Steel Rolling Mills is one of the leading alloy steel & carbon steel manufacturers in India since 1938. Get a quote for non alloy steel, round bars, medium carbon steel round bar, RCS bar, peeled and ground alloy steel round bar, steel billets & ball bearing steel. 100,000 MT annual capacity. 1000+ satisfied customers.',
            'keywords' => 'alloy steel manufacturer in india, alloy steel suppliers in india, carbon steel manufacturers in india, carbon steel suppliers in india, non alloy steel manufacturer in india, alloy steel round bar manufacturer in india, round bars manufacturer in india, round bars suppliers in india',
            'image_alt' => 'Ludhiana Steel Rolling Mills Alloy Steel Round Bars',
        ),
        'about.php' => array(
            'title' => 'About Us - Alloy Steel Suppliers in India Since 1938 - Ludhiana Steel Rolling Mills',
            'description' => 'Ludhiana Steel Rolling Mills has supplied forging quality steel raw material since 1938. Three units across 30 acres in Ludhiana, 100,000 MT capacity, 1000+ customers in India and overseas.',
            'keywords' => 'forging quality steel raw material suppliers, raw material suppliers for automotive forging industry india, auto component forging raw material suppliers in india, automotive grade alloy steel raw material supplier, ludhiana steel',
            'image_alt' => 'Ludhiana Steel Rolling Mills - About Us',
        ),
        'products.php' => array(
            'title' => 'Alloy Steel Round Bars & RCS Bars Manufacturer in India - EN, SAE, ST, MnCr and 150+ Steel Grades Suppliers',
            'description' => 'Manufacturer of alloy steel and carbon steel round bars, RCS bars and peeled bars in India. EN8, EN 16, EN19, EN24, EN25, EN30B EN31, EN353, H13, SAE 4140, SAE 8620, 20MnCr5, 42crmo4, ST52-3, S355J2, C45, SAE 1018 and 150+ grades.',
            'keywords' => 'alloy steel rcs bar manufacturers in india, en19 alloy steel manufacturer india, en24 alloy steel round bars manufacturer, en353 steel manufacturer, en8 round bar manufacturer india, 20mncr5 steel round bar manufacturer, en18 alloy steel round bars supplier, 42crmo4 steel round bar supplier india, en36 alloy steel suppliers, 17crnimo6 gear steel manufacturer india, en16 mo steel manufacturer in india',
            'image_alt' => 'Ludhiana Steel Rolling Mills - Alloy & Carbon Steel Round Bars',
        ),
        'infrastructure.php' => array(
            'title' => 'Alloy Steel Billet Manufacturers in India - Our Infrastructure',
            'description' => 'Induction furnace alloy steel billet suppliers in India. 15T and 7T furnaces, LRF, vacuum degassing below 1 millibar, CCM with EMS producing 130-250mm billets, rolling mills and heat treatment.',
            'keywords' => 'alloy steel billet manufacturers in india, carbon steel billets manufacturers in india, induction furnace alloy steel billet suppliers india, infrastructure',
            'image_alt' => 'Ludhiana Steel Rolling Mills - Infrastructure',
        ),
        'csr.php' => array(
            'title' => 'Sustainability & CSR - Ludhiana Steel Rolling Mills',
            'description' => 'Sustainable steel making at Ludhiana Steel Rolling Mills - 400 KW rooftop solar power, 8 acres of dedicated green area, water recycling and community initiatives across our Ludhiana units.',
            'keywords' => 'ludhiana steel sustainability, green steel manufacturing india, csr ludhiana steel rolling mills, solar powered steel plant india',
            'image_alt' => 'Ludhiana Steel Rolling Mills - Sustainability & CSR',
        ),
        'contact.php' => array(
            'title' => 'Contact Us - Alloy Steel Suppliers in India - Ludhiana Steel Rolling Mills',
            'description' => 'Contact Ludhiana Steel Rolling Mills for alloy and carbon steel round bars, RCS bars and billets. We are one of the leading carbon steel manufacturers, exporters and suppliers in India.',
            'keywords' => 'contact ludhiana steel rolling mills, alloy steel suppliers in india, carbon steel suppliers in india, steel manufacturer, round bars suppliers in india',
            'image_alt' => 'Ludhiana Steel Rolling Mills - Contact Us',
        ),
        'career.php' => array(
            'title' => 'Careers - Jobs at Ludhiana Steel Rolling Mills, Ludhiana',
            'description' => 'Build a career in steel making with Ludhiana Steel Rolling Mills. Openings in metallurgy, quality control, rolling mill operations, maintenance and sales at our Ludhiana, Punjab units.',
            'keywords' => 'careers ludhiana steel rolling mills, steel plant jobs ludhiana, metallurgist jobs punjab, rolling mill jobs india',
            'image_alt' => 'Ludhiana Steel Rolling Mills - Careers',
        ),
        '404.php' => array(
            'title' => 'Page Not Found (404) - Ludhiana Steel Rolling Mills',
            'description' => 'The page you are looking for could not be found. Return to the Ludhiana Steel Rolling Mills homepage to browse our products, infrastructure and contact details.',
            'keywords' => 'ludhiana steel rolling mills',
            'image_alt' => 'Ludhiana Steel Rolling Mills',
        ),
    );

    $current_page = basename($_SERVER['SCRIPT_NAME']);
    $meta = isset($page_meta[$current_page]) ? $page_meta[$current_page] : $page_meta['index.php'];
    $canonical_url = ($current_page === 'index.php') ? BASEURL : BASEURL . $current_page;
    $og_image = BASEURL . 'images/lsrm/logo-w-b.png';

    $page_schema = array();

    $page_schema['index.php'] = <<<'EOT'
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Corporation",
      "@id": "https://www.ludhianasteel.com/#organization",
      "name": "Ludhiana Steel Rolling Mills",
      "alternateName": ["LSRM", "Ludhiana Steel Rolling Mills Limited"],
      "url": "https://www.ludhianasteel.com/",
      "logo": {
        "@type": "ImageObject",
        "url": "https://www.ludhianasteel.com/images/lsrm/logo-w-b.png"
      },
      "image": "https://www.ludhianasteel.com/images/lsrm/about-page-3.jpg",
      "description": "Integrated manufacturer of carbon, alloy and special steel round bars, RCS bars, peeled bars and billets in India. Established 1938, with an annual capacity of 100,000 metric tonnes across three units in Ludhiana, Punjab.",
      "foundingDate": "1938",
      "naics": "331110",
      "knowsAbout": [
        "Alloy steel manufacturing",
        "Carbon steel manufacturing",
        "Steel billet casting",
        "Hot rolled round bars",
        "RCS bars",
        "Peeled and ground bars",
        "Forging quality steel",
        "Case hardening steel",
        "Ball bearing steel"
      ],
      "contactPoint": [
        {
          "@type": "ContactPoint",
          "telephone": "+91-99149-99222",
          "contactType": "sales",
          "email": "sales@ludhianasteel.com",
          "areaServed": "IN",
          "availableLanguage": ["English", "Hindi", "Punjabi"]
        },
        {
          "@type": "ContactPoint",
          "telephone": "+91-161-5266000",
          "contactType": "customer service",
          "email": "info@ludhianasteel.com",
          "areaServed": "IN",
          "availableLanguage": ["English", "Hindi", "Punjabi"]
        }
      ],
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Opp. Dhandari Railway Station, G.T. Road",
        "addressLocality": "Ludhiana",
        "addressRegion": "Punjab",
        "postalCode": "141014",
        "addressCountry": "IN"
      },
      "location": [
        { "@id": "https://www.ludhianasteel.com/#works-headoffice" },
        { "@id": "https://www.ludhianasteel.com/#works-focalpoint" },
        { "@id": "https://www.ludhianasteel.com/#works-unit2" }
      ],
      "areaServed": [
        { "@type": "Country", "name": "India" }
      ],
      "sameAs": [
        "https://www.facebook.com/LSRMofficial/",
        "https://www.instagram.com/lsrmofficial",
        "https://in.linkedin.com/company/lsrmofficial"
      ]
    },
    {
      "@type": "WebSite",
      "@id": "https://www.ludhianasteel.com/#website",
      "url": "https://www.ludhianasteel.com/",
      "name": "Ludhiana Steel Rolling Mills",
      "publisher": { "@id": "https://www.ludhianasteel.com/#organization" },
      "inLanguage": "en-IN"
    },
    {
      "@type": "Place",
      "@id": "https://www.ludhianasteel.com/#works-headoffice",
      "name": "Ludhiana Steel Rolling Mills — Head Office & Works",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Opp. Dhandari Railway Station, G.T. Road",
        "addressLocality": "Ludhiana",
        "addressRegion": "Punjab",
        "postalCode": "141014",
        "addressCountry": "IN"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 30.873530,
        "longitude": 75.908356
      },
      "telephone": "+91-161-5266000"
    },
    {
      "@type": "Place",
      "@id": "https://www.ludhianasteel.com/#works-focalpoint",
      "name": "Ludhiana Steel Rolling Mills Limited — Focal Point Unit",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "C-44/47, Focal Point",
        "addressLocality": "Ludhiana",
        "addressRegion": "Punjab",
        "postalCode": "141010",
        "addressCountry": "IN"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 30.892175,
        "longitude": 75.905813
      }
    },
    {
      "@type": "Place",
      "@id": "https://www.ludhianasteel.com/#works-unit2",
      "name": "Ludhiana Steel Rolling Mills Limited — Unit II",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Village Barmalipur, G.T. Road",
        "addressLocality": "Ludhiana",
        "addressRegion": "Punjab",
        "postalCode": "141416",
        "addressCountry": "IN"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 30.768490,
        "longitude": 76.068920
      }
    }
  ]
}
EOT;

    $page_schema['about.php'] = <<<'EOT'
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "AboutPage",
      "@id": "https://www.ludhianasteel.com/about.php#webpage",
      "url": "https://www.ludhianasteel.com/about.php",
      "name": "About Us - Alloy Steel Suppliers in India Since 1938",
      "description": "Ludhiana Steel Rolling Mills has supplied forging quality steel raw material since 1938. Three units across 30 acres in Ludhiana, 100,000 MT annual capacity.",
      "isPartOf": { "@id": "https://www.ludhianasteel.com/#website" },
      "about": { "@id": "https://www.ludhianasteel.com/#organization" },
      "inLanguage": "en-IN"
    },
    {
      "@type": "BreadcrumbList",
      "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://www.ludhianasteel.com/" },
        { "@type": "ListItem", "position": 2, "name": "About Us", "item": "https://www.ludhianasteel.com/about.php" }
      ]
    }
  ]
}
EOT;

    $page_schema['products.php'] = <<<'EOT'
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "CollectionPage",
      "@id": "https://www.ludhianasteel.com/products.php#webpage",
      "url": "https://www.ludhianasteel.com/products.php",
      "name": "Alloy Steel Round Bars & RCS Bars Manufacturer in India",
      "description": "Alloy and carbon steel round bars, RCS bars and peeled bars in over 150 grades, manufactured from our own melt in Ludhiana, Punjab.",
      "isPartOf": { "@id": "https://www.ludhianasteel.com/#website" },
      "inLanguage": "en-IN"
    },
    {
      "@type": "ItemList",
      "name": "Steel products manufactured by Ludhiana Steel Rolling Mills",
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "name": "Round Bars",
          "url": "https://www.ludhianasteel.com/products/round-bars/"
        },
        {
          "@type": "ListItem",
          "position": 2,
          "name": "RCS Bars",
          "url": "https://www.ludhianasteel.com/products/rcs-bars/"
        },
        {
          "@type": "ListItem",
          "position": 3,
          "name": "Peeled & Ground Bars",
          "url": "https://www.ludhianasteel.com/products/peeled-ground-bars/"
        },
        {
          "@type": "ListItem",
          "position": 4,
          "name": "Steel Billets",
          "url": "https://www.ludhianasteel.com/products/steel-billets/"
        }
      ]
    },
    {
      "@type": "BreadcrumbList",
      "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://www.ludhianasteel.com/" },
        { "@type": "ListItem", "position": 2, "name": "Products", "item": "https://www.ludhianasteel.com/products.php" }
      ]
    }
  ]
}
EOT;

    $page_schema['infrastructure.php'] = <<<'EOT'
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "WebPage",
      "@id": "https://www.ludhianasteel.com/infrastructure.php#webpage",
      "url": "https://www.ludhianasteel.com/infrastructure.php",
      "name": "Alloy Steel Billet Manufacturers in India - Our Infrastructure",
      "description": "Induction furnaces of 15T and 7T, Ladle Refining Furnace, vacuum degassing below 1 millibar, continuous casting with EMS producing 130-250mm billets, rolling mills and heat treatment.",
      "isPartOf": { "@id": "https://www.ludhianasteel.com/#website" },
      "about": { "@id": "https://www.ludhianasteel.com/#organization" },
      "significantLink": [
        "https://www.ludhianasteel.com/infrastructure.php#steel",
        "https://www.ludhianasteel.com/infrastructure.php#rolling",
        "https://www.ludhianasteel.com/infrastructure.php#heat"
      ],
      "inLanguage": "en-IN"
    },
    {
      "@type": "BreadcrumbList",
      "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://www.ludhianasteel.com/" },
        { "@type": "ListItem", "position": 2, "name": "Infrastructure", "item": "https://www.ludhianasteel.com/infrastructure.php" }
      ]
    }
  ]
}
EOT;

    $page_schema['csr.php'] = <<<'EOT'
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "WebPage",
      "@id": "https://www.ludhianasteel.com/csr.php#webpage",
      "url": "https://www.ludhianasteel.com/csr.php",
      "name": "Sustainability & CSR - Ludhiana Steel Rolling Mills",
      "description": "400 KW rooftop solar power, 8 acres of dedicated green area, water recycling and community initiatives across our Ludhiana units.",
      "isPartOf": { "@id": "https://www.ludhianasteel.com/#website" },
      "about": { "@id": "https://www.ludhianasteel.com/#organization" },
      "inLanguage": "en-IN"
    },
    {
      "@type": "BreadcrumbList",
      "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://www.ludhianasteel.com/" },
        { "@type": "ListItem", "position": 2, "name": "Sustainability", "item": "https://www.ludhianasteel.com/csr.php" }
      ]
    }
  ]
}
EOT;

    $page_schema['contact.php'] = <<<'EOT'
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "ContactPage",
      "@id": "https://www.ludhianasteel.com/contact.php#webpage",
      "url": "https://www.ludhianasteel.com/contact.php",
      "name": "Contact Us - Alloy Steel Suppliers in India",
      "description": "Contact Ludhiana Steel Rolling Mills for alloy and carbon steel round bars, RCS bars and billets.",
      "isPartOf": { "@id": "https://www.ludhianasteel.com/#website" },
      "about": { "@id": "https://www.ludhianasteel.com/#organization" },
      "inLanguage": "en-IN"
    },
    {
      "@type": "LocalBusiness",
      "@id": "https://www.ludhianasteel.com/#localbusiness",
      "name": "Ludhiana Steel Rolling Mills",
      "image": "https://www.ludhianasteel.com/images/lsrm/about-page-3.jpg",
      "url": "https://www.ludhianasteel.com/",
      "telephone": "+91-161-5266000",
      "email": "info@ludhianasteel.com",
      "priceRange": "$$",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Opp. Dhandari Railway Station, G.T. Road",
        "addressLocality": "Ludhiana",
        "addressRegion": "Punjab",
        "postalCode": "141014",
        "addressCountry": "IN"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 30.873530,
        "longitude": 75.908356
      },
      "hasMap": "https://maps.app.goo.gl/FPfo3NJatbVTN5f77",
      "openingHoursSpecification": [
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],
          "opens": "09:00",
          "closes": "18:30"
        }
      ],
      "parentOrganization": { "@id": "https://www.ludhianasteel.com/#organization" }
    },
    {
      "@type": "BreadcrumbList",
      "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://www.ludhianasteel.com/" },
        { "@type": "ListItem", "position": 2, "name": "Contact Us", "item": "https://www.ludhianasteel.com/contact.php" }
      ]
    }
  ]
}
EOT;

    $page_schema['career.php'] = <<<'EOT'
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "WebPage",
      "@id": "https://www.ludhianasteel.com/career.php#webpage",
      "url": "https://www.ludhianasteel.com/career.php",
      "name": "Careers - Jobs at Ludhiana Steel Rolling Mills, Ludhiana",
      "description": "Openings in metallurgy, quality control, rolling mill operations, maintenance and sales at our Ludhiana, Punjab units.",
      "isPartOf": { "@id": "https://www.ludhianasteel.com/#website" },
      "about": { "@id": "https://www.ludhianasteel.com/#organization" },
      "inLanguage": "en-IN"
    },
    {
      "@type": "BreadcrumbList",
      "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://www.ludhianasteel.com/" },
        { "@type": "ListItem", "position": 2, "name": "Careers", "item": "https://www.ludhianasteel.com/career.php" }
      ]
    }
  ]
}
EOT;

    $current_schema = isset($page_schema[$current_page]) ? $page_schema[$current_page] : null;
    ?>
<head>
    <!-- Google tag (gtag.js) -->

<script async src="https://www.googletagmanager.com/gtag/js?id=G-PEV48CT9LV"></script>

<script>

  window.dataLayer = window.dataLayer || [];

  function gtag(){dataLayer.push(arguments);}

  gtag('js', new Date());

 

  gtag('config', 'G-PEV48CT9LV');

</script>
    <meta name="google-site-verification" content="6Q27E0sGfhXGX_eq0RrhVACX484tEtIMk78qdLnO1DI" />


    <title><?php echo $meta['title']; ?></title>
    <meta name="description" content="<?php echo $meta['description']; ?>">
    <meta name="keywords" content="<?php echo $meta['keywords']; ?>">
    <link rel="canonical" href="<?php echo $canonical_url; ?>">
    <?php if ($current_page === '404.php'): ?>
    <meta name="robots" content="noindex, follow">
    <?php endif; ?>

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Ludhiana Steel Rolling Mills">
    <meta property="og:locale" content="en_IN">
    <meta property="og:url" content="<?php echo $canonical_url; ?>">
    <meta property="og:title" content="<?php echo $meta['title']; ?>">
    <meta property="og:description" content="<?php echo $meta['description']; ?>">
    <meta property="og:image" content="<?php echo $og_image; ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="<?php echo $meta['image_alt']; ?>">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo $meta['title']; ?>">
    <meta name="twitter:description" content="<?php echo $meta['description']; ?>">
    <meta name="twitter:image" content="<?php echo $og_image; ?>">

    <?php if ($current_schema): ?>
    <script type="application/ld+json">
<?php echo $current_schema; ?>
    </script>
    <?php endif; ?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />

    <!-- favicon icon -->
    <link rel="shortcut icon" href="<?php echo BASEURL; ?>images/lsrm/favicon.ico">

    <!-- <link rel="apple-touch-icon" href="images/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png"> -->
    <!-- google fonts preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- style sheets and font icons  -->
    <link rel="stylesheet" href="css/vendors.min.css" />
    <link rel="stylesheet" href="css/icon.min.css" />
    <link rel="stylesheet" href="css/style.css?v=1.1" />
	<?php if ($current_page === 'enquiry.php'){ ?>
	<link rel="stylesheet" href="css/enquiry.css?v=2.0" />
	<?php } ?>
    <link rel="stylesheet" href="css/responsive.css" />
	
	
    <link rel="stylesheet" href="css/dev.css?v=2.0" />
    <link rel="stylesheet" href="demos/ludhiana-steel/style.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<?php if(isset($extra_css) && !empty($extra_css)) { echo $extra_css; } ?>
	<style>.lscareer-error{ color:red !important; }</style>
</head>

<body data-mobile-nav-style="classic">
    <!-- start header -->


    <header>

        <nav class="navbar navbar-expand-lg header-transparent bg-transparent header-reverse "
            data-header-hover="light">
            <div class="container mobile-new-width">
                <div class="col-auto col-lg-2 me-lg-0 me-auto mobile-new-width-logo">
                    <a class="navbar-brand" href="<?php echo BASEURL; ?>">
                        <img style="min-height:110px;" src="./images/lsrm/logo-w-b.png" data-at2x="./images/lsrm/logo-w-b.png" alt=""
                            class="default-logo">
                        <img src="./images/lsrm/logo-remove.png" data-at2x="./images/lsrm/logo-remove.png" alt=""
                            class="alt-logo">
                        <img src="./images/lsrm/logo-remove.png" data-at2x="./images/lsrm/logo-remove.png" alt=""
                            class="mobile-logo">
                    </a>
                </div>
                 <div class="col-auto menu-order position-static new-navbar-toggler">
                    <div class="col-auto col-lg-2 p-0 text-center align-items-center">
                        <div class="header-icon d-block d-lg-none">
                            <div class="header-push-button hamburger-push-button icon">
                                <div class="push-button">
                                    <span></span>
                                    <span></span>
                                    <b
                                        class="push-button-text text-uppercase text-white position-absolute top-3px left-minus-50px fs-13 fw-600">Menu</b>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav alt-font ls-1px">
                            <li class="nav-item"><a href="<?php echo BASEURL; ?>" class="nav-link">Home</a></li>
                            <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>

                            <li class="nav-item"><a href="products.php" class="nav-link">Products</a></li>
                            <li class="nav-item"><a href="infrastructure.php" class="nav-link">Infrastructure</a></li>
                            <li class="nav-item"><a href="csr.php" class="nav-link">Sustainability</a></li>
                            <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                            <li class="nav-item"><a href="career.php" class="nav-link">Career</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-auto col-lg-2 text-end d-none d-sm-flex">

                </div>
                <div class="push-menu hamburger-nav header-dark hamburger-menu-simple bg-dark-gray"
                    style="background-image: url(images/vertical-line-bg-small.svg)">
                    <span class="close-menu bg-white fs-18"><i class="fa-solid fa-xmark text-dark-gray"></i></span>
                    <div class="container d-flex flex-column justify-content-center h-100">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-8 hamburger-menu menu-list-wrapper no-margin"
                                data-scroll-options='{ "theme": "light" }'>
                                <ul class="menu-item-list fw-500 alt-font p-0 text-center text-lg-start">
                                    <li class="nav-item"><a href="<?php echo BASEURL; ?>" class="nav-link">Home</a></li>
                                    <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>

                                    <li class="nav-item"><a href="products.php" class="nav-link">Products</a></li>
                                    <li class="nav-item"><a href="infrastructure.php"
                                            class="nav-link">Infrastructure</a></li>
                                    <li class="nav-item"><a href="csr.php" class="nav-link">Sustainability</a></li>
                                    <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </nav>

    </header>
    <!-- end header -->