function obtenerAula(p,v) 
{
	var nombreCarrera = obtenerNombre(p);
	var idCarrera = obtenerId(p);
	document.getElementById("appbundle_asignaturaperiodo_idAula").value = idCarrera;
	document.getElementById("aula").value = nombreCarrera;
	document.getElementById("appbundle_asignaturaperiodo_capacidad").value = v;
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