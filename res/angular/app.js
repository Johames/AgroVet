var app = angular.module('myApp', ['ngRoute', 'ngMaterial']);
app.config(function($routeProvider, $mdIconProvider) {
    $routeProvider
        //para el logeo-----------------------------------------------------------------------------------------
        .when('/venta', {
            templateUrl: 'venta.php',
            controller: 'venta'
        });

});
