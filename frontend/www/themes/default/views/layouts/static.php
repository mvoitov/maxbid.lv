<?php

/**
 *
 * @author Ivan Teleshun <teleshun.ivan@gmail.com>
 * @link http://molotoksoftware.com/
 * @copyright 2016 MolotokSoftware
 * @license GNU General Public License, version 3
 */

/**
 *
 * This file is part of MolotokSoftware.
 *
 * MolotokSoftware is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * MolotokSoftware is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with MolotokSoftware.  If not, see <http://www.gnu.org/licenses/>.
 */

/** @var BaseController $this */
cs()->registerCoreScript('jquery');
cs()->registerScript(
    'basePath',
    "basePath = '" . Yii::app()->getRequest()->getHostInfo() . "';",
    CClientScript::POS_READY
);

$csrfTokenName = Yii::app()->request->csrfTokenName;
$csrfToken = Yii::app()->request->csrfToken;

cs()->registerScript(
    'Core',
    "
    csrfTokenName = '" . $csrfTokenName . "';
    csrfToken='" . $csrfToken . "';
    if (typeof console == 'undefined') var console = { log: function() {} };
",
    CClientScript::POS_HEAD
);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?= Yii::app()->language ?>">
<head>
    <meta charset="utf-8"/>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta name="description" content="<?= CHtml::encode($this->pageDescription); ?>">
    <meta name="keywords" content="<?= CHtml::encode($this->pageKeywords); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="<?php echo CHtml::encode($this->pageTitle); ?>"/>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-105780054-1', 'auto');
            ga('send', 'pageview');

        </script>

    <?php if (!$this->getHasOgImageMetaTag()): ?>
        <meta property="og:image" content="<?= Yii::app()->request->getHostInfo(); ?>/img/logo.png"/>
    <?php endif; ?>

    <?php $this->renderMetaTags(); ?>

    <?php cs()->registerCssFile(bu() . '/css/style.css', ''); ?>
    <?php cs()->registerCssFile(bu() . '/bootstrap/css/bootstrap_col_15.css', ''); ?>
    <?php cs()->registerCssFile(bu() . '/bootstrap/css/bootstrap.min.css', 'screen, projection'); ?>
    <?php cs()->registerScriptFile(bu() . '/js/dev.js', CClientScript::POS_HEAD); ?>
    <?php cs()->registerScriptFile(bu() . '/js/frontend.js', CClientScript::POS_END); ?>

    <link rel="icon" href="/favicon.png" type="image/x-icon"/>
    <link rel="shortcut icon" href="/favicon.png" type="image/x-icon"/>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
</head>
<body>

<?= $content; ?>

<?php cs()->registerScript('frontend-init', '
frontend.init({});
frontend.security.csrf.tokenName = "' . $csrfTokenName . '";
frontend.security.csrf.token = "' . $csrfToken . '";
'); ?>
<?php cs()->registerScriptFile(bu() . '/bootstrap/js/bootstrap.min.js', CClientScript::POS_END); ?>
</body>
</html>
