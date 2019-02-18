var fecha = require('./fecha');
var http = require('http');

http.createServer((req, res) => {
    res.writeHead(200, {'Content-Type': 'text/html'});
    res.write('0sadfasdfasdfasdfasdfasfasfdasdfasdfas');
    res.end(fecha.myDateTime());
}).listen(8080);