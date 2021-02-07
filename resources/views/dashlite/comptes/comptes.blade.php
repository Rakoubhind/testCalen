@extends("dashlite.app.base")


@section("content")

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12 mt-5">
                            <h6>Listes des Comptes :</h6>
                        </div>
                        <div class="col-sm-6 mt-3">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#addCompte"> <i
                                    class="fas fa-plus-circle"></i> Ajouter un compte</button>
                        </div>
                        <div class="modal fade" id="addCompte" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Nouveau Compte</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="name" class="col-md-3 col-form-label text-md-right">{{
                                                    __('Name') }}</label>

                                                <div class="col-md-8">
                                                    <input id="name" type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        name="name" value="{{ old('name') }}" required
                                                        autocomplete="name" autofocus>

                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="email" class="col-md-3 col-form-label text-md-right">{{
                                                    __('E-Mail') }}</label>

                                                <div class="col-md-8">
                                                    <input id="email" type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" required
                                                        autocomplete="email">

                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password" class="col-md-3 col-form-label text-md-right">{{
                                                    __('Password') }}</label>

                                                <div class="col-md-8">
                                                    <input id="password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" required autocomplete="new-password">

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="name"
                                                    class="col-md-3 col-form-label text-md-right">Role</label>
                                                <div class="col-md-8">
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="role_id">
                                                        @foreach ($roles as $role)
                                                        <option value="{{$role->id}}">{{$role['name']}}</option>
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


            <div class="nk-block nk-block-lg">

                <div class="card card-preview">
                    <div class="card-inner">
                        <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                            <thead>
                                <tr class="nk-tb-item nk-tb-head">
                                    <th class="nk-tb-col nk-tb-col-check">
                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                            <input type="checkbox" class="custom-control-input" id="uid">
                                            <label class="custom-control-label" for="uid"></label>
                                        </div>
                                    </th>
                                    <th class="nk-tb-col"><span class="sub-text">Nom Complet</span></th>
                                    <th class="nk-tb-col tb-col-mb"><span class="sub-text">Email</span></th>
                                    <th class="nk-tb-col tb-col-md"><span class="sub-text">Role</span></th>
                                    <th class="nk-tb-col nk-tb-col-tools text-right">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr class="nk-tb-item">
                                    <td class="nk-tb-col nk-tb-col-check">
                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                            <input type="checkbox" class="custom-control-input" id="uid1">
                                            <label class="custom-control-label" for="uid1"></label>
                                        </div>
                                    </td>
                                    <td class="nk-tb-col">
                                        <div class="user-card">
                                            <div class="user-info">
                                                <span>{{$user->name}}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                        <span class="tb-amount">{{$user->email}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-md">
                                        <span>{{$user->role->name}}</span>
                                    </td>

                                    <td class="nk-tb-col nk-tb-col-tools">
                                        <ul class="nk-tb-actions gx-1">
                                            <li class="nk-tb-action-hidden">
                                                <a href="{{route('users.edit', $user)}}" class="btn btn-trigger btn-icon"  data-toggle="modal" data-target="#editCompte{{$user->id}}" data-placement="top" title="Modifier">
                                                    <em class="icon ni ni-update"></em>
                                                </a>
                                            </li>
                                            <li class="nk-tb-action-hidden">
                                                <a href="{{route('users.destroy', $user)}}" class="btn btn-trigger btn-icon" data-toggle="modal" data-target="#deleteCompte{{$user->id}}" data-placement="top" title="Supprimer">
                                                    <em class="icon ni ni-trash"></em>
                                                </a>
                                            </li>

                                            <li>
                                                <div class="drodown">
                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    {{-- <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li><a href="#"><em class="icon ni ni-focus"></em><span>Quick View</span></a></li>
                                                            <li><a href="#"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                                            <li><a href="#"><em class="icon ni ni-repeat"></em><span>Transaction</span></a></li>
                                                            <li><a href="#"><em class="icon ni ni-activity-round"></em><span>Activities</span></a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="#"><em class="icon ni ni-shield-star"></em><span>Reset Pass</span></a></li>
                                                            <li><a href="#"><em class="icon ni ni-shield-off"></em><span>Reset 2FA</span></a></li>
                                                            <li><a href="#"><em class="icon ni ni-na"></em><span>Suspend User</span></a></li>
                                                        </ul>
                                                    </div> --}}
                                                </div>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <div class="modal fade" id="editCompte{{$user->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="editCompteLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modifier Compte</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{route('users.update', $user)}}">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label for="name" class="col-md-3 col-form-label text-md-right">{{
                                                            __('Name') }}</label>

                                                        <div class="col-md-8">
                                                            <input id="name" type="text" value="{{ old('name') ?? $user->name}}"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                name="name"  required
                                                                autocomplete="name" autofocus>

                                                            @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="email" class="col-md-3 col-form-label text-md-right" >{{
                                                            __('E-Mail') }}</label>

                                                        <div class="col-md-8">
                                                            <input id="email" type="email" value="{{ old('email') ?? $user->email}}"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                name="email"  required
                                                                autocomplete="email">

                                                            @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="password" class="col-md-3 col-form-label text-md-right ">{{
                                                            __('Password') }}</label>

                                                        <div class="col-md-8">
                                                            <input id="password" type="password" value="{{ old('password') ?? $user->password}}"
                                                                class="form-control @error('password') is-invalid @enderror"
                                                                name="password" required autocomplete="new-password">

                                                            @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="name"
                                                            class="col-md-3 col-form-label text-md-right">Role</label>
                                                        <div class="col-md-8">
                                                            <select class="form-select" aria-label="Default select example"
                                                                name="role_id">
                                                                @foreach ($roles as $role)
                                                                <option value="{{$role->id}}">{{$role['name']}}</option>
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
                                <div class="modal fade" id="deleteCompte{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <!-- <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                          <h4 class="modal-title custom_align" id="Heading">Supprimer cette entrée</h4>
                                        </div> -->
                                        <form action="{{route('users.destroy', $user)}}" method="get"  >
                                          @csrf
                                          <div class="modal-body">
                                            <div class="alert mt-3 "><span class="glyphicon glyphicon-warning-sign"></span>
                                            <b>Voulez vous supprimer ce compte?</b>   </div>

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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

@endsection
