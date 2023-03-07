<table class='table table-striped' id="entregasTable">
  <thead>
    <tr>
      <th>Nome do Cliente</th>
      <th>Produto</th>
      <th>Data de Entrega Prevista</th>
      <th>Data de Entrega Real</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>
<button id="updateButton" class="btn btn-primary">Atualizar</button>

<script>
  $(document).ready(function() {
    updateTable();

    $("#updateButton").click(function() {
      updateTable();
    });
  });

  function updateTable() {
    $.ajax({
      url: "entregas_atrasadas.json",
      dataType: "json",
      success: function(data) {
        $("#entregasTable tbody").empty();
        for (var i = 0; i < data.length; i++) {
          var hexColor = data[i]['Cliente_c01_F0FFF0'].substr(-6);
          $("#entregasTable tbody").append(`
          "
          <tr>
            <td style='background-color:#" + hexColor + ";'>" + data[i]['Cliente_c01_F0FFF0'] + "</td>
            <td>" + data[i]['produto'] + "</td>
            <td>" + data[i]['data_entrega_prevista'] + "</td>
            <td>" + data[i]['data_entrega_real'] + "</td>
          </tr>");
          `
        }
      }
    });
  }
</script>