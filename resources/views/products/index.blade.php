@include('templates.head')


<body>

@include('templates.menu')

<div class="container">

@foreach($products as $product)
            <div class="col-sm-4 col-md-3">
                <div class="thumbnail">

                    <img src="{{route('product.image', ['filename' => $product->imageName ])}}" class="img-responsive" style="width: 300px; height: 200px;"  >
                    <div class="caption">
                        <h3>{{$product->name}}</h3>

                        @if($product->availability == 0)

                            <p class="bg-danger"> Produto indisponível </p>

                        @elseif($product->availability == 1)

                            <p>Preço unitário: R$ {{$product->Unitprice}}</p>
                            <p>Preço (Centro): R$ {{$product->PriceOneHundred}}</p>
                            <p><a href="{{url('order/product/'. $product->id)}}" class="btn btn-primary" role="button">Encomendar</a> </p>

                        @endif
                    </div>
                </div>
            </div>
@endforeach
</div>

</body>
</html>