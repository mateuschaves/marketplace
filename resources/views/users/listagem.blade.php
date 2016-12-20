@include('templates.head')
<body>
@include('templates.menu')

<div class="container">
  <table class="table table-hover">
      <thead>
              <tr>
                  <th> Nome </th>
                  <th> Email </th>
                  <th> Ações </th>
              </tr>
      </thead>
      @foreach($users as $user)
          <tbody>
                <tr>
                    <tr>
                      <td> <a href="{!! url('show/client/'.$user->id) !!}">  {{$user->name}} </a></td>
                      <td> {{$user->email}} </td>
                      <td> <a href="#"> Editar </a> &nbsp <a href="#"> Deletar</a> </td>
                    </tr>
                </tr>
          </tbody>
      @endforeach
  </table>
</div>
