var tabla
//ejecutar el inicio
function init() {
    mostrarform(false);
    listar();
    $("#formulariocita").on("submit",function(e){
        guardaryeditar(e);
    });

    //Cargamos los items al select Estado
    $.post("../ajax/cita.php?op=selectEstado",function(r)
        {        
            //console.log(data);
            $("#estado_idestado").html(r);
            $("#estado_idestado").selectpicker('refresh');
            
        }
    );
}
//funcion limpiar
function limpiar(){
    $("#idcita_medica").val("");
    $("#especialidad_idespecialidad").val("");
    $("#personaPaciente_idpersona").val("");
    $("#diagnostico").val("");
    $("#sintomas").val("");
    $("#motivo_consulta").val("");
    $("#estado_idestado").val("");
    $(".filas").remove();
}
//mostrar formulario
function mostrarform(flag){
    limpiar();
    if(flag){
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled",false);
        $("#btnagregar").hide();
        listarMedicamento();
        listarExamen();
    }else{
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
        $("#btnagregar").show();
    }
}

//cancelar form
function cancelarform(){
    limpiar();
    mostrarform(false);
}
//funcion listar
function listar(){
    tabla=$('#tbllistadocita').dataTable({
        "aProcessing":true,//activar procesamiento del datatable
        "aServerSide": true,//paginacion y filtrado realizados por el servidor
        dom: 'Bfetip',//definir los parametro del control de tabla
        
        //botones para copiar los registros en diferentes formatos
        buttons:[
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf',
        ],
        "ajax":{
            url: '../ajax/cita.php?op=listar',
            type: "get",
            dataTyoe: "json",
            error: function(e){
                console.log(e,responseText);
            }
        },
        "bDestroy":true,
        "iDisplayLength": 5, //paginacion--> cada 5 registros
        "order": [[0, "desc" ]]//ordenar (columna)
    }).DataTable();
}

//funcion guardar o editar
function guardaryeditar(e){
    e.preventDefault();
    $("#btnGuardar").prop("disabled",true);
    var formData = new FormData($("#formulariocita")[0]);
    $.ajax({
        url: "../ajax/cita.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function(datos){
            
            alert(datos);
            mostrarform(false);
            //alertify.success('Cita registrada');
            location.reload();
        }
    });
    limpiar();
}


function mostrar(idcita_medica){
    $.post("../ajax/cita.php?op=mostrar",{idcita_medica : idcita_medica}, function(data, status)
    {
        data = JSON.parse(data);
        mostrarform(true);

        $("#especialidad_idespecialidad").val(data.especialidad_idespecialidad);
        $("#personaPaciente_idpersona").val(data.personaPaciente_idpersona);
        $("#diagnostico").val(data.diagnostico);
        $("#sintomas").val(data.sintomas);
        $("#motivo_consulta").val(data.motivo_consulta);
        //$("#estado_idestado").val(data.estado_idestado);
        //$("#estado_idestado").selectpicker('refresh');
        $("#idcita_medica").val(data.idcita_medica);
    });
}
//listar medicamentos
function listarMedicamento() {
    tabla=$('#tblmedicamentos').dataTable({
        "aProcessing":true,//activar procesamiento del datatable
        "aServerSide": true,//paginacion y filtrado realizados por el servidor
        dom: 'Bfetip',//definir los parametro del control de tabla
        
        //botones para copiar los registros en diferentes formatos
        buttons:[
        ],
        "ajax":{
            url: '../ajax/cita.php?op=listarMedicamentos',
            type: "get",
            dataTyoe: "json",
            error: function(e){
                console.log(e,responseText);
            }
        },
        "bDestroy":true,
        "iDisplayLength": 5, //paginacion--> cada 5 registros
        "order": [[0, "desc" ]]//ordenar (columna)
    }).DataTable();
}

var cont=0;
var detalles=0;
function agregarMedicamento(idmedicamento,nombre,descripcion) {
    var cantidad=1;
    var observaciones="";
    if (idmedicamento!="") {
        var fila='<tr class="filas" id="fila'+cont+'">'+
        '<td> <button type="button" class="btn btn-danger" onclick="eliminarMedicamento('+cont+')">X</button></td>'+
        '<td><input type="hidden" name="idmedicamento[]" value="'+idmedicamento+'">'+nombre+'</td>'+
        '<td><input type="hidden" name="descripcion[]" value="">'+descripcion+'</td>'+
        '<td><input type="number" maxlength="3" minlength="1" name="cantidad[]" id="cantidad[]" value="'+cantidad+'"></td>'+
        '<td><input type="text" name="observaciones[]" id="observaciones[]" value="'+observaciones+'"></td>'
        //<textarea name="observaciones[]" id="observaciones[]" rows="2"></textarea>
        '</tr>';
        cont++;
        detalles= detalles+1;
        $('#medicamentos').append(fila);
    }else{
        alert("Error al ingresar el medicamento")
    }
}

function eliminarMedicamento(indice) {
    $("#fila" + indice).remove();
  	detalles=detalles-1;
}

/****************************************
 * 
 * 
 * Lista de examenes 
 * 
 * 
 * 
 * ****************************************/
function listarExamen() {
    tabla=$('#tblexamenes').dataTable({
        "aProcessing":true,//activar procesamiento del datatable
        "aServerSide": true,//paginacion y filtrado realizados por el servidor
        dom: 'Bfetip',//definir los parametro del control de tabla
        
        //botones para copiar los registros en diferentes formatos
        buttons:[
        ],
        "ajax":{
            url: '../ajax/cita.php?op=listarExamenes',
            type: "get",
            dataTyoe: "json",
            error: function(e){
                console.log(e,responseText);
            }
        },
        "bDestroy":true,
        "iDisplayLength": 5, //paginacion--> cada 5 registros
        "order": [[0, "desc" ]]//ordenar (columna)
    }).DataTable();
}

var cont2=0;
var detalles2=0;
function agregarExamen(idexamen,nombre,tipo) {
    if (idexamen!="") {
        var fila='<tr class="filas" id="fila2'+cont2+'">'+
        '<td> <button type="button" class="btn btn-danger" onclick="eliminarExamen('+cont2+')">X</button></td>'+
        '<td><input type="hidden" name="idexamen[]" value="'+idexamen+'">'+nombre+'</td>'+
        '<td><input type="hidden" name="tipo[]" value="">'+tipo+'</td>'
        '</tr>';
        cont2++;
        detalles2= detalles2+1;
        $('#examenes').append(fila);
    }else{
        alert("Error al ingresar el medicamento")
    }
}
function eliminarExamen(indice) {
    $("#fila2" + indice).remove();
  	detalles=detalles-1;
}

init();