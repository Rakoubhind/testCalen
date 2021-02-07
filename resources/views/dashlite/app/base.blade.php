<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    
    <!-- Page Title  -->
    <title>Invest Dashboard | DashLite Admin Template</title>

    <!-- StyleSheets  -->
    @include('dashlite.app.links')
   
</head>

<body class="nk-body npc-invest bg-lighter ">
    <div class="nk-app-root">
        <!-- wrap @s -->
        <div class="nk-wrap ">

            <!-- main header @s -->
                @include('dashlite.app.navbar')
            <!-- main header @e -->


            @yield('content')
            <!-- footer @s -->
                @include('dashlite.app.footer')
            <!-- footer @e -->

        </div>
        <!-- wrap @e -->
    </div>
    <!-- app-root @e -->

    <!-- JavaScript -->
    @include('dashlite.app.scripts')

    <script>
        (function() {
            //add rows when add button is clicked
            $(document).on('click', '.js-add--exam-row', function(e) {
                var clone, examsList;
                e.preventDefault();
                examsList = $('#form-exams-list');
                clone = examsList.children('.form-group:first').clone(true);
                // <button type="button" id="remove-button" class="btn btn-secondary float-left text-uppercase ml-1" disabled="disabled"><i class="fas fa-minus fa-fw"></i> </button>

                clone.append($('<button>').addClass('ml-3 btn btn-secondary js-remove--exam-row').html('<em class="icon ni ni-minus"></em>'));
                //reset values in cloned inputs and
                //add enumerated ID's to input fields
                clone.find('input').val('').attr('id', function() {
                    return $(this).attr('id') + '' + (examsList.children('.form-group').length + 1);
                    return $(this).attr('id') + '' + (examsList.children('.form-group').length + 2);

                });
                clone.find('input').val('').attr('name', function() {
                    return $(this).attr('name') + '' + (examsList.children('.form-group').length + 1);
                    return $(this).attr('name') + '' + (examsList.children('.form-group').length + 2);

                });
                return examsList.append(clone);
            });

            //remove rows when remove button is clicked
            $(document).on('click', '.js-remove--exam-row', function(e) {
                e.preventDefault();
                return $(this).parent().remove();
            });

        }).call(this);
    </script>

     <script>
        $('#postalCode').keyup(function() {

            var text = $(this).val()
            var x = "";
            x = parseInt(text.substring(0, 2));
            console.log(x);
            $('#campagnie').val(x);
            var codes = [75, 77, 78, 91, 92, 93, 94, 95];
            // var b = codes.includes(x);
            // console.log('test' + x);
            //  $('#region').val(b);
            if ($.inArray(x, codes) === -1) {
                $('#region').val('Province');
            } else {
                $('#region').val('Ile de france');
            }

        });
    </script>

    <script>
        $(function() {
            $('#taxIncome, #taxIncome2 , #taxIncome3 ,taxIncome4 ,taxIncome5').keyup(function() {
                $("#overallIncome").prop("disabled", true);
                var value1 = parseFloat($('#taxIncome').val()) || 0;
                var value2 = parseFloat($('#taxIncome2').val()) || 0;
                var value3 = parseFloat($('#taxIncome3').val()) || 0;
                var value4 = parseFloat($('#taxIncome4').val()) || 0;
                var value5 = parseFloat($('#taxIncome5').val()) || 0;
                $('#overallIncome').val(value1 + value2 + value3 + value4 + value5);
            });
        });
    </script>

    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
        $(document).ready(function() {
            var buttonAdd = $("#add-button");
            var buttonRemove = $("#remove-button");
            var className = ".dynamic-field";
            var count = 0;
            var field = "";
            var maxFields = 2;

            function totalFields() {
                return $(className).length;
            }

            function addNewField() {
                count = totalFields() + 1;
                field = $("#dynamic-field-1").clone();
                field.attr("id", "dynamic-field-" + count);
                field.children("label").text("Email " + count);
                field.find("input");
                field.find("input").attr("name", "email" + count);
                field.find("input").attr("id", "email" + count);
                $(className + ":last").after($(field));
            }

            function removeLastField() {
                if (totalFields() > 1) {
                    $(className + ":last").remove();
                }
            }

            function enableButtonRemove() {
                if (totalFields() === 2) {
                    buttonRemove.removeAttr("disabled");
                    buttonRemove.addClass("shadow-sm");
                }
            }

            function disableButtonRemove() {
                if (totalFields() === 1) {
                    buttonRemove.attr("disabled", "disabled");
                    buttonRemove.removeClass("shadow-sm");
                }
            }

            function disableButtonAdd() {
                if (totalFields() === maxFields) {
                    buttonAdd.attr("disabled", "disabled");
                    buttonAdd.removeClass("shadow-sm");
                }
            }

            function enableButtonAdd() {
                if (totalFields() === (maxFields - 1)) {
                    buttonAdd.removeAttr("disabled");
                    buttonAdd.addClass("shadow-sm");
                }
            }

            buttonAdd.click(function() {
                addNewField();
                enableButtonRemove();
                disableButtonAdd();
            });

            buttonRemove.click(function() {
                removeLastField();
                disableButtonRemove();
                enableButtonAdd();
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $('#installer').on('change' , function(){
                let id = $(this).val();
                $('#team_id').empty();
                $('#team_id').append(`<option value="0" disabled selected>Processing ...</option>`);
                $.ajax({
                    type:'GET',
                    url:'/fetch/' + id,
                    dataType: "json",
                    // data : {
                    //     id : id ,
                    //     name:name
                    // }
                    success: function(response){
                    var response = response;
                    console.log(response);
                      $('#team_id').empty();
                     $('#team_id').append(`<option value="0" disabled selected>Sélectionner une equipe... </option>`);
                    //  response.forEach(element => {
                    //     $('#team_id').append(`<option value="${element['id']}" disabled selected>${element['name']}</option>`);

                    //  });
                      $.each(response, function(i, element) {
                       $('#team_id').append(`<option value="${element.id}" disabled selected>${element.name}</option>`);

                       });
                //     for (var i = 0; i < response.length; ++i) {
                //     console.log('test');
                //     console.log("hh" + response[i].name);
                // }


                //     for (var i of response) {
                //     console.log(response.teams[i].name);
                //     i++;
                // }



                    }

                })
            })
        })

    </script>

     <script>

        function nbrFoyer() {

            $.ajax({

                type: 'get',
                url: '/getfiscale',
                data: 'fiscales',
                dataType: 'json',
                success: function (data) {

                var nbf =document.getElementById('nbrPerson').value;
                var reg =document.getElementById('region').value;
                var glb_in =document.getElementById('overallIncome').value;
                var categorie ="";

                for(var i=0;i<=4;i++)
                {
                    if( nbf == i+1 )
                    {
                        if(reg == "Province")
                        {
                            var minp=data.fiscales[i].minProvince;
                            var maxp=data.fiscales[i].maxProvince;

                            if( glb_in < minp ){
                                categorie ="A";
                            }else if( glb_in>minp && glb_in< maxp ){
                                categorie ="B";
                            }else{
                                categorie ="C";
                            }
                        }else{
                            var minf=data.fiscales[i].minIdf;
                            var maxf=data.fiscales[i].maxIdf;

                            if( glb_in < minf ){
                                categorie ="A";
                            }else if( glb_in>minf && glb_in<maxf ){
                                categorie ="B";
                            }else{
                                categorie ="C";
                            }
                        }
                    }
                }
                if( nbf > 5)
                {
                    for(j = 1 ; j<= nbf-5 ; j++ )
                    {
                        if(reg == "Province")
                        {
                            var minp=data.fiscales[5].minProvince;
                            var maxp=data.fiscales[5].maxProvince;

                            var minp5=data.fiscales[4].minProvince;
                            var maxp5=data.fiscales[4].maxProvince;

                            if( glb_in < j*minp + minp5){
                                categorie ="A";
                            }else if( glb_in>j*minp+ minp5 && glb_in<j*maxp+ maxp5 ){
                                categorie ="B";
                            }else{
                                categorie ="C";
                            }
                        }else{

                            var minf=data.fiscales[5].minIdf;
                            var maxf=data.fiscales[5].maxIdf;

                            var minf5=data.fiscales[4].minIdf;
                            var maxf5=data.fiscales[4].maxIdf;

                            if( glb_in < j*minf+minf5 ){
                                categorie ="A";
                            }else if( glb_in>j*minf+minf5 && glb_in<j*maxf+maxf5 ){
                                categorie ="B";
                            }else{
                                categorie ="C";
                            }
                        }
                    }
                }

                document.getElementById("taxCategory").value="Précaire "+categorie;

                },
                error: function (data) {
                    console.log(data);
                }

            });

        }



     </script>
 
    <script>
            
        $("#filtrer").click(function() {

            var agent =$('#agent').val();
            var statut =$('#statut').val();
            var pole =$('#pole').val();
            var camp =$('#campagne').val();
            var datede =$('#datede:checked').val();
            var deb =$('#startDate1').val();
            var fin =$('#endDate1').val();
            
            // console.log(agent);
            // console.log(statut);
            // console.log(pole);
            // console.log(camp);
            // console.log(datede);
            // console.log(deb);
            // console.log(fin);
           

            $.ajax({

                type: 'get',
                url:'/filtrer',
                data: 'agent='+agent+'&statut='+statut+'&pole='+pole+'&camp='+camp+'&datede='+datede+'&deb='+deb+'&fin='+fin,
                dataType: 'json',
                success: function (data) {

                    // console.log(data);

                    // // colagent=document.getElementById('tabagent').innerHTML;

                    for(var i=0 ; i<data.appointments.length; i++)
                    {
                        var fname=data.appointments[i].firstName;
                        var lname=data.appointments[i].lastName;
                        var email=data.appointments[i].email;
                        var taxc=data.appointments[i].taxCategory;
                        var dinstall=data.appointments[i].dateInstall;
                        var posc=data.appointments[i].postalCode;
                        var dmodif=data.appointments[i].updated_at;
                        var estglb=data.appointments[i].estimation;
                        var planif=data.appointments[i].user_id;
                        var installer=data.appointments[i].installer;
                        var statut=data.appointments[i].statut;

                        console.log(data.appointments[i]);
                        
                    }
                    
                
                


                },
                error: function (data) {
                    console.log(data);
                }

            });

        });

        
    

    </script>

    <script>

        $(document).ready(function() {

            var camp =$('#campagne');

            for(var i=1 ; i<=9 ; i++)
            {
                camp.append("<option>0"+i+"</option>")
            }
            for(var i=10 ; i<=19 ; i++)
            {
                camp.append("<option>"+i+"</option>")
            }
            for(var i=21 ; i<=95 ; i++)
            {
                camp.append("<option>"+i+"</option>")
            }

        });


    </script>
    
    <script type="text/javascript">
		$(document).ready(function() {
			 $('.input-daterange').datepicker({
              });
		});
	</script>
    
   

     <script>
             $(document).ready(function() {
        $('#multiple-checkboxes').multiselect({
          includeSelectAllOption: true,

        });
    });
     </script>
   <script>

   </script>
</body>

</html>
