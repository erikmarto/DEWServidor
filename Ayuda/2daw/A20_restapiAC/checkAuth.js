var db=require('./db');

// Comprueba Bearer token
module.exports=function (req, res, next) {
   var bearerToken;
   var bearerHeader = req.headers["authorization"];
   if (typeof bearerHeader !== 'undefined') {
       var bearer = bearerHeader.split(" ");
       bearerToken = bearer[1];
       console.log("Identificando "+bearerToken);
       db.query('select id,nombre,apellido1,apellido2 from tutores where token=?',[bearerToken], 
           function(error, result,fields) {

               if (error || !result.length) 
                   res.sendStatus(403,"Error de acceso");
               else {
                   req.user = result[0]; // Guardamos los datos del usuario en request
                   console.log("Usuario: " + result[0].nombre);
                   next();
               }
       });


   } else {
       console.log("Acceso sin token");
       res.send(403).body("Acceso sin token no permitido");
   }
}