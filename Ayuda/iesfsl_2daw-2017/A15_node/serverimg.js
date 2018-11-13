var http = require('http');
var fs = require('fs');
var url = require('url');
var nodemailer = require('nodemailer');

http.createServer(function (req, res) {
  var q = url.parse(req.url, true);
  switch (q.pathname) {
    case '/index':
      res.writeHead(200, {'Content-Type': 'text/html'});
      res.write('Hola!');
      res.end();
      break;
    case '/logo':
      fs.readFile('logo.jpg',function(err,data){
        if(!err) {
          res.writeHead(200, {'Content-Type': 'image/jpeg'});
          res.write(data);
        } else {
          res.write("No existe");
        }
        res.end();
      });
      break;
    case '/email':

      var transporter = nodemailer.createTransport({
        service: 'gmail',
        auth: {
          user: 'iesfsl2daw@gmail.com',
          pass: 'ies_12345'
        }
      });

      var mailOptions = {
        from: 'iesfsl2daw@gmail.com',
        to: 'calbero@iesfsl.org',
        subject: 'Enviando correo desde Node',
        text: 'Funciona!!!'
      };

      transporter.sendMail(mailOptions, function(error, info){
        if (error) {
          console.log(error);
        } else {
          console.log('Email sent: ' + info.response);
        }
      });
      break;
    default:
      res.writeHead(404, {'Content-Type': 'text/html'});
      res.write('No entiendo '+q.pathname);
      res.end();
    }
}).listen(8080);
console.log('Servidor en el puerto 8080 en marcha');
