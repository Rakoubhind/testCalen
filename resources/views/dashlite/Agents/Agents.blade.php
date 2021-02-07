@extends("dashlite.app.base")


@section("content")

     <!-- Content Header (Page header) -->
     <section class="content-header ml-4">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 mt-5 ">
                    <h3>Listes des Agents :</h3>
                </div>
                <div class="col-sm-6 mt-3">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#storeModal"> <i
                            class="fas fa-plus-circle"></i> Ajouter un Agent</button>
                </div>
                <div class="modal fade" id="storeModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Nouveau Agent</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{route("agent.store")}}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="Prenom" class="col-md-4 col-form-label text-md-right">{{ __('Prenom') }}</label>

                                        <div class="col-md-6">
                                            <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="firstname" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>

                                            @error('prenom')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>***</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                                        <div class="col-md-6">
                                            <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="lastname" value="{{ old('nom') }}" required autocomplete="nom">

                                            @error('nom')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="adresse" class="col-md-4 col-form-label text-md-right">{{ __('Adresse') }}</label>

                                        <div class="col-md-6">
                                            <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adress" required autocomplete="adresse">

                                            @error('adresse')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="departement" class="col-md-4 col-form-label text-md-right">{{ __('Departement') }}</label>

                                        <div class="col-md-6">
                                            <select class="form-control" aria-label="Default select example" name="departement">

                                                <option value="maarif">Maarif</option>
                                                <option value="elJadida">El Jadida</option>
                                                <option value="anfa">Oulfa</option>

                                            </select>
                                        </div>
                                    </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Ajouter</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Annuler</button>
                                        </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 mt-3">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Agents</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">

                                <thead>
                                    <tr class="nk-tb-item nk-tb-head">
                                        <th class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                <input type="checkbox" class="custom-control-input" id="uid">
                                                <label class="custom-control-label" for="uid"></label>
                                            </div>
                                        </th>
                                        <th class="nk-tb-col"><span class="sub-text">Nom</span></th>
                                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Prenom</span></th>
                                       <th class="nk-tb-col tb-col-lg"><span class="sub-text">Adresse</span></th>
                                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Departement</span></th>

                                        <th class="nk-tb-col nk-tb-col-tools text-right">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($agents as $agent)
                                    <tr class="nk-tb-item">
                                        <td class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                <input type="checkbox" class="custom-control-input" id="uid1">
                                                <label class="custom-control-label" for="uid1"></label>
                                            </div>
                                        </td>
                                        <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                            <span class="tb-amount">{{$agent->firstname}} </span>
                                        </td>
                                        <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                            <span class="tb-amount">{{$agent->lastname}}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                            <span class="tb-amount">{{$agent->adress}}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                            <span class="tb-amount">{{$agent->departement}}</span>
                                        </td>

                                        <td class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1">
                                                <li class="nk-tb-action-hidden">
                                                    <a href="{{route('agent.update', $agent)}}" class="btn btn-trigger btn-icon"  data-placement="top" title="Modifier" data-toggle="modal" data-target="#editAgent{{$agent->id}}">
                                                        <em class="icon ni ni-update"></em>
                                                    </a>
                                                </li>
                                                <li class="nk-tb-action-hidden">
                                                    <a href="{{route('users.destroy', $agent)}}" class="btn btn-trigger btn-icon"  data-placement="top" title="Supprimer" data-toggle="modal" data-target="#deleteAgent{{$agent->id}}">
                                                        <em class="icon ni ni-trash"></em>
                                                    </a>
                                                </li>

                                                <li>
                                                    <div class="drodown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>

                                    </tr>

                                <div class="modal fade" id="editAgent{{$agent->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="editCompteLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modifier agent</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{route('agent.update', $agent)}}">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label for="Prenom" class="col-md-4 col-form-label text-md-right">{{ __('Prenom') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="firstname" value="{{ old('prenom') ?? $agent->firstname}}" required autocomplete="prenom" autofocus>

                                                            @error('prenom')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>***</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="lastname" value="{{ old('nom') ?? $agent->lastname}}" required autocomplete="nom">

                                                            @error('nom')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="adresse" class="col-md-4 col-form-label text-md-right">{{ __('Adresse') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adress" value="{{ old('adress') ?? $agent->adress}}" required autocomplete="adresse">

                                                            @error('adresse')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="departement" class="col-md-4 col-form-label text-md-right">{{ __('Departement') }}</label>

                                                        <div class="col-md-6">
                                                            <select class="form-select form-select-lg  " aria-label="Default select example" name="departement" value="{{ old('departement') ?? $agent->departement}}">

                                                                <option value="maarif">Maarif</option>
                                                                <option value="elJadida">El Jadida</option>
                                                                <option value="anfa">Anfa</option>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Modifier</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Annuler</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                        <div class="modal fade" id="deleteAgent{{$agent->id}}" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title custom_align" id="Heading">Supprimer cette entrée</h4>
                                                </div> -->
                                                <form action="{{route('agent.destroy', $agent)}}" method="get"  >
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="alert mt-3 "><span class="glyphicon glyphicon-warning-sign"></span>
                                                    <b>Voulez vous supprimer cet Agent?</b>   </div>

                                                </div>
                                                <div class="modal-footer ">
                                                    <button type="submit" class="btn btn-success"><span
                                                        class="glyphicon glyphicon-ok-sign"></span> Oui</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                                        class="glyphicon glyphicon-remove"></span> Non</button>
                                                </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>

                                        @endforeach


                                        </table>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>



@endsection
