function obtenerEstudianteAsignatura(p) 
{
	var nombreCarrera = obtenerNombre(p);
	var idCarrera = obtenerId(p);
	document.getElementById("appbundle_estudianteasignatura_idEstudiante").value = idCarrera;
	document.getElementById("nombreEstudiante").value = nombreCarrera;
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