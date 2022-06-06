<?php
session_start();
include "api/config/Database.php";
$connection = new Database();
$connect = $connection->connect();

?>
<nav class="nav_bar">
   <a href="/quizzer"><span class="logo">AskMe</span></a> <span>| &nbsp;Community</span>

<div class="right_col">
    <div class="search_bar">
        <i class="fa fa-search"></i>
        <input type="search" name="search" id="search" placeholder="Search Category, Keyword">
    </div>
    <button type="button" class="ask_question_btn" id="ask_question_btn">Ask Question</button>
    <?php 

    if(isset($_SESSION['user'])){
        $query = $connect->query("SELECT * FROM users WHERE u_email = '". $_SESSION['user'] ."'");
        while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <i class="fa fa-user">&nbsp;<?php echo $row['u_name']; ?></i>
                    <?php    
            }
    }else{
            ?>
            <button type="button" class="ask_question_btn" id="login_btn_nav">Login</button>
            <?php
        }
    ?>
</div>
</nav>
<script type="text/javascript">
    document.getElementById('login_btn_nav').addEventListener('click', function(){
        window.location = 'login';
    })

    document.getElementById('ask_question_btn').addEventListener('click', function(){
        window.location = 'ask';
    })
</script>
<style type="text/css">
	.nav_bar{
    width: 100%;
    height: 60px;
    background: darkblue;
    padding: 15px 40px;
}
.nav_bar span{
    color: #fff;
    font-size: 25px;

}
.logo{
    font-size: 25px;
    color: #fff;
    letter-spacing: 5px;
    font-family: Arial, Helvetica, sans-serif;
    /* float: left; */
}
.nav_bar div{
  float: right;
  color: whitesmoke;
  margin: 0px 5px;
  font-size: 25px;
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;

}
a{
	text-decoration: none;
}
.search_bar{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
}
.search_bar i{
    background: inherit;
    color: floralwhite;
    border: 1px solid blanchedalmond;
    height: 35px;
    border-right: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 15px;
    padding: 0px 5px;
    border-radius: 4px 0px 0px 4px;
}
.search_bar input{
    background: inherit;
    color: floralwhite;
    border: 1px solid blanchedalmond;
    height: 35px;
    width: 90%;
    border-left: 0;
    outline: none;
    border-radius: 0px 4px 4px 0px;
}
.ask_question_btn{
    width: auto;
    height: 35px;
    background: blueviolet;
    font-size: 15px;
    outline: none;
    border: 0px;
    cursor: pointer;
    margin-right: 20px;
    border-radius: 7px;
    color: #fff;
    padding: 5px;
}
</style>