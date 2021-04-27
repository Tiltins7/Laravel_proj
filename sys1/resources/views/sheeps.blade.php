@extends('layouts.layout')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>


    <link rel="stylesheet" type="text/css" href="../css/style_sheeps.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

                <h5 class="card-title text-center">Aitu Saraksts</h5>
                <div class="card-body">

                    <div class="table-center" id="center-table  ">
                        <a type="button" id="btnAdd" class="btn btn-link" data-toggle="modal" data-target="#exampleModal"> + Pievienot</a>
                        <table id="sheep_table" class="table table-striped table-bordered nowrap" tableStyle="width: auto;">
                            <thead>
                                <tr>
                                    <th>Dzīvnieka identifikācijas nr.</th>
                                    <th>Dzimums</th>
                                    <th>Dzimšanas datums</th>
                                    <th style="text-align: center;">Darbība</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Pievienot modalais -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-center" id="exampleModalLabel">Pievienot jaunu dzīvnieku</h3>
                </div>

                <form class="form" style="text-align:left; padding: 10px;" action="submit" method="POST">
                    @csrf

                    <div class="form-group row">
                        <label for="id_nr" class="col-sm-4 col-form-label">Identifikācijas nr.:*</label>
                        <div class="col-sm-8">
                            <input name="id_nr" placeholder="Identifikācijas numurs" class="form-control" id="id_nr">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="dzimums" class="col-sm-4 col-form-label">Dzimums:*</label>
                        <div class="col-sm-8">
                            <!-- <input  class="form-control" id="dzimums"> -->
                            <select name="dzimums" class="form-control" id="dzimums">
                                <option>Vīriešu</option>
                                <option>Sieviešu</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="vecums" class="col-sm-4 col-form-label">Dzimšanas datums:*</label>
                        <div class="col-sm-8">
                            <input type="date" value="2020-08-19" name="vecums" class="form-control" placeholder="Dzimšanas datums">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">Aizvērt</button>
                        <button class="btn btn-primary" type="submit">Pievienot</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Labošanas logs -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-center" id="exampleModalLabel">Pievienot jaunu dzīvnieku</h3>
                </div>

                <form class="form" style="text-align:left; padding: 10px;" action="/sheeps" id="editForm" method="POST">
                    @csrf
                    {{method_field('PUT')}}

                    <div class="form-group row">
                        <label for="eid_nr" class="col-sm-4 col-form-label">Identifikācijas nr.:*</label>
                        <div class="col-sm-8">
                            <input name="eid_nr" placeholder="Identifikācijas numurs" class="form-control" id="eid_nr">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="edzimums" class="col-sm-4 col-form-label">Dzimums:*</label>
                        <div class="col-sm-8">
                            <!-- <input name="edzimums" class="form-control" placeholder="Dzimums" id="edzimums"> -->
                            <select name="edzimums" class="form-control" id="edzimums">
                                <option>Vīriešu</option>
                                <option>Sieviešu</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="evecums" class="col-sm-4 col-form-label">Dzimšanas datums:*</label>
                        <div class="col-sm-8">
                            <input id="evecums" type="date" value="2020-08-19" name="evecums" class="form-control" placeholder="Dzimšanas datums">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">Aizvērt</button>
                        <button class="btn btn-primary" type="submit">Atjaunot datus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>

<script>
    $(document).ready(function() {
        var menus_table = $('#sheep_table').DataTable({
            ajax: {
                "url": "sheeps",
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
                        return '<a style="font-weight: bold; color: black; " href="sheeps/' + data.sheep_id + '">' + data.sheep_id + '</a>'
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return data.dzimums;
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return data.vecums;
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
                        '<a type="button" name="delete" class="btn btn-link" style="color:red; padding:0;" href="animal_species/sheeps/' + row["id"] + '/delete">Dzēst</a>'
                }
            }]
        });
        menus_table.on('click', '.edit', function() {

            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent');
            }

            var data = menus_table.row($tr).data();
            console.log(data);

            $('#eid_nr').val(data['sheep_id']);
            $('#edzimums').val(data['dzimums']);
            $('#evecums').val(data['vecums']);

            $('#editForm').attr('action', '/sheeps/' + data['id']);
            $('#editModal').modal('show');
        })
    });
</script>