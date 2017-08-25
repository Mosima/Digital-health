
app.controller("indexController", function ($scope, $http,$modal) {
    "use strict"

 $scope.openlogInModal = function ( ) {
        var modalInstance = $modal.open({
            backdrop: 'static',
            animation: true,
            templateUrl: 'logInModalContent.html',
            controller: 'adminlogInController',
            size: 'md'
        });
    };

});
app.controller("adminlogInController", function ($scope, $http, $modalInstance, toaster, $dialogs) {


});