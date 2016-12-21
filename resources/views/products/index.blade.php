@include('templates.head')


<body>

@include('templates.menu')

<div class="container">

    <div class="row search">
        <form action="{{route('search')}}" method="post">


            {{csrf_field()}}


            <div class="col-lg-6 col-lg-offset-3">
                <div class="input-group">
                    <input type="search" name="search" class="form-control" placeholder="Buscar por produtos">
                    <span class="input-group-btn">
        <button class="btn btn-default" type="submit">Go!</button>
                </span>
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
        </form>
    </div>



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