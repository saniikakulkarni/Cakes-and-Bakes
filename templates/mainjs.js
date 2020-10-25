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

function cleardata(){
    document.getElementById("creditform").reset();
}


/* poup address form */ 

function popupaddressclose()
{
    document.getElementById('popupaddress').style.visibility="hidden";
}

function popupAddress()
{
    document.getElementById('popupaddress').style.visibility="visible";
}

function reviewpopup()
{
    document.getElementById('popupreview').style.visibility="visible";
}

function popupreviewclose()
{
    document.getElementById('popupreview').style.visibility="hidden";
}

var i=0;
var filesList={};
function PreviewImage() {

    var oFReader = new FileReader();
    var item = document.getElementById("uploadImage").files[0];
    filesList[i] = item;
    oFReader.readAsDataURL(item);

    
    oFReader.onload = function (oFREvent) {
        document.getElementById("uploadPreview").insertAdjacentHTML("afterend",
        `<div id="${i}" class="preview">
            <img  style="width: 100px; height: 100px;" src="${oFREvent.target.result}" class="previewimg"><button onclick="removeimage('${i}')"class="removebtn">X</button>
        </div>`);
    };
    i=i+1;
    console.log(filesList);
};

function removeimage(i)
{
    document.getElementById(i).remove();
    delete filesList[i];
    console.log(filesList);
}

/* CONFIRM DELETE ADDRESS */ 

function confirmDeleteAddress(addressid){
    var confirm = confirm("Are You sure You want to delete the selected address?");
    if(confrim){
        document.getElementById('deladdress').setAttribute('href','../includes/deleteaddressinc.php?recipientid='+addressid);
    }
    else{
        document.getElementById('deladdress').setAttribute('href','profile.php');
    }
}