@extends("layouts.base")


@section("content")

     <!-- Content Header (Page header) -->
     <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Listes des Equipes :</h1>
                </div>
                <div class="col-sm-6 mt-3">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#storeModal"> <i
                            class="fas fa-plus-circle"></i> Ajouter une Equipe</button>
                </div>
                <div class="modal fade" id="storeModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Nouveau Equipe</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{route("team.store")}}">
                                    @csrf


                                    <div class="form-group row">
                                        <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                                        <div class="col-md-6">
                                            <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="name" value="{{ old('nom') }}" required autocomplete="nom">

                                            @error('nom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="society" class="col-md-4 col-form-label text-md-right">{{ __('Societé') }}</label>

                                        <div class="col-md-6">
                                            <input id="society" type="text" class="form-control @error('society') is-invalid @enderror" name="society" value="{{ old('society') }}" required autocomplete="society" autofocus>

                                            @error('society')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>***</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="adresse" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Téléphone') }}</label>

                                        <div class="col-md-6">
                                            <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="phone">

                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="installer" class="col-md-4 col-form-label text-md-right">{{ __('Responsable') }}</label>

                                        <div class="col-md-6">
                                            <select class="form-select form-select-lg  " aria-label="Default select example" name="user_id">
                                                @foreach ($installers as $installer)
                                                 <option value={{$installer->id}}>{{$installer->name}}</option>
                                                @endforeach
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
                        <li class="breadcrumb-item active">Comptes</li>
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
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nom </th>
                                        <th>Societé</th>
                                        <th>Email</th>
                                        <th>Téléphone</th>
                                        <th>Chef d'équipe</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teams as $team)
                                    <tr>
                                        <td>{{$team->name}}</td>
                                        <td>{{$team->society}}</td>
                                        <td>{{$team->email}}</td>
                                        <td>{{$team->phone}}</td>
                                        <td>{{$team->user->name}}</td>
                                        <td>
                                            <a href="{{route('team.update', $team)}}" class="btn btn-success" data-toggle="modal" data-target="#editTeam{{$team->id}}"><i class="fas fa-edit"></i></a>
                                            <a href="{{route('team.destroy', $team)}}" class="btn btn-danger" data-toggle="modal" data-target="#deleteTeam{{$team->id}}"><i
                                                    class="far fa-trash-alt" ></i></a>

                                        </td>
                                    </tr>

                                <div class="modal fade" id="editTeam{{$team->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="editCompteLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modifier l'équipe</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{route('team.update', $team)}}">
                                                    @csrf

                                                    <div class="form-group row">
                                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $team->name}}" required autocomplete="nom">

                                                            @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="society" class="col-md-4 col-form-label text-md-right">{{ __('Societé') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="society" type="text" class="form-control @error('society') is-invalid @enderror" name="society" value="{{ old('society') ?? $team->society}}" required autocomplete="society" autofocus>

                                                            @error('society')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>***</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $team->email}}" required autocomplete="email">

                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Téléphone') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ?? $team->phone}}" required autocomplete="phone">

                                                            @error('phone')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="installer" class="col-md-4 col-form-label text-md-right">{{ __('Responsable') }}</label>

                                                        <div class="col-md-6">
                                                            <select class="form-select form-select-lg  " aria-label="Default select example" name="user_id">
                                                                @foreach ($installers as $installer)
                                                                 <option value={{$installer->id}}>{{$installer->name}}</option>
                                                                @endforeach
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

                                        <div class="modal fade" id="deleteTeam{{$team->id}}" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title custom_align" id="Heading">Supprimer cette entrée</h4>
                                                </div> -->
                                                <form action="{{route('team.destroy', $team)}}" method="get"  >
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="alert mt-3 "><span class="glyphicon glyphicon-warning-sign"></span>
                                                    <b>Voulez vous supprimer cet Equipe?</b>   </div>

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
