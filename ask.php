<?php 
include "connection.php";
$categories = mysqli_query($conn, "SELECT * FROM categories");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ask Question | AskMe </title>
	<?php include "includes.php" ?>
	
</head>
<body>
	<?php include "nav.php" ?>
	<div class="container_main">
		<h3>Ask Question</h3>
		<hr>
		<div class="question_content">
			<div>
				<form class="question_form" method="post" action="">
					<label>Question Category</label><br><br>
					<select name="question_category" id="question_category" required>
						<option value="" selected hidden>..Select Category..</option>
						<?php    
						foreach ($categories as $category) {
							?>
							<option value="<?php echo $category['category_name'];  ?>" ><?php echo $category['category_name'];  ?></option>
							<?php
						}
						?>
					</select>
					<br>
					<label>Question</label><br><br>
					<input type="text" name="question" id="question" placeholder="Enter Your question" required>
					<br>
					<label>More Question Information</label><br><br>
					<textarea name="question_moreinfo" cols="40" rows="10">
						
					</textarea>
					<script type="text/javascript">
						CKEDITOR.replace( 'question_moreinfo' );
					</script>
					<br><br>
					<label>Tags</label><br><br>
					<input type="text" name="question_tags" id="question_tags" placeholder="Eg. Python, Python-numpy">
					<!-- <p style="color: rebeccapurple;"><i>Use '-' to combine words in the tags section</p> -->
					<br>
					<button type="submit" name="ask_questionBtn" id="ask_quetionBtn"><i class="fa fa-plus"></i> Ask the Question</button>
 
				</form>
				<button type="button" name="xx" id="xx"><i class="fa fa-plus"></i> Ask the Question</button>
 
			</div>
			<div class="side_right">
				<div class="tags_side">
					<div class="e_topper">
						<h4>Most Popular Tags</h4>
					</div>
					<div class="e_content">
						
					</div>
					
				</div>

				<div class="categories_side">
					<div class="e_topper">
						<h4>All Categories</h4>
					</div>
					<div class="e_content">
						<?php 
						foreach ($categories as $category) {
							?>
							<div class="categories_cont">
								<span><?php echo $category['category_name'];  ?></span><i>500</i>
							</div>
							<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
<input type="text" hidden value="<?php echo isset($_SESSION['user']) ? "Okay":""; ?>" name="" id='corel'>
</body>
</html>
<script type="text/javascript">

	if($("#corel").val()== ""){
		$('.question_content').empty();
		$('.question_content').append('<h5 id="info">Log in to Ask Question</h5>')
	}
 

		// $('body').append("<div class='loader_wrapper'><div class='loader'></div></div>")


	
	$('.question_form').submit(function(e){
		e.preventDefault()
		$('body').append("<div class='loader_wrapper'><div class='loader'></div></div>")

		$.ajax({
			url: 'ajax.php?action=ask_question',
			method: 'POST',
			async: false,
			data: $(this).serialize(),
			success: function(data){
				$('body').hide('loader_wrapper')
				alert(data)
			}
		})
	})


</script>
<style type="text/css">
	@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    user-select: none;
}
.container_main{
	padding: 30px 45px;

}
#info{
	width: 100%;
	height: 60px;
	padding: 10px 8px 8px 16px;
	display: inline-block;
	background: lightgreen;
	font-size: 20px;
	border-radius: 5px;
	border: 2px solid lightgreen;
}
.container_main h3:first-child{
	margin-bottom: 15px;
	color: blue;
	font-size: 25px;
	text-shadow: 2px 2px 4px gray;
}
.question_content{
	width: 100%;
	height: auto;
	padding: 10px 5px;
	display: flex;
	/*align-items: center;*/
	justify-content: space-between;
}
.question_content div:first-child{
	flex-basis: 70%;
	/*border: 1px solid green;*/

}

