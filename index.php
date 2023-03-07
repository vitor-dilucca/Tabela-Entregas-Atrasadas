<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="style.css">

  <title>ENTREGAS ATRASADAS</title>
</head>

<body>
  <h1>Entregas atrasadas</h1>
  <div class="marcador-container">

    <label class="switch">
      <input type="checkbox" value="false" name="refreshCancel">
      <span class="slider round"></span>
    </label>

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
    <!-- ${objEntregasAtrasadas['0'].Cliente_c01_F0FFF0} -->
    
  </div>
</body>


<script>
  //Rotina que atualiza a pagina a cada tempo determinado:
  /* function refreshPage() {
    console.log('refreshing')
    location.reload();
  }
  setInterval(refreshPage, 7000); */

  //Rotina que adiciona um evento ao botão para que quando este checado faça algo:
  /* const toggleSwitch = document.querySelector("input[name='refreshCancel']");
  toggleSwitch.addEventListener("change", function() {
    if (toggleSwitch.checked) {
      console.log("oi mundo");
    }
  }); */

  let ajax = new XMLHttpRequest()
  ajax.open("GET", "entregas_atrasadas.json")
  console.log(ajax)

  ajax.onreadystatechange = () => {
    if (ajax.readyState == 4 && ajax.status == 200) {

      let entregasAtrasadas = ajax.responseText
      let objEntregasAtrasadas = JSON.parse(entregasAtrasadas)
      console.log(objEntregasAtrasadas)

      let marcadorContainer = document.querySelector('.marcador-container')
      let tableEntregas = document.querySelector('#table-entregas')

      // $verde = substr('Cliente_c01_F0FFF0', -6);
      //   $azul = substr('Horas_Atrasadas_c02_00FFFF', -6);

      //   echo '
      //   <tbody>
      //     <tr>
      //       <td style ="background-color:#' . $verde . '"> ' . $obj['Cliente_c01_F0FFF0'] . ' </td>
      //       <td style ="background-color:#' . $verde . '">' . $obj['Romaneio_c01_F0FFF0'] . '</td>
      //       <td style ="background-color:#' . $verde . '">' . $obj['Transportador_c01_F0FFF0'] . '</td>
      //       <td style ="background-color:#' . $verde . '">' . $obj['Previsao_entrega_c01_F0FFF0'] . '</td>
      //       <td style ="background-color:#' . $verde . '">' . $obj['Logistica_c01_F0FFF0'] . '</td>
      //       <td style ="background-color:#' . $verde . '">' . $obj['Tentativas_entregas_c01_F0FFF0'] . '</td>
      //       <td style ="background-color:#' . $azul . '">' . $obj['Horas_Atrasadas_c02_00FFFF'] . '</td>
      //     </tr>
      //   </tbody>
      //   ';
      let verde = 'Cliente_c01_F0FFF0'.substring(12)
      console.log(verde)
      
      for(let i in obje
      )
      tableEntregas.innerHTML += `
        <tbody>
          <tr>
            <td style ="background-color:#${verde}">${objEntregasAtrasadas}</td>
            <td>Roma</td>
            <td>nomedotranpso</td>
            <td>data</td>
            <td>logisictica sela</td>
            <td>numero 2</td>
            <td>horas</td>
          </tr>
        </tbody>
      `




    } else if (ajax.readyState == 4 && ajax.status == 404) {
      console.log('erro')
    }
  }
  ajax.send()
</script>

</html>