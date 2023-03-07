<label class="switch">
  <input type="checkbox" value="false" name="refreshCancel">
  <span class="slider round"></span>
</label>

<div id="div-table">
  <table id="table-entregas" class="table table-bordered">

    <thead class="thead-dark">
      <tr>
        <th scope="col">Cliente</th>
        <th scope="col">Romaneio</th>
        <th scope="col">Transportador</th>
        <th scope="col">Previsão de Entrega</th>
        <th scope="col">Logística</th>
        <th scope="col">Tentativas de entrega</th>
        <th scope="col">Horas atrasadas</th>
      </tr>
    </thead>

  </table>
</div>

<script src="script.js"></script>
<script>
  //Rotina que atualiza a pagina a cada tempo determinado:
    function refreshPage() {
      console.log('refreshing')
      location.reload();
    }
    setInterval(refreshPage, 2000);
</script>