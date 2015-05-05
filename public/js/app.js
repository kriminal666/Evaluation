(function(){
    var app = angular.module('testEvaluation',[ ], function($interpolateProvider) {
        $interpolateProvider.startSymbol('$$');
        $interpolateProvider.endSymbol('$$');
    });

    app.controller('FormController' , function($scope, $http) {
        $scope.loading = false;
        $scope.evaluates = [];

        $scope.addEvaluation = function () {
            $scope.loading = true;
            $http.post('/api/evaluation', {
                evaluation_academic_period_id: 4,
                evaluation_mark_id: $scope.evaluate.mark,
                evaluation_student_id: $scope.evaluate.student,
                evaluation_study_subModule_id: $scope.evaluate.uf
            }).success(function (data, status, headers, config) {
                $scope.evaluates.push(data);
                $scope.loading = false;
            }).error(function (data, status, headers, config) {
                return status;

            });

        };
    });


})();