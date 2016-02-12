'use strict';

/* Controllers */

var parserAppController = angular.module('parserApp.controllers', ['parserApp.services']);

parserAppController.controller('MainPageCtrl', ['$scope', '$http', 'config', function ($scope, $http, config) {

    $http.get(config.api_link + 'question').success(function (data) {
        $scope.questions = [];
        $scope.questions.whith_replay = [];
        $scope.questions.without_replay = [];

        for (var key in data) {
            if (data[key].replies.length) {
                $scope.questions.whith_replay.push(data[key]);
            } else {
                $scope.questions.without_replay.push(data[key]);
            }
        }
    });

    $http.get(config.api_link + 'reply').success(function (data) {
        $scope.reply = data;
    });


}]);


parserAppController.controller('QuestionFormCtrl', ['$scope', '$http', '$location', 'state', 'config', function ($scope, $http, $location, state, config) {

    $scope.question_form = state.question_form;
    $scope.error = [];
    $scope.clear = function () {
        $scope.question_form = {};
        $scope.error = [];
        state.question_form = $scope.question_form;
    },

    $scope.save = function () {
        $scope.error = [];
        $http({
            method: 'POST',
            url: config.api_link + 'user/' + $scope.question_form.name + '/question',
            data: $scope.question_form
        }).success(function (data) {
            $scope.question_form = {};
            $location.path('/question/' + data.id);
        }).error(function (data) {
            for (var key in data) {
                $scope.error[key] = data[key][0];
            }
        });

    }
}]);


parserAppController.controller('QuestionCtrl', ['$scope', '$routeParams', '$http', 'state', 'config', function ($scope, $routeParams, $http, state, config) {

    var updatePage = function (){
        $http.get(config.api_link + 'question/'+ $routeParams.question_id).success(function (data) {
            $scope.data = data;
        });
    }
    updatePage();

    $scope.comment_form = state.comment_form;

    $scope.clear = function () {
        $scope.comment_form = {};
        $scope.error = [];
        state.comment_form = $scope.comment_form;
    },

        $scope.save = function () {
            $scope.error = [];
            $http({
                method: 'POST',
                url: config.api_link + 'user/' + $scope.comment_form.name + '/question/'+ $routeParams.question_id +'/reply',
                data: $scope.comment_form
            }).success(function (data) {
                $scope.comment_form = {};
                updatePage();
            }).error(function (data) {
                for (var key in data) {
                    $scope.error[key] = data[key][0];
                }
            });
        }

}]);

parserAppController.controller('ProfileCtrl', ['$scope', '$routeParams', '$http', 'state', 'config', function ($scope, $routeParams, $http, state, config) {

    $http.get(config.api_link + 'user/'+ $routeParams.profile_name).success(function (data) {
        $scope.data = data;
    });

}]);
