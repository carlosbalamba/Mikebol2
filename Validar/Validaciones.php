<script>
    function validarNombre()
    {
      valor = document.getElementById("nombre").value;
      if (valor == null || valor.length == 0 || /^\s+$/.test(valor)){
        alert('Falta llenar Nombre');
        return false;
      }else {return true;}
    }

    function validarApellido()
    {
      valor = document.getElementById("apellido").value;
      if (valor == null || valor.length == 0 || /^\s+$/.test(valor)){
        alert('Falta llenar apellidos');
        return false;
      }else {return true;}
    }

    function validarDocumento()
    {
      indice = document.getElementById("tipo_documento").selectedIndex;
      if (indice == null || indice == 0 ){
        alert('Seleccione tipo de documento');
        return false;
      }else {return true;}
    }

    function validarUsuario()
    {
      valor = document.getElementById("usuario1").value;
      if (valor == null || valor.length == 0 || /^\s+$/.test(valor)){
        alert('Falta llenar el numero de documento');
        return false;
      }else if (isNaN(valor)){
        alert('El documento ingresado solo debe tener números');
        return false;
      }else{return true;}
    }

    function validarFicha()
    {
      indice = document.getElementById("ficha").selectedIndex;
      if (indice == null || indice == 0 ){
        alert('Seleccione la ficha');
        return false;
      }else {return true;}
    }

    function validarEps()
    {
      valor = document.getElementById("eps").value;
      if (valor == null || valor.length == 0 || /^\s+$/.test(valor)){
        alert('Falta llenar la eps');
        return false;
      }else {return true;}
    }

    function validarTelefono()
    {
      valor = document.getElementById("telefono").value;
      if (valor == null || valor.length == 0 || /^\s+$/.test(valor)){
        alert('Falta llenar el telefono');
        return false;
      }else if (isNaN(valor)) {
        alert('El telefono ingresado solo debe tener números');
        return false;
      }else{return true;}
    }

    function validarCorreo()
    {
      expresion = /\w+@\misena+\.+edu\.+co/;
      valor = document.getElementById("correo").value;
      if (valor == null || valor.length == 0 || /^\s+$/.test(valor)){
        alert('Falta llenar el correo');
        return false;
      }else if (!expresion.test(valor)) {
        alert('Ingrese un correo electrónico del SENA válido');
        return false;
      }else{return true;}
    }

    function validarPassword()
    {
      valor = document.getElementById("password1").value;
      if (valor == null || valor.length == 0 || /^\s+$/.test(valor)){
        alert('Falta llenar Password');
        return false;
      }else{
        valor2 = document.getElementById("con_password").value;
        if (valor == valor2) { return true; }
        else{ alert('Las contraseñas NO coinciden :(');
        return false;}
      }
    }

    function validarEquipo()
    {
      indice = document.getElementById("equipo").selectedIndex;
      if (indice == null || indice == 0 ){
        alert('Seleccione su equipo');
        return false;
      }else {return true;}
    }

    function validarCheked()
    {
      box = document.getElementById("acepto");
      if (box.checked == false) {
        alert("Debes aceptar nuestras políticas de privacidad y condiciones");
        return false;
      }else {return true;}
    }

    function validar()
    {
      if (validarNombre() && validarApellido() && validarDocumento() && validarUsuario() && validarFicha() && validarEps() && validarTelefono() && validarCorreo() && validarPassword() && validarEquipo() && validarCheked())
      {
        document.registro.submit();
      }
    }
  </script>