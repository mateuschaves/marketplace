@include('templates.head')
<body>
@include('templates.menu')

<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Tem certeza que deseja deletar esse produto  ?</h4>
                </div>
                <div class="modal-body">
                    <p>Essa ação irá deletar o produto do banco de dados</p>
                </div>
                <div class="modal-footer">
                    <a   id="confirmDelete"  class="btn btn-default" data-dismiss="modal">Sim</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>

        </div>
    </div>


    <table class="table table-hover" >
        <thead>
        <tr>
            <th>Nome</th>
            <th>Preço Unitário</th>
            <th>Preço a cada 100</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>

        @foreach($product_list as $product)


                <tr>
                    <td>{{$product->name}}</td>
                    <td>{{$product->Unitprice}}</td>
                    <td>{{$product->PriceOneHundred}}</td>
                    <td> <button class="btn btn-primary"> Editar </button>   &nbsp <button class="btn btn-danger" id="deletar" value="{{$product->id}}" onclick="setIdModal(this)" data-toggle="modal" data-target="#myModal"> Deletar </button></td>
                </tr>
    @endforeach
        </tbody>
    </table>
</div>


<script>

    function setIdModal(teste)
    {
        var id = teste.value;

        var campo = document.getElementById('confirmDelete');

        var link = 'http://duda.app/product/delete/' + id;

        document.getElementById("confirmDelete").setAttribute("onclick", "location.href='" + link + "'");

    }

</script>
</body>
</html>

