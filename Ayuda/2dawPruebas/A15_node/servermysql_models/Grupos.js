var http = require('http');
var mysql = require('mysql');
var config = require('./config');
var url = require ('url');

config.dbparams.multipleStatements=true; //ATENCIÓN!. Se debe evitar SQL Injection mediante mysql.escape() o con parámetros ?

var con = mysql.createConnection(config.dbparams);
con.connect(function(err) {
  if (err) throw err;
  console.log("Conectado!");
});

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
    var id=ruta[2];
    var sql='select * from  grupos where id=?';
    var sql2='select usuarios_id,nombre from  usuarios_grupos ug,usuarios u where u.id=usuarios_id and grupos_id=?';

     con.query(sql + ';' +sql2 , [id,id], function (err, result) {
        if (err || result.length!=2 || result[0].length!=1) {
         res.writeHead(200, {'Content-Type': 'application/json'});
         res.end('Error de acceso '+JSON.stringify(err));

        } else {
          res.writeHead(200, {'Content-Type': 'application/json'});
          result[0][0].usuarios =result[1];
          console.log(result[0]);
          res.write(JSON.stringify(result[0][0])); //Devolvemos el primer y único elemento
; //Devolvemos el primer y único elemento*/
          res.end();
        }
      });
 } else {  //Lista grupos

 }
}).listen(8080);
console.log('Servidor en el puerto 8080 en marcha');
