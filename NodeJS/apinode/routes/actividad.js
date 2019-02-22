var express = require('express');
var router = express.Router();
var db= require('../db');
 
/* GET devuelve actividades planficadas. */
router.get('/', function(req, res, next) {
  db.query('select * from clases',function(error,result,fields){
    if(error!==null)
      res.send(error);
    else{
        res.render('clases', {clases: result});
    }
          
    
  });
  
 
});
 
module.exports = router;