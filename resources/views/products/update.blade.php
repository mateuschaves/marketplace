@include('templates.head')
<body>
@include('templates.menu')

<div class="container">
    <form action="{{route('product.edit.store', ['id' => $product->id])}}" method="post" enctype="multipart/form-data">

        <!--  Proteção CSRF   -->

    {{csrf_field()}}

    <!--  Nome do produto   -->

        <div class="form-group">
            <label for="name">Nome do produto</label>
            <input type="text" class="form-control" id="name" name="name"  value="{{$product->name}}" placeholder="Nome do produto">
        </div>

        <!--  Preço do produto ( por unidade )   -->

        <div class="form-group">
            <label class="" for="exampleInputAmount">Preço Unitário </label>
            <div class="input-group">
                <div class="input-group-addon">R$</div>
                <input type="text" class="form-control" id="exampleInputAmount" name="Unitprice" value="{{$product->Unitprice}}" placeholder="Preço Unitário">
            </div>
        </div>

        <!--  Preço  do produto ( 100 unidades )  -->

        <div class="form-group">
            <label class="" for="exampleInputAmount">Preço a cada 100 </label>
            <div class="input-group">
                <div class="input-group-addon">R$</div>
                <input type="text" class="form-control" id="exampleInputAmount" name="PriceOneHundred" value="{{$product->PriceOneHundred}}" placeholder="Preço a cada 100 unidades">
            </div>
        </div>


        <button type="submit" class="btn btn-default">Pronto </button>
    </form>
</div>


</body>
</html>