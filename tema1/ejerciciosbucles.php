<?php
$numero=15;
echo "<table border='4' align='center'>";
for($i=1; $i<=$numero; $i++){
    echo "<tr>";
        echo "<td>$numero</td>";
        echo "<td>X</td>";
        echo "<td>$i</td>";
        echo "<td>=</td>";
        echo "<td>".$numero*$i."</td>";
    echo "</tr>";
}
echo "</table>";