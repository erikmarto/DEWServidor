var db=require('./db');
 
// Comprueba Bearer token
module.exports=function (req, res, next) {
    var bearerToken;
    var bearerHeader = req.headers["authorization"];
    if (typeof bearerHeader !== 'undefined') {
        var bearer = bearerHeader.split(" ");
        bearerToken = bearer[1];
        console.log("Identificando "+bearerToken);
        db.query('select id from usuarios where token=?',[bearerToken], 
            function(error, result,fields) {
 
                if (error!==null || !result.length) 
                    res.sendStatus(403,"Error de acceso");
                else {
                    req.user = result[0]; // Guardamos los datos del usuario en request
                    console.log("Usuario: " + result[0].id);
                    next();
                }
        });
 
 
    } else {
        console.log("Acceso sin token");
        res.send(403).body("Acceso sin token no permitido");
    }
}