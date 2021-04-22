@extends('layouts.layout')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/style_sheeps.css">

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
                        <table id="sheep_table" class="table table-striped table-bordered nowrap" tableStyle="width: auto;">
                            <thead>
                                <tr>
                                    <th>Dzīvnieka identifikācijas nr.</th>
                                    <th>Dzimums</th>
                                    <th>Dzimšanas datums</th>
                                    <th>Darbība</th>
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
                        return data.sheep_id;
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
                    return '<a class="btn btn-danger" id="deleteBtn" data-toggle="modal" data-target="#confirmModal" onclick="delete(' + row["id"] + ')">Dzēst  </a>'
                }
            }]
        });
    });
</script>