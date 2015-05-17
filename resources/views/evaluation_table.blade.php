@extends('app')

@section('content')

<div class="container" ng-app="testEvaluation" ng-controller="EvaluationTableController as EvaluationCtrl">
    <div class="row">
        <div class="col-md-4">
            <select ng-model="module" class="" ng-options="module.moduleId as module.shortName for module in modules.data"
                    title="Modules" ng-change="getSubModules(module)">
                <option value="">Modules</option>
            </select>
        </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-4">
                <select ng-model="moduleSubmodules" class="" ng-options="submodule.study_submodules_id as submodule.study_submodules_shortname for submodule in submodules"
                        title="SubModules">
                    <option value="">SubModules</option>
                </select>
            </div>
            <p> ID:$$moduleSubmodules$$</p>
            <hr/>
    </div>
<table class="table table-striped table-bordered table-hover dataTable" id="evaluations_table"
       aria-describedby="evaluations_table_info" style="width: 1315px;">
    <thead>
    <tr role="row">
        <th class="sorting_disabled" data-column-index="0" role="columnheader" rowspan="1" colspan="1"
            style="width: 37px;" aria-label="Foto">Foto
        </th>
        <th title="Tipus" class="sorting" data-column-index="2" role="columnheader" tabindex="0"
            aria-controls="evaluations_table" rowspan="1" colspan="1" style="width: 22px;"
            aria-label="T: activate to sort column ascending">T
        </th>
        <th title="Ocult" class="sorting" data-column-index="3" role="columnheader" tabindex="0"
            aria-controls="evaluations_table" rowspan="1" colspan="1" style="width: 26px;"
            aria-label="O: activate to sort column ascending">O
        </th>
        <th class="sorting" data-column-index="4" role="columnheader" tabindex="0" aria-controls="evaluations_table"
            rowspan="1" colspan="1" style="width: 128px;" aria-label="Primer cognom: activate to sort column ascending">
            Primer cognom
        </th>
        <th class="sorting" data-column-index="5" role="columnheader" tabindex="0" aria-controls="evaluations_table"
            rowspan="1" colspan="1" style="width: 124px;" aria-label="Segon cognom: activate to sort column ascending">
            Segon cognom
        </th>
        <th class="sorting" data-column-index="6" role="columnheader" tabindex="0" aria-controls="evaluations_table"
            rowspan="1" colspan="1" style="width: 50px;" aria-label="Nom: activate to sort column ascending">Nom
        </th>
        <th class="sorting_disabled" data-column-index="9" role="columnheader" rowspan="1" colspan="1"
            style="width: 41px;" aria-label="15:30">
            <center>
                <span data-rel="tooltip" data-original-title="15:30 - 16:30">
                    15:30
                </span>

            </center>
        </th>
        <th class="sorting_disabled" data-column-index="10" role="columnheader" rowspan="1" colspan="1"
            style="width: 111px;" aria-label="16:30 MP05 UF1 UF2 UF3">
            <center>
                <span data-rel="tooltip" data-original-title="16:30 - 17:30">
                    16:30
                </span>

                <p>
                    <span ondblclick="" id=""
                          studymoduleid="" data-rel="tooltip" class="label"
                          data-original-title="">
                        <i class=""></i>
                        <select ng-model="module1" class="" ng-options="module.moduleId as module.shortName for module in modules.data"
                                title="Modules" ng-change="getSubModules(module1)">
                            <option value="">Modules</option>
                            </select>
                    </span>
                </p>

                <div id="" class="">
                    <select ng-model="moduleSubmodules" class="" ng-options="submodule.study_submodules_id as submodule.study_submodules_shortname for submodule in submodules"
                            title="SubModules">
                        <option value="">SubModules</option>
                    </select>
                </div>

            </center>
        </th>
        <th class="red sorting_disabled" data-column-index="11" role="columnheader" rowspan="1" colspan="1"
            style="width: 111px;" aria-label="17:30 MP09 UF1 UF2 UF3">
            <center>
                <span class="bigger-120" data-rel="tooltip" data-original-title="17:30 - 18:30">
                    <i class="icon-check bigger-120"></i>
                    17:30
                </span>

                <p>
                    <span ondblclick="study_module_onclick(this);" id="span_study_module_274"
                          studymoduleid="274" data-rel="tooltip" class="label label-purple"
                          data-original-title="Programació de serveis i processos ( 274 ). Queralt Peris, Juan Manuel ( 40 ) ">
                        <i class="icon-group bigger-120"></i>
                        MP09
                    </span>
                </p>

                <div id="btn_group_11_274" class="btn-group">


                    <button onclick="study_submodule_on_click(this,'btn_group_11_274',179,11);" data-rel="tooltip"
                            class="btn btn-minier btn-inverse" id="btn_group_11_274_179" style="font-size: x-small;"
                            data-original-title="UF1. Seguretat i criptografia  (179) ( 30/11/-0001 - 30/11/-0001 )">
                        UF1
                        <i style="display:inline" id="btn_group_icon_11_274_179" class="icon-check bigger-120"></i>
                    </button>
                    <button onclick="study_submodule_on_click(this,'btn_group_11_274',180,11);" data-rel="tooltip"
                            class="btn btn-minier btn-grey" id="btn_group_11_274_180" style="font-size: x-small;"
                            data-original-title="UF2. Processos i fils (180) ( 30/11/-0001 - 30/11/-0001 )">
                        UF2
                        <i style="display:none" id="btn_group_icon_11_274_180" class="icon-check bigger-120"></i>
                    </button>
                    <button onclick="study_submodule_on_click(this,'btn_group_11_274',181,11);" data-rel="tooltip"
                            class="btn btn-minier btn-grey" id="btn_group_11_274_181" style="font-size: x-small;"
                            data-original-title="UF3. Sòcols i serveis (181) ( 30/11/-0001 - 30/11/-0001 )">
                        UF3
                        <i style="display:none" id="btn_group_icon_11_274_181" class="icon-check bigger-120"></i>
                    </button>


                </div>

            </center>
        </th>
        <th class="sorting_disabled" data-column-index="12" role="columnheader" rowspan="1" colspan="1"
            style="width: 111px;" aria-labe="19:00 MP03 UF4 UF5 UF6">
            <center>
                <span data-rel="tooltip" data-original-title="19:00 - 20:00">
                    19:00
                </span>

                <p>
                    <span ondblclick="study_module_onclick(this);" id="span_study_module_265"
                          studymoduleid="265" data-rel="tooltip" class="label "
                          data-original-title="Programació ( 265 ). Fernandez Morcillo, Cinta ( 38 ) ">
                        <i class="icon-group bigger-120"></i>
                        MP03
                    </span>
                </p>

                <div id="btn_group_13_265" class="btn-group">


                    <button onclick="study_submodule_on_click(this,'btn_group_13_265',164,13);" data-rel="tooltip"
                            class="btn btn-minier btn-inverse" id="btn_group_13_265_164" style="font-size: x-small;"
                            data-original-title="UF4. Programació orientada a objectes. Fonaments (164) ( 30/11/-0001 - 30/11/-0001 )">
                        UF4
                        <i style="display:inline" id="btn_group_icon_13_265_164" class="icon-check bigger-120"></i>
                    </button>
                    <button onclick="study_submodule_on_click(this,'btn_group_13_265',165,13);" data-rel="tooltip"
                            class="btn btn-minier btn-grey" id="btn_group_13_265_165" style="font-size: x-small;"
                            data-original-title="UF5. POO. Llibreries de classes fonamentals (165) ( 30/11/-0001 - 30/11/-0001 )">
                        UF5
                        <i style="display:none" id="btn_group_icon_13_265_165" class="icon-check bigger-120"></i>
                    </button>
                    <button onclick="study_submodule_on_click(this,'btn_group_13_265',166,13);" data-rel="tooltip"
                            class="btn btn-minier btn-grey" id="btn_group_13_265_166" style="font-size: x-small;"
                            data-original-title="UF6. POO. Introducció a la persistència en BD (166) ( 30/11/-0001 - 30/11/-0001 )">
                        UF6
                        <i style="display:none" id="btn_group_icon_13_265_166" class="icon-check bigger-120"></i>
                    </button>


                </div>

            </center>
        </th>
        <th class="sorting_disabled" data-column-index="13" role="columnheader" rowspan="1" colspan="1"
            style="width: 62px;" aria-label="20:00 MP02 UF3">
            <center>
                <span data-rel="tooltip" data-original-title="20:00 - 21:00">
                    20:00
                </span>

                <p>
                    <span ondblclick="study_module_onclick(this);" id="span_study_module_270"
                          studymoduleid="270" data-rel="tooltip" class="label "
                          data-original-title="Gestió de bases de dades ( 270 ). Fernandez Morcillo, Cinta ( 38 ) ">
                        <i class="icon-group bigger-120"></i>
                        MP02
                    </span>
                </p>

                <div id="btn_group_14_270" class="btn-group">


                    <button onclick="study_submodule_on_click(this,'btn_group_14_270',128,14);" data-rel="tooltip"
                            class="btn btn-minier btn-inverse" id="btn_group_14_270_128" style="font-size: x-small;"
                            data-original-title="UF3. Assegurament de la informació (128) ( 30/11/-0001 - 30/11/-0001 )">
                        UF3
                        <i style="display:inline" id="btn_group_icon_14_270_128" class="icon-check bigger-120"></i>
                    </button>


                </div>

            </center>
        </th>
        <th class="sorting_disabled" data-column-index="14" role="columnheader" rowspan="1" colspan="1"
            style="width: 62px;" aria-label="21:00 MP02 UF3">
            <center>
                <span data-rel="tooltip" data-original-title="21:00 - 22:00">
                    21:00
                </span>

                <p>
                    <span ondblclick="study_module_onclick(this);" id="span_study_module_270"
                          studymoduleid="270" data-rel="tooltip" class="label "
                          data-original-title="Gestió de bases de dades ( 270 ). Fernandez Morcillo, Cinta ( 38 ) ">
                        <i class="icon-group bigger-120"></i>
                        MP02
                    </span>
                </p>

                <div id="btn_group_15_270" class="btn-group">


                    <button onclick="study_submodule_on_click(this,'btn_group_15_270',128,15);" data-rel="tooltip"
                            class="btn btn-minier btn-inverse" id="btn_group_15_270_128" style="font-size: x-small;"
                            data-original-title="UF3. Assegurament de la informació (128) ( 30/11/-0001 - 30/11/-0001 )">
                        UF3
                        <i style="display:inline" id="btn_group_icon_15_270_128" class="icon-check bigger-120"></i>
                    </button>


                </div>

            </center>
        </th>
        <th class="hidden-480 sorting" data-column-index="15" role="columnheader" tabindex="0"
            aria-controls="evaluations_table" rowspan="1" colspan="1" style="width: 116px;"
            aria-label="Observacions: activate to sort column ascending">Observacions
        </th>
        <th class="sorting_disabled" data-column-index="16" role="columnheader" rowspan="1" colspan="1"
            style="width: 74px;" aria-label="Accions&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;">Accions&nbsp;&nbsp;&nbsp;&nbsp;</th>
    </tr>
    </thead>


    <tbody role="alert" aria-live="polite" aria-relevant="all">
    <tr class="odd">
        <td valign="top" colspan="14" class="dataTables_empty">No s'han trobat registres.</td>
    </tr>
    </tbody>
</table>




    </div>

    @endsection