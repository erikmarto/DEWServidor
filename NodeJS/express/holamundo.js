var express = require('express');
var app = express();
 
app.get('/', function (req, res) {
  res.send('<a href="/saluda">Saludar</a>');
});
app.get('/saluda', function (req, res) {
    res.send('Hola mundo!');
  });
app.listen(3000, function () {
  console.log('Escuchando en puerto 3000!');
});