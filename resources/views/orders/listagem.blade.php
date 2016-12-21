@include('templates.head')

<body>

@include('templates.menu')

<div class="container">

    <h2 class="text-center"> Encomendas </h2>
    <br>
    <table class="table table-hover">
        <thead>
        <tr>
            <th> Nome </th>
            <th> Telefone </th>
            <th>  Endereço </th>
            <th>  Quantidade  </th>
            <th>  Produto </th>
            <th>  Valor </th>
            <th>  Ações </th>
        </tr>
        </thead>

        <tbody>

        @foreach($orders as $order)

            <tr>
                <td>{{$order->name}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->address}}</td>
                <td>{{$order->amount}}</td>
                <td>{{$order->products->name}}</td>
                <td> R$ {{$order->price}}</td>
                <td><a href="{{route('order.delivered', ['id' => $order->id])}}"> Marcar como entregue </a> </td>
            </tr>

        @endforeach

        </tbody>
    </table>

</div>

</body>
</html>
