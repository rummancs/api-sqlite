// Trying to simple way to use a rest api and using methods ( add - update - delete or show data) applying a table .
// sample way to use the methods - for example curl

// 1. add
 curl  -X POST -H "Content-Type: application/json" -d '{"name":"arbrr Ahmedd","email":"ass@rahimafrooz.com"}' http://localhost:8888/api/index.php

 // 2. update 
 curl -X PUT -H "Content-Type: application/json" -d '{"name":"Jahane","email":"jane@rdl.com"}' http://localhost:8888/api/index.php?id=33

 // 3. delete
 curl -X DELETE http://localhost:8888/api/index.php?id=11

 // 4. Check all
 curl -i http://localhost:8888/api/index.php
