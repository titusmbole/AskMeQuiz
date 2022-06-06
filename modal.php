<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Testers | Home</title>
    <?php  include "includes.php"  ?>
</head>
<body>
<button class="trigger">Click here to trigger the modal!</button>
<div class="modal">
    <div class="modal-content">
        <span class="close-button">&times;</span>
       

    </div>
</div> 
<div class="success">
            <i class="fa fa-info"></i>
            <span>Registration Successful</span>
        </div>





<label>
County
</label>
<select class="form-control" name="county" id="county">
<option value="">Select...</option>
    <option value="2">Baringo</option>

    <option value="3">Bomet</option>

    <option value="4">Bungoma</option>

    <option value="5">Busia</option>

    <option value="6">Elgeyo Marakwet</option>

    <option value="7">Embu</option>

    <option value="8">Garissa</option>

    <option value="9">Homa Bay</option>

    <option value="10">Isiolo</option>

    <option value="11">Kajiado</option>

    <option value="12">Kakamega</option>

    <option value="13">Kericho</option>

    <option value="14">Kiambu</option>

    <option value="15">Kilifi</option>

    <option value="16">Kirinyaga</option>

    <option value="17">Kisii</option>

    <option value="18">Kisumu</option>

    <option value="19">Kitui</option>

    <option value="20">Kwale</option>

    <option value="21">Laikipia</option>

    <option value="22">Lamu</option>

    <option value="23">Machakos</option>

    <option value="24">Makueni</option>

    <option value="25">Mandera</option>

    <option value="26">Marsabit</option>

    <option value="27">Meru</option>

    <option value="28">Migori</option>

    <option value="29">Mombasa</option>

    <option value="30">Muranga</option>

    <option value="31">Nairobi</option>

    <option value="32">Nakuru</option>

    <option value="33">Nandi</option>

    <option value="34">Narok</option>

    <option value="35">Nyamira</option>

    <option value="36">Nyandarua</option>

    <option value="37">Nyeri</option>

    <option value="38">Samburu</option>

    <option value="39">Siaya</option>

    <option value="40">Taita-Taveta</option>

    <option value="41">Tana River</option>

    <option value="42">Tharaka-Nithi</option>

    <option value="43">Trans Nzoia</option>

    <option value="44">Turkana</option>

    <option value="45">Uasin Gishu</option>

    <option value="46">Vihiga</option>

    <option value="47">Wajir</option>

    <option value="48">West Pokot</option>

    <option value="49">Foreign</option>


</select>

<label>Subcounty</label>
<select id="subcounty">
    
</select>









</body>
</html>
<script src="https://admissions.kmtc.ac.ke/public/assets/sba/bower_components/jquery/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script src="https://admissions.kmtc.ac.ke/public/assets/sba/bower_components/metisMenu/dist/metisMenu.min.js"></script>
<script src="https://admissions.kmtc.ac.ke/public/assets/sba/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="https://admissions.kmtc.ac.ke/public/assets/sba/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<script src="https://admissions.kmtc.ac.ke/public/assets/sba/bower_components/datatables-responsive/js/dataTables.responsive.js"></script>
<script src="https://admissions.kmtc.ac.ke/public/assets/applicant/assets/js/jquery.backstretch.min.js"></script>
<script src="https://admissions.kmtc.ac.ke/public/assets/applicant/assets/js/retina-1.1.0.min.js"></script>
<script src="https://admissions.kmtc.ac.ke/public/assets/applicant/assets/js/scripts.js"></script>



<script type="text/javascript">

     $(document).ready(function(){
            //$("#compulsorygrade").hide();
            $("#county").change(function(){
                var id=$(this).val();
                 var dataString = 'id='+ id;
                //   $("#subcounty").empty();
                //   $("#subcounty").append("<option value=''>--select--</option>");
                // $.get("https://admissions.kmtc.ac.ke/public/index.php/getsubcounties/"+id,function(response){
                //     console.log(response);
                //     $.each(response,function(index,element){
                //         var data="<option value='"+element.id+"'>"+element.name.toUpperCase()+"</option>";
                //         $("#subcounty").append(data);
                //         // alert(element.id)
                //     });
              

                $.ajax({
                    url: 'https://admissions.kmtc.ac.ke/public/index.php/getsubcounties/'+id,
                    method: 'get',
                     headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    success: function(response){
                        alert(response)
                    }
                })



                });

            });









</script>

<style type="text/css" media="all">
    .success{
       
        z-index: 9;
        /*float: right;*/
        position: absolute;
        top: 10;
        right: 10;
        margin: 5px;
        display: flex;
        width: 300px;
        height: 40px;
        border-radius: 5px;
        display: none;
        /*border: 1px solid lightgreen;*/
    }
    .success i{
       /* font-style: italic;
        fo*/nt-family: serif;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 10%;
        background: darkgray;
        color: floralwhite;
        border: 1px solid darkgray;
        border-radius: 3px 0px 0px 3px;
    }
    .success span{
        background: lightgreen;
        padding: 8px 8px 8px 10px;
        font-family: serif;
        font-style: italic;
        color: gray;
        width: 90%;
        border: 1px solid lightgreen;
        border-radius: 0px 3px 3px 0px;
        font-size: 20px;
    }






.modal {
    position: fixed;
    padding: 10px 0px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.3);
    opacity: 0;
    visibility: hidden;
    transform: scale(1.1);
    transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;
}

.modal-content {
    position: absolute;
    top: 10%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    /*padding: 1rem 1.5rem;*/
    padding: 16px;
    width: 30%;
    border-radius: 0.5rem;
}

.close-button {
    float: right;
    width: 1.5rem;
    line-height: 1.5rem;
    text-align: center;
    cursor: pointer;
    border-radius: 0.25rem;
    background-color: lightgray;
}

.close-button:hover {
    background-color: darkgray;
}

.show-modal {
    opacity: 1;
    visibility: visible;
    transform: scale(1.0);
    transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
}
</style>
<script type="text/javascript" charset="utf-8">








const modal = document.querySelector(".modal");
const trigger = document.querySelector(".trigger");
const closeButton = document.querySelector(".close-button");

function toggleModal() {
    modal.classList.toggle("show-modal");
}

function windowOnClick(event) {
    if (event.target === modal) {
        toggleModal();
    }
}

trigger.addEventListener("click", toggleModal);
closeButton.addEventListener("click", toggleModal);
window.addEventListener("click", windowOnClick);
</script>