@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Home</div>

                    <div class="panel-body">
                        You are logged in!<br/>
                        <blockquote>
                            <p><strong>Here create new evaluation and you can show one user evaluations</strong></p>
                            <a href="/test"> Create Evaluation</a>
                        </blockquote>
                        <blockquote>
                            <p><strong>Here update users module/submodule evaluations. Soft delete and destroy
                                    it.</strong></p>
                            <a href="/table_test">Evaluation-table</a>
                        </blockquote>
                        <blockquote>
                            <p><strong>This still don't work's with CRUD</strong></p>
                            <p>Change script in app.blade to load dynamic_table.js</p>
                            <a href="/table_testb">Evaluation-dinamic</a>
                        </blockquote>
                        <blockquote>
                            <p><strong>This works with crud</strong></p>
                            <p>change script in app.blade to load static_table.js and dataTables scripts </p>
                            <a href="/table_static">Evaluation-static</a>
                        </blockquote>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
