function obtenerAsignaturaPeriodo(p) 
{
	var nombreCarrera = obtenerNombre(p);
	var idCarrera = obtenerId(p);
	document.getElementById("appbundle_actividadinformativa_idAsignaturaPeriodo_idAsignaturaPeriodo").value = idCarrera;
	document.getElementById("nombreAsignatura").value = nombreCarrera;
}

function obtenerUsuario(p) 
{
	var nombreUsuario = obtenerNombre(p);
	var idNick = obtenerId(p);
	document.getElementById("appbundle_estudiante_idnick").value = idNick;
	document.getElementById("nombreNick").value = nombreUsuario;
}

function obtenerNombre(p)
{
	var posPunto = p.lastIndexOf(".");
	return  p.substr(0,posPunto);
}

function obtenerId(p)
{
	var posPunto = p.lastIndexOf(".");
	return  p.substr(posPunto+1,p.length);
}