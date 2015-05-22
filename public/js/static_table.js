var data2=[];
(function () {
    var app = angular.module('testEvaluation', [], function ($interpolateProvider) {
        $interpolateProvider.startSymbol('$$');
        $interpolateProvider.endSymbol('$$');
    });
    app.controller('EvaluationTableController', function ($scope, $http) {
        $scope.users = [];
        $scope.modules = [];
        $scope.submodules = [];
        $scope.submoduleEvaluations = [];
        $scope.evaluationMarks = [];
        $scope.showTable = false;




        //get
        $scope.getSubModules = function ($id) {
            if ($id == null) {
                return;
            }
            $http.get('/studymodule/' + $id + '/submodules').
                success(function (data, status, headers, config) {
                    $scope.submodules = data;
                    $scope.uf1 = $scope.submodules[0].study_submodules_id;
                    $scope.uf2 = $scope.submodules[1].study_submodules_id;
                    $scope.uf3 = $scope.submodules[2].study_submodules_id;
                    console.log(data);
                    $scope.usersGroupEvaluations($id);
                    console.log('hemos llamado al método');

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

        //get evaluations from subModule
        $scope.getSubModuleEvaluations = function ($id) {
            if ($id == null) {
                return;
            }
            $http.get('submodule/' + $id + '/evaluations').
                success(function (data, status, headers, config) {
                    $scope.submoduleEvaluations = data;
                    $scope.showTable = true;



                }).error(function (data, status, headers, config) {
                    return status;

                });
        };

        //Get all marks
        $scope.marks = function () {
            $http.get('gradescale/1/marks').
                success(function (data, status, headers, config) {
                    $scope.allMarks = data;

                }).error(function (data, status, headers, config) {
                    return status;

                });
        };

        //Update mark of user
        $scope.updateEvaluation = function ($evaluationId, $user, $academicPeriod, $subModule, $markId) {
            console.log('user id:' + $user);
            console.log('Academic Period: ' + $academicPeriod);
            console.log('submodule id:' + $subModule);
            console.log('evaluation id:' + $evaluationId);
            console.log('Mark id:' + $markId);
            if ($markId== null) {
                return;
            }
            $http.put('api/evaluations/' + $evaluationId, {
                academicPeriodId: $academicPeriod,
                subModuleId: $subModule,
                studentId: $user,
                markId: $markId
            })
                .success(function (data, status, headers, config) {

                })
                .error(function (data, status, headers, config) {
                    return status;

                });
        };

        //Mark for deletion evaluation
        $scope.deleteEvaluation = function ($index, $userEvaluation) {
            console.log($index);
            $http.delete('/evaluation/' + $userEvaluation).success(function () {
                $scope.submoduleEvaluations.splice($index, 1);
            }).error(function (data, status, headers, config) {
                return status;

            });


        };

        //Destroy evaluation
        $scope.destroyEvaluation = function ($index, $userEvaluation) {
            console.log('Index: ' + $index);
            console.log('evaluation id: ' + $userEvaluation);
            $http.delete('/api/evaluations/' + $userEvaluation).success(function () {
                $scope.submoduleEvaluations.splice($index, 1);
            }).error(function (data, status, headers, config) {
                return status;

            });


        };

        //
        $scope.usersGroupEvaluations = function ($id) {
            console.log('Estamos en el método de buscar evaluaciones '+$id);
            $http.post('usersgroupevaluations', {
                id: [16,37],
                module: $id

            }).success(function (data, status, headers, config) {

                console.log('success de la petición');

                var str = "";
                for (var i = 0, l = data.length; i < l; i++) {

                    str = "{\"userId\":\""+ data[i].id+"\",\"username\":\""+ data[i].name+"\"";

                    var evaluations = data[i].evaluations;
                    for (var j = 0, le = evaluations.length; j < le; j++) {


                        str=str+",\"evaluationId"+j+"\":\""+evaluations[j].evaluation_id+"\""+
                        ",\"markId"+j+"\":\""+evaluations[j].mark.mark_id+"\"";


                    }
                    str = str+"}";
                    var json = JSON.parse( str );
                    data2.push(json);
                    $scope.showTable = true;

                }

                $scope.userId1 = data2[0].userId;
                console.log('Acabo de darle valor al userid:'+$scope.IdUser1);
                initdataTables();

            })
                .error(function (data, status, headers, config) {
                    return status;

                });
        };

        $scope.setToMark = function () {
            $scope.marks = $scope.allMarks.filter(function (item) {
                return item.id == 1
            })[0];
        }

        $scope.getModules();
        $scope.marks();


    })


})();



function initdataTables() {
    console.log(data2);
    console.log('estamos en init dataTables');
    var oTable = $('#evaluations_static').DataTable();
    //Init values to selects
    //var element = document.getElementById('select1');
    //element.value = data2[0].markId0;


        $("#select1").val(data2[0].markId0);
        $("#select3").val(data2[0].markId1);
        $("#select2").val(data2[0].markId2);
        $("#select4").val(data2[1].markId0);
        $("#select5").val(data2[1].markId1);
        $("#select6").val(data2[1].markId2);


}
