<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login | Quizzer</title>
	<?php  include "includes.php"  ?>
</head>
<body>
	<?php include "nav.php"  ?>

<div class="login_container">
    <div class="login_topper">
        <span># Login</span>
    </div>
    <div class="login_body">
    	<span id="errors" style="color: red; display: flex; flex-direction: column;"></span>
        <form action="" class="login_form" method="post">
            <div>
                <i class="fa fa-user"></i>
                <input type="text" name="u_email" id="u_email" placeholder="Username">
            </div>

            <div>
                <i class="fa fa-lock"></i>
                <input type="password" name="u_pass" id="u_pass" placeholder="Password">
            </div>
            <span class="error"></span>
            <button id="login_btn" type="submit">Login</button>
            <hr>
            <a href="">Forgot Password?</a> 
        </form>
        <center><h3>OR</h3></center>
        <button class="trigger">Create Account now</button>
    </div>
</div>

<!-- REGISTER MODAL -->

<div class="modal">
    <div class="modal-content">
        <span class="close-button">&times;</span>
        <h1>Register Here</h1>
        <hr>
        <div class="register_body">
        	<form class="register_form" method="POST" action="">

        	<div>
                <i class="fa fa-user"></i>
                <input type="text" name="u_name" id="u_name" placeholder="Username" required>
            </div>
             <div>
                <i class="fa fa-inbox"></i>
                <input type="email" name="u_email" id="u_email" placeholder="Email" required>
            </div>

            <div>
                <i class="fa fa-key"></i>
                <input type="password" name="u_pass" id="u_pass" placeholder="Password" required>
            </div>

            <div>
                <i class="fa fa-key"></i>
                <input type="password" name="u_pass1" id="u_pass1" required placeholder="Confirm Password">
            </div>

            <span id="alert"></span>

            <button type="submit" id="register_btn">Register</button>

        	</form>
        </div>

    </div>
</div>



</body>
</html>
<script type="text/javascript">


    // REGISTER FORM

    $('.register_form').submit(function(e){
        e.preventDefault()
        $('#alert').empty();
        var form = $(this);
        $.ajax({
                url: "ajax.php?action=create_account",
                method: 'post',
                async: false,
                data: form.serialize(),
                success: function(response){
                    var response = JSON.parse(response)
                    $('#alert').html(response.msg)
                    }
            })
    })


	$('.login_form').submit(function(e){
		e.preventDefault()
		var btn = $('#login_btn')
		// show_loader(btn)
		var errors = []
		$('#errors').empty()
		var inputs = $('.login_form input')
		inputs.each(function(){
			// var x =  
			if($(this).val() == "" ){
				error = $(this).attr('placeholder')+" Required"
				errors.push(error)
			}

		})
		if (errors.length > 0 ){
			for(var i = 0; i < errors.length; i++){
				$('#errors').append("<i>"+ errors[i] + "</i>")
			}
		}else{
			var form = $(this)
			$.ajax({
				url: "ajax.php?action=login_user",
				method: 'post',
				async: false,
				data: form.serialize(),
				success: function(response){
					var response = JSON.parse(response)
                    
                    if(response.msg === 'ok'){
                        window.location = '/quizzer'
                    }else{
                        $('.error').html(response.msg);
                    }
                    }
			})
		}
	})


	// REGISTER MODAL

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

<style type="text/css">
	.loader1{
		width: 20px;
		height: 20px;
		border-radius: 50%;
		border: 4px solid silver;
		border-top: 4px solid gray;
		animation: roll 0.5s linear infinite;
		margin: auto;

	}
	@keyframes roll{
		from{
			transform: rotate(360deg);
		}
	}
.modal{
    position: fixed;
    padding: 10px 0px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    opacity: 0;
    visibility: hidden;
    transform: scale(1.1);
    transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
}

.modal-content {
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);*/
    margin-top: -200px;
    background-color: white;
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
.trigger{
	width: 100%;
	height: 40px;
	background: lightskyblue;
	color: white;
	border: 0;
	border-radius: 2px;
	outline: 0;
	cursor: pointer;
	margin: 2px 0px;
}

.register_body div{
    display: flex;
    flex-direction: row;  
    margin: 20px 0px;
}
.register_body div i{
    width: 35px;
    height: 35px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 20px;
    background: gray;
    border-radius: 4px 0px 0px 4px;

}
.register_body div input{
    width: 70%;
    outline: none;
    border: 1px solid gray;
    border-radius: 0px 4px 4px 0px;
    padding-left: 5px;
    font: 15px;
    background: inherit;
}
.register_body div input::placeholder{
    font-size: 15px;
}
#register_btn, #login_btn{
	width: 40%;
	height: 40px;
	font-size: 15px;
	border-radius: 5px;
	background: darkblue;
	color: white;
	outline: none;
	border: 2px solid darkblue;
	display: flex;
	align-items: center;
	justify-content: center;
}
</style>
