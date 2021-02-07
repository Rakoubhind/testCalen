@extends("layouts.base")


@section("content")

     <!-- Content Header (Page header) -->
     <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Historique :</h1>
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
                                        <th>reference </th>
                                        <th>rendez-vous</th>
                                        <th>agent</th>
                                        <th>remplis par</th>
                                        <th>Client</th>
                                        <th>Installateur</th>
                                        <th>Equipe</th>
                                        <th>Date</th>
                                        
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($histories as $history)
                                    <tr>
                                        <td>{{$history->id}}</td>
                                        <td>{{$history->appointment->id}}</td>
                                        <td>{{$history->appointment->agent_id}}</td>
                                        <td>{{$history->appointment->user_id}}</td>
                                        <td>{{$history->appointment->lastname}}." "{{$history->appointment->firstname}}.</td>
                                        <td>{{$history->appointment->installer}}</td>
                                        <td>{{$history->appointment->team}}</td>
                                        <td>{{$history->CreatedAt}}</td>
                                        <td>
                                            <a href="{{route('history.destroy', $history)}}" class="btn btn-danger" data-toggle="modal" data-target="#deleteHistory{{$history->id}}">
                                                <i class="far fa-trash-alt" ></i>
                                            </a>
                                        
                                            
                                        </td>

                                        {{-- <td>
                                            <a href="{{route('agent.update', $agent)}}" class="btn btn-success" data-toggle="modal" data-target="#editAgent{{$agent->id}}"><i class="fas fa-edit"></i></a>
                                            <a href="{{route('users.destroy', $agent)}}" class="btn btn-danger" data-toggle="modal" data-target="#deleteAgent{{$agent->id}}"><i
                                                    class="far fa-trash-alt" ></i></a>
                                            
                                        </td> --}}
                                    </tr>

                                    <div class="modal fade" id="deleteHistory{{$history->id}}" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title custom_align" id="Heading">Supprimer cette entrée</h4>
                                            </div> -->
                                            <form action="{{route('history.destroy', $history->id)}}" method="get"  >
                                            @csrf
                                            <div class="modal-body">
                                                <div class="alert mt-3 "><span class="glyphicon glyphicon-warning-sign"></span>
                                                <b>Voulez vous supprimer cette ligne?</b>   </div>

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