@extends('app')

@section('content')
    <div class="container" ng-app="testEvaluation" ng-controller="EvaluationTableController as EvaluationCtrl">
        <div class="row">
            <div class="col-md-4">
                <strong>Select Module(id=103 ;))</strong>
                <select ng-model="module" class=""
                        ng-options="module.moduleId as module.shortName for module in modules.data"
                        title="Modules" ng-change="getSubModules(module)">
                    <option value="">Modules</option>
                </select>
            </div>

            <p> ID:$$module$$</p>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-4">
                <strong>Now select one of its Submodules</strong>
                <select ng-model="moduleSubmodules" class=""
                        ng-options="submodule.study_submodules_id as submodule.study_submodules_shortname for submodule in submodules"
                        title="SubModules" ng-change="getSubModuleEvaluations(moduleSubmodules)">
                    <option value="">SubModules</option>
                </select>
            </div>
            <p> ID:$$moduleSubmodules$$</p>
            <hr/>
        </div>
        <br/>

        <table id="evaluations_table" class="display dataTable" ng-show="showTable">
            <thead>
            <tr>
                <th>Foto</th>
                <th>Tipo</th>
                <th>Oculto</th>
                <th>Lastname 1</th>
                <th>Lastname 2</th>
                <th>Name</th>
                <th>Academic Course</th>
                <th>UF</th>
                <th>Mark</th>
                <th>SoftDelete</th>
                <th>Destroy</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Foto</th>
                <th>Tipo</th>
                <th>Oculto</th>
                <th>Lastname 1</th>
                <th>LastName 2</th>
                <th>Name</th>
                <th>Academic Course</th>
                <th>UF</th>
                <th>Mark</th>
                <th>SoftDelete</th>
                <th>Destroy</th>
            </tr>
            </tfoot>
            <tbody>
            <tr ng-repeat="evaluation in submoduleEvaluations" ng-model="userEvaluation"
                ng-value="userEvaluation = evaluation.evaluation_id">
                <td>Foto</td>
                <td>Tipo</td>
                <td>Oculto</td>
                <td>Lastname 1</td>
                <td>Lastname 2</td>
                <td ng-model="userId" ng-value="userId = evaluation.user.id">$$ evaluation.user.name $$</td>
                <td ng-model="academicPeriod"
                    ng-value="academicPeriod = evaluation.academic_periods.academic_periods_id">
                    $$evaluation.academic_periods.academic_periods_name$$
                </td>
                <td ng-model="submodule" ng-value="submodule = evaluation.study_submodules.study_submodules_id">
                    $$evaluation.study_submodules.study_submodules_name $$
                </td>
                <td><select ng-model="marks" class=""
                            ng-options="mark as mark.mark_value  for mark in allMarks track by mark.mark_id"
                            title="Marks" ng-init="marks =  evaluation.mark.mark_id"
                            ng-change="updateEvaluation(userEvaluation,userId,academicPeriod,submodule,marks)">
                        <option value="">Evaluate</option>
                    </select></td>
                <td>
                    <button class="btn btn-danger btn-xs" ng-click="deleteEvaluation($index,userEvaluation)"><span
                                class="glyphicon glyphicon-trash"></span></button>
                </td>
                <td>
                    <button class="btn btn-danger btn-xs" ng-click="destroyEvaluation($index,userEvaluation)"><span
                                class="glyphicon glyphicon-trash"></span></button>
                </td>

            </tr>

            </tbody>
        </table>

    </div>



@endsection

@section('table_scripts')
    <script type="text/javascript" src="{{asset('/js/app.js')}}"></script>

@endsection