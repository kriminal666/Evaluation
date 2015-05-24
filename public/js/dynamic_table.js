(function () {
    var app = angular.module('testEvaluation',[], function ($interpolateProvider) {
        $interpolateProvider.startSymbol('$$');
        $interpolateProvider.endSymbol('$$');
    });

    app.controller('EvaluationController', function ($scope, $http) {

        $scope.users = [];
        $scope.modules = [];
        $scope.submodules = [];
        $scope.submoduleEvaluations = [];
        $scope.evaluationMarks = [];
        $scope.usersEvaluations=[];
        $scope.showTable = false;
        //Search and filter table
        $scope.sortType     = 'name'; // set the default sort type
        $scope.sortReverse  = false;  // set the default sort order
        $scope.searchUser   = '';     // set the default search/filter term

        //pagination




        //Get all marks
        $scope.marks = function () {
            $http.get('gradescale/1/marks').
                success(function (data, status, headers, config) {
                    $scope.allMarks = data;

                }).error(function (data, status, headers, config) {
                    return status;

                });
        };

        //get all modules
        $scope.getModules = function () {
            $http.get('/api/studymodules').
                success(function (data, status, headers, config) {
                    $scope.modules = data;

                }).error(function (data, status, headers, config) {
                    return status;

                });
        };

        //get
        $scope.getSubModules = function ($id) {
            if ($id == null) {
                return;
            }
            $http.get('/studymodule/' + $id + '/submodules').
                success(function (data, status, headers, config) {
                    $scope.submodules = data;
                    //console.log(data);
                   $scope.usersGroupEvaluations($id);
                    //console.log('hemos llamado al método');

                }).error(function (data, status, headers, config) {
                    return status;

                });

        };



        $scope.usersGroupEvaluations = function ($id) {
            console.log('Estamos en el método de buscar evaluaciones ' + $id);
            $http.post('usersgroupevaluations', {
                id: [16, 37],
                module: $id

            }).success(function (data, status, headers, config) {
                $scope.usersEvaluations = data;
                console.log('success de la petición');



            })
                .error(function (data, status, headers, config) {
                    return status;

                });
        };



    $scope.getModules();
    $scope.marks();

    });//Close EvaluationController'

})();

