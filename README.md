# CSA
CSA - Es una Clase para Subir Archivos(uno o mas) con PHP

### Que es lo que Contiene:
- Formulario con Input (Invocar Funcion)
- Sistema para Subir Archivos
- Validaciones:
 - Extensiones Permitidas ("jpg","png","gif","pdf",'mp3','ogg','wav','webm','mp4')
 - Archivo Ya Existe (Muestra Mensaje de Error)
 - Seleccion de 1 Archivo por lo menos

### Como Funciona:
Solo tienes que Enlazar El Archivo **CSA.php** e invocar las Funciones

> require_once 'php/CSA.php'; // Enlazamos el Archivo que contiene la Clase
> $CSA = new CSA(); // Invocamos la Clase
> $CSA->AgregarFormCSA(); // Invocamos la Funcion de la Clase 

### Funcion para Agregar el Form:
` $CSA = new CSA();
$CSA->AgregarFormCSA(); `

### Funcion para Subir los Archivos:
` $archivos = $_FILES['archivoCSA']['name'];
	$subirAC = new CSA();
	$subirAC->SubirArchivosCSA($archivos); `
Esta Funcion ya viene Agregada en la Clase al Final, se Ejecuta al Enviar el Form mediante la funcion agregada del Form
