<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


  <link rel="stylesheet" href="style.css">

  <title>ENTREGAS ATRASADASadasdas</title>
</head>

<body>
  <header>
    <h1>Entregas atrasadas</h1>
    <hr>
  </header>

  <div class="entregas-container">
    
    <div class="form-check form-switch">
      <input class="form-check-input" type="checkbox" role="switch" id="toggle-atualizacao-auto">
      <label class="form-check-label" for="toggle-atualizacao-auto">Atualizar dados automaticamente</label>
    </div>

    <div id="div-table">
      <table id="table-entregas" class="table table-bordered">

      </table>
    </div>

    <script src="script.js"></script>
  </div>
</body>

</html>