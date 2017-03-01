<script type='text/javascript'>
function createRequestObject() {
    var ro;
    var browser = navigator.appName;
    if(browser == "Microsoft Internet Explorer"){
        ro = new ActiveXObject("Microsoft.XMLHTTP");
    }else{
        ro = new XMLHttpRequest();
    }
    return ro;
}

var xmlhttp = createRequestObject();

function rubah(combobox)
{
    var kode = combobox.value;
    if (!kode) return;
    xmlhttp.open('get', 'ambildata.php?kode='+kode, true);
    xmlhttp.onreadystatechange = function() {
        if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200))
             document.getElementById("divkedua").innerHTML = xmlhttp.responseText;
        return false;
    }
    xmlhttp.send(null);         
}
</script>