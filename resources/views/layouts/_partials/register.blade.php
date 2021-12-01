    <div class="card mt-2 d-none" id="escolaCadastro">
        <div class="card-body">
            <form action="{{route('secretaria.escolas.store')}}" method="POST">
                @csrf
                <div class="row justify-content-center px-2">
                    <div class="col-9">
                        <label for="">Nome da Escola</label>
                        <input name="nome" type="text" class="form-control" placeholder="">
                    </div>

                    <div class="col-3">
                        <label for="">Quantidade de Alunos</label>
                        <input name="qtd_alunos" type="text" class="form-control text-center" placeholder="">
                    </div>
                </div>
                <div class="form-group mt-4 mb-0 d-flex justify-content-center">
                    <input type="submit" value="Cadastrar" class="btn btn-success px-3">
                </div>
            </form>
        </div>
    </div>
