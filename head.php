<head>
    <title><?= CSM_TITLE ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="description" content="<?= CSM_TITLE ?>">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/all.css">
    <link id="theme-style" rel="stylesheet" href="<?= __STATIC__ ?>/assets/css/portal.css">
    <?php if(isset($include)) require_once $include ?>
    <style>
        .container-xl{
            max-width: unset !important;
        }
        .table tr:hover {
            background: whitesmoke;
        }
        .active_row {
            background: whitesmoke;
        }
        input[type='checkbox'] {
            cursor: pointer;
        }
    </style>
</head>