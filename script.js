function botao(){
  //Rotina que adiciona um evento ao botão para que quando este checado faça algo:
  const toggleSwitch = document.querySelector("input[name='refreshCancel']");
  toggleSwitch.addEventListener("change", function() {
    if (toggleSwitch.checked) {
      console.log("oi mundo");
    }
  });
}
botao()

function ajaxTeste(){
  let ajax = new XMLHttpRequest()
  ajax.open("GET", "testeAjax.php")
  console.log(ajax)
  
}

function atualizarEntregas(){

  let ajax = new XMLHttpRequest()
  ajax.open("GET", "entregas_atrasadas.json")
  // console.log(ajax)
  
  ajax.onreadystatechange = () => {
    if (ajax.readyState == 4 && ajax.status == 200) {
  
      let entregasAtrasadas = ajax.responseText
      let objEntregasAtrasadas = JSON.parse(entregasAtrasadas)
      console.log(objEntregasAtrasadas)
  
      let marcadorContainer = document.querySelector('.marcador-container')
      let tableEntregas = document.querySelector('#table-entregas')
      tableEntregas.innerHTML = ''
  
      let verde = 'Cliente_c01_F0FFF0'.substring(12)
      let azul = 'Horas_Atrasadas_c02_00FFFF'.substring(20)
  
      for (let i in objEntregasAtrasadas) {
        let obj = objEntregasAtrasadas[i]
  
        tableEntregas.innerHTML += `
          <tbody>
            <tr>
              <td style ="background-color:#${verde}">${obj.Cliente_c01_F0FFF0}</td>
              <td style ="background-color:#${verde}">${obj.Romaneio_c01_F0FFF0}</td>
              <td style ="background-color:#${verde}">${obj.Transportador_c01_F0FFF0}</td>
              <td style ="background-color:#${verde}">${obj.Previsao_entrega_c01_F0FFF0}</td>
              <td style ="background-color:#${verde}">${obj.Logistica_c01_F0FFF0}</td>
              <td style ="background-color:#${verde}">${obj.Tentativas_entregas_c01_F0FFF0}</td>
              <td style ="background-color:#${azul}">${obj.Horas_Atrasadas_c02_00FFFF}</td>
            </tr>
          </tbody>
        `
        
      } //forin
      
    //Rotina que atualiza a pagina a cada tempo determinado:
      /* function refreshPage() {
        console.log('refreshing')
        location.reload();
      }
      setInterval(refreshPage, 2000); */
  
      /* function requisitarPagina() {
    
        // let ajax = new XMLHttpRequest()
    
        ajax.open('GET', "table.php")
        // console.log(ajax.readyState)
    
    
        if (ajax.readyState == 4 && ajax.status == 200) {
          console.log(ajax.readyState)
          console.log('requisitarpagina function')
          tableEntregas.innerHTML = ajax.responseText
        }
    
        // ajax.send()
      }
      requisitarPagina() */
      
    } //if200 & 4 
    else if (ajax.readyState == 4 && ajax.status == 404) {
      console.log('erro')
    }
    
  } //onreadystate
  
  ajax.send()
}
setInterval(atualizarEntregas, 5000);
