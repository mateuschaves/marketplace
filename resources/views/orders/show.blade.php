@include('templates.head')

<body>
@include('templates.menu')

<div class="container">
<h2 class="text-success text-center"> Sua encomenda foi feita com sucesso !  </h2>



    <div class="row">
<div class="col-sm-4 col-md-4 col-md-offset-4">
    <div class="thumbnail">
        <img src="{{route('product.image', ['filename' => $order->products->imageName])}}" class="img-responsive" style="width: 300px; height: 200px;"  >
    </div>
    <div class="caption">
    </div>
</div>
    </div>
    <br>
    <div class="row">
        <h3 class="text-center">
            Você encomendou   {{$order->amount}}      {{$order->products->name}}
        </h3>
    </div>

</div>

</body>
</html>