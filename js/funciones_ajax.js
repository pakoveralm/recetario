//funciones ajax
/*funcion ajax de buscar recetas por categoria de la 
pagina buscar_recetas.php*/
function muestracomida(str)
		{
		
					var xmlhttp;
		
					if(str == "")
					{
					document.getElementById("txthint").innerHTML="";
					return;
					}
		
					if(window.XMLHttpRequest)
					{
		
					xmlhttp= new XMLHttpRequest();
		
					}
					else
					{
					xmlhttp= new ActiveXObjet("Microsoft.XMLHttp");
					}
		
					xmlhttp.onreadystatechange=function()
					{
		
						if(xmlhttp.readyState == 4 && xmlhttp.status==200)
						{
		
							document.getElementById("resultado_categorias").innerHTML=xmlhttp.responseText;
						}
					}
		
					xmlhttp.open("GET","ajax_consulta_recetas_categoria.php?q="+str,true);
					xmlhttp.send();
		
		}


/*funcion ajax buscar recetas por nombre de la página
buscar_recetas.php*/
function muestranombrescomida(str)
		{
		
					var xmlhttp;
		
					if(str == "")
					{
					document.getElementById("txthint").innerHTML="";
					return;
					}
		
					if(window.XMLHttpRequest)
					{
		
					xmlhttp= new XMLHttpRequest();
		
					}
					else
					{
					xmlhttp= new ActiveXObjet("Microsoft.XMLHttp");
					}
		
					xmlhttp.onreadystatechange=function()
					{
		
						if(xmlhttp.readyState == 4 && xmlhttp.status==200)
						{
							document.getElementById("resultado_categorias").style.visibility="hidden";
							document.getElementById("resultado_nombres").innerHTML=xmlhttp.responseText;
						}
					}
		
					xmlhttp.open("GET","ajax_consulta_recetas_nombres.php?n="+str,true);
					xmlhttp.send();
		
		}

/*funcion ajax para la barra de busqueda de recetas por 
categorias de la página modificar receta*/
function muestra_categorias_recetas(str)
{
			var xmlhttp;

			if(str == "")
			{
				document.getElementById("txthint").innerHTML="";

				return;
			}

			if(window.XMLHttpRequest)
			{
				xmlhttp= new XMLHttpRequest();
			}
			else
			{
				xmlhttp= new ActiveXObjet("Microsoft.XMLHttp");
			}

			xmlhttp.onreadystatechange=function()
			{

				if(xmlhttp.readyState == 4 && xmlhttp.status==200)
				{
					document.getElementById("cliente").innerHTML=xmlhttp.responseText;
				}
			}

				xmlhttp.open("GET","db.php?q="+str,true);
				xmlhttp.send();

}

/*Funcion que muestra los productos para modificarlos de 
la página modificar_receta.php*/

