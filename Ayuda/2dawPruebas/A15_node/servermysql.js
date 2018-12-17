var http = require('http');
var mysql = require('mysql');
var config = require('./config');
var url = require ('url');

var con = mysql.createConnection(config.dbparams);
con.connect(function(err) {
  if (err) throw err;
  console.log("Conectado!");
});

http.createServer(function (req, res) {
  var q = url.parse(req.url, true);
  var tabla=q.pathname.substring(1);
  var sql='select * from '+tabla;
  if(q.search.substring(1))
    sql+=' where '+q.search.substring(1);

  console.log(sql);
  con.query(sql, function (err, result) {
     if (err) {
      res.writeHead(200, {'Content-Type': 'application/json'});
      res.write('Error de acceso a '+tabla+' '+JSON.stringify(err));

     } else {
       console.log("Listando: " + tabla);

       res.writeHead(200, {'Content-Type': 'application/json'});

       res.write(JSON.stringify(result));
     }
     res.end();

   });
}).listen(8080);
console.log('Servidor en el puerto 8080 en marcha');
