function obtenerAsignatura(p,v) 
{
	//Verificar origen
	var origen = document.getElementById("origen").value;
	var appBundleId = ""
	if(origen==="estudianteAsignatura")
	{
		appBundleId = "appbundle_estudianteasignatura_idAsignaturaPeriodo";
	}
	else if(origen="asignaturaPeriodo")
	{
		appBundleId = "appbundle_asignaturaperiodo_idAsignatura"; 
		document.getElementById("appbundle_asignaturaperiodo_creditos").value = v;
	}	
	var nombreCarrera = obtenerNombre(p);
	var idCarrera = obtenerId(p);
	document.getElementById(appBundleId).value = idCarrera;
	document.getElementById("asignatura").value = nombreCarrera;
	
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