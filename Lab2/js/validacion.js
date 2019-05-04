function validarForm()
{
    if(document.getElementById("nombre").value.length==0){
       document.getElementById("msjNombre").innerHTML = "&nbsp;<span style='color:red;'>Campo Requerido (*)</span>";
       document.getElementById("nombre").focus();
       return false;
    }else{
        document.getElementById("msjNombre").innerHTML ="&nbsp;";
    }
}

/*function validarFormTextArea() {
    var problem_desc = document.getElementById('problem_desc');
        if ($.trim(problem_desc.value) == '') {
        alert('Please Write Problem Description');
        return false;
            } else {
        return true;
        }
}

*/