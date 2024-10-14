var Subject = "";
var Level = "";


function RevealLevels(){
    document.getElementById("levelNumber").style.visibility = "visible";
 
}

function GetSubject(clicked_id)
{
    Subject = clicked_id;

}


function GetLevel(clicked_id)
{
    Level = clicked_id;
    fetch('levels.json')
    .then((response) => response.json())
    .then((json) => document.getElementById("LvlOutput").innerHTML = json[Subject][Level]) ; 
  
    // console.log(json[Subject][Level]));
}

