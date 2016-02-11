'use strict';

/* App Module */

var parserApp = angular.module('parserApp', ['ngRoute', 'ngResource', 'ngStorage', 'parserApp.controllers', 'parserApp.services']);

parserApp.constant('config', {
    'path':'partials/',
    'api_link': 'api/v1/'
});

parserApp.config(['$routeProvider','config' ,
    function($routeProvider, config) {

        $routeProvider.
            when('/', {
                templateUrl: function($route){
                    return config.path + 'index.html';
                },
                controller: 'MainPageCtrl'
            }).
            when('/question', {
                templateUrl: function($route){
                    return config.path + 'form-question.html';
                },
                controller: 'QuestionFormCtrl'
            }).
            when('/question/:question_id', {
                templateUrl: function($route){
                    return config.path + 'question.html';
                },
                controller: 'QuestionCtrl'
            }).
            when('/profile/:profile_name', {
                templateUrl: function($route){
                    return config.path + 'profile.html';
                },
                controller: 'ProfileCtrl'
            }).
            otherwise({
                redirectTo: '/'
            });
    }]);