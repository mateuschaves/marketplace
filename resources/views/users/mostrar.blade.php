@include('templates.head')

<body>

@include('templates.menu')

<div class="container">

        <h1 class="text-center"> Encomendas de {!! $user->name !!} </h1>

    <table class="table table-hover">
            <thead>
            <tr>
                <th> Quantidade </th>
                <th> Preço </th>
                <th> Produto </th>
                <th> Data de entrega </th>
            </tr>
            </thead>

            <tbody>
                    @foreach($orders as $o)
                        <tr>
                            <td>{{$o->amount}}</td>
                            <td>{{$o->price}}</td>
                            <td>{{$o->products->name}}</td>
                            <td>{{$o->deliveryDate}}</td>
                        </tr>
                    @endforeach
            </tbody>

    </table>

</div>

</body>

</html>
