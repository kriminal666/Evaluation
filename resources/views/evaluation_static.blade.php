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
        <table id="evaluations_static" class="table table-striped table-bordered table-hover dataTable"
               ng-show="showTable">
            <thead>
            <tr role="row">
                <th class="sorting_disabled" data-column-index="0" role="columnheader" rowspan="1" colspan="1"
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
                    aria-label="Nom: activate to sort column ascending">Name
                </th>
                <th class="red sorting_disabled" data-column-index="9" role="columnheader" rowspan="1" colspan="1"
                    style="width: 151px;">Academic Course
                </th>
                <th class="red sorting_disabled" data-column-index="10" role="columnheader" rowspan="1" colspan="1"
                    style="width: 151px;">UF1
                </th>
                <th class="red sorting_disabled" data-column-index="11" role="columnheader" rowspan="1" colspan="1"
                    style="width: 151px;">UF2
                </th>
                <th class="red sorting_disabled" data-column-index="12" role="columnheader" rowspan="1" colspan="1"
                    style="width: 151px;">UF3
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
            <tfoot>
            </tfoot>
            <tbody role="alert" aria-live="polite" aria-relevant="all">
            <tr>
                <td><a class="image-thumbnail" href="#">
                        <img class="msg-photo" src="{{asset('/images/image.png')}}" alt="" style="max-width:50px;"
                             data-rel="tooltip" data-original-title="">
                    </a></td>
                <td>Tipo</td>
                <td>Oculto</td>
                <td>Mierdecilla</td>
                <td>DeLaBuena</td>
                <td ng-model="userId1">
                    Pepito
                </td>
                <td>2015 ------ $$userId1$$</td>
                <td>
                    <input type="hidden" ng-model="uf1"/>
                    <input type="hidden" ng-model="eval1"/>
                    <select id="select1" style="width: 50px;display:inline;" width="50" ng-model="marks1" class=""
                            ng-options="mark.mark_id as mark.mark_value for mark in allMarks"
                            title="Marks"
                            ng-change="actionToDo(eval1,userId1,academicPeriod,uf1,marks1)">
                        <option value="">--</option>
                    </select>

                </td>
                <td>
                    <input type="hidden" ng-model="uf2"/>
                    <input type="hidden" ng-model="eval2"/>
                    <select id="select2" style="width: 50px;display:inline;" width="50" ng-model="marks2" class=""
                            ng-options="mark.mark_id as mark.mark_value for mark in allMarks"
                            title="Marks"
                            ng-change="actionToDo(eval2,userId1,academicPeriod,uf2,marks2)">
                        <option value="">--</option>
                    </select>
                </td>
                <td>
                    <input type="hidden" ng-model="uf3"/>
                    <input type="hidden" ng-model="eval3"/>
                    <select id="select3" style="width: 50px;display:inline;" width="50" ng-model="marks3" class=""
                            ng-options="mark.mark_id as mark.mark_value  for mark in allMarks "
                            title="Marks"
                            ng-change="actionToDo(eval3,userId1,academicPeriod,uf3,marks3)">
                        <option value="">--</option>

                    </select>
                </td>
                <td class="hidden-480"><textarea id="comments" class="autosize-transition span12"
                                                 rows="1">Pendent</textarea></td>
                <td>
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
            <tr>

                <td><a class="image-thumbnail" href="#">
                        <img class="msg-photo" src="{{asset('/images/image.png')}}" alt="" style="max-width:50px;"
                             data-rel="tooltip" data-original-title="">
                    </a></td>
                <td>Tipo</td>
                <td>Oculto</td>
                <td>Cagoncillo</td>
                <td>Calzoncillo</td>
                <td ng-model="userId2">Pedrillo</td>
                <td>2015</td>
                <td>
                    <input type="hidden" ng-model="eval4"/>
                    <select id="select4" style="width: 50px;display:inline;" width="50" ng-model="marks4" class=""
                            ng-options="mark.mark_id as mark.mark_value for mark in allMarks"
                            title="Marks"
                            ng-change="actionToDo(eval4,userId2,academicPeriod,uf1,marks4)">
                        <option value="">--</option>
                    </select>
                </td>
                <td>
                    <input type="hidden" ng-model="eval5"/>
                    <select id="select5" style="width: 50px;display:inline;" width="50" ng-model="marks5" class=""
                            ng-options="mark.mark_id as mark.mark_value for mark in allMarks"
                            title="Marks"
                            ng-change="actionToDo(eval5,userId2,academicPeriod,uf2,marks5)">
                        <option value="">--</option>
                    </select>
                </td>
                <td>
                    <input type="hidden" ng-model="eval6"/>
                    <select id="select6" style="width: 50px;display:inline;" width="50" ng-model="marks6" class=""
                            ng-options="mark.mark_id as mark.mark_value  for mark in allMarks"
                            title="Marks"
                            ng-change="actionToDo(eval6,userId2,academicPeriod,uf3,marks6)">
                        <option value="">--</option>
                    </select>
                </td>
                <td class="hidden-480"><textarea id="comments" class="autosize-transition span12"
                                                 rows="1">Pendent</textarea></td>
                <td>
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
    </div>


@endsection