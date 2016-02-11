<!DOCTYPE html>
<head>
    <title>Test task</title>
    <script src="bower_components/angular/angular.js"></script>
    <script src="bower_components/angular-resource/angular-resource.js"></script>
    <script src="bower_components/angular-route/angular-route.js"></script>
    <script src="bower_components/ngstorage/ngStorage.js"></script>


    <link rel="stylesheet" href="bower_components/bootstrap/css/bootstrap.min.css">

</head>
<body ng-app="parserApp">

<div id="wrapper">
    <div class="container">
        <div class="header clearfix">
            <a href="/#/" class="navbar-brand">Почемучка</a>
        </div>

        <div ng-view></div>

    </div>
</div>

<script src="js/app.js"></script>
<script src="js/controllers.js"></script>
<script src="js/services.js"></script>

</body>

</html>