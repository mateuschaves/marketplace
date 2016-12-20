@include('templates.head')

<body>
@include('templates.menu')

<!--  Cálculo da encomenda-->

<script>
    function calcularValorEncomenda()
    {
        var amount = document.getElementById('amount').value;
        var unitPrice = document.getElementById('valorUnitario').value;

        var OrderPrice = unitPrice*amount;

        document.getElementById('price').value = OrderPrice.toFixed(2);
    }

    // Máscara javascript

    function mascara(o,f){
        v_obj=o
        v_fun=f
        setTimeout("execmascara()",1)
    }
    function execmascara(){
        v_obj.value=v_fun(v_obj.value)
    }
    function mtel(v){
        v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
        v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
        v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
        return v;
    }
    function id( el ){
        return document.getElementById( el );
    }
    window.onload = function(){
        id('phone').onkeypress = function(){
            mascara( this, mtel );
        }
    }


</script>
<div class="container">
    <form action="{{route('order', ['id' => $product->id])}}" method="post" enctype="multipart/form-data">


        <!--  Proteção CSRF   -->

             {{csrf_field()}}

        <!--  Foto do produto   -->

        <div class="col-sm-4 col-md-3 col-md-offset-2">

            <div class="thumbnail">
                <img src="{{route('product.image', ['filename' => $product->imageName])}}" class="img-responsive" style="width: 300px; height: 200px;"  >
            </div>
            <div class="caption">
                <h3>{{$product->name}}</h3>
            </div>

        </div>

        <div class="row">


            <input type="hidden" id="valorUnitario" value="{{$product->Unitprice}}">
            <!--  Quantidade   -->

            <div class="form-group col-sm-4 col-md-3">
                <label class="" for="amount">Quantidade</label>
                <input type="number" class="form-control" id="amount" name="amount" min="1"  onchange="calcularValorEncomenda()" name="Unitprice" placeholder="Quantidade">
                <p></p>


             <!-- Valor -->

                <div class="form-group ">
                    <label class="" for="price">Valor da encomenda </label>
                    <div class="input-group">
                        <div class="input-group-addon">R$</div>
                        <input type="text" class="form-control" id="price" name="price"  value="" placeholder="Preço da encomenda" readonly>
                    </div>
                </div>


                <!-- Contato -->

                <div class="form-group ">
                    <label class="" for="phone"> Deixe seu celular </label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Ex. (81) 0000-000" maxlength="15">
                </div>
                <!--  Nome   -->
                    <div class="form-group ">
                        <label class="" for="name">Seu nome </label>
                        <input type="text" class="form-control" id="name" name="name"   placeholder="Ex. Mateus Henrique" >
                    </div>

                <!--  Endereço   -->
                <div class="form-group ">
                    <label class="" for="addres">Seu endereço</label>
                    <input type="text" class="form-control" id="addres" name="address"  value="" placeholder="Ex. Rua major joão coelho, N° 305" >
                </div>

                <!-- Data de entrega -->
                <label class="" for="deliveryDate">Para qual dia ? </label>
                <input type="date" id="deliveryDate" name="deliveryDate" class="form-control">
                <br>
                <button type="submit" class="btn btn-default"> Encomendar </button>
            </div>

        </div>






    </form>
</div>


</body>
</html>