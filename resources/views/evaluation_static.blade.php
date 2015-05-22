@extends('app')

@section('content')
    <div class="container" ng-app="testEvaluation" ng-controller="EvaluationTableController as EvaluationCtrl">
        <div class="row">
            <div class="col-md-4">
                <strong>Select Module(id=103 ;))</strong>
                <select id="module_selector" ng-model="module" class=""
                        ng-options="module.moduleId as module.shortName for module in modules.data"
                        title="Modules" ng-change="getSubModules(module)">
                    <option value="">Modules</option>
                </select>
            </div>

            <p> ID:$$module$$</p>
        </div>
        <table id ="evaluations_static" class="display dataTable" ng-show="showTable">
            <thead>
            <tr>
                <th>Foto</th>
                <th>Tipo</th>
                <th>Oculto</th>
                <th>Lastname 1</th>
                <th>Lastname 2</th>
                <th>Name</th>
                <th>Academic Course</th>
                <th>UF1</th>
                <th>UF2</th>
                <th>UF3</th>
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
                <th ng-model ="uf1">UF1</th>
                <th ng-model="uf2">UF2</th>
                <th ng-model="uf3">UF3</th>
                </tr>



            </tfoot>
            <tbody>
            <tr>
                <td>Foto</td>
                <td>Tipo</td>
                <td>Oculto</td>
                <td>Mierdecilla</td>
                <td>DeLaBuena</td>
                <td ng-model="userId1">


                    </input
                    Pepito
                </td>
                <td>2015  ------ $$userId1$$</td>
                <td>
                    <input type="hidden" ng-model="uf1">
                    <select id="select1" ng-model="marks1" class="" ng-options="mark.mark_id as mark.mark_value for mark in allMarks"
                            title="Marks"
                            ng-change="updateEvaluation(userEvaluation,userId1,academicPeriod,uf1,marks1)">
                        <option value="">Evaluate</option>
                    </select>
                </td>
                <td>
                    <input type="hidden" ng-model="uf2">
                    <select id="select2" ng-model="marks2" class="" ng-options="mark.mark_id as mark.mark_value for mark in allMarks"
                            title="Marks"
                            ng-change="updateEvaluation(userEvaluation,userId1,academicPeriod,uf2,marks2)">
                        <option value="">Evaluate</option>
                    </select>
                </td>
                <td>
                    <input type="hidden" ng-model="uf3">
                    <select id="select3" ng-model="mark3.mark_id" class="" ng-options="mark3.mark_id as mark3.mark_value  for mark3 in allMarks track by mark3.mark_id"
                            title="Marks"
                            ng-change="updateEvaluation(userEvaluation,userId1,academicPeriod,uf3,marks3.mark_id)">
                        <option value="">Evaluate</option>
                    </select>
                </td>

            </tr>
            <tr>

            <td>Foto</td>
            <td>Tipo</td>
            <td>Oculto</td>
            <td>Cagoncillo</td>
            <td>Calzoncillo</td>
            <td>Pedrillo</td>
            <td>2015</td>
            <td>

                <select id="select3" ng-model="marks4" class="" ng-options="mark.mark_id as mark.mark_value for mark in allMarks"
                        title="Marks"
                        ng-change="updateEvaluation(userEvaluation,userId2,academicPeriod,submodule,marks4)">
                    <option value="">Evaluate</option>
                </select>
            </td>
            <td>
                <select id="select4" ng-model="marks5" class="" ng-options="mark.mark_id as mark.mark_value for mark in allMarks"
                        title="Marks"
                        ng-change="updateEvaluation(userEvaluation,userId2,academicPeriod,submodule,marks5)">
                    <option value="">Evaluate</option>
                </select>
            </td>
            <td>
                <select id="select5" ng-model="marks6" class="" ng-options="mark as mark.mark_value  for mark in allMarks track by mark.mark_id"
                        title="Marks"
                        ng-change="updateEvaluation(userEvaluation,userId2,academicPeriod,submodule,marks6)">
                    <option value="">Evaluate</option>
                </select>
            </td>
            </tr>

            </tbody>
        </table>
</div>


@endsection