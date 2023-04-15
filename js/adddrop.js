function getElementsById(ids) {
    var idList = ids.split(" ");
    for (var i = 0; i < idList.length; i++) {
        item = document.getElementById(idList[i]).style.display="none";
    }
}

function showAppropriateForm( v )
{
    getElementsById("processor mboard ram hdd ssd");
    document.getElementById(v).style.display="block";
//   if( v == "processor" )
//   {
    
//     // document.getElementById("processor1" ).style.display="block";
//     // document.getElementById("processor2" ).style.display="block";
//   }
//   else if( v == "mboard" )
//   {
//     document.getElementById("mboard").style.display="block";
//   }
}