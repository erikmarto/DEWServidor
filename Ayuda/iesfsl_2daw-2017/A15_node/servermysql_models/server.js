var http = require('http');
var url = require ('url');
var Grupos = require('Grupos');

/* /grupos Devuelve los grupos
* /grupos/ID Devuelve el grupo id con los usuarios del grupo
*/
http.createServer(function (req, res) {
  var q = url.parse(req.url, true);
  var ruta=q.pathname.split("/");
  if(ruta[1]!='grupos'){
    res.writeHead(200, {'Content-Type': 'text/html'});
    res.end('Error de acceso ');
  }
  if(ruta[2]) {
    Grupos.getById(ruta[2]).then(function(data){
          res.writeHead(200, {'Content-Type': 'application/json'});
          res.end(JSON.stringify(data));
      });
 } else {  //Lista grupos
   Grupos.getAll().then(function(data){
         res.writeHead(200, {'Content-Type': 'application/json'});
         res.end(JSON.stringify(data));
     });

 }
}).listen(8080);
console.log('Servidor en el puerto 8080 en marcha');
