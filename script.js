let intervalID = ''

function atualizarEntregas(){

  let ajax = new XMLHttpRequest()
  ajax.open("GET", "entregas_atrasadas.json?t=" + new Date().getTime())
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
  
      tableEntregas.innerHTML += `
      <thead class="table-dark">
        <tr>
          <th scope="col">Cliente</th>
          <th scope="col">Romaneio</th>
          <th scope="col">Transportador</th>
          <th scope="col">Previsão de Entrega</th>
          <th scope="col">Logística</th>
          <th scope="col">Tentativas de entrega</th>
          <th scope="col">Horas atrasadas</th>
        </tr>
      </thead>`

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
      
    } //if200 & 4 
    else if (ajax.readyState == 4 && ajax.status == 404) {
      console.log('erro')
    }
    
  } //onreadystate
  
  ajax.send()
}

function iniciarAtualizacaoAuto(){
  intervalID = setInterval(atualizarEntregas, 4000);
  console.log('Atualizando dados')
}

function pararAtualizacaoAuto(){
  clearInterval(intervalID)
  console.log("Parada atualizaçao automatica")
}

iniciarAtualizacaoAuto();

const toggleAtualizacaoAuto = document.querySelector('#toggle-atualizacao-auto')
toggleAtualizacaoAuto.addEventListener('change', ()=>{
  if (!(toggleAtualizacaoAuto.checked)){
    pararAtualizacaoAuto();
  }else{
    iniciarAtualizacaoAuto()
  }
})
