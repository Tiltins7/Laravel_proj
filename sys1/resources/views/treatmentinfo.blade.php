@extends('layouts.layout')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <link href="{{ asset("../css/style_treatment.css")}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".nav>li>a").removeClass("active"); //this will remove the active class from  
            //previously active menu item 
            $('#species').addClass('active');
        });
    </script>
</head>

<body>
    <div style="background-color:#e1ecf2;" class="jumbotron vertical-center ">
        <div class="container">
            <div class="card">
                <h5 class="card-title text-center">Ārstēšanās informācija</h5>
                <div class="card-body">
                    <div class="table-center" id="center-table  ">
                        <h2>Dzīvnieka ID: <b>{{$animal_id->sheep_id}} </b></h2>
                        <a type="button" id="btnAdd" class="btn btn-link" data-toggle="modal" data-target="#exampleModal"> + Pievienot</a>
                        <table id="treatment_table" class="display table table-striped table-bordered wrap" tableStyle="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Ārstēšanās sākums</th>
                                    <th>Diagnoze</th>
                                    <th>Zāļu nosaukums</th>
                                    <th>Deva <b>mg</b></th>
                                    <th>Ārstēšanās beigas</th>
                                    <th>Medikamenta izdalīšanās</th>
                                    <th>animal_id</th>
                                    <th>Lietotāja ID</th>
                                    <th style="text-align: center;">Darbība</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>

</body>

</html>

<script>
    $(document).ready(function() {
        var menus_table = $('#treatment_table').DataTable({
            ajax: {
                "url": "/treatmentinfo",
                /* use dataSrc:'' option in the ajax defintion so dataTable knows to expect an array instead of an object */
                "dataSrc": "",
                "type": "GET",
            },
            paging: true,
            processing: true,
            scrollX: true,
            scrollCollapse: true,

            lengthMenu: [
                [10, 25, 100],
                [10, 25, 100]
            ],

            'columns': [{
                    data: null,
                    render: function(data, type, row) {
                        return data.treatment_start_date;
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return data.diagnosis;
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return data.sanemtsMed_id;
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return data.deva;
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return data.treatment_end_date;
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return data.med_free_date;
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return data.user_id;
                    }
                },
                {
                    data: null,
                    className: "center",
                    defaultContent: ''
                }
            ],
            columnDefs: [{
                targets: -1,
                title: 'Darbības',
                orderable: false,
                render: function(data, type, row) {
                    return '<a class="btn btn-link edit" style="color:blue; padding:0;" > Labot</a>' +
                        ' / ' +
                        '<a type="button" name="delete" class="btn btn-link" style="color:red; padding:0;" href="animal_species/sheeps/' + row["id"] + '/delete">Delete</a>'
                }
            }]
        });
    });
</script>