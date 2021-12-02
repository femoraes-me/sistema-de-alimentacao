   <div class="card mt-2 d-none" id="formEscola">
       <div class="card-body">

           <div class="d-none" id="divMessage">
               <div class="alert alert-dismissible fade show" role="alert" id="message">
                   <button type="button" class="close" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
           </div>
           
           <form>
               @csrf
               <div class="row justify-content-center px-2" id="formEscola">
                   <div class="col-9" id="divInputNome">
                       <label for="">Nome da Escola</label>
                       <input name="nome" type="text" class="form-control" id="nome">
                       <div class="invalid-feedback" id="nomeErrorMessage"></div>
                   </div>

                   <div class="col-3">
                       <label for="">Quantidade de Alunos</label>
                       <input name="qtd_alunos" type="text" class="form-control text-center" id="qtd_alunos">
                       <div class="invalid-feedback" id="qtd_alunosErrorMessage"></div>
                   </div>
               </div>
               <div class="form-group mt-4 mb-0 d-flex justify-content-center">
                   <button type="submit" class="btn btn-success px-3" id="btnCadastrar">Cadastrar</button>
               </div>
           </form>
       </div>
   </div>
