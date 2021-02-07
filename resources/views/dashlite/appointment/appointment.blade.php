@extends("dashlite.app.base")


@section("content")

<!-- Content Header (Page header) -->
<section class="content-header ml-4">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 mt-5 ">
                <h3>Listes des Rendez-vous:</h3>
            </div>
            <div class="col-sm-6 mt-3">
                <a href="/addAppointment" class="btn btn-primary"> <i
                        class="fas fa-plus-circle"></i> Ajouter un Rendez-vous</a>
            </div>

            <div class="col-sm-6 mt-3">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Rendez-vous</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->

<!-- /.content -->
<div class="nk-block nk-block-lg">

    <div class="col-md-12">
        <div class="card card-bordered card-full">
            <div class="card-inner">
                
                <div class="row m-1">
                    
                    <div class="form-group d-flex col-md-4 ">
                        <label for="date" class="m-1">Date:</label>
              
                            <div class="form-check m-1">
                                <input class="form-check-input " checked type="radio" value="creation" id="datede" name="radio1">
                                <label class="form-check-label ml-3">création</label>
                            </div>
                            <div class="form-check m-1">
                                <input class="form-check-input" type="radio" id="datede" value="installation" name="radio1">
                                <label class="form-check-label ml-3">installation</label>
                            </div>
                            <div class="form-check m-1">
                                <input class="form-check-input" type="radio" id="datede" value="souhaite" name="radio1">
                                <label class="form-check-label ml-3">souhaité</label>
                            </div>
                    </div>

                    <div class="form-group  col-md-6">

                        <div class="input-group input-daterange">
                            <input id="startDate1" name="startDate1" type="text" class="form-control" readonly="readonly" placeholder="Date début"> 
                                <span class="input-group-addon pr-4"> 
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span> 
                                
                            <input id="endDate1" name="endDate1" type="text" class="form-control ml-2" readonly="readonly" placeholder="Date Fin">
                                <span class="input-group-addon pr-4"> 
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                        </div>
                         
                    </div>
                    <div class="form-group col-lg-2">
                        <button type="submit" id="filtrer" class="btn btn-success pr-5 pl-5" >Filtrer</button>
                    </div>
                </div>

                <div class="row m-1">
                    
                    <div class="form-group d-flex col-md-6 ">
                        <label for="user_id" class="mr-3 mt-1">Agent:</label>
                        <select class="form-control select2bs4" style="width: 100%;" id="agent" name="agent">
                            @foreach($agents as $agent)
                            <option value="{{$agent->id}}">{{$agent->firstname}} {{$agent->lastname}}</option>
                            @endforeach
                        </select>
                    </div> 

                    <div class="form-group d-flex col-md-6 ">
                        <label class="mr-4 mt-1">Département:</label>
                        
                        <select class="form-control select2bs4" multiple="multiple" name="pole" id="pole" >
                            <option>Maarif</option>
                            <option>ElJadida</option>
                            <option>Oulfa</option>
                        </select>
                        
                    </div>

                  
            
                </div>

                <div class="row m-1">
                   
                    <div class="form-group d-flex col-md-6 ">
                        <label class="mr-4 mt-1">Campagne:</label>
                       <select class="form-control select2bs4" multiple="multiple" style="width: 100%;" id="campagne" name="campagne" >
                        </select>
                    </div>
                    
                    <div class="d-flex form-group col-md-6">
                        <label class="mr-3 mt-1">Statut:</label>

                        <select class="form-control select2bs4" multiple="multiple" name="statut" id="statut" >
                            <option label="Nouveau" value="New" >Nouveau</option>
                            <option label="Injoignable" value="Injoignable">Injoignable</option>
                            <option label="A rappeler" value="Arappeler">A rappeler</option>
                            <option label="A décaler" value="Adecaler">A décaler</option>
                            <option label="Replacé" value="Recycled">Replacé</option>
                            <option label="Confirmé" value="Assigned">Confirmé</option>
                            <option label="Facturé" value="Facture">Facturé</option>
                            <option label="Installé" value="Installe">Installé</option>
                            <option label="Converti à facturer" value="Converted">Converti à facturer</option>
                            <option label="Annulé" value="Dead">Annulé</option>
                            <option label="Hors cible" value="Horscible">Hors cible</option>
                        </select>
                        
                        
                    </div>

                </div>
                
            </div>
        
            
                
            </div>
        </div><!-- .card -->
    </div><!-- .col -->

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
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Categorie fiscale</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Installation Souhaitée</span></th>
                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Code postal</span></th>
                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Date de Modification</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Estimation Globale en M²</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Planificateur</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Installateur</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Statut</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-right">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
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
                                    <span id="tabagent" class="tb-lead">{{$appointment->firstName}} {{$appointment->lastName}}<span class="dot dot-success d-md-none ml-1"></span></span>
                                    <span>{{$appointment->email}}</span>
                                </div>
                            </div>
                        </td>
                        <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                            <span class="tb-amount">{{$appointment->taxCategory}} </span>
                        </td>
                        <td class="nk-tb-col tb-col-md">
                            <span>{{$appointment->dateInstall}}</span>
                        </td>
                        <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">
                            <ul class="list-status">
                                <li><span>{{$appointment->postalCode}}</span></li>

                            </ul>
                        </td>
                        <td class="nk-tb-col tb-col-lg">
                            <span>{{$appointment->updated_at}}</span>
                        </td>
                        <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                            <span class="tb-amount">{{$appointment->estimation}} </span>
                        </td>
                        <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                            <span class="tb-amount">{{$appointment->user_id}}</span>
                        </td>
                        <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                            <span class="tb-amount">{{$appointment->installer}}</span>
                        </td>
                        <td class="nk-tb-col tb-col-md">
                            <span class="tb-status text-success">{{$appointment->statut}}</span>
                        </td>
                        <td class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1">
                                <li class="nk-tb-action-hidden">
                                    <a href="{{route('appointment.edit', $appointment)}}" class="btn btn-trigger btn-icon"  data-placement="top" title="Modifier">
                                        <em class="icon ni ni-update"></em>
                                    </a>
                                </li>
                                <li class="nk-tb-action-hidden">
                                    <a href="{{route('appointment.destroy', $appointment)}}" class="btn btn-trigger btn-icon"  data-placement="top" title="Supprimer">
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
                    </tr><!-- .nk-tb-item  -->
                        @endforeach
                </tbody>
            </table>
        </div>
    </div><!-- .card-preview -->
</div>

@endsection
