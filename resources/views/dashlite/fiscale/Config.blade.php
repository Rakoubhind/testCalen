@extends("dashlite.app.base") 

@section("content")

    <!-- Content Header (Page header) -->
    <section class="content-header ml-4">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 mt-5 ">
                    <h3>Barême D'égibilité :</h3>
                </div>

                <div class="col-sm-12 mt-3">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Fiscale</li>
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
                            
                            <form action="{{ route('fiscale.update') }}" method="get">
                                @csrf
                                    <div class="card-body">
                            
                                        @foreach ($fiscales as $fiscale)
                                                                
                                        
                                        <div class="row m-4">
                                            <label for="sur101" class="mr-1">Le foyer: {{$fiscale->nbfoyer}}</label>
                                            
                                            <div class="form-group ">
                                                <input hidden type="text" class="form-control" id="id{{$fiscale->id}}" name="id{{$fiscale->id}}" value="{{$fiscale->id}}">
                                            </div>
                            
                                            <label for="sur101" class="mr-3">Province:</label>
                                            <div class="form-group d-flex col-md-2">
                                                <input type="text" class="form-control" id="minp{{$fiscale->nbfoyer}}" name="minp{{$fiscale->nbfoyer}}" placeholder="Minimum" value="{{$fiscale->minProvince}}">
                                            </div>
                                       
                                            <div class="form-group d-flex col-md-2">
                                                <input type="text" class="form-control" id="maxp{{$fiscale->nbfoyer}}" name="maxp{{$fiscale->nbfoyer}}" placeholder="Maximum" value="{{$fiscale->maxProvince}}">
                                            </div>
                                       
                                            <label for="sur101" class="mr-3">Ile de France:</label>
                                            <div class="form-group d-flex col-md-2">
                                                <input type="text" class="form-control" id="minidf{{$fiscale->nbfoyer}}" name="minidf{{$fiscale->nbfoyer}}" placeholder="Minimum" value="{{$fiscale->minIdf}}">
                                            </div>
                                       
                                            <div class="form-group d-flex col-md-2">
                                                <input type="text" class="form-control" id="maxidf{{$fiscale->nbfoyer}}" name="maxidf{{$fiscale->nbfoyer}}" placeholder="Maximum" value="{{$fiscale->maxIdf}}">
                                            </div>
                                       
                                        </div>
                                        
                                        @endforeach
                            
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary col-md-1 ml-5">Appliquer</button>
                                </form>

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
