/*---FECHAS----*/
$.validator.addMethod("dateFormat",
  function(value, element) {
    return value.match(/^\d\d\d\d?\-\d\d?\-\d\d$/);
  },
  "Por favor, introduzca una fecha en el formato yyyy-mm-dd");

$.validator.addMethod("dateFormat-Es",
  function(value, element) {
    //si no hay contenido no lo validamos  
    if(value.length<=0){
      return true;     
    }
    return value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/);
  },
  "Por favor, introduzca una fecha en el formato dd/mm/yyyy");
/*---telefonos----*/
$.validator.addMethod("fono",
  function(value, element) {
    //si no hay contenido no lo validamos  
    if(value.length<=0){
      return true;     
    }
     return value.match(/^[0-9-]+$/);
    
  },
  "El teléfono es incorrecto ejemp: 000-0000 ó 00000");



/******Traducciones****/
jQuery.extend(jQuery.validator.messages, {
  required: "Este campo es obligatorio.",
  remote: "Por favor, rellena este campo.",
  email: "Por favor, escribe una dirección de correo válida",
  url: "Por favor, escribe una URL válida.",
  date: "Por favor, escribe una fecha válida.",
  dateISO: "Por favor, escribe una fecha (ISO) válida.",
  number: "Por favor, escribe un número entero válido.",
  digits: "Por favor, escribe sólo dígitos.",
  creditcard: "Por favor, escribe un número de tarjeta válido.",
  equalTo: "Por favor, escribe el mismo valor de nuevo.",
  accept: "Por favor, escribe un valor con una extensión aceptada.",
  maxlength: jQuery.validator.format("Por favor, no escribas más de {0} caracteres."),
  minlength: jQuery.validator.format("Por favor, no escribas menos de {0} caracteres."),
  rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
  range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
  max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
  min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
});