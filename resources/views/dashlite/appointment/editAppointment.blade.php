@extends("dashlite.app.base")


@section("content")
<form action="{{route('appointment.update', $appointment)}}" method="POST">
@csrf
<!-- Prospect -->
<div class="container">

    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">PROSPECT</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">CHANTIER</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">FISCALITE</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">AFFECTATIONS</a>
        </li>
    </ul><!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="tabs-1" role="tabpanel">
            <div class="card-body">
                <div class="row m-4">
                    <div class="form-group d-flex col-md-5">
                        <label for="name" class="mr-3">Nom:<span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="name" name="firstName" value="{{$appointment->firstName}}" placeholder="Entrez votre nom...">
                    </div>
                    <div class="d-flex form-group col-md-5">
                        <label for="lastname" class="mr-3">Prénom:</label>
                        <input type="text" class="form-control " id="lastname" name="lastName"  value="{{$appointment->lastName}}" placeholder="Entrez votre prénom...">
                    </div>
                </div>
                <div class="row m-4">
                    <div class="form-group d-flex col-md-5">
                        <label for="phone" class="mr-3">Mobile:</label>
                        <input type="tel" class="form-control" id="phone" name="phone" value="{{$appointment->phone}}" placeholder="Entrez tel...">
                    </div>
                    <div class="form-group d-flex col-md-5">
                        <label for="phone2" class="mr-3">Mobile Fix:</label>
                        <input type="tel" class="form-control" id="phone2" name="phone2" value="{{$appointment->phone2}}"  placeholder="Entrez fax...">
                    </div>
                </div>
                <div class="row m-4">
                    <div class="form-group col-md-5">

                            <div id="dynamic-field-1" class="form-group dynamic-field d-flex">
                                <label for="email" class="mr-3">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$appointment->email}}" placeholder="Entrez email">
                            </div>
                            <div class="clearfix mt-4">
                                <button type="button" id="add-button" class="btn btn-secondary float-left text-uppercase shadow-sm"><em class="icon ni ni-plus"></em></i>
                                </button>
                                <button type="button" id="remove-button" class="btn btn-secondary float-left text-uppercase ml-1" disabled="disabled"><em class="icon ni ni-minus"></em> </button>
                            </div>


                    </div>
                    <div class="form-group d-flex col-md-5">
                        <label for="dateInstall">Installation Souhaitée:<span style="color:red">*</span></label>
                        <input id="dateInstall" name="dateInstall" class="form-control" type="datetime-local" value="{{$appointment->dateInstall}}">
                    </div>
                </div>
                <div class="row m-4">
                    <div class="form-group d-flex col-md-5">
                        <label for="adress" class="mr-3">Address:</label>
                        <input type="text" class="form-control" id="adress" name="adress"  value="{{$appointment->adress}}" placeholder="Entrez adress...">
                    </div>
                    <div class="form-group d-flex col-md-5">
                        <label for="city" class="mr-3">Ville:</label>
                        <input type="text" class="form-control" id="city" name="city" value="{{$appointment->city}}" placeholder="Entrez ville...">
                    </div>
                </div>
                <div class="row m-4">
                    <label for="postalCode" class="mr-3">Code postal:</label>
                    <div class="form-group d-flex col-md-2">
                        <input type="text" class="form-control" id="postalCode" name="postalCode" value="{{$appointment->postalCode}}" placeholder="Code postal">
                    </div>
                    <div class="form-group d-flex col-md-2">
                        <input type="text" class="form-control" id="campagnie" name="campagnie" value="{{$appointment->campagnie}}"  placeholder="Campagnie" disabled>
                    </div>
                    <div class="form-group d-flex col-md-5">
                        <label for="region" class="mr-3">Région:</label>
                        <input type="text" class="form-control" id="region" name="region" value="{{$appointment->region}}" placeholder="Entrez région" disabled>
                    </div>
                </div>
                <div class="row m-4">
                    <div class="form-group d-flex col-md-5">
                        <label class="mr-3">Agents:<span style="color:red">*</span></label>
                        <select class="form-control select2bs4" style="width: 100%;" name="agent_id" value="{{$appointment->agent_id}}" >
                            {{-- <option selected></option> --}}
                            @foreach($agents as $agent)
                            <option value={{$agent->id}}>{{$agent->firstname}} {{$agent->lastname}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group d-flex col-md-5 ">
                        <label for="country" class="mr-3">Pays:</label>
                        <input type="text" class="form-control" id="country" name="country" value="{{$appointment->country}}" placeholder="Entrez code postal...">
                    </div>
                </div>
                <div class="form-group d-flex col-md-10 ">
                    <label class="mr-3">Description:</label>
                    <textarea class="form-control" rows="3" name="description" id="description" value="{{$appointment->description}}"placeholder="Entrez Description ..."></textarea>
                </div>
            </div>
        </div>
        <div class="tab-pane " id="tabs-2" role="tabpanel">
            <div class="card-body">
                <div class="row m-4">
                    <label for="sur101" class="mr-3">Surface 101:</label>
                    <div class="form-group d-flex col-md-2">
                        <input type="text" class="form-control" id="sur101" name="sur101" value="{{$appointment->sur101}}">
                    </div>
                    <div class="form-group d-flex col-md-2">
                        <input type="text" class="form-control" id="mat101" name="mat101" placeholder="Isolant" value="{{$appointment->mat101}}">
                    </div>
                    <div class="d-flex form-group col-md-3">
                        <label>Type 101:</label>
                        <select class="form-control" name="type101" value="{{$appointment->type101}}">
                            <option>-------</option>
                            <option>Plancher</option>
                            <option>Poutres</option>

                        </select>
                    </div>
                    <label for="access" class="mr-3">Access:</label>
                    <div class="form-group d-flex col-md-2">
                        <input type="text" class="form-control" id="access" name="access" value="{{$appointment->access}}" placeholder="Acces">
                    </div>
                </div>
                <div class="row m-4">
                    <label for="sur102" class="mr-3">Surface 102:</label>
                    <div class="form-group d-flex col-md-2">
                        <input type="text" class="form-control" id="sur102" name="sur102" value="{{$appointment->sur102}}">
                    </div>
                    <div class="form-group d-flex col-md-2">
                        <input type="text" class="form-control" id="mat102" name="mat102" value="{{$appointment->mat102}}" placeholder="Isolant">
                    </div>
                    <div class="d-flex form-group col-md-3">
                        <label>Type 102:</label>
                        <select class="form-control" name="type102" value="{{$appointment->type102}}">
                            <option>-------</option>
                            <option>Parpaings</option>
                            <option>Brique</option>
                            <option>Cloison</option>
                            <option>Autre</option>
                            <option>Bois</option>
                            <option>Brique</option>
                            <option>Béton</option>
                            <option>Cimons</option>
                            <option>Hourdis</option>
                            <option>Parpaings</option>
                            <option>Plâtre taloché</option>

                        </select>
                    </div>

                    <label for="height102" class="mr-3">Hauteur 102:</label>
                    <div class="form-group d-flex col-md-2">
                        <input type="text" class="form-control" id="height102" name="height102" value="{{$appointment->height102}}" placeholder="Hauteur">
                    </div>
                </div>
                <div class="row m-4">
                    <label for="sur103" class="mr-3">Surface 103:</label>
                    <div class="form-group d-flex col-md-2">
                        <input type="text" class="form-control" id="sur103" name="sur103" value="{{$appointment->sur103}}">
                    </div>
                    <div class="form-group d-flex col-md-2">
                        <input type="text" class="form-control" id="mat103" name="mat103" value="{{$appointment->mat103}}" placeholder="Isolant">
                    </div>
                    <div class="d-flex form-group col-md-3">
                        <label>Type 103:</label>
                        <select class="form-control" name="type103" value="{{$appointment->type103}}">
                            <option>-------</option>
                            <option>Brique rouge</option>
                            <option>Hourdis</option>
                            <option>Parpaings</option>
                            <option>Bois</option>
                            <option>Pierre</option>
                            <option>Autre</option>
                        </select>
                    </div>
                    <label for="height103" class="mr-3">Hauteur 103:</label>
                    <div class="form-group d-flex col-md-2">
                        <input type="text" class="form-control" id="height103" name="height103" value="{{$appointment->height103}}" placeholder="Hauteur">
                    </div>
                </div>
                <div class="row m-2">
                    <div class="d-flex form-group col-md-5">
                        <label>Estimation Globale en M²: </label>
                        <select class="form-control" name="globalEstimate" id="globalEstimate" value="{{$appointment->globalEstimate}}">
                            <option>Moins de 40</option>
                            <option>Entre 40 et 50</option>
                            <option>Entre 50 et 60</option>
                            <option>Entre 60 et 70</option>
                            <option>Entre 70 et 80</option>
                            <option>Entre 80 et 100</option>
                            <option>Entre 100 et 150</option>
                            <option>Entre 150 et 200</option>
                            <option selected>Plus de 200</option>
                        </select>
                    </div>
                    <div class="d-flex form-group col-md-5">
                        <label>Origine du prospect:</label>
                        <select class="form-control" class="prospectOrigin" value="{{$appointment->prospectOrigin}}">
                            <option>Appel de prospection</option>
                            <option>Parrainage</option>
                        </select>
                    </div>
                    <div class="form-group d-flex col-md-10  ">
                        <label class="mr-3">Matiére a prévoir:</label>
                        <textarea class="form-control" rows="3" placeholder="" name="materialProvide"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane " id="tabs-3" role="tabpanel">
            <div class="card-body">
                <div class="m-4">
                <div id="form-exams-list">
                    <div class="col-md-12 pl-0">
                        <button type="button" id="add-button" class="js-add--exam-row btn btn-secondary  text-uppercase shadow-sm"><em class="icon ni ni-plus"></em></button>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4 d-flex">
                            <label for="taxId">Identifiant Fiscal:<span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="taxId" name="taxId" value="{{$appointment->taxId}}">
                        </div>
                        <div class="col-md-4 d-flex">
                            <label for="referenceNotice">Référence de l'avis:<span style="color:red">*</span></label>
                            <input type="text" class="form-control" id="referenceNotice" name="referenceNotice" value="{{$appointment->referenceNotice}}">
                        </div>
                        <div class="col-md-4 d-flex">
                            <label for="taxIncome" class="mr-3">Revenus Fiscal:<span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="taxIncome" name="taxIncome" value="{{$appointment->taxIncome}}" >
                        </div>
                   </div>
                </div>
                <div class="row ">
                    <div class="form-group d-flex col-md-5">
                        <label for="overallIncome" class="mr-3">Revenus Fiscal Globale:<span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="overallIncome" name="overallIncome" value="{{$appointment->overallIncome}}">
                    </div>
                    <div class="form-group d-flex col-md-5">
                        <label for="nbrPerson">Nbr de Personnes Foyer:<span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="nbrPerson" name="nbrPerson" value="{{$appointment->nbrPerson}}">
                    </div>

                </div>
                <div class="row ">
                    <div class="d-flex form-group col-md-5">
                        <label>Categorie fiscale:<span style="color:red">*</span></label>
                        <select class="form-control" name="taxCategory" value="{{$appointment->taxCategory}}">
                            <option>Précaire A</option>
                            <option>Précaire B</option>
                            <option>Aisé C</option>
                        </select>
                    </div>
                </div>



            </div>
        </div>
    </div>
    <div class="tab-pane " id="tabs-4" role="tabpanel">
        <div class="card-body">

            <div class="row m-1">
                <div class="form-group d-flex col-md-5 ">
                    <label for="user_id" class="mr-3">Planificateur:<span style="color:red">*</span></label>
                    <select class="form-control select2bs4" style="width: 100%;" name="user_id">
                        <option selected></option>
                        @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex form-group col-md-5">
                    <label class="mr-3">Statut:</label>
                    <select class="form-control" name="statut" value="{{$appointment->statut}}">
                        <option label="" value=""></option>
                        <option label="Nouveau" value="New" selected="selected">Nouveau</option>
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
                <div class="form-group d-flex col-md-5 ">
                    <label class="mr-4">Installateur:<span style="color:red">*</span></label>
                    <select class="form-control select2bs4" style="width: 100%;" name="installer">
                        <option selected></option>
                        @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group d-flex col-md-5 ">
                    <label class="mr-4">Equipe:<span style="color:red">*</span></label>
                    <select class="form-control select2bs4" style="width: 100%;" name="team_id">
                        <option selected></option>
                        @foreach($teams as $team)
                        <option value="{{$team->id}}">{{$team->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group d-flex col-md-10 ">
                    <label class="mr-3">Description:</label>
                    <textarea class="form-control" rows="3" name="description" placeholder="Entrez Description ">{{ $appointment->description }}</textarea>
                </div>

                <div class="form-group d-flex col-md-5">
                    <label for="install">Date installation:<span style="color:red">*</span></label>
                    <input id="install" name="install" class="form-control" type="date" value="{{ $appointment->install }}">
                </div>


                <div class="d-flex form-group col-md-5">
                    <label>Pole Production:<span style="color:red">*</span></label>
                    <select class="form-control" name="">
                        <option>EL JADIDA</option>
                        <option>MAARIF</option>
                        <option>OULFA</option>
                    </select>
                </div>



            </div>
    </div>

</div>
</form>
<button type="submit" class="btn btn-primary col-md-2 ml-5 pl-5">Mettre à jour</button>

@endsection
