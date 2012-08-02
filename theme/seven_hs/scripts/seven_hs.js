M.front_page = {};      

M.front_page.init = function(Y){
  this.Y
  this.Dom  = YAHOO.util.Dom;      
  
};


M.front_page.hide_blocks = function(){  
  var elements =  this.Dom.getElementsByClassName('block');    
  for(var i in  elements) this.Dom.addClass(elements[i], "dock_on_load");
};


M.front_page.ShowDialog = function(message, header, elementId){  
    
      YUI(M.yui.loader).use('yui2-container', 'yui2-event', function(Y) {
        var simpledialog = new YAHOO.widget.SimpleDialog('confirmdialog',
            {width: '300px',
              fixedcenter: false,
              modal: false,
              visible: false,
              draggable: true,
              Y:280
            }
        );

        simpledialog.setHeader(header);
        simpledialog.setBody(message);

        renderElement = document.getElementById(elementId);
        simpledialog.render(renderElement);
        simpledialog.show();
    });
    
};

M.front_page.ValidateContacto = function()
{
  
  var validForm = true;
  var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;   
  var nombre = this.Dom.get('nombreInput');
  var nombreErr = this.Dom.get('nombreError');
  var email = this.Dom.get('emailInput');
  var emailErr = this.Dom.get('emailError');  
  var mensaje = this.Dom.get('mensajeTextarea');      
  var mensajeErr = this.Dom.get('mensajeError');      
    
     if(nombre.value.trim() == ""){
         nombreErr.show();
         validForm = false;
     }
    
    if (email.value.search(emailRegEx) == -1) {
        emailErr.show();
        validForm = false;
     }
    
    if (mensaje.value.trim() == "") {
        mensajeErr.show();
        validForm = false;
     }     
     
     return validForm;  
}



//////////////////////////////////////////////////////////////////////
//Private Funtions
//////////////////////////////////////////////////////////////////////

 Element.prototype.show = function(){
    this.style.display = "block"; 
 }

String.prototype.trim = function() {
    return this.replace(/^\s+|\s+$/g,"");
}
String.prototype.ltrim = function() {
    return this.replace(/^\s+/,"");
}
String.prototype.rtrim = function() {
    return this.replace(/\s+$/,"");
}

