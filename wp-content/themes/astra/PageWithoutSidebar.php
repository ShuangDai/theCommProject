<?php /* Template Name: PageWithoutSidebar */ ?>
<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */
 //References:https://stackoverflow.com/questions/19089171/an-error-occur-when-i-use-appendchild-br-in-a-genuine-exist-reference
 //https://www.w3schools.com/jsref/met_node_appendchild.asp
 //https://stackoverflow.com/questions/17758773/trouble-adding-checkboxes-to-html-div-using-js
 //https://stackoverflow.com/questions/17714705/how-to-use-checkbox-inside-select-option
 //https://www.formget.com/php-checkbox/
 //https://stackoverflow.com/questions/17714705/how-to-use-checkbox-inside-select-option

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>
<style>
.ecs-event-list{
list-style-type:none;
padding-top: 20px ;
margin: 0;
}

.ecs-event{
  margin-top: 20px;
  margin-bottom:20px;
}

.duration{
    margin-bottom:10px;
}
input[type=submit] {
    margin-top:50px;
    margin-right:0px;
    width:13%;
    height: auto;
    background-color: #4CAF50;
    display:inline-block;
    color: white;
    padding: 12px 10px;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    float: right;
}
input[type=text]{
    margin-top:50px;
    margin-left:0px;
    width: 85%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    resize: vertical;
    float: left;
    display:inline-block;
}

.multiselect {
  display:inline-block;
  width: 25%;
  margin-top:20px;
  margin-left:60%;
}

.selectBox {
  position: relative;
}

.selectBox select {
  width: 100%;
  font-weight: bold;
}

.overSelect {
  position: relative;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
}

#checkboxes {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes label {
  display: block;
}

#checkboxes label:hover {
  background-color: #1e90ff;
}

#selectCategory{
    position: absolute;
    left:35%;
    right:15%;
    width: 22%;
    max-width:300px;
    font-weight: bold;
    margin-top:20px;

}

#FutureOrPass{
    position: absolute;
     width: 25%;
     font-weight: bold;
     margin-top:20px;
     max-width:300px;

}

</style>
 <form action="<?php the_permalink(); ?>" method="get">
        <input type="text" name="suburb" placeholder="Please enter suburb">
        <input type="submit" onclick="myFunction()" value="Search">
        <div class = "selectionBoxes">
         <select id= "FutureOrPass">
                       <option selected = "selected" >Upcoming Events</option>
                       <option value="1">Weekly Events</option>
        </select>
        <select id= "selectCategory">
               <option selected = "selected" >Select Event Category</option>
               <option value="1">Out door</option>
               <option value="2">Indoor</option>
               <option value="3">Hobbies</option>
               <option value="4">Special needs</option>
        </select>
         <div class="multiselect">
            <div class="selectBox" onclick="showCheckboxes()">
              <select>
                <option>Select Sub Category</option>
              </select>
              <div class="overSelect"></div>
            </div>
            <div id="checkboxes">
            </div>
          </div>
</div>
    </form>

<?php
if(!$_GET['check_list'] && !$_GET['suburb']){
    $short= '[events-calendar-templates category="melbourne" template="default" style="style-1" date_format="default" start_date="" end_date="" limit="10" order="ASC" hide-venue="no" time="future"]';
    echo do_shortcode($short);
}

if(!$_GET['check_list'] && $_GET['suburb'] && !empty($_GET['suburb'])){
    $suburb = $_GET['suburb'];
    $short= '[events-calendar-templates category='.strtolower($suburb).' template="default" style="style-1" date_format="default" start_date="" end_date="" limit="10" order="ASC" hide-venue="no" time="future"]';
    echo do_shortcode($short);
}
if($_GET['check_list'] && !empty($_GET['check_list']) && !$_GET['suburb']){
     $check_list = $_GET['check_list'];
     $string1="";
     foreach($_GET['check_list'] as $selected) {
     $string1=$string1.$selected.",";
     }
    $string1=substr($string1,0,-1);
    echo $string1;
    $short= '[events-calendar-templates category='.$string1.' template="default" style="style-1" date_format="default" start_date="" end_date="" limit="10" order="ASC" hide-venue="no" time="future"]';
    echo do_shortcode($short);
}

//Get both
if($_GET['suburb'] && !empty($_GET['suburb']) && $_GET['check_list'] && !empty($_GET['check_list']))
{
      $suburb = $_GET['suburb'];
      $check_list = $_GET['check_list'];
       $string1="";
           foreach($_GET['check_list'] as $selected) {
           $string1=$string1.$selected.",";
           }
          $string1=substr($string1,0,-1);
          echo $string1;
          echo "<span id='location'>".$suburb."</span>";
          $short= '[events-calendar-templates category='.$string1.' template="default" style="style-1" date_format="default" start_date="" end_date="" limit="-1" order="ASC" hide-venue="no" time="future"]';
          echo do_shortcode($short);
          echo '<script type="text/javascript">setTimeout(function myFunction(){
                                                      var blocks = document.getElementsByClassName("ect-list-post");
                                                      var locations = document.getElementsByClassName("tribe-locality");
                                                      var target = document.getElementById("location").innerText;

                                                      for (var i = 0; i < locations.length; i++) {
                                                        var location = locations[i].innerText.toLowerCase();
                                                        if(location !== target){
                                                        blocks[i].style.display = "none";
                                                        }
                                                 }
                                               }, 0);
          </script>';
}
?>
<script>
var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}


var outdoor = ["Park walks","Cafe Walks","Senior Festivals","Networking","Tour","Spirituality","Active Session"];
var indoor= ["Seniors at Home","Computers for Seniors","Yoga for seniors","Tai Chi","Book Club","Comedy Show"];
var hobbies = ["Art therapy","Music","Table tennis","Vertical gardens","Seniors week","Cooking Classes","Pottery Classes","Poetry Classes","Trivia"];
var special_needs = ["Dementia","Sensory Activities","Craft Club"];

var outdoor2 = ["park-walks","cafe-walks","seniors-festival","networking","tour","spirituality","active-session"];
var indoor2= ["seniors-at-home","computers-for-seniors","yoga-for-seniors","tai-chi","book-club","comedy-show"];
var hobbies2 = ["art-therapy","music","table-tennis","vertical-gardens","seniors-week","cooking-classes","pottery-classes","poetry-classes","trivia"];
var special_needs2 = ["dementia","sensory-activities","craft-club"];

document.getElementById("selectCategory").addEventListener("change", function(e){
    var select2 = document.getElementById("checkboxes");
    select2.innerHTML = "";
    var aItems = [];
    var aItems2 = [];
    if(this.value == "1"){
        aItems = outdoor;
        aItems2 = outdoor2;
    } else if (this.value == "2") {
        aItems = indoor;
         aItems2 = indoor2;
    } else if(this.value == "3") {
        aItems = hobbies;
        aItems2 = hobbies2;
    }
    else if(this.value == "4") {
        aItems = special_needs;
        aItems2 = special_needs2;
    }
    for(var i=0,len=aItems.length; i<len;i++) {
       var newCheckbox = document.createElement("input");
        newCheckbox.type = "checkbox";
        newCheckbox.name = "check_list[]";
        newCheckbox.value =aItems2[i];
        var textNode = document.createTextNode(aItems[i]);
        select2.appendChild(newCheckbox);
        select2.appendChild(textNode);
        select2.appendChild(document.createElement("br"));
    }

}, false);




</script>
<?php get_footer(); ?>

