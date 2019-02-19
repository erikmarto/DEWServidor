var express = require('express');
var router = express.Router();
var db = require('../lib/db');
var md5 = require('md5');

router.get('/', (req, res, next) => {
  res.render('login');
});

router.post('/', (req, res, next) => {
    var username = req.body.usuario;
    var password = req.body.password;
    
    db.query('select token ' +
        'FROM usuarios ' +
        'WHERE usuario = ? AND password = ?', [username, md5(password)], (err, resul, fields) => {
      if (err) res.render('error', { message: 'whoops', error: err });
      if (typeof resul !== 'undefined') {
          if(resul.length < 1) {
            res.json({msg: "Nombre de usuario o contraseña incorrectos."});
          } else {
            res.json(resul);
          }
      } else {
        res.send("what the fuck");
      }
    });
});

module.exports = router;
