function ejm(p) 
{
	var nombreCarrera = obtenerNombre(p);
	var idCarrera = obtenerId(p);
	document.getElementById("appbundle_estudiante_idcarrera").value = idCarrera;
	document.getElementById("nombreCarrera").value = nombreCarrera;
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