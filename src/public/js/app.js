var app = angular.module('myApp', []);
app.controller('StringCalculatorCtrl', function($scope, $http, RequestService) {

    $scope.inputString = '';
    $scope.outputString = '';
        
    $scope.calculate = function(){
        var inputString = $scope.inputString;
        RequestService.calculate(inputString).then(function(response){
            $scope.outputString = response.data;
        },function(error){
            console.log(error.statusText);
        });
    };    
});
app.service('RequestService',function($http, $q, $window){
    // Ref : http://haroldrv.com/2015/02/understanding-angularjs-q-service-and-promises/
    var deferred = $q.defer();
    
    this.calculate = function(inputString){
        var req = {
            method: 'post',
            url: $window.ROOT_URL + 'ajax/calculate',
            data: {
                'inputString' : inputString
            },
            headers: {
                'Content-Type': 'application/json'
            }
        };
        return $http(req).success(function (response) {
            deferred.resolve(response);
            return deferred.promise;
        }, function(response){
            deferred.reject(response);
            return deferred.promise;
        });
    };
    
});