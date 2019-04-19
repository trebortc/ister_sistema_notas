function obtenerEstudiante(p) 
{
	//Verificar origen
	var origen = document.getElementById("origen").value;
	var appBundleId = ""
	if(origen==="estudianteAsignatura")
	{
		appBundleId = "appbundle_estudianteasignatura_idEstudiante";
	}else
	{
		appBundleId = "appbundle_estudiante_idcarrera"; 
	}	
	
	var nombreCarrera = obtenerNombre(p);
	var idCarrera = obtenerId(p);
	document.getElementById(appBundleId).value = idCarrera;
	document.getElementById("estudiante").value = nombreCarrera;
}

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