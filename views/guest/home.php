<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="public/CSS/styles.css">
</head>
<body>
<h1>Home</h1>
<p>Home page</p>


<?php $userLogin = \app\core\components\form\form::begin('./login/user', 'get'); ?>

<button> User Login</button>

<?php $userLogin->end(); ?>

<?php $userLogin = \app\core\components\form\form::begin('./login/employee', 'get'); ?>

<button> Employee Login</button>

<?php $userLogin->end(); ?>


</body>
</html>


<?php
if (\app\core\Application::session()->getFlash('success')) {
    echo \app\core\Application::session()->getFlash('success');
    var_dump($_SESSION);
}
?>


