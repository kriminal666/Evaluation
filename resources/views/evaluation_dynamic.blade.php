@extends('app')

@section('content')
    <div class="container" ng-app="testEvaluation" ng-controller="EvaluationController as EvaluationCtrl">
        <div class="row">
            <div class="col-md-4">
                <strong>Select Module(id=103 ;))</strong><br/>

                <div class="form-group">
                    <select id="module_selector" ng-model="module" class="form-control"
                            ng-options="module.moduleId as module.shortName for module in modules.data"
                            title="Modules" ng-change="getSubModules(module)">
                        <option value="">Modules</option>
                    </select>
                </div>

            </div>

            <p> ID:$$module$$</p>
        </div>
        <br/>
        <br/>

        <div class="row">
            <div class="col-md-4">
                <form>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-search"></i></div>

                            <input type="text" class="form-control" placeholder="Search by user name"
                                   ng-model="searchUser">

                        </div>
                    </div>
                </form>
            </div>
        </div>

        <table class="table display table-striped table-bordered table-hover table-responsive" bs-table>
            <thead class="tableHeader">
            <tr role="row">
                <th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1"
                    style="width: 33px;">
                    Foto
                </th>
                <th title="Tipus" class="sorting" data-column-index="2" role="columnheader" tabindex="0"
                    aria-controls="students_table" rowspan="1" colspan="1" style="width: 20px;"
                    aria-label="T: activate to sort column ascending">Tipo
                </th>
                <th class="sorting" title="Ocult" data-column-index="3" role="columnheader" tabindex="0"
                    aria-controls="students_table" rowspan="1" colspan="1" style="width: 28px;"
                    aria-label="O: activate to sort column ascending">Oculto
                </th>
                <th class="sorting" data-column-index="4" role="columnheader" tabindex="0"
                    aria-controls="students_table" rowspan="1" colspan="1" style="width: 136px;"
                    aria-label="Primer cognom: activate to sort column ascending">Lastname 1
                </th>
                <th class="sorting" data-column-index="5" role="columnheader" tabindex="0"
                    aria-controls="students_table" rowspan="1" colspan="1" style="width: 132px;"
                    aria-label="Segon cognom: activate to sort column ascending">Lastname 2
                </th>
                <th class="sorting" data-column-index="6" role="columnheader" tabindex="0"
                    aria-controls="students_table" rowspan="1" colspan="1" style="width: 54px;"
                    aria-label="Nom: activate to sort column ascending">
                    <a href="#" ng-click="sortType = 'name'; sortReverse = !sortReverse">
                        Name
                        <span ng-show="sortType == 'name' && !sortReverse" class="fa fa-caret-down"></span>
                        <span ng-show="sortType == 'name' && sortReverse" class="fa fa-caret-up"></span>
                    </a>
                </th>
                <th class="red sorting_disabled" data-column-index="9" role="columnheader" rowspan="1" colspan="1"
                    style="width: 151px;">Academic Course
                </th>
                <th ng-model="UF" ng-repeat="submodule in submodules" class="red sorting_disabled"
                    data-column-index="10" role="columnheader" rowspan="1" colspan="1"
                    style="width: 151px;">
                    $$submodule.study_submodules_shortname$$
                </th>

                <th class="hidden-480 sorting" data-column-index="13" role="columnheader" tabindex="0"
                    aria-controls="students_table" rowspan="1" colspan="1" style="width: 123px;"
                    aria-label="Observacions: activate to sort column ascending">Observaciones
                </th>
                <th class="sorting_disabled" data-column-index="14" role="columnheader" rowspan="1" colspan="1"
                    style="width: 79px;" aria-label="Accions&nbsp;&nbsp;&nbsp;&nbsp;">Acciones
                </th>
            </tr>
            </thead>

            <!-- IMPORTANT, class="list" have to be at tbody -->
            <tbody class="list" role="alert" aria-live="polite" aria-relevant="all">
            <tr ng-repeat="userEvaluations in finalArray| orderBy:sortType:sortReverse | filter:searchUser"
                ng-model="userEvaluations">
                <td class="foto image-thumbnail" href="#">
                    <img class="msg-photo" src="{{asset('/images/image.png')}}" alt="" style="max-width:50px;"
                         data-rel="tooltip" data-original-title="">

                </td>
                <td class="tipo">Tipo</td>
                <td class="oculto">Oculto</td>
                <td class="lastname1">Lastname 1</td>
                <td class="lastname2">Lastname 2</td>
                <td class="name">$$userEvaluations.name$$</td>
                <td class="aPeriod">Academic Period</td>
                <td class="uF" ng-repeat="subModuleEvaluations in userEvaluations.evaluations"
                    ng-model="subModuleEvaluations">

                    <select ng-model="marks " class="" ng-options="mark.mark_id as mark.mark_value for mark in allMarks"
                            title="Marks" ng-init="marks =  subModuleEvaluations.mark.mark_id"
                            ng-change="actionToDo(subModuleEvaluations.evaluation_id,userEvaluations.id,academicPeriod,subModuleEvaluations.studysubmodules.study_submodules_id,marks)">
                        <option value="">Evaluate</option>
                    </select>
                </td>

                <td class="observations hidden-480"><textarea id="comments" class="autosize-transition span12"
                                                              rows="1">Pendent</textarea>
                </td>
                <td class="actions">
                    <div class="hidden-phone visible-desktop action-buttons">
                        <a target="_blank"
                           href="http://localhost/ebre-escool/index.php/enrollment/enrollment_query_by_person/false/47475477G"
                           class="blue">
                            <i title="Consulta matrícula" class="icon-zoom-in bigger-130"></i>
                        </a>

                        <a target="_blank"
                           href="http://localhost/ebre-escool/index.php/attendance/mentoring_attendance_by_student/5/5119/45"
                           class="orange">
                            <i title="Consulta incidències" class="icon-bell bigger-130"></i>
                        </a>

                        <a href="#" class="green">
                            <i class="icon-pencil bigger-130"></i>
                        </a>
                        <a onclick="event.preventDefault();click_on_hidden_student(this);" id="hide_student_id_5119"
                           person_id="5119" classroomgroupid="45" teacher="104" academic_period_id="5" day="4"
                           action="hide" href="#" class="purple">
                            <i title="Amagar alumne" class="icon-eye-close bigger-130"></i>
                        </a>


                    </div>
                </td>


            </tr>

            </tbody>
        </table>

        <br/>
        <br/>

        <h4><b>Here you can see the real json data after create or delete</b></h4>
        <blockquote>
            $$ finalArray $$
        </blockquote>


    </div>



@endsection

@section('table_scripts')
    <script type="text/javascript" src="{{asset('/js/dynamic_table.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/bs-table.min.js')}}"></script>
@endsection