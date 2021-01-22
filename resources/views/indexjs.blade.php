<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        <title>Paginação</title>
        <style>
            body {
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="card text-center">
                <div class="card-header">Tabela de cliente</div>
                <div class="card-body">
                    <table class="table table-hover" id="tabelaClientes">
                        <thead>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Sobrenome</th>
                            <th scope="col">E-mail</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>nome</td>
                                <td>sobrenome</td>
                                <td>email</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
        
        <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
    
        <script type="text/javascript">

            function montarLinha(cliente) {
                return '<tr> ' +
                    '<td>' + cliente.id +'</td>' +
                    '<td>' + cliente.nome +'</td>' +
                    '<td>' + cliente.sobrenome +'</td>' +
                    '<td>' + cliente.email +'</td>' +
                '</tr>';
            }

            function montarTabela(data) {
                $("#tabelaClientes>tbody>tr").remove();
                for (i=0; i<data.data.length; i++) {
                    s = montarLinha(data.data[i]);
                    $("#tabelaClientes>tbody").append(s);
                }
            }

            function carregarClientes(pagina) {
                $.get( '/json', {page: pagina}, function(resp){
                    console.log(resp);
                    montarTabela(resp);
                });
            }

            $(function() {
                carregarClientes(1);
            });
        </script>
    </body>
</html>
