/// <reference path="../angular.js" />

angular.module("sportsStore")
.controller("sportsStoreCtrl", function ($scope,$http) {
            $http.get("http://codecamp.tm/getall")
                .success(function(response){
                    $scope.data = {
                        products: response
                    };
                });
});
