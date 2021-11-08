@extends('layouts.admin')

@section('content')
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid mt-5">
            <div class="form-group row">
                <div class="col-sm-8 mb-3 mb-sm-0">
                    <!-- Page Heading -->
                    <h1 class="h2 mb-2 text-gray-800">Estoque de Alimentos</h1>
                </div>
                <div class="col-sm-4">
                    <!--- Botão de Cadastro -->
                    <div class="my-2"></div>
                    <a href="/alimentos" class="btn letra btn-color btn-icon-split icon-white">
                        <span class="icon text-white-50">
                            <i class="fas fa-apple-alt"></i>
                        </span>
                        <span class="text">Cadastrar alimentos</span>
                    </a>
                </div>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4 espaco">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-dark fnd-bdr">
                                <tr>
                                    <th>ID</th>
                                    <th>Alimento</th>
                                    <th>Unidade</th>
                                    <th>Quantidade</th>
                                </tr>
                            </thead>
                            <tfoot class="thead-dark fnd-bdr">
                                <tr>
                                    <th>ID</th>
                                    <th>Alimento</th>
                                    <th>Unidade</th>
                                    <th>Quantidade</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                </tr>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>63</td>
                                </tr>
                                <tr>
                                    <td>Ashton Cox</td>
                                    <td>Junior Technical Author</td>
                                    <td>San Francisco</td>
                                    <td>66</td>
                                </tr>
                                <tr>
                                    <td>Cedric Kelly</td>
                                    <td>Senior Javascript Developer</td>
                                    <td>Edinburgh</td>
                                    <td>22</td>
                                </tr>
                                <tr>
                                    <td>Airi Satou</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>33</td>
                                </tr>
                                <tr>
                                    <td>Brielle Williamson</td>
                                    <td>Integration Specialist</td>
                                    <td>New York</td>
                                    <td>61</td>
                                </tr>
                                <tr>
                                    <td>Herrod Chandler</td>
                                    <td>Sales Assistant</td>
                                    <td>San Francisco</td>
                                    <td>59</td>
                                </tr>
                                <tr>
                                    <td>Rhona Davidson</td>
                                    <td>Integration Specialist</td>
                                    <td>Tokyo</td>
                                    <td>55</td>
                                </tr>
                                <tr>
                                    <td>Colleen Hurst</td>
                                    <td>Javascript Developer</td>
                                    <td>San Francisco</td>
                                    <td>39</td>
                                </tr>
                                <tr>
                                    <td>Sonya Frost</td>
                                    <td>Software Engineer</td>
                                    <td>Edinburgh</td>
                                    <td>23</td>
                                </tr>
                                <tr>
                                    <td>Jena Gaines</td>
                                    <td>Office Manager</td>
                                    <td>London</td>
                                    <td>30</td>
                                </tr>
                                <tr>
                                    <td>Quinn Flynn</td>
                                    <td>Support Lead</td>
                                    <td>Edinburgh</td>
                                    <td>22</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
@endsection
