@extends("theme.$theme.layout")
@section('titulo')
Gift Card
@endsection

@section('styles')

    
@endsection



@section('contenido')

<div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
          <h3 class="display-4 m-2 pb-2" >Activacion Gif Cards</h3>  
      </div>
      <div class="col-md-6">
        
      </div>
      
        
    </div>
    <div class="row">
        <div class="col-md-6" >
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            
        <form action="{{route('generarGiftCard')}}" name="formulario" method="POST" onsubmit="limpiar()">
          @csrf

          <div class="form-row">
              <div class="form-group col-md-12">
                <label for="inputPassword4">Cantidad de tarjetas</label>
              <input type="number" class="form-control" id="Cantidad" name="Cantidad"  required >
              </div>
           
            </div>
                {{-- <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Desde</label>
                  <input type="number" class="form-control" id="Desde" name="Desde"  value="{{$idBD}}" required readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">hasta</label>
                    <input type="number" class="form-control" id="hasta" name="hasta"  required>
                  </div>
                </div> --}}
               
                <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputCity">Monto</label>
                          <select name="Monto" class="form-control">
                            <option value="">Selecione</option>
                            <option value="20000">$20.000</option>
                            <option value="40000">$40.000</option>
                            <option value="60000">$60.000</option>
                            <option value="100000">$100.000</option>
                          </select>
                        </div>
                       {{-- <div class="form-group col-md-6">
                            <label for="inputPassword4">Fecha Vencimiento</label>
                            <input type="date" class="form-control" id="FechaVencimiento" name="FechaVencimiento"  required>
                       </div> --}}
                      </div>
                <div class="form-group col-md-12 btn-group btn-group-block">
                <button type="submit" class="btn btn-success" onclick="limpiarFormulario()">Activar</button>
                </div>
              </form>

              
              <div class="card-group">
                  <div class="card">
                    <img class="card-img-top" src="{{asset("giftcard/img/20.000.jpg")}}" alt="Card image cap">
                    <div class="card-body">
                      @if (empty($cantGift[0]))
                      <h5 class="card-title">Stock: <strong>0</strong> </h5>
                      @else
                      <h5 class="card-title">Stock: <strong>{{$cantGift[0]->CantidadGift}}</strong> </h5>
                      @endif
                      <hr>
                      <p class="card-text">  <a href="{{route('cargarCodigos',20000)}}" class="btn btn-danger"> <i class="fas fa-file-upload"></i> </a>  </p>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">GiftCard $20.000</small>
                    </div>
                  </div>
                  <div class="card">
                    <img class="card-img-top" src="{{asset("giftcard/img/40.000.jpg")}}" alt="Card image cap">
                    <div class="card-body">
                        @if (empty($cantGift[1]))
                        <h5 class="card-title">Stock: <strong>0</strong> </h5>
                        @else
                        <h5 class="card-title">Stock: <strong>{{$cantGift[1]->CantidadGift}}</strong> </h5>
                        @endif
                        <hr>
                        <p class="card-text">  <a href="{{route('cargarCodigos',40000)}}" class="btn btn-danger "> <i class="fas fa-file-upload"></i> </a>  </p>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">GiftCard $40.000</small>
                    </div>
                  </div>
                  <div class="card">
                    <img class="card-img-top" src="{{asset("giftcard/img/60.000.jpg")}}" alt="Card image cap">
                    <div class="card-body">
                        @if (empty($cantGift[2]))
                        <h5 class="card-title">Stock: <strong>0</strong> </h5>
                        @else
                        <h5 class="card-title">Stock: <strong>{{$cantGift[2]->CantidadGift}}</strong> </h5>

                        @endif
                        <hr>
                        <p class="card-text">  <a href="{{route('cargarCodigos',60000)}}" class="btn btn-danger"> <i class="fas fa-file-upload"></i> </a>  </p>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">GiftCard $60.000</small>
                    </div>
                  </div>
                  <div class="card">
                    <img class="card-img-top" src="{{asset("giftcard/img/100.000.jpg")}}" alt="Card image cap">
                    <div class="card-body">
                        @if (empty($cantGift[3]))
                        <h5 class="card-title">Stock: <strong>0</strong> </h5>
                        @else
                        <h5 class="card-title">Stock: <strong>{{$cantGift[3]->CantidadGift}}</strong> </h5>
                        @endif
                        <hr>
                    <p class="card-text">  <a href="{{route('cargarCodigos',100000)}}" class="btn btn-danger"> <i class="fas fa-file-upload"></i> </a>  </p>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">GiftCard $100.000</small>
                    </div>
                  </div>
                </div>




        </div>
        <div class="col-md-6">
         
          <table id="tarjetas" class="table table-bordered table-hover dataTable">
            <thead>
              <tr>
                <th scope="col" style="text-align:center">codigo</th>
                <th scope="col" style="text-align:center"> Monto Tarjeta</th>
              </tr>
            </thead>
              @if (empty($giftCreadas))
                  
              @else
              <tbody>
                  @foreach($giftCreadas as $item)
                    <tr>
                      <th >{{$item->TARJ_CODIGO}}</th>
                      <td style="text-align:center">{{$item->TARJ_MONTO_INICIAL}}</td>
                    </tr>
                    @endforeach
                  </tbody>   
              @endif
                      
          </table>

          
            
        </div>
    </div>

</div>

@endsection
 <script>
    function limpiar() {
    setTimeout('document.formulario.reset()',200);
    return false;
}
</script> 

@section('script')
<script>
  $(document).ready(function() {
    $('#tarjetas').DataTable( {
        dom: 'Bfrtip',
        buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
            
        ],
          "language":{
        "info": "_TOTAL_ registros",
        "search":  "Buscar",
        "paginate":{
          "next": "Siguiente",
          "previous": "Anterior",
        
      },
      "loadingRecords": "cargando",
      "processing": "procesando",
      "emptyTable": "no hay resultados",
      "zeroRecords": "no hay coincidencias",
      "infoEmpty": "",
      "infoFiltered": ""
      }
    } );
  } );
  </script>
  <link rel="stylesheet" href="{{asset("assets/$theme/plugins/datatables-bs4/css/buttons.dataTables.min.css")}}">
  <link rel="stylesheet" href="{{asset("assets/$theme/plugins/datatables-bs4/css/jquery.dataTables.min.css")}}">
  <script src="{{asset("js/jquery-3.3.1.js")}}"></script>
  <script src="{{asset("js/jquery.dataTables.min.js")}}"></script>
  <script src="{{asset("js/dataTables.buttons.min.js")}}"></script>
  <script src="{{asset("js/buttons.flash.min.js")}}"></script>
  <script src="{{asset("js/jszip.min.js")}}"></script>
  <script src="{{asset("js/pdfmake.min.js")}}"></script>
  <script src="{{asset("js/vfs_fonts.js")}}"></script>
  <script src="{{asset("js/buttons.html5.min.js")}}"></script>
  <script src="{{asset("js/buttons.print.min.js")}}"></script>
  <script src="{{asset("js/validarRUT.js")}}"></script>

<script src="{{asset("js/ajaxproductospormarca.js")}}"></script>

@endsection