.question_content form label{
	font-weight: bold;
	margin-bottom: 5px;
	font-size: 15px;
}
.question_content form input,
.question_content form select{
	margin: 10ps;
	width: 90%;
	height: 35px;
	font-size: 15px;
	padding-left: 10px;
	outline: none;
	margin-bottom: 30px;
	border-radius: 5px;
	border: 1px solid gray;
}
.question_content form textarea{
	width: 90%;
	border-radius: 10px;
	font-size: 15px;
	wrap: virtual;
	padding: 20px;
}
.question_content form button{
	width: auto;
	height: 40px;
	border: 0;
	border-radius: 5px;
	outline: none;
	background: darkblue;
	color: white;
	font-size: 15px;
	margin: 10px 0px;
	padding: 10px;
	cursor: pointer;
	transition: .3s all;
}
.question_content form button:hover{
	background: lightblue;
	color: #000;
	
}

.side_right{
	padding: 5px;
	/*border: 1px solid black;*/
	flex-basis: 25%;
}

.tags_side, .categories_side{
	display: flex;
	flex-direction: column;
	border: 1px solid gainsboro;
	border-radius: 7px;
	margin-bottom: 10px;
}
.e_topper{
	width: 100%;
	height: 40px;
	padding: 8px 8px 8px 16px;
	border: 1px solid gainsboro;
	/*border-radius: 7px;*/

}
.categories_cont{
	width: 100%;
	height: 40px;
	padding: 8px 8px 8px 16px;
	border-bottom: 1px solid #f3f3f3;

}
.categories_cont span{
	font-size: 15px;
	font-style: normal;

}
.categories_cont i{
	float: right;
	display: inline-block;
	height: 20px;
	width: auto;
	padding: 3px 10px;
	background: darkblue;
	color: #fff;
	font-size: 10px;
	border-radius: 5px;
}



/*LOADERS*/
.loader_wrapper{
	position: fixed;
	width: 100%;
	height: 100%;
	display: flex;
	align-items: center;
	justify-content: center;
	/*display: none;*/
	background: rgba(0, 0, 0, 0.4);
}

.loader  {
  animation: rotate 1s infinite;  
  height: 50px;
  width: 50px;
}

.loader:before,
.loader:after {   
  border-radius: 50%;
  content: '';
  display: block;
  height: 20px;  
  width: 20px;
}
.loader:before {
  animation: ball1 1s infinite;  
  background-color: #cb2025;
  box-shadow: 30px 0 0 #f8b334;
  margin-bottom: 10px;
}
.loader:after {
  animation: ball2 1s infinite; 
  background-color: #00a096;
  box-shadow: 30px 0 0 #97bf0d;
}

@keyframes rotate {
  0% { 
    -webkit-transform: rotate(0deg) scale(0.8); 
    -moz-transform: rotate(0deg) scale(0.8);
  }
  50% { 
    -webkit-transform: rotate(360deg) scale(1.2); 
    -moz-transform: rotate(360deg) scale(1.2);
  }
  100% { 
    -webkit-transform: rotate(720deg) scale(0.8); 
    -moz-transform: rotate(720deg) scale(0.8);
  }
}

@keyframes ball1 {
  0% {
    box-shadow: 30px 0 0 #f8b334;
  }
  50% {
    box-shadow: 0 0 0 #f8b334;
    margin-bottom: 0;
    -webkit-transform: translate(15px,15px);
    -moz-transform: translate(15px, 15px);
  }
  100% {
    box-shadow: 30px 0 0 #f8b334;
    margin-bottom: 10px;
  }
}

@keyframes ball2 {
  0% {
    box-shadow: 30px 0 0 #97bf0d;
  }
  50% {
    box-shadow: 0 0 0 #97bf0d;
    margin-top: -20px;
    -webkit-transform: translate(15px,15px);
    -moz-transform: translate(15px, 15px);
  }
  100% {
    box-shadow: 30px 0 0 #97bf0d;
    margin-top: 0;
  }
}
</style>
</style>