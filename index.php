<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> -->
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>

  <title>ENTREGAS ATRASADAS</title>
</head>

<body>
  <h1>Entregas atrasadas</h1>
  <div class="marcador-container">
  
  <label class="switch">
    <input type="checkbox" value="false" name="refreshCancel">
    <span class="slider round"></span>
  </label>

  <script>
    const toggleSwitch = document.querySelector("input[name='refreshCancel']");

    toggleSwitch.addEventListener("change", function() {
      if (toggleSwitch.checked) {
        console.log("oi mundo");
      }
    });
  </script>


  <?php
  // Ler o arquivo JSON
  $json = file_get_contents('entregas_atrasadas.json');
  // Decodificar o arquivo JSON em um array PHP
  $data = json_decode($json, true);
  // Loop sobre cada objeto no array de dados
  ?>
  
  <table class="table table-bordered">
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
    <?php
    foreach ($data as $obj) {
      $verde = substr('Cliente_c01_F0FFF0', -6);
      $azul = substr('Horas_Atrasadas_c02_00FFFF', -6);
    
      echo '
        <tbody>
          <tr>
            <td style ="background-color:#' . $verde . '"> ' . $obj['Cliente_c01_F0FFF0'] . ' </td>
            <td style ="background-color:#' . $verde . '">' . $obj['Romaneio_c01_F0FFF0'] . '</td>
            <td style ="background-color:#' . $verde . '">' . $obj['Transportador_c01_F0FFF0'] . '</td>
            <td style ="background-color:#' . $verde . '">' . $obj['Previsao_entrega_c01_F0FFF0'] . '</td>
            <td style ="background-color:#' . $verde . '">' . $obj['Logistica_c01_F0FFF0'] . '</td>
            <td style ="background-color:#' . $verde . '">' . $obj['Tentativas_entregas_c01_F0FFF0'] . '</td>
            <td style ="background-color:#' . $azul . '">' . $obj['Horas_Atrasadas_c02_00FFFF'] . '</td>
          </tr>
        </tbody>
        ';
      }
      ?>
  </table>
    </div>
</html>