function popup()
{
    document.getElementById('popupid2').style.visibility="hidden";
    document.getElementById('popupid').style.visibility="visible";
}
function popupclose()
{
    document.getElementById('popupid').style.visibility="hidden";
}
function popupsignup()
{
    document.getElementById('popupid').style.visibility="hidden";
    document.getElementById('popupid2').style.visibility="visible";
}
function popupsignupclose()
{
    document.getElementById('popupid2').style.visibility="hidden";
}
function menushow()
{
    document.getElementById('dropdowncat').style.visibility="visible";
}
function menuhide()
{
    document.getElementById('dropdowncat').style.visibility="hidden";
}
function profileshow()
{
    document.getElementById('dropdownprofile').style.visibility="visible";
}
function profilehide()
{
    document.getElementById('dropdownprofile').style.visibility="hidden";
}
function picboxdisplay(smallpicid1,smallpicid2,smallpicid3,smallpicid4)
{
    var sourceimg=document.getElementById(smallpicid1).src;
    document.getElementById(smallpicid1).style.border="2px solid #865e17";
    document.getElementById(smallpicid2).style.border="none";
    document.getElementById(smallpicid3).style.border="none";
    document.getElementById(smallpicid4).style.border="none";
    document.getElementById('bigpicdiv').style.backgroundImage="url('"+sourceimg+"')";
}

function displaycontent(blockid1,blockid2,blockid3,blockid4,navid1,navid2,navid3,navid4)
{
    document.getElementById(navid1).style.borderBottom="3px solid rgb(235, 105, 127)";
    document.getElementById(navid2).style.borderBottom="none";
    document.getElementById(navid3).style.borderBottom="none";
    document.getElementById(navid4).style.borderBottom="none";
    document.getElementById(blockid1).style.display="block";
    document.getElementById(blockid2).style.display="none";
    document.getElementById(blockid3).style.display="none";
    document.getElementById(blockid4).style.display="none";
}