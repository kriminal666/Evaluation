var data2 = [];
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
        var moduleId = 0;


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
                    moduleId = $id;
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

        $scope.actionToDo = function ($evaluationId, $user, $academicPeriod, $subModule, $markId) {
            console.log('action to do');

            if (angular.isUndefined($evaluationId) || $evaluationId == null) {
                console.log('Evaluation id:' + $evaluationId);
                console.log('user id: ' + $user);
                console.log('');
                $scope.createEvaluation($user, $academicPeriod, $subModule, $markId);
            } else {
                if ($markId == null) {
                    $scope.destroyEvaluation($evaluationId);
                } else {
                    $scope.updateEvaluation($evaluationId, $user, $academicPeriod, $subModule, $markId);
                }
            }

        };

        //create a new evaluation
        $scope.createEvaluation = function ($user, $academicPeriod, $subModule, $markId) {
            console.log('create');
            $academicPeriod = 4;
            $http.post('/api/evaluations', {
                evaluation_academic_period_id: $academicPeriod,
                evaluation_mark_id: $markId,
                evaluation_student_id: $user,
                evaluation_study_subModule_id: $subModule
            }).success(function (data, status, headers, config) {
                console.log(data);
                $scope.usersGroupEvaluations(moduleId);
            }).error(function (data, status, headers, config) {
                return status;

            });
        };

        //Update mark of user
        $scope.updateEvaluation = function ($evaluationId, $user, $academicPeriod, $subModule, $markId) {
            console.log('update');
            $academicPeriod = 4;
            console.log('user id:' + $user);
            console.log('Academic Period: ' + $academicPeriod);
            console.log('submodule id:' + $subModule);
            console.log('evaluation id:' + $evaluationId);
            console.log('Mark id:' + $markId);

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
        $scope.destroyEvaluation = function ($userEvaluation) {

            console.log('evaluation id: ' + $userEvaluation);
            console.log('destroy');

            $http.delete('/api/evaluations/' + $userEvaluation).success(function () {
                //$scope.submoduleEvaluations.splice($index, 1);
                $scope.usersGroupEvaluations(moduleId);
            }).error(function (data, status, headers, config) {
                return status;

            });


        };

        //
        $scope.usersGroupEvaluations = function ($id) {
            console.log('Estamos en el método de buscar evaluaciones ' + $id);
            $http.post('usersgroupevaluations', {
                id: [16, 37],
                module: $id

            }).success(function (data, status, headers, config) {

                console.log('success de la petición');

                var str = "";
                data2 = [];
                for (var i = 0, l = data.length; i < l; i++) {

                    str = "{\"userId\":\"" + data[i].id + "\",\"username\":\"" + data[i].name + "\"";

                    var evaluations = data[i].evaluations;
                    var subModules = $scope.submodules;
                    for (var j = 0, le = subModules.length; j < le; j++) {
                        var count = 0;//TODO
                        for (var t = 0; t < evaluations.length; t++) {
                            if (subModules[j].study_submodules_id == evaluations[t].studysubmodules.study_submodules_id) {
                                str = str + ",\"evaluationId" + j + "\":\"" + evaluations[t].evaluation_id + "\"" +
                                ",\"markValue" + j + "\":\"" + evaluations[t].mark.mark_value + "\"";
                                break;
                            }
                            if (t == evaluations.length - 1) {
                                str = str + ",\"evaluationId" + j + "\":" + null +
                                ",\"markValue" + j + "\":" + null;
                            }
                        }


                    }
                    str = str + "}";
                    var json = JSON.parse(str);
                    data2.push(json);

                    $scope.showTable = true;

                }

                $scope.userId1 = data2[0].userId;
                $scope.userId2 = data2[1].userId;

                $scope.eval1 = data2[0].evaluationId0;
                $scope.eval2 = data2[0].evaluationId1;
                $scope.eval3 = data2[0].evaluationId2;
                $scope.eval4 = data2[1].evaluationId0;
                $scope.eval5 = data2[1].evaluationId1;
                $scope.eval6 = data2[1].evaluationId2;

                initdataTables();
                $scope.array = data2;

            })
                .error(function (data, status, headers, config) {
                    return status;

                });
        };

        $scope.getModules();
        $scope.marks();


    })


})();


function initdataTables() {
    console.log(data2);
    console.log('estamos en init dataTables');
    var oTable = $('#evaluations_static').DataTable();
    //Init values to selects
    $("#select1").val(data2[0].markValue0);
    $("#select2").val(data2[0].markValue1);
    $("#select3").val(data2[0].markValue2);
    $("#select4").val(data2[1].markValue0);
    $("#select5").val(data2[1].markValue1);
    $("#select6").val(data2[1].markValue2);


}
