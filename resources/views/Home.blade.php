<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>

      <!-- Font Awesome -->
      <link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="../asset/css/adminlte.min.css">
      <link rel="stylesheet" href="../asset/css/style.css">
      <link rel="stylesheet" href="../asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css">

    </head>
    <body style="background-color:#033;">
    <div class="container">
                  @if(Session::has('errorService'))
                   <div class="alert alert-danger mt-3">
                   {{Session::get('errorService')}}
                   </div>
                   @endif

                   @if(Session::has('successSaved'))
                   <div class="alert alert-success mt-3">
                   {{Session::get('successSaved')}}
                   </div>
                   @endif

                   @if(Session::has('errorMessage'))
                   <div class="alert alert-danger mt-3">
                   {{Session::get('errorMessage')}}
                   </div>
                   @endif

      <div class="card shadow mt-5">
        <div class="card-header bg-info">
          <h3 class="text-light"><b>SMS Dating Platform</b></h3>
        </div>
        <div class="card-body">
        <form action="{{route('dataStore')}}" method="post" role="form" onsubmit="return DataValidation()">
                @csrf            
              <div class="form-group col-md-6">
                <label class="text-info" for=""> <span class="text-danger mx-1">*</span> Phone Number</label>
                <input class="@error('user_phone_number') is-invalid @enderror form-control" type="text" name="user_phone_number" id="phoneNumber" placeholder="+xxxxxxxxxxxx" required>
                @error('user_phone_number') <div class="alert alert-danger mt-1">{{$message}}</div> @enderror
                <span><b><p class="text-danger" id="phoneError"></p></b></span>
                </div>
                <div class="form-group col-md-6">
                <label class="text-info" for=""> <span class="text-danger mx-1">*</span> SMS</label>
                <textarea class="form-control" name="sms" id="sms" cols="30" rows="10" placeholder="MPENZI#Name#Location#Gender#Age#SoulMateLocation#DesiredSoulMateAge#DesiredSoulMateGender" required></textarea>
                <span><b><p class="text-danger" id="smsError"></p></b></span>
               </div>
               <button class="btn btn-primary" type="submit">Send</button>
               </div>
            </form>
        </div>
      </div>
         
           
            <script>
       function DataValidation(){

         var smsData = document.getElementById('sms').value;
         var phoneData = document.getElementById('phoneNumber').value;

        // let string = "Mpenzi#Rafael#Arusha#M#5#Tanga#7#F";
        const myArray = smsData.split("#");

        var userAge = myArray[4];
        var desiredSoulmateAge = myArray[6];

        var age = /^[0-9]+$/;
        var phone = /^\+?([0-9]{12})\)?$/;
        
        var sms = /^\(?([A-Za-z]{6})\)?[#]?([A-Za-z]{1,15})[#]?([A-Za-z]{1,15})[#]?([A-Za-z]{1})[#]?([0-9]{1,3})[#]?([A-Za-z]{1,15})[#]?([0-9]{1,3})[#]?([A-Za-z]{1})$/;

         if(myArray[0] != "MPENZI"){            
          document.getElementById('smsError').innerHTML="Unknown Service: Try Again";
          return false;
         }
         else if(!sms.test(smsData)){
                document.getElementById('smsError').innerHTML="Invalid Format, all field are required";
                return false;
            }
        else if(myArray[3] != "M" && myArray[3] != "F"){
                document.getElementById('smsError').innerHTML="User Gender must be M for Male and F for Female";
                return false;
            }
        else if(myArray[7] != "M" && myArray[7] != "F"){
                document.getElementById('smsError').innerHTML="Desired Soulmate Gender must be M for Male and F for Female";
                return false;
            }
        else if(!age.test(userAge)){
             document.getElementById('smsError').innerHTML="User age shoud be between 1 - 100";
             return false;
            }
        else if(!age.test(desiredSoulmateAge)){
             document.getElementById('smsError').innerHTML="Desired SoulMate age shoud be between 1 - 100";
             return false;
            }
  
        else if(!phone.test(phoneData)){
            document.getElementById('phoneError').innerHTML="Enter Valid Phone Number";
            return false;
        }
       
       }
    </script>


      <!-- jQuery -->
      <script src="../asset/jquery/jquery.min.js"></script>
      <script src="../asset/js/adminlte.js"></script>
    </body>
</html>
