let intervalID = ''
let tableEntregas = document.querySelector('#table-entregas')
let atualizacaoParada = false;

function atualizarEntregas() {

  let ajax = new XMLHttpRequest()
  ajax.open("GET", "entregas_atrasadas.json?t=" + new Date().getTime())
  // console.log(ajax)

  ajax.onreadystatechange = () => {
    if (ajax.readyState == 4 && ajax.status == 200) {

      let entregasAtrasadas = ajax.responseText
      let objEntregasAtrasadas = JSON.parse(entregasAtrasadas)
      console.log(objEntregasAtrasadas.length)

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
      </thead>
      `

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
              <td style ="background-color:#${azul}">${obj.Horas_Atrasadas_c02_00FFFF} 
              <button id="btn-modal" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Open modal for @getbootstrap</button>

              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form>
                        <div class="mb-3">
                          <label for="recipient-name" class="col-form-label">Recipient:</label>
                          <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                          <label for="message-text" class="col-form-label">Message:</label>
                          <textarea class="form-control" id="message-text"></textarea>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Send message</button>
                    </div>
                  </div>
                </div>
              </div></td>
            </tr>
          </tbody>
        `
      } //forin
      const toggleAtualizacaoAuto = document.querySelector('#toggle-atualizacao-auto')
      const divModal = document.querySelector('#exampleModal')
      
      toggleAtualizacaoAuto.addEventListener('change', () => {
        if (toggleAtualizacaoAuto.checked) {
          iniciarAtualizacaoAuto()
        } else {
          pararAtualizacaoAuto();
        }
      })

      // if (toggleAtualizacaoAuto.checked){
      //   divModal.addEventListener('shown.bs.modal', () => {
      //     pararAtualizacaoAuto();
      //   })
      //   divModal.addEventListener('hidden.bs.modal', () => {
      //     iniciarAtualizacaoAuto();
      //   })
      // }else if(!(toggleAtualizacaoAuto.checked)){
      //   divModal.addEventListener('shown.bs.modal', () => {
      //     console.log('nada')
      //   })
      //   divModal.addEventListener('hidden.bs.modal', () => {
      //     console.log('nada')
      //   })
      // }
      
    } //if200 & 4 
    else if (ajax.readyState == 4 && ajax.status == 404) {
      console.log('erro')
    } //if404

  } //onreadystate

  ajax.send()
  console.log("atualizarEntregas() concluido")
}//function atualizarEntregas()

function iniciarAtualizacaoAuto() {
  atualizarEntregas()
  intervalID = setInterval(atualizarEntregas, 4000);
  console.log('iniciarAtualizacaoAuto() concluido')
}

function pararAtualizacaoAuto() {
  clearInterval(intervalID)
  intervalID=''
  console.log("pararAtualizacaoAuto() concluido")
}

atualizarEntregas();





