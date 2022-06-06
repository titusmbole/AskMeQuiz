<?php 
include "connection.php";
$categories = mysqli_query($conn, "SELECT * FROM categories");
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home | QuiZzer</title>
<?php  include "includes.php"  ?>
</head>
<body>
  <?php include "nav.php"  ?>

  <div class="question_content">
    <div>
       <div class="container">
    <h2 class="topper_text">Questions in our Community</h2>
    <hr>
    <br>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'latest')">Latest</button>
  <button class="tablinks" onclick="openCity(event, 'most_votes')">Most Votes</button>
  <button class="tablinks" onclick="openCity(event, 'most_answers')">Most Answers</button>
  <button class="tablinks" onclick="openCity(event, 'no_answers')">No Answers</button>
</div>

<div id="latest" class="tabcontent">
  <h3>Latest</h3>
  <table id="latest_quizes">
    <tr id="lool">
      
    </tr>
  </table>
</div>

<div id="most_votes" class="tabcontent">
  <h3>Most Votes</h3>
  <p>Paris is the capital of France.</p> 
</div>
<div id="most_answers" class="tabcontent">
  <h3>Most Answers</h3>
  <p>Tokyo is the capital of Japan.</p>
</div>

<div id="no_answers" class="tabcontent">
  <h3>No Answers</h3>
  <p>Tokyo is the capital of Japan.</p>
</div>


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

 
</body>
</html> 
<script>
$(function(){
  $.get('http://localhost/quizzer/api/main/index.php', function(response){
    $.each(response, function(index, data){
      data.forEach(function(datum){
        var content = "<div class='content'><h3><a href=''>"+ datum.question +"</a></h3><span>"+ datum.question_moreinfo +"</span><i>Asked by<b> "+ datum.question_asked_by +" </b> on <b>"+ datum.question_ask_date +"</b></i></div>";
        var btns = '<div class="btns"><button type="button"><i>0</i> Likes</button><button type="button"><i>0</i> Dislikes</button><button type="button"><i>0</i> Answers</button></div>';

        $('#lool').append('<div>'+ content +''+ btns +'</div>');
      })
    })
  })
})


$(function(){
  $('#latest_quizes').DataTable()
})








// document.getElementsByClassName('tablinks')[0].className = 'active'
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>

<style>
body {
  font-family: Arial;

}
table{
  width: 100%;
  margin: 0;
  padding: 0;
}
table tr{
  width: 100%;
}
.container{
  width: 100%;
  padding: 10px 20px;
}
.topper_text{
  margin: 10px 0px;
  font-size: 25px;
  font-family: serif;
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
  flex-basis: 75%;
  /*border: 1px solid green;*/

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

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #f9f9f9;
  border: 1px solid gray;
  border-bottom: 0px;
}

/* Style the tab content */
.tabcontent {
  display: flex;
  flex-direction: column;
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
  

}
.tabcontent div{
  display: flex;
  height: 200ps;
  background: #f2f2f2;
  width: 100%;
  margin: 5px 0px;
}
.tabcontent div div:first-child{
  flex-basis: 70%;
  display: flex;
  flex-direction: column;
  padding: 8px 8px 8px 16px;

}
.tabcontent div div:first-child span{
  margin: 10px 0px;

}
.tabcontent div div:first-child i{
  margin: 10px 0px;

}
.tabcontent div div:last-child{
  flex-basis: 25%;
}
.btns{
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.btns button{
  width: 32%;
  height: 70px;
  border: 1px solid lightblue;
  outline: none;
  font-size: 15px;
  background: lightblue;
  border-radius: 5px;
  /*font-weight: bold;*/
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  color: white;
}
.btns button i{
  font-size: 30px;
  font-style: normal;
  font-weight: bold;
}
#latest{
  display: block;
}
</style>
