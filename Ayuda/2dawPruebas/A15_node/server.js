var http = require('http');
var fecha = require('./fecha');

http.createServer(function (req, res) {
    res.writeHead(200, {'Content-Type': 'text/html'});

    res.write("Hoy es : " + fecha.hoy());
    res.end();
}).listen(8080);
console.log('Servidor en el puerto 8080 en marcha');
