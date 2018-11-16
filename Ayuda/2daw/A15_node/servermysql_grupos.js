var http = require('http');
var mysql = require('mysql');
var config = require('./config');
var url = require ('url');

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
  if(ruta.length<2 || ruta[1]!='grupos'){
    res.writeHead(200, {'Content-Type': 'text/html'});
    res.end('Error de acceso. Pon /grupos o /grupos/ID ');
  }
  if(ruta[2]) {
    var id=ruta[2];
    con.query('select * from  grupos where id=?', [id], function (err, result) {
       if (err || !result.length ) {
        res.writeHead(200, {'Content-Type': 'application/json'});
        res.end('Error de acceso '+JSON.stringify(err));

       } else {
         con.query('select usuarios_id,nombre from  usuarios_grupos ug,usuarios u where u.id=usuarios_id and grupos_id=?', [id], function (err, resultuser) {
            if (err) {
             res.writeHead(200, {'Content-Type': 'text/html'});
             res.end('Error de acceso '+JSON.stringify(err));

            } else {
              res.writeHead(200, {'Content-Type': 'application/json'});

              result[0].usuarios =resultuser;  //Result es un array de RowDataPacket
              console.log(result[0]);
              res.write(JSON.stringify(result[0])); //Devolvemos el primer y único elemento

              //Alternativa. Convertir los datapackets a arrays convencionales
              var users = resultuser.map((r) => Object.assign({}, r))
              var data = result.map((r) => Object.assign({}, r, {"usuarios": users}))
              console.log(data);
              res.write(JSON.stringify(data[0])); //Devolvemos el primer y único elemento*/

              res.end();
            }
          });
       }
   }) ;
 } else {  //Lista grupos
   con.query('select id,nombre from  grupos order by nombre', function (err, result) {
      if (err  ) {
       res.writeHead(200, {'Content-Type': 'text/html'});
       res.end('Error de acceso '+JSON.stringify(err));

      } else {
        res.writeHead(200, {'Content-Type': 'application/json'});
        res.end(JSON.stringify(result));
      }
    });
 }
}).listen(8080);
console.log('Servidor en el puerto 8080 en marcha');
