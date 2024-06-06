<html>
<head>
 <title> Ejercicio 4 Apache con MySql </title>
 <style>
  table {
   border-collapse: collapse;
   width: 100%;
   color: #588c7e;
   font-family: monospace;
   font-size: 25px;
   text-align: left;
     }
  th {
   background-color: #588c7e;
   color: white;
    }
  tr:nth-child(even) {background-color: #f2f2f2}
 </style>
</head>
<body>
 <h1>Hola, este es el contenedor 01</h1>
 <table>
 <tr>
  <th>Id</th>
  <th>Nombre</th>
  <th>Apellido</th>
  <th>Edad</th>
 </tr>
 <?php
  $conn = mysqli_connect("192.168.100.15:3306", "root", "1234", "people");
  //Check connection
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  }
  $sql = "SELECT id, nombre, apellido, edad FROM registro";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nombre"] . "</td><td>" . $row["apellido"] . "</td><td>" . $row["edad"] . "</td></tr>";
   }
    echo "</table>";
   } else { echo "0 results"; }
   $conn->close();
?>
</table>
</body>
</html>
~

