<?= $this->tag->getDoctype() ?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?= $this->tag->getTitle() ?>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta content="<?= $phalcon_team ?>" name="author">
    <link rel="shortcut icon" href="/favicon.ico?v=<?= $ptools_version ?>">
    <?= $this->tag->stylesheetLink('https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&subset=latin,cyrillic-ext,cyrillic', false) ?>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <?= $this->assets->outputJs('js_ie') ?>
    <![endif]-->
    <?= $this->assets->outputCss('main_css') ?>
    
</head><body class="hold-transition lockscreen"><div class="lockscreen-wrapper">
        
        
    <?= $this->getContent() ?>

        
        </div>
</body></html>